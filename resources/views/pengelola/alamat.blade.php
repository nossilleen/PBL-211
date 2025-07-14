@extends('pengelola.layout')

@section('title', 'Alamat - Pengelola EcoZense')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
<style>
    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    /* Global Styles */
    * {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* Main Container */
    .main-container {
        min-height: 100vh;
        position: relative;
    }

    /* Form Container */
    .form-container {
        max-width: 1000px;
        margin: 2rem auto;
        padding: 2rem;
        position: relative;
        z-index: 1;
    }

    /* Header Card */
    .header-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 24px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 
            0 20px 25px -5px rgba(0, 0, 0, 0.1),
            0 10px 10px -5px rgba(0, 0, 0, 0.04);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .header-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #90D65C, #3ED260, #2DD161);
        border-radius: 24px 24px 0 0;
    }

    .header-card h1 {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #1f2937 0%, #3ED260 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.75rem;
        line-height: 1.2;
    }

    .header-card p {
        color: #6b7280;
        font-size: 1.125rem;
        font-weight: 400;
        margin: 0;
    }

    /* Main Form Card */
    .form-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 
            0 20px 25px -5px rgba(0, 0, 0, 0.1),
            0 10px 10px -5px rgba(0, 0, 0, 0.04);
        position: relative;
        overflow: hidden;
    }

    /* Alert Styling */
    .alert {
        padding: 1.25rem 1.5rem;
        border-radius: 16px;
        margin-bottom: 2rem;
        display: flex;
        align-items: flex-start;
        font-weight: 500;
        position: relative;
        overflow: hidden;
    }

    .alert::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
    }

    .alert-success {
        background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
        border: 1px solid #a7f3d0;
        color: #065f46;
    }

    .alert-success::before {
        background: #3ED260;
    }

    .alert-error {
        background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
        border: 1px solid #fca5a5;
        color: #991b1b;
    }

    .alert-error::before {
        background: #ef4444;
    }

    .alert svg {
        margin-right: 0.75rem;
        margin-top: 0.125rem;
        flex-shrink: 0;
    }

    .alert ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .alert li {
        margin-bottom: 0.5rem;
        position: relative;
        padding-left: 1.5rem;
    }

    .alert li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: currentColor;
        font-weight: 600;
    }

    /* Form Grid */
    .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2rem;
        margin-bottom: 2.5rem;
    }

    @media (min-width: 768px) {
        .form-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Form Groups */
    .form-group {
        position: relative;
    }

    .form-group label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.75rem;
        font-size: 0.95rem;
        letter-spacing: 0.025em;
    }

    .form-group input {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid #e5e7eb;
        border-radius: 16px;
        font-size: 0.95rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        position: relative;
        z-index: 1;
    }

    .form-group input:focus {
        outline: none;
        border-color: #3ED260;
        box-shadow: 
            0 0 0 4px rgba(62, 210, 96, 0.1),
            0 4px 12px rgba(62, 210, 96, 0.15);
        background: #ffffff;
        transform: translateY(-2px);
    }

    .form-group input::placeholder {
        color: #9ca3af;
        font-weight: 400;
    }

    /* Map Section */
    .map-section {
        margin-bottom: 2.5rem;
    }

    .map-section label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 1rem;
        font-size: 1.1rem;
        letter-spacing: 0.025em;
    }

    .map-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 
            0 20px 25px -5px rgba(0, 0, 0, 0.1),
            0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border: 3px solid rgba(62, 210, 96, 0.1);
        transition: all 0.3s ease;
    }

    .map-wrapper:hover {
        box-shadow: 
            0 25px 50px -12px rgba(0, 0, 0, 0.15),
            0 0 0 1px rgba(62, 210, 96, 0.1);
        transform: translateY(-2px);
    }

    #map {
        height: 450px;
        width: 100%;
        z-index: 1;
        position: relative;
    }

    /* Responsive map height */
    @media (max-width: 768px) {
        #map {
            height: 350px;
        }
    }
    
    @media (min-width: 1200px) {
        #map {
            height: 500px;
        }
    }

    .map-hint {
        margin-top: 1rem;
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
        border: 1px solid #90D65C;
        border-radius: 12px;
        color: #166534;
        font-size: 0.9rem;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .map-hint svg {
        margin-right: 0.75rem;
        flex-shrink: 0;
    }
    
    /* Map Controls */
    .map-controls {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
        margin-top: 1rem;
    }
    
    .map-btn {
        padding: 0.75rem 1.25rem;
        background: #f9fafb;
        color: #374151;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        transition: all 0.2s;
    }
    
    .map-btn:hover {
        background: #f3f4f6;
        border-color: #d1d5db;
    }
    
    .map-btn svg, .map-btn i {
        margin-right: 0.5rem;
    }
    
    .map-btn.active {
        background: #3ED260;
        color: white;
        border-color: #3ED260;
    }

    /* Submit Button */
    .btn-submit {
        background: linear-gradient(135deg, #3ED260 0%, #2DD161 100%);
        color: white;
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 16px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        cursor: pointer;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        letter-spacing: 0.025em;
        box-shadow: 
            0 4px 14px 0 rgba(62, 210, 96, 0.4),
            0 2px 4px 0 rgba(0, 0, 0, 0.05);
        position: relative;
        overflow: hidden;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    .btn-submit:hover {
        background: linear-gradient(135deg, #2DD161 0%, #90D65C 100%);
        transform: translateY(-2px);
        box-shadow: 
            0 8px 25px 0 rgba(62, 210, 96, 0.5),
            0 4px 12px 0 rgba(0, 0, 0, 0.1);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .btn-submit svg {
        margin-right: 0.75rem;
    }

    /* Button Container */
    .button-container {
        display: flex;
        justify-content: flex-end;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container {
            padding: 1rem;
            margin: 1rem auto;
        }

        .header-card {
            padding: 2rem;
        }

        .header-card h1 {
            font-size: 2rem;
        }

        .form-card {
            padding: 2rem;
        }

        .button-container {
            justify-content: center;
        }

        .btn-submit {
            width: 100%;
            justify-content: center;
        }
        
        .map-controls {
            flex-direction: column;
        }
        
        .map-btn {
            width: 100%;
            justify-content: center;
        }
    }

    /* Animation Classes */
    .fade-in {
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Loading States */
    .form-group input:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .btn-submit:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    /* Focus visible for accessibility */
    .btn-submit:focus-visible {
        outline: 2px solid #3ED260;
        outline-offset: 2px;
    }

    input:focus-visible {
        outline: 2px solid #3ED260;
        outline-offset: 2px;
    }
    
    /* Loading spinner */
    .loading-spinner {
        display: inline-block;
        width: 1.5rem;
        height: 1.5rem;
        vertical-align: text-bottom;
        border: 0.2em solid currentColor;
        border-right-color: transparent;
        border-radius: 50%;
        animation: spinner-border .75s linear infinite;
    }
    
    @keyframes spinner-border {
        to { transform: rotate(360deg); }
    }
    
    /* Leaflet Geocoder styles */
    .leaflet-control-geocoder {
        border-radius: 12px !important;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important;
    }
    
    .leaflet-control-geocoder-form input {
        border-radius: 8px !important;
        padding: 8px 12px !important;
        font-size: 14px !important;
        border: 1px solid #e5e7eb !important;
    }
</style>
@endpush

@section('content')
    <div class="main-container">
        <div class="form-container">
            <!-- Header Card -->
            <div class="header-card fade-in">
                <h1>📍 Lokasi Bank Sampah</h1>
                <p>Tentukan lokasi bank sampah Anda dengan mudah dan akurat</p>
            </div>
            
            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success fade-in" role="alert">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error fade-in" role="alert">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            
            <!-- Main Form -->
            <div class="form-card fade-in">
                <form action="{{ route('pengelola.alamat.update') }}" method="POST">
                    @csrf
                    
                    <!-- Form Fields -->
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nama_lokasi">🏢 Nama Lokasi</label>
                            <input 
                                type="text" 
                                id="nama_lokasi" 
                                name="nama_lokasi" 
                                value="{{ old('nama_lokasi', $lokasi->nama_lokasi ?? '') }}" 
                                placeholder="Contoh: Bank Sampah Hijau Bersih"
                                required
                            />
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">📍 Alamat Lengkap</label>
                            <input 
                                type="text" 
                                id="alamat" 
                                name="alamat" 
                                value="{{ old('alamat', $lokasi->alamat ?? '') }}" 
                                placeholder="Jl. Contoh No. 123, Kelurahan, Kecamatan"
                                required
                            />
                        </div>
                    </div>
                    
                    <!-- Map Section -->
                    <div class="map-section">
                        <label>🗺️ Pilih Lokasi pada Peta</label>
                        
                        <!-- Pencarian Alamat -->


                        <div class="map-wrapper">
                            <div id="map"></div>
                        </div>
                        <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude', $lokasi->latitude ?? '') }}">
                        <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude', $lokasi->longitude ?? '') }}">
                        
                        <div class="map-hint">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>Klik pada peta atau seret marker untuk menentukan lokasi yang tepat</span>
                        </div>
                        
                        <!-- Map Controls -->
                        <div class="map-controls">
                            <button type="button" id="use-current-location-btn" class="map-btn">
                                📡 Gunakan Lokasi Saya
                            </button>
                            <button type="button" id="center-on-batam-btn" class="map-btn">
                                🏙️ Kembali ke Pusat Batam
                            </button>
                            <button type="button" id="toggle-satellite-btn" class="map-btn">
                                🛰️ Tampilan Satelit
                            </button>
                        </div>
                        
                        <!-- Koordinat Info -->
                        <div class="mt-4 bg-gray-50 p-4 rounded-lg border border-gray-100">
                            <p class="text-sm text-gray-600">Koordinat yang dipilih: 
                                <span class="font-medium" id="coords-display">
                                    <span id="lat-display">{{ old('latitude', $lokasi->latitude ?? '-') }}</span>, 
                                    <span id="lng-display">{{ old('longitude', $lokasi->longitude ?? '-') }}</span>
                                </span>
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="button-container">
                        <button type="submit" class="btn-submit" id="submit-btn">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Lokasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize map
        var lat = {{ old('latitude', $lokasi->latitude ?? 1.0896407) }};
        var lng = {{ old('longitude', $lokasi->longitude ?? 104.0349734) }};
        var map = L.map('map', {
            zoomControl: false // Kita akan menambahkan zoom control di kanan atas
        }).setView([lat, lng], (lat && lng) ? 13 : 10);
        
        // Tambahkan zoom control ke posisi kanan atas
        L.control.zoom({
            position: 'topright'
        }).addTo(map);

        // Base tile layers
        var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            minZoom: 2,
            maxZoom: 19,
        });
        
        var satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
            minZoom: 2,
            maxZoom: 19,
        });
        
        // Set default layer
        osmLayer.addTo(map);
        
        // Variabel untuk melacak layer aktif
        var currentLayer = 'osm';
        
        // Toggle button untuk satellite view
        document.getElementById('toggle-satellite-btn').addEventListener('click', function() {
            if (currentLayer === 'osm') {
                map.removeLayer(osmLayer);
                satelliteLayer.addTo(map);
                currentLayer = 'satellite';
                this.classList.add('active');
                this.innerHTML = '🗺️ Tampilan Peta';
            } else {
                map.removeLayer(satelliteLayer);
                osmLayer.addTo(map);
                currentLayer = 'osm';
                this.classList.remove('active');
                this.innerHTML = '🛰️ Tampilan Satelit';
            }
        });
        
        // Create custom marker icon with improved design
        var customIcon = L.divIcon({
            html: '<div style="background: linear-gradient(135deg, #3ED260 0%, #2DD161 100%); width: 34px; height: 34px; border-radius: 50%; border: 4px solid #fff; box-shadow: 0 6px 18px rgba(62,210,96,0.35), 0 1.5px 0 #2DD161 inset; display: flex; align-items: center; justify-content: center; position: relative; animation: markerPop 0.5s cubic-bezier(.68,-0.55,.27,1.55);"><svg width="18" height="18" viewBox="0 0 20 20" fill="none" style="display:block;margin:auto;"><circle cx="10" cy="10" r="9" fill="#fff"/><path d="M10 4v6l4 2" stroke="#3ED260" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg></div>',
            iconSize: [34, 34],
            iconAnchor: [17, 34],
            popupAnchor: [0, -20],
            className: 'custom-marker-eco'
        });
        
        // Animasi marker
        const style = document.createElement('style');
        style.innerHTML = `@keyframes markerPop {0%{transform:scale(0.7);} 80%{transform:scale(1.15);} 100%{transform:scale(1);}}`;
        document.head.appendChild(style);

        // Add marker
        var marker = L.marker([lat, lng], {
            draggable: true,
            icon: customIcon
        }).addTo(map);
        
        // Popup dengan info posisi
        var popup = L.popup({
            closeButton: false,
            closeOnClick: false,
            className: 'location-popup'
        });
        
        function updatePopupContent() {
            var position = marker.getLatLng();
            return `<div style="text-align:center;">
                       <b>Posisi Bank Sampah</b><br>
                       <small style="color:#666;">${position.lat.toFixed(6)}, ${position.lng.toFixed(6)}</small>
                   </div>`;
        }
        
        marker.bindPopup(updatePopupContent());
        marker.openPopup();

        // Update koordinat dan popup saat marker di-drag
        marker.on('dragend', function(e) {
            updateCoordinates(marker.getLatLng());
            marker.setPopupContent(updatePopupContent());
        });
        
        // Update koordinat dan marker saat peta di-klik
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            updateCoordinates(e.latlng);
            marker.setPopupContent(updatePopupContent());
            marker.openPopup();
        });
        
        // Fungsi untuk update nilai koordinat
        function updateCoordinates(latlng) {
            document.getElementById('latitude').value = latlng.lat.toFixed(6);
            document.getElementById('longitude').value = latlng.lng.toFixed(6);
            document.getElementById('lat-display').textContent = latlng.lat.toFixed(6);
            document.getElementById('lng-display').textContent = latlng.lng.toFixed(6);
        }

        // Fix map display issues
        setTimeout(function() {
            map.invalidateSize();
        }, 300);
        
        // Tambahkan geocoder control
        const geocoder = L.Control.geocoder({
            defaultMarkGeocode: false,
            position: 'topleft',
            placeholder: 'Cari lokasi...',
            errorMessage: 'Alamat tidak ditemukan',
            suggestMinLength: 3,
            suggestTimeout: 250,
            queryMinLength: 3
        }).addTo(map);
        
        // Handle hasil geocoding
        geocoder.on('markgeocode', function(e) {
            const result = e.geocode;
            
            // Update peta dan marker
            map.fitBounds(result.bbox);
            marker.setLatLng(result.center);
            updateCoordinates(result.center);
            marker.setPopupContent(updatePopupContent());
            marker.openPopup();
            
        });
        
        // Handler: Gunakan Lokasi Saya
        document.getElementById('use-current-location-btn').addEventListener('click', function() {
            if (!navigator.geolocation) {
                alert('Geolocation tidak didukung oleh browser Anda.');
                return;
            }

            const btn = this;
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<span class="loading-spinner mr-2"></span>Memuat lokasi...';

            navigator.geolocation.getCurrentPosition(function(position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                // Perbarui marker & peta
                marker.setLatLng([userLat, userLng]);
                map.setView([userLat, userLng], 15);
                updateCoordinates({lat: userLat, lng: userLng});
                marker.setPopupContent(updatePopupContent());
                marker.openPopup();

                btn.disabled = false;
                btn.innerHTML = originalText;
            }, function(err) {
                let errorMsg;
                switch(err.code) {
                    case 1:
                        errorMsg = 'Akses lokasi ditolak. Mohon izinkan akses lokasi pada browser Anda.';
                        break;
                    case 2:
                        errorMsg = 'Lokasi tidak tersedia saat ini.';
                        break;
                    case 3:
                        errorMsg = 'Waktu permintaan lokasi habis.';
                        break;
                    default:
                        errorMsg = 'Terjadi kesalahan saat mendapatkan lokasi: ' + err.message;
                }
                alert(errorMsg);
                btn.disabled = false;
                btn.innerHTML = originalText;
            }, {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            });
        });
        
        // Tombol kembali ke pusat Batam
        document.getElementById('center-on-batam-btn').addEventListener('click', function() {
            map.setView([1.1048, 104.0300], 12);
        });
        
        // Validasi sebelum submit
        document.querySelector('form').addEventListener('submit', function(event) {
            const lat = document.getElementById('latitude').value;
            const lng = document.getElementById('longitude').value;
            
            if (!lat || !lng || lat === '-' || lng === '-') {
                event.preventDefault();
                alert('Mohon tentukan lokasi pada peta terlebih dahulu!');
                return false;
            }
            
            // Menunjukkan loading state
            const submitBtn = document.getElementById('submit-btn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="loading-spinner mr-2"></span>Menyimpan...';
            
            // Disable semua input
            document.querySelectorAll('input, button:not(#submit-btn)').forEach(el => {
                el.disabled = true;
            });
        });
    });
</script>
@endpush