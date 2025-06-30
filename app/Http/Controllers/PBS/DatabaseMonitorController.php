<?php

namespace App\Http\Controllers\PBS;

use App\Http\Controllers\Controller;
use App\Models\DatabaseConnection;
use App\Models\DatabaseInteraction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseMonitorController extends Controller
{
    public function index()
    {
        $recentActivity = DatabaseInteraction::with('user')
            ->orderBy('created_at', 'desc')
            ->take(50)
            ->get();

        return view('admin.real-time-activity', compact('recentActivity'));
    }

    public function getStats()
    {
        $today = Carbon::today();
        
        $stats = [
            'connections' => DatabaseConnection::whereDate('created_at', $today)->count(),
            'interactions' => DatabaseInteraction::whereDate('created_at', $today)->count(),
            'failed_actions' => DatabaseInteraction::whereDate('created_at', $today)
                ->where('status', 'failed')
                ->count(),
            'active_users' => DatabaseConnection::whereDate('created_at', $today)
                ->distinct('user_id')
                ->count(),
        ];

        return response()->json($stats);
    }

    public function getLatestActivity(Request $request)
    {
        $lastId = $request->input('last_id', 0);
        
        $activities = DatabaseInteraction::with('user')
            ->where('id', '>', $lastId)
            ->orderBy('id', 'desc')
            ->take(20)
            ->get();

        return response()->json([
            'activities' => $activities,
            'last_id' => $activities->max('id') ?? $lastId
        ]);
    }

    public function logConnection(Request $request)
    {
        $connection = DatabaseConnection::create([
            'user_id' => auth()->id(),
            'connection_type' => $request->input('connection_type'),
            'status' => $request->input('status', 'success'),
            'details' => $request->input('details'),
        ]);

        return response()->json(['success' => true, 'connection' => $connection]);
    }

    public function logInteraction(Request $request)
    {
        $interaction = DatabaseInteraction::create([
            'user_id' => auth()->id(),
            'action_type' => $request->input('action_type'),
            'table_name' => $request->input('table_name'),
            'record_id' => $request->input('record_id'),
            'status' => $request->input('status', 'success'),
            'details' => $request->input('details'),
        ]);

        return response()->json(['success' => true, 'interaction' => $interaction]);
    }
}