<?php

namespace App\Services;

use App\Models\DatabaseConnection;
use App\Models\DatabaseInteraction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DatabaseMonitorService
{
    public function logConnection(string $connectionType = 'web', string $status = 'connected'): DatabaseConnection
    {
        return DatabaseConnection::create([
            'user_id' => Auth::id(),
            'ip_address' => request()->ip(),
            'connection_type' => $connectionType,
            'status' => $status,
            'device_info' => [
                'user_agent' => request()->userAgent(),
                'platform' => request()->header('sec-ch-ua-platform'),
                'mobile' => request()->header('sec-ch-ua-mobile')
            ]
        ]);
    }

    public function logInteraction(
        string $actionType,
        string $tableName,
        ?int $recordId = null,
        array $details = [],
        string $status = 'success'
    ): DatabaseInteraction {
        return DatabaseInteraction::create([
            'user_id' => Auth::id(),
            'action_type' => $actionType,
            'table_name' => $tableName,
            'record_id' => $recordId,
            'details' => $details,
            'status' => $status
        ]);
    }

    public function getRecentConnections(int $limit = 10)
    {
        return DatabaseConnection::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }

    public function getRecentInteractions(int $limit = 10)
    {
        return DatabaseInteraction::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }

    public function getDailyStats()
    {
        $today = now()->startOfDay();
        
        return [
            'connections' => DatabaseConnection::where('created_at', '>=', $today)->count(),
            'interactions' => DatabaseInteraction::where('created_at', '>=', $today)->count(),
            'failed_actions' => DatabaseInteraction::where('created_at', '>=', $today)
                ->where('status', '!=', 'success')
                ->count(),
            'active_users' => DatabaseConnection::where('created_at', '>=', $today)
                ->distinct('user_id')
                ->count('user_id')
        ];
    }
}