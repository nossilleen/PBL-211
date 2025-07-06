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
            <div class="artikel-table-container">
                @include('admin.artikel.partials.artikel_table')
            </div>
        </div>
    </div>
    
    <!-- Event Section -->
    <div class="bg-white rounded-lg shadow-sm p-4 mt-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Acara</h2>
            <button onclick="openEventModal()" class="mt-4 md:mt-0 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Buat Acara Baru
            </button>
        </div>
        
        <!-- Search untuk Events -->
        <div class="mb-4">
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
                </form>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <div class="event-table-container">
                @include('admin.artikel.partials.event_table')
            </div>
        </div>
    </div>

    <!-- Event Modal -->
    <div id="eventModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3">
                <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Buat Acara Baru</h3>
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
                        <label for="link_form_acara" class="block text-sm font-medium text-gray-700">Link Form Acara</label>
                        <input type="text" name="link_form_acara" id="link_form_acara" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
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

    {{-- Modal Konfirmasi Hapus Event --}}
    <div id="modalHapusEvent" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-40 hidden">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
            <h2 class="text-2xl font-bold mb-4 text-red-600">Konfirmasi Hapus</h2>
            <p class="mb-6">Yakin ingin menghapus acara ini?</p>
            <div class="flex justify-center space-x-4">
                <button onclick="hideDeleteEventModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition-colors">Batal</button>
                <form id="formHapusEvent" method="POST" class="inline">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showDeleteModal(artikelId) {
        const modal = document.getElementById('modalHapusArtikel');
        const form = document.getElementById('formHapus');
        form.action = `/admin/artikel/${artikelId}`;
        modal.classList.remove('hidden');
    }

    function showDeleteEventModal(eventId) {
        const modal = document.getElementById('modalHapusEvent');
        const form = document.getElementById('formHapusEvent');
        form.action = `/admin/events/${eventId}`;
        modal.classList.remove('hidden');
    }

    function hideDeleteModal() {
        document.getElementById('modalHapusArtikel').classList.add('hidden');
    }

    function hideDeleteEventModal() {
        document.getElementById('modalHapusEvent').classList.add('hidden');
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

    // AJAX Pagination untuk Artikel
    $(document).ready(function() {
        $(document).on('click', '.artikel-pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getArtikels(page);
        });
    });

    function getArtikels(page) {
        $.ajax({
            url: '?page=' + page,
            type: "get",
            datatype: "html",
            beforeSend: function() {
                // Tampilkan loading jika diperlukan
                $('.artikel-table-container').css('opacity', '0.6');
            }
        }).done(function(data) {
            // Update konten tabel artikel
            $('.artikel-table-container').html(data);
            $('.artikel-table-container').css('opacity', '1');
            
            // Update URL tanpa reload halaman, pertahankan parameter lain
            var url = new URL(window.location);
            url.searchParams.set('page', page);
            window.history.pushState({}, '', url);
        }).fail(function() {
            alert('Artikel tidak dapat dimuat.');
        });
    }

    // AJAX Pagination untuk Events
    $(document).ready(function() {
        $(document).on('click', '.event-pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getEvents(page);
        });
    });

    function getEvents(page) {
        $.ajax({
            url: '?event_page=' + page,
            type: "get",
            datatype: "html",
            beforeSend: function() {
                // Tampilkan loading jika diperlukan
                $('.event-table-container').css('opacity', '0.6');
            }
        }).done(function(data) {
            // Update konten tabel event
            $('.event-table-container').html(data);
            $('.event-table-container').css('opacity', '1');
            
            // Update URL tanpa reload halaman, pertahankan parameter lain
            var url = new URL(window.location);
            url.searchParams.set('event_page', page);
            window.history.pushState({}, '', url);
        }).fail(function() {
            alert('Acara tidak dapat dimuat.');
        });
    }
</script>
@endpush
