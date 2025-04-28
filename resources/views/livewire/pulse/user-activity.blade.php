<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header name="User Activity" details="last 7 days">
        <x-slot:icon>
            <x-pulse::icons.users />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        <div class="grid grid-cols-2 gap-3 p-4">
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-xl font-bold text-gray-700 dark:text-gray-300">Total Users</div>
                <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $metrics['totalUsers'] }}</div>
            </div>
            
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-xl font-bold text-gray-700 dark:text-gray-300">New Registrations</div>
                <div class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $metrics['registrationCount'] }}</div>
            </div>
            
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-xl font-bold text-gray-700 dark:text-gray-300">User Logins</div>
                <div class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $metrics['loginCount'] }}</div>
            </div>
            
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-xl font-bold text-gray-700 dark:text-gray-300">User Logouts</div>
                <div class="text-3xl font-bold text-amber-600 dark:text-amber-400">{{ $metrics['logoutCount'] }}</div>
            </div>
        </div>
        
        <div class="px-4 pb-4">
            <div class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3">Users by Role</div>
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="space-y-2">
                    @foreach($metrics['usersByRole'] as $role => $count)
                        <div class="flex items-center justify-between">
                            <div class="capitalize text-gray-700 dark:text-gray-300">{{ $role }}</div>
                            <div class="font-bold text-gray-900 dark:text-gray-100">{{ $count }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="px-4 pb-4 text-xs text-gray-500 dark:text-gray-400">
            Last updated: {{ $metrics['lastUpdated'] }}
        </div>
    </x-pulse::scroll>
</x-pulse::card> 