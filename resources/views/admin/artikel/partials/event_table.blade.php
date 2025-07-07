<table class="min-w-full table-fixed">
    <thead class="bg-gray-50">
        <tr>
            @php
                $eventOrderBy = request('event_order_by');
                $eventDir = request('event_direction', 'asc');
                $sortLinkEvent = function($label, $column) use ($eventOrderBy, $eventDir) {
                    $dir = ($eventOrderBy === $column && $eventDir === 'asc') ? 'desc' : 'asc';
                    $icon = '';
                    if ($eventOrderBy === $column) {
                        $icon = $eventDir === 'asc' ? '▲' : '▼';
                    }
                    $params = array_merge(request()->all(), ['event_order_by' => $column, 'event_direction' => $dir]);
                    return '<a href="'.route('admin.artikel.index', $params).'" class="flex items-center space-x-1">'.$label.' <span>'.$icon.'</span></a>';
                }
            @endphp
            <th class="px-6 py-3 w-1/4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLinkEvent('Judul', 'title') !!}</th>
            <th class="px-6 py-3 w-1/3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLinkEvent('Deskripsi', 'description') !!}</th>
            <th class="px-6 py-3 w-1/12 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLinkEvent('Tanggal', 'date') !!}</th>
            <th class="px-6 py-3 w-1/12 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLinkEvent('Lokasi', 'location') !!}</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($events as $event)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-semibold text-gray-900 truncate max-w-[180px]" title="{{ $event->title }}">
                    {{ Str::limit($event->title, 30) }}
                </div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-500 truncate max-w-[220px]">{!! Str::limit(strip_tags($event->description), 40) !!}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d/m/Y') : '-' }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                {{ Str::limit($event->location, 15) }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                    <a href="{{ route('admin.events.edit', $event) }}" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">Ubah</a>
                    <a href="{{ route('events.show', $event->id) }}" target="_blank" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded transition-colors">Lihat</a>
                    <button onclick="showDeleteEventModal({{ $event->id }})" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">Hapus</button>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="px-6 py-4 text-center text-gray-400">Belum ada acara.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4 flex justify-center event-pagination">
    <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
        {{-- Previous Page Link --}}
        @if ($events->onFirstPage())
            <li>
                <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
            </li>
        @else
            <li>
                <a href="{{ $events->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
            @if ($page == $events->currentPage())
                <li>
                    <span class="px-4 py-1.5 h-9 flex items-center font-bold text-white bg-green-600 border-r border-gray-300">{{ $page }}</span>
                </li>
            @else
                <li>
                    <a href="{{ $url }}" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($events->hasMorePages())
            <li>
                <a href="{{ $events->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
            </li>
        @else
            <li>
                <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
            </li>
        @endif
    </ul>
</div> 