@extends('admin.layout')

@section('title', 'Artikel & Event - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Artikel & Event</h1>
        <p class="text-gray-600 mt-1">Kelola konten artikel dan acara EcoZense</p>
    </div>

    <!-- Artikel Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Artikel</h2>
            <a href="{{ route('artikel.create') }}" class="mt-4 md:mt-0 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Artikel Baru
            </a>
        </div>
        
        <div class="mb-6">
            <div class="relative">
                <form method="GET" action="{{ route('admin.artikel.index') }}" class="flex items-center">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Cari artikel..." 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        oninput="toggleSearchButton(this)"
                    >
                    <div class="absolute left-3 top-2.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <button 
                        type="submit" 
                        id="searchButton" 
                        class="ml-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors hidden"
                    >
                        Cari
                    </button>
                </form>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi Singkat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Likes</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
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
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ ucfirst($artikel->kategori) }}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">-</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $artikel->user ? $artikel->user->nama : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $artikel->tanggal_publikasi ? $artikel->tanggal_publikasi->format('d/m/Y') : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('artikel.edit', $artikel->artikel_id) }}" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">Ubah</a>
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
        </div>
        <div class="mt-8 flex justify-center">
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
    </div>
    
    <!-- Event Section -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Event</h2>
            <a href="#" class="mt-4 md:mt-0 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Event Baru
            </a>
        </div>
        
        <div class="mb-6">
            <div class="relative">
                <input type="text" placeholder="Cari event..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Banner</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Link Form</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Workshop Eco Enzim</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ asset('images/event.jpg') }}" alt="Event" class="h-8 w-8 object-cover rounded">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">Workshop pembuatan eco enzim dari limbah dapur...</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Kalimantan</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="docs.google.com/form" class="text-blue-600 hover:text-blue-900 text-sm">docs.google.com/form</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15/05/2023</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="#" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">
                                    Edit
                                </a>
                                <a href="#" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="mt-6 flex justify-between items-center">
            <div class="text-sm text-gray-700">
                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">5</span> dari <span class="font-medium">5</span> hasil
            </div>
            <div class="flex space-x-2">
                <button class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 px-4 py-2 text-sm rounded-md" disabled>
                    Previous
                </button>
                <button class="bg-green-500 border border-green-500 text-white hover:bg-green-600 px-4 py-2 text-sm rounded-md">
                    Next
                </button>
            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Hapus Artikel --}}
    <div id="modalHapusArtikel" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
            <h2 class="text-2xl font-bold mb-4 text-red-600">Konfirmasi Hapus</h2>
            <p class="mb-6">Yakin ingin menghapus artikel ini?</p>
            <div class="flex justify-center space-x-4">
                <button onclick="hideDeleteModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition-colors">Batal</button>
                <form id="formHapus" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition-colors">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>

    @if(session('success') || session('success_edit'))
    <div id="successModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
            <h2 class="text-2xl font-bold mb-4 text-green-600">Berhasil!</h2>
            <p class="mb-6">
                {{ session('success') ?? session('success_edit') }}
            </p>
            <button onclick="document.getElementById('successModal').classList.add('hidden')" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>
@endif
@endsection

@push('scripts')
<script>
    function showDeleteModal(artikelId) {
        const modal = document.getElementById('modalHapusArtikel');
        const form = document.getElementById('formHapus');
        form.action = `/admin/artikel/${artikelId}`;
        modal.classList.remove('hidden');
    }

    function hideDeleteModal() {
        const modal = document.getElementById('modalHapusArtikel');
        modal.classList.add('hidden');
    }

    function toggleSearchButton(input) {
        const button = document.getElementById('searchButton');
        button.classList.toggle('hidden', !input.value.trim());
    }
</script>
@endpush