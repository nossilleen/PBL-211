@extends('admin.layout')

@section('title', 'Artikel & Event - EcoZense')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Artikel</h2>
        <a href="{{ route('admin.artikel.create') }}" class="mt-4 md:mt-0 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Buat Artikel Baru
        </a>
    </div>

    <!-- Artikel Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <div class="mb-6">
            <div class="relative">
                <form method="GET" action="{{ route('admin.artikel.index') }}" class="flex items-center">
                    <input 
                        type="text" 
                        name="search" 
                        value="{{ request('search') }}" 
                        placeholder="Cari artikel..." 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        id="searchInput"
                        oninput="toggleSearchButton()"
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
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
{{ $artikel->likes ? $artikel->likes->count() : 0 }}
</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $artikel->user ? $artikel->user->nama : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $artikel->tanggal_publikasi ? $artikel->tanggal_publikasi->format('d/m/Y') : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.artikel.edit', $artikel->artikel_id) }}" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">Ubah</a>
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
    <div class="bg-white rounded-lg shadow-sm p-6 mt-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Acara</h2>
            <button onclick="openEventModal()" class="mt-4 md:mt-0 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Acara Baru
            </button>
        </div>
        
        <!-- Search dan Sort untuk Events -->
        <div class="mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <form method="GET" action="{{ route('admin.artikel.index') }}" class="flex items-center">
                            <input 
                                type="text" 
                                name="event_search" 
                                value="{{ request('event_search') }}" 
                                placeholder="Cari acara..." 
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                id="eventSearchInput"
                                oninput="toggleEventSearchButton()"
                            >
                            <div class="absolute left-3 top-2.5 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <button 
                                type="submit" 
                                id="eventSearchButton" 
                                class="ml-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors hidden"
                            >
                                Cari
                            </button>
                            <!-- Preserve other query parameters -->
                            @if(request('search'))
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            @endif
                            @if(request('sort'))
                                <input type="hidden" name="sort" value="{{ request('sort') }}">
                            @endif
                            @if(request('event_sort'))
                                <input type="hidden" name="event_sort" value="{{ request('event_sort') }}">
                            @endif
                        </form>
                    </div>
                </div>
                <div class="md:w-48">
                    <form method="GET" action="{{ route('admin.artikel.index') }}" id="eventSortForm">
                        <select name="event_sort" onchange="this.form.submit()" class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option value="terbaru" {{ request('event_sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                            <option value="terlama" {{ request('event_sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                        </select>
                        <!-- Preserve other query parameters -->
                        @if(request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        @if(request('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif
                        @if(request('event_search'))
                            <input type="hidden" name="event_search" value="{{ request('event_search') }}">
                        @endif
                    </form>
                </div>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($events as $event)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $event->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-500">{{ Str::limit($event->description, 80) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d/m/Y H:i') : '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $event->location }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-3 py-1 rounded transition-colors">Ubah</a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-1 rounded transition-colors">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada event</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination untuk Events -->
        <div class="mt-8 flex justify-center">
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
    </div>

    <!-- Event Modal -->
    <div id="eventModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Buat Event Baru</h3>
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="title" id="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" rows="3" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Tanggal & Waktu</label>
                        <input type="datetime-local" name="date" id="date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                        <input type="text" name="location" id="location" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700">Banner Event</label>
                        <input type="file" name="image" id="event-image" accept="image/*" required class="mt-1 block w-full">
                        <div id="event-cropper-container" class="mt-4" style="display:none;">
                            <img id="event-cropper-image" style="max-width:100%; max-height:200px;">
                            <button type="button" id="event-crop-btn" class="mt-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Crop Gambar</button>
                        </div>
                        <input type="hidden" name="cropped_gambar" id="event-cropped-gambar">
                        <div id="event-cropped-preview" class="mt-2"></div>
                    </div>
                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeEventModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg transition-colors">Batal</button>
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors">Simpan</button>
                    </div>
                </form>
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
</div>
@endsection

@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
    function showDeleteModal(artikelId) {
        const modal = document.getElementById('modalHapusArtikel');
        const form = document.getElementById('formHapus');
        form.action = `/admin/artikel/${artikelId}`;
        modal.classList.remove('hidden');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
    }

    function toggleSearchButton() {
        const input = document.getElementById('searchInput');
        const button = document.getElementById('searchButton');
        button.classList.toggle('hidden', !input.value.trim());
    }

    function toggleEventSearchButton() {
        const input = document.getElementById('eventSearchInput');
        const button = document.getElementById('eventSearchButton');
        button.classList.toggle('hidden', !input.value.trim());
    }

    function openEventModal() {
        document.getElementById('eventModal').classList.remove('hidden');
    }

    function closeEventModal() {
        document.getElementById('eventModal').classList.add('hidden');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('eventModal');
        if (event.target == modal) {
            closeEventModal();
        }
    }

    let eventCropper;
    const eventInput = document.getElementById('event-image');
    const eventCropperContainer = document.getElementById('event-cropper-container');
    const eventCropperImage = document.getElementById('event-cropper-image');
    const eventCropBtn = document.getElementById('event-crop-btn');
    const eventCroppedInput = document.getElementById('event-cropped-gambar');
    const eventCroppedPreview = document.getElementById('event-cropped-preview');

    if(eventInput) {
        eventInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    eventCropperImage.src = event.target.result;
                    eventCropperContainer.style.display = 'block';
                    if (eventCropper) eventCropper.destroy();
                    eventCropper = new Cropper(eventCropperImage, {
                        aspectRatio: 16 / 9,
                        viewMode: 1,
                        autoCropArea: 1,
                    });
                };
                reader.readAsDataURL(file);
            }
        });

        eventCropBtn.addEventListener('click', function() {
            if (eventCropper) {
                const canvas = eventCropper.getCroppedCanvas({
                    width: 1280,
                    height: 720
                });
                canvas.toBlob(function(blob) {
                    const reader = new FileReader();
                    reader.onloadend = function() {
                        eventCroppedInput.value = reader.result;
                        eventCroppedPreview.innerHTML = '<img src="' + reader.result + '" class="mt-2 rounded shadow" style="max-width:100%;">';
                        eventInput.removeAttribute('required');
                    };
                    reader.readAsDataURL(blob);
                }, 'image/jpeg');
            }
        });
        // Saat submit, jika ada cropped_gambar, hapus input file asli agar hanya cropped yang dikirim
        const eventForm = eventInput.closest('form');
        eventForm.addEventListener('submit', function(e) {
            if (eventCroppedInput.value) {
                eventInput.removeAttribute('name');
            }
        });
    }
</script>
@endpush
