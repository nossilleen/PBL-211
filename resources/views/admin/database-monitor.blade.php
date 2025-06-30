@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Database Monitoring</h1>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">Total Connections</h3>
            <p class="text-3xl">{{ $stats['totalConnections'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">Total Interactions</h3>
            <p class="text-3xl">{{ $stats['totalInteractions'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">Today's Connections</h3>
            <p class="text-3xl">{{ $stats['todayConnections'] }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold mb-2">Today's Interactions</h3>
            <p class="text-3xl">{{ $stats['todayInteractions'] }}</p>
        </div>
    </div>

    <!-- Latest Activity -->
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">Latest Database Activity</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Time</th>
                        <th class="px-4 py-2">User</th>
                        <th class="px-4 py-2">Type</th>
                        <th class="px-4 py-2">Table</th>
                        <th class="px-4 py-2">Description</th>
                    </tr>
                </thead>
                <tbody id="activity-log">
                    @foreach($latestActivity as $activity)
                    <tr>
                        <td class="border px-4 py-2">{{ $activity->created_at->diffForHumans() }}</td>
                        <td class="border px-4 py-2">{{ $activity->user->name }}</td>
                        <td class="border px-4 py-2">{{ $activity->query_type }}</td>
                        <td class="border px-4 py-2">{{ $activity->table }}</td>
                        <td class="border px-4 py-2">{{ $activity->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function refreshActivity() {
        fetch('/admin/database-monitor/latest-activity')
            .then(response => response.json())
            .then(data => {
                const tbody = document.getElementById('activity-log');
                tbody.innerHTML = data.map(activity => `
                    <tr>
                        <td class="border px-4 py-2">${activity.created_at}</td>
                        <td class="border px-4 py-2">${activity.user.name}</td>
                        <td class="border px-4 py-2">${activity.query_type}</td>
                        <td class="border px-4 py-2">${activity.table}</td>
                        <td class="border px-4 py-2">${activity.description}</td>
                    </tr>
                `).join('');
            });
    }

    // Refresh activity every 30 seconds
    setInterval(refreshActivity, 30000);
</script>
@endpush
@endsection