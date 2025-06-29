<?php

namespace App\Http\Controllers;

use App\Models\DatabaseConnection;
use App\Models\DatabaseInteraction;
use App\Services\DatabaseMonitorService;
use Illuminate\Http\Request;

class DatabaseMonitorController extends Controller
{
    protected $monitorService;

    public function __construct(DatabaseMonitorService $monitorService)
    {
        $this->monitorService = $monitorService;
    }

    public function index()
    {
        return view('admin.database-monitor', [
            'stats' => $this->getStats(),
            'latestActivity' => $this->getLatestActivity()
        ]);
    }

    public function getStats()
    {
        return [
            'totalConnections' => DatabaseConnection::count(),
            'totalInteractions' => DatabaseInteraction::count(),
            'todayConnections' => DatabaseConnection::whereDate('created_at', today())->count(),
            'todayInteractions' => DatabaseInteraction::whereDate('created_at', today())->count(),
        ];
    }

    public function getLatestActivity()
    {
        return DatabaseInteraction::with('user')
            ->latest()
            ->take(10)
            ->get();
    }

    public function logConnection(Request $request)
    {
        $this->monitorService->logConnection(
            $request->input('connection_type'),
            $request->input('status')
        );

        return response()->json(['success' => true]);
    }

    public function logInteraction(Request $request)
    {
        $this->monitorService->logInteraction(
            $request->input('query_type'),
            $request->input('table'),
            $request->input('description')
        );

        return response()->json(['success' => true]);
    }
}