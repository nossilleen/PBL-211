<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DatabaseConnection;
use App\Models\DatabaseInteraction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PrivilegeChangeNotification;

class DatabaseMonitorController extends Controller
{
    public function index()
    {
        $connections = DatabaseConnection::with('user')
            ->latest()
            ->paginate(10);
            
        $interactions = DatabaseInteraction::with('user')
            ->latest()
            ->paginate(10);
            
        return view('admin.database-monitor', compact('connections', 'interactions'));
    }

    public function logConnection(Request $request)
    {
        try {
            $connection = DatabaseConnection::create([
                'user_id' => auth()->id(),
                'ip_address' => $request->ip(),
                'connection_type' => $request->input('connection_type', 'web'),
                'status' => 'connected',
                'device_info' => json_encode([
                    'user_agent' => $request->userAgent(),
                    'timestamp' => now()
                ])
            ]);

            return response()->json(['status' => 'success', 'data' => $connection]);
        } catch (\Exception $e) {
            Log::error('Connection logging failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function logInteraction($action, $table, $recordId = null, $details = null)
    {
        try {
            $interaction = DatabaseInteraction::create([
                'user_id' => auth()->id(),
                'action_type' => $action,
                'table_name' => $table,
                'record_id' => $recordId,
                'details' => $details ? json_encode($details) : null,
                'status' => 'success'
            ]);

            return response()->json(['status' => 'success', 'data' => $interaction]);
        } catch (\Exception $e) {
            Log::error('Interaction logging failed: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function updatePrivileges(Request $request, User $user)
    {
        $request->validate([
            'can_view_product' => 'boolean',
            'can_create_product' => 'boolean',
            'can_edit_product' => 'boolean',
            'can_delete_product' => 'boolean'
        ]);

        $oldPermissions = $user->only([
            'can_view_product',
            'can_create_product',
            'can_edit_product',
            'can_delete_product'
        ]);

        $user->update($request->only([
            'can_view_product',
            'can_create_product',
            'can_edit_product',
            'can_delete_product'
        ]));

        // Log the privilege change
        $this->logInteraction(
            'update',
            'user',
            $user->id,
            [
                'type' => 'privilege_change',
                'old' => $oldPermissions,
                'new' => $user->only([
                    'can_view_product',
                    'can_create_product',
                    'can_edit_product',
                    'can_delete_product'
                ])
            ]
        );

        // Send notification to the user
        $user->notify(new PrivilegeChangeNotification($oldPermissions, $user->only([
            'can_view_product',
            'can_create_product',
            'can_edit_product',
            'can_delete_product'
        ])));

        return back()->with('success', 'Privileges updated successfully');
    }
}