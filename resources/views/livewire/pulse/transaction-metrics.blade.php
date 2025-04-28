<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header name="Transaction & Point Metrics" details="last 7 days">
        <x-slot:icon>
            <x-pulse::icons.currency-dollar />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        <div class="grid grid-cols-3 gap-3 p-4">
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-sm font-semibold text-gray-700 dark:text-gray-300">Total Transactions</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $metrics['totalTransactions'] }}</div>
            </div>
            
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-sm font-semibold text-gray-700 dark:text-gray-300">Total Value</div>
                <div class="text-2xl font-bold text-green-600 dark:text-green-400">Rp {{ number_format($metrics['totalValue'], 0, ',', '.') }}</div>
            </div>
            
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-sm font-semibold text-gray-700 dark:text-gray-300">Avg Transaction Value</div>
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">Rp {{ number_format($metrics['avgTransactionValue'], 0, ',', '.') }}</div>
            </div>
        </div>
        
        <div class="px-4 pb-4">
            <div class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3">Daily Transactions</div>
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="space-y-3">
                    @foreach($metrics['dailyData'] as $day)
                        <div class="flex items-center justify-between">
                            <div class="text-gray-700 dark:text-gray-300">{{ $day['date'] }}</div>
                            <div class="flex space-x-4">
                                <div class="text-gray-700 dark:text-gray-300">
                                    <span class="font-bold text-blue-600 dark:text-blue-400">{{ $day['count'] }}</span> txn
                                </div>
                                <div class="font-bold text-green-600 dark:text-green-400">Rp {{ number_format($day['value'], 0, ',', '.') }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="px-4 pb-4">
            <div class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3">Point Distribution</div>
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="mb-4">
                    <div class="text-sm text-gray-700 dark:text-gray-300">Total Points in System</div>
                    <div class="text-2xl font-bold text-amber-600 dark:text-amber-400">{{ number_format($metrics['totalPoints'], 0, ',', '.') }}</div>
                </div>
                
                <div class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Top Locations by Points</div>
                <div class="space-y-2">
                    @foreach($metrics['topLocations'] as $location)
                        <div class="flex items-center justify-between">
                            <div class="text-gray-700 dark:text-gray-300">{{ $metrics['locationNames'][$location->lokasi_id] }}</div>
                            <div class="font-bold text-amber-600 dark:text-amber-400">{{ number_format($location->total_points, 0, ',', '.') }}</div>
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