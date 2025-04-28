<x-pulse::card :cols="$cols" :rows="$rows" :class="$class">
    <x-pulse::card-header name="Content Metrics" details="articles and feedback">
        <x-slot:icon>
            <x-pulse::icons.document-text />
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        <div class="grid grid-cols-3 gap-3 p-4">
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-sm font-semibold text-gray-700 dark:text-gray-300">Total Articles</div>
                <div class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $metrics['totalArtikels'] }}</div>
            </div>
            
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-sm font-semibold text-gray-700 dark:text-gray-300">Recent Articles</div>
                <div class="text-2xl font-bold text-green-600 dark:text-green-400">{{ $metrics['recentArtikels'] }}</div>
                <div class="text-xs text-gray-500 dark:text-gray-400">Last 30 days</div>
            </div>
            
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="text-sm font-semibold text-gray-700 dark:text-gray-300">Total Feedback</div>
                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">{{ $metrics['totalFeedback'] }}</div>
            </div>
        </div>
        
        <div class="px-4 pb-4">
            <div class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3">Articles by Category</div>
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="space-y-2">
                    @foreach($metrics['artikelsByCategory'] as $category => $count)
                        <div class="flex items-center justify-between">
                            <div class="capitalize text-gray-700 dark:text-gray-300">{{ $category }}</div>
                            <div class="font-bold text-gray-900 dark:text-gray-100">{{ $count }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="px-4 pb-4">
            <div class="text-lg font-bold text-gray-700 dark:text-gray-300 mb-3">Most Popular Articles</div>
            <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4">
                <div class="space-y-3">
                    @if(count($metrics['popularArticles']) > 0)
                        @foreach($metrics['popularArticles'] as $article)
                            <div class="flex items-center justify-between">
                                <div class="text-gray-700 dark:text-gray-300 truncate max-w-[70%]">{{ $metrics['articleTitles'][$article->artikel_id] }}</div>
                                <div class="font-bold text-blue-600 dark:text-blue-400">{{ $article->feedback_count }} feedback</div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-gray-500 dark:text-gray-400 text-center py-2">No feedback data available</div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="px-4 pb-4 text-xs text-gray-500 dark:text-gray-400">
            Last updated: {{ $metrics['lastUpdated'] }}
        </div>
    </x-pulse::scroll>
</x-pulse::card> 