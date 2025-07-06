<table class="min-w-full table-fixed">
    <thead class="bg-gray-50">
        <tr>
            @php
                $articleOrderBy = request('order_by');
                $articleDir = request('direction', 'asc');
                $sortLink = function($label, $column) use ($articleOrderBy, $articleDir) {
                    $dir = ($articleOrderBy === $column && $articleDir === 'asc') ? 'desc' : 'asc';
                    $icon = '';
                    if ($articleOrderBy === $column) {
                        $icon = $articleDir === 'asc' ? '▲' : '▼';
                    }
                    $params = array_merge(request()->all(), ['order_by' => $column, 'direction' => $dir]);
                    return '<a href="'.route('admin.artikel.index', $params).'" class="flex items-center space-x-1">'.$label.' <span>'.$icon.'</span></a>';
                }
            @endphp
            <th class="px-6 py-3 w-1/4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLink('Judul', 'judul') !!}</th>
            <th class="px-6 py-3 w-1/3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLink('Deskripsi Singkat', 'konten') !!}</th>
            <th class="px-6 py-3 w-1/12 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLink('Kategori', 'kategori') !!}</th>
            <th class="px-6 py-3 w-1/12 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLink('Likes', 'likes') !!}</th>
            <th class="px-6 py-3 w-1/6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLink('Penulis', 'penulis') !!}</th>
            <th class="px-6 py-3 w-1/12 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{!! $sortLink('Tanggal', 'tanggal_publikasi') !!}</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse($artikels as $artikel)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm font-semibold text-gray-900 truncate max-w-[180px]" title="{{ $artikel->judul }}">
                    {{ Str::limit($artikel->judul, 30) }}
                </div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-gray-500 truncate max-w-[220px]">{!! Str::limit(strip_tags($artikel->konten), 40) !!}</div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <span class="text-sm text-gray-900">{{ ucfirst($artikel->kategori) }}</span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                {{ $artikel->likes ? $artikel->likes->count() : 0 }}
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $artikel->user ? $artikel->user->nama : '-' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $artikel->tanggal_publikasi ? $artikel->tanggal_publikasi->format('d/m/Y') : '-' }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                    <a href="{{ route('admin.artikel.edit', $artikel->artikel_id) }}" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">Ubah</a>
                    <a href="{{ route('artikel.show', $artikel->artikel_id) }}" target="_blank" class="bg-blue-100 hover:bg-blue-200 text-blue-700 px-3 py-1 rounded transition-colors">Lihat</a>
                    <button onclick="showDeleteModal({{ $artikel->artikel_id }})" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">Hapus</button>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="px-6 py-4 text-center text-gray-400">Belum ada artikel.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-8 flex justify-center artikel-pagination">
    <ul class="flex border border-gray-300 rounded-md overflow-hidden bg-white text-sm">
        {{-- Previous Page Link --}}
        @if ($artikels->onFirstPage())
            <li>
                <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white border-r border-gray-300 cursor-not-allowed select-none">Sebelumnya</span>
            </li>
        @else
            <li>
                <a href="{{ $artikels->previousPageUrl() }}" rel="prev" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white border-r border-gray-300 hover:bg-gray-100 transition">Sebelumnya</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($artikels->getUrlRange(1, $artikels->lastPage()) as $page => $url)
            @if ($page == $artikels->currentPage())
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
        @if ($artikels->hasMorePages())
            <li>
                <a href="{{ $artikels->nextPageUrl() }}" rel="next" class="px-4 py-1.5 h-9 flex items-center text-gray-700 bg-white hover:bg-gray-100 transition">Selanjutnya</a>
            </li>
        @else
            <li>
                <span class="px-4 py-1.5 h-9 flex items-center text-gray-500 bg-white cursor-not-allowed select-none">Selanjutnya</span>
            </li>
        @endif
    </ul>
</div> 