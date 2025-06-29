@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Database Activity Monitor</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500 text-sm">Today's Connections</h3>
            <p class="text-2xl font-bold" id="connections-count">0</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500 text-sm">Database Interactions</h3>
            <p class="text-2xl font-bold" id="interactions-count">0</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500 text-sm">Failed Actions</h3>
            <p class="text-2xl font-bold" id="failed-count">0</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-gray-500 text-sm">Active Users</h3>
            <p class="text-2xl font-bold" id="active-users-count">0</p>
        </div>
    </div>

    <!-- Activity Log -->
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h2 class="text-xl font-semibold mb-4">Real-time Activity Log</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Table</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                        </tr>
                    </thead>
                    <tbody id="activity-log">
                        @foreach($recentActivity as $activity)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $activity->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $activity->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $activity->action_type }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $activity->table_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $activity->status === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $activity->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm">{{ $activity->details }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let lastActivityId = 0;

function updateStats() {
    fetch('/admin/database-monitor/stats')
        .then(response => response.json())
        .then(data => {
            document.getElementById('connections-count').textContent = data.connections;
            document.getElementById('interactions-count').textContent = data.interactions;
            document.getElementById('failed-count').textContent = data.failed_actions;
            document.getElementById('active-users-count').textContent = data.active_users;
        });
}

function fetchLatestActivity() {
    fetch(`/admin/database-monitor/latest-activity?last_id=${lastActivityId}`)
        .then(response => response.json())
        .then(data => {
            if (data.activities.length > 0) {
                const tbody = document.getElementById('activity-log');
                
                data.activities.forEach(activity => {
                    const tr = document.createElement('tr');
                    tr.className = 'border-b';
                    tr.innerHTML = `
                        <td class="px-6 py-4 whitespace-nowrap text-sm">${activity.created_at}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">${activity.user.name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">${activity.action_type}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">${activity.table_name}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                ${activity.status === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                ${activity.status}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">${activity.details}</td>
                    `;
                    tbody.insertBefore(tr, tbody.firstChild);
                });
                
                lastActivityId = data.last_id;
            }
        });
}

// Update stats every 30 seconds
setInterval(updateStats, 30000);

// Check for new activity every 5 seconds
setInterval(fetchLatestActivity, 5000);

// Initial load
updateStats();
fetchLatestActivity();
</script>
@endpush
@endsection