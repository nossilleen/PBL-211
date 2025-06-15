@extends('pengelola.layout')

@section('title', 'Alamat - Pengelola EcoZense')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<style>
    /* Form Container */
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
    }

    /* Form Header */
    .form-header {
        margin-bottom: 2rem;
    }

    .form-header h1 {
        font-size: 1.875rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .form-header p {
        color: #6b7280;
        font-size: 1rem;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .form-group input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 0.875rem;
        transition: all 0.2s;
        background-color: #f9fafb;
    }

    .form-group input:focus {
        outline: none;
        border-color: #3cb371;
        box-shadow: 0 0 0 3px rgba(60, 179, 113, 0.1);
        background-color: #ffffff;
    }

    .form-group input::placeholder {
        color: #9ca3af;
    }

    /* Submit Button */
    .btn-submit {
        background-color: #3cb371;
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 0.5rem;
        transition: all 0.2s;
        border: none;
        cursor: pointer;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-submit:hover {
        background-color: #2e8b57;
        transform: translateY(-1px);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    /* Alert Styling */
    .alert {
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
    }

    .alert-success {
        background-color: #d1fae5;
        border: 1px solid #34d399;
        color: #065f46;
    }

    .alert-error {
        background-color: #fee2e2;
        border: 1px solid #f87171;
        color: #991b1b;
    }

    .alert ul {
        list-style-type: disc;
        margin-left: 1.5rem;
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 1.5rem;
    }

    @media (min-width: 768px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Map Container Styling */
    .map-container {
        position: relative;
        width: 100%;
        height: 0;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        margin: 1.5rem 0;
        border-radius: 0.5rem;
        overflow: hidden;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    #map {
        height: 400px;
        width: 100%;
        border-radius: 0.5rem;
        z-index: 1;
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .map-container {
            padding-bottom: 75%; /* 4:3 Aspect Ratio for mobile */
        }
    }
</style>
@endpush

@section('content')
    <div class="form-container">
        <div class="form-header">
            <h1>Lokasi Bank Sampah</h1>
            <p>Tambahkan lokasi bank sampah Anda</p>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error" role="alert">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('pengelola.alamat.update') }}" method="POST" class="bg-white rounded-lg shadow-lg p-6">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="nama_lokasi">Nama Lokasi</label>
                    <input type="text" id="nama_lokasi" name="nama_lokasi" value="{{ old('nama_lokasi', $lokasi->nama_lokasi ?? '') }}" placeholder="Masukkan nama lokasi bank sampah" />
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $lokasi->alamat ?? '') }}" placeholder="Masukkan alamat lengkap" />
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block font-semibold mb-2">Pilih Lokasi Anda di Map:</label>
                <div class="w-full rounded-lg overflow-hidden shadow-lg border border-green-200">
                    <div id="map"
                        style="height: 400px; min-width: 100%; border-radius: 0.5rem; box-shadow: 0 2px 8px rgba(34,197,94,0.08);"
                        class="transition-all duration-300"></div>
                </div>
                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $lokasi->latitude ?? '') }}">
                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $lokasi->longitude ?? '') }}">
                <p class="text-xs text-gray-500 mt-2">Geser marker atau klik pada peta untuk memilih lokasi Anda.</p>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="btn-submit">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Lokasi
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var lat = {{ old('latitude', $lokasi->latitude ?? 1.0896407) }};
    var lng = {{ old('longitude', $lokasi->longitude ?? 104.0349734) }};
    var map = L.map('map').setView([lat, lng], (lat && lng) ? 13 : 5);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap',
        minZoom: 2,
        maxZoom: 18,
    }).addTo(map);

    var marker = L.marker([lat, lng], {draggable:true}).addTo(map);

    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        document.getElementById('latitude').value = position.lat;
        document.getElementById('longitude').value = position.lng;
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
    });

    // Responsive fix: invalidate size after tab/modal shown
    setTimeout(function() {
        map.invalidateSize();
    }, 300);
</script>
@endpush