@extends('pengelola.layout')

@section('title', 'Alamat - Pengelola EcoZense')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
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
                    </div>

                    <!-- Submit Button -->
                    <div class="button-container">
                        <button type="submit" class="btn-submit">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize map
        var lat = {{ old('latitude', $lokasi->latitude ?? 1.0896407) }};
        var lng = {{ old('longitude', $lokasi->longitude ?? 104.0349734) }};
        var map = L.map('map').setView([lat, lng], (lat && lng) ? 13 : 5);

        // Add tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors',
            minZoom: 2,
            maxZoom: 18,
        }).addTo(map);

        // Create custom marker icon
        var customIcon = L.divIcon({
            html: '<div style="background: linear-gradient(135deg, #3ED260 0%, #2DD161 100%); width: 30px; height: 30px; border-radius: 50% 50% 50% 0; transform: rotate(-45deg); border: 3px solid white; box-shadow: 0 4px 12px rgba(62, 210, 96, 0.4);"></div>',
            iconSize: [30, 30],
            iconAnchor: [15, 30],
            className: 'custom-marker'
        });

        // Add marker
        var marker = L.marker([lat, lng], {
            draggable: true,
            icon: customIcon
        }).addTo(map);

        // Update coordinates on drag
        marker.on('dragend', function(e) {
            var position = marker.getLatLng();
            document.getElementById('latitude').value = position.lat.toFixed(6);
            document.getElementById('longitude').value = position.lng.toFixed(6);
        });

        // Update coordinates on click
        map.on('click', function(e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat.toFixed(6);
            document.getElementById('longitude').value = e.latlng.lng.toFixed(6);
        });

        // Fix map display issues
        setTimeout(function() {
            map.invalidateSize();
        }, 300);

        // Add loading states for form submission
        const form = document.querySelector('form');
        const submitBtn = document.querySelector('.btn-submit');
        const inputs = document.querySelectorAll('input[type="text"]');

        form.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="w-5 h-5 animate-spin mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>Menyimpan...';
            
            inputs.forEach(input => {
                input.disabled = true;
            });
        });

        // Add smooth animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.form-group').forEach(group => {
            observer.observe(group);
        });
    });
</script>
@endpush