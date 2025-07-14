<!-- resources/views/components/home/location.blade.php -->
<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin=""/>
<!-- Hapus MarkerCluster CSS dan JS -->

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

<section
    class="py-16"
    style="background-image: url('{{ asset('images/bg7.jpeg') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8" data-aos="fade-up">
            Lokasi Bank Sampah di Batam
        </h2>

        <!-- Responsive map container with improved height calculation -->
        <div id="landing-map" class="rounded-lg overflow-hidden shadow-lg max-w-5xl mx-auto mb-4" 
             style="height: calc(50vh + 100px); min-height: 350px; max-height: 600px;" 
             data-aos="zoom-in" data-aos-delay="200"></div>

        <!-- Search Controls -->
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-5xl mx-auto mb-4 flex flex-col md:flex-row justify-between items-center gap-4" data-aos="fade-up" data-aos-delay="250">
            <div class="w-full md:w-auto flex flex-col md:flex-row gap-2 items-center">
                <button id="find-nearest-btn" class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-500 w-full md:w-auto">
                    <span class="flex items-center justify-center"><i class="mr-2">📍</i> Cari Bank Sampah Terdekat</span>
                </button>
                <div id="distance-filter" class="w-full md:w-auto flex items-center mt-2 md:mt-0 md:ml-4">
                    <label for="radius-filter" class="mr-2 text-gray-700 text-sm">Radius:</label>
                    <select id="radius-filter" class="px-3 py-2 border border-gray-300 rounded-md text-sm">
                        <option value="5">5 KM</option>
                        <option value="10" selected>10 KM</option>
                        <option value="20">20 KM</option>
                        <option value="50">50 KM</option>
                        <option value="100">100 KM</option>
                    </select>
                </div>
            </div>
            <div id="nearest-status" class="text-sm text-gray-700 hidden flex items-center">
                <span class="loading-spinner mr-2 hidden">
                    <svg class="animate-spin h-4 w-4 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </span>
                <span class="status-text"></span>
            </div>
        </div>
        
        <!-- Legend & Info -->
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="300">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="mb-4 md:mb-0">
                    <h3 class="font-semibold text-gray-800 mb-2">Informasi Bank Sampah</h3>
                    <p class="text-sm text-gray-600 mb-2">
                        Temukan lokasi bank sampah terdekat di berbagai wilayah Batam untuk menyetorkan sampah Anda.
                    </p>
                    <div class="text-xs text-gray-500">
                        <span class="inline-block mr-4"><span class="inline-block w-3 h-3 rounded-full bg-green-500 mr-1"></span> Bank Sampah Terdekat</span>
                        <span class="inline-block mr-4"><span class="inline-block w-3 h-3 rounded-full bg-blue-500 mr-1"></span> Lokasi Anda</span>
                        <span class="inline-block"><span class="inline-block w-3 h-3 mr-1" style="background-color: rgba(0,128,0,0.3);border-radius:10px;"></span> Radius Pencarian</span>
                    </div>
                </div>
                <div class="text-sm">
                    <p class="font-semibold text-gray-800">Total Bank Sampah: <span id="total-locations" class="font-bold text-green-600">{{ count($locations) }}</span></p>
                    <p id="distance-info" class="text-gray-600 hidden">Jarak terdekat: <span id="nearest-distance" class="font-bold">-</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi peta
        const map = L.map('landing-map', {
            scrollWheelZoom: false, // Disable zoom dengan scroll untuk UX yang lebih baik
            zoomControl: false // Pindahkan control zoom ke kanan
        }).setView([1.0456, 104.0305], 12);
        
        // Tambahkan zoom control ke kanan atas
        L.control.zoom({
            position: 'topright'
        }).addTo(map);
        
        // Enable zoom dengan scroll hanya ketika mouse di atas peta
        map.on('focus', function() { 
            map.scrollWheelZoom.enable(); 
        });
        map.on('blur', function() { 
            map.scrollWheelZoom.disable(); 
        });

        // Marker reguler untuk tracking
        let markers = [];
        let radiusCircle = null;

        // Tambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        // Batasi area peta agar tidak infinite
        const southWest = L.latLng(-90, -180);
        const northEast = L.latLng(90, 180);
        const bounds = L.latLngBounds(southWest, northEast);
        map.setMaxBounds(bounds);

        // Helper: custom marker icon
        function getCustomIcon({ color = '#3ED260', size = 26, shadow = true, label = null, border = '3px solid white' } = {}) {
            let labelHtml = label ? `<span style="position:absolute;top:2px;left:0;width:100%;text-align:center;font-weight:bold;font-size:13px;color:#fff;z-index:2;">${label}</span>` : '';
            return L.divIcon({
                html: `<div style="position:relative;width:${size}px;height:${size}px;">${labelHtml}<div style="background:${color};width:${size}px;height:${size}px;border-radius:50%;border:${border};box-shadow:${shadow ? '0 4px 16px rgba(0,0,0,0.25)' : 'none'};"></div></div>`,
                iconSize: [size, size],
                iconAnchor: [size/2, size/2],
                popupAnchor: [0, -(size/2 + 4)],
                className: 'custom-marker-icon'
            });
        }
        
        // Helper: Format jarak untuk ditampilkan
        function formatDistance(distance) {
            if (distance < 1) {
                return Math.round(distance * 1000) + ' m';
            }
            return distance.toFixed(2) + ' km';
        }

        // Helper: Hapus semua marker
        function resetMarkers() {
            markers.forEach(m => {
                if (map.hasLayer(m)) map.removeLayer(m);
            });
            markers = [];
            
            // Hapus radius circle jika ada
            if (radiusCircle && map.hasLayer(radiusCircle)) {
                map.removeLayer(radiusCircle);
            }
        }

        // Handler: Cari Lokasi Terdekat
        document.getElementById('find-nearest-btn').addEventListener('click', function() {
            const statusEl = document.getElementById('nearest-status');
            const statusText = statusEl.querySelector('.status-text');
            const loadingSpinner = statusEl.querySelector('.loading-spinner');
            
            if (!navigator.geolocation) {
                alert('Geolocation tidak didukung oleh browser Anda.');
                return;
            }

            statusEl.classList.remove('hidden');
            loadingSpinner.classList.remove('hidden');
            statusText.innerText = 'Mencari lokasi Anda...';

            navigator.geolocation.getCurrentPosition(function(position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                statusText.innerText = 'Memuat bank sampah terdekat...';

                // Ambil nilai radius filter
                const radiusFilter = parseInt(document.getElementById('radius-filter').value);

                fetch(`/api/nearest-locations?lat=${userLat}&lng=${userLng}&limit=50`)
                    .then(resp => resp.json())
                    .then(data => {
                        // Reset marker
                        resetMarkers();
                        
                        // Filter lokasi berdasarkan radius
                        const filteredLocations = data.data.filter(loc => loc.distance <= radiusFilter);

                        // Tambahkan marker lokasi pengguna
                        const userMarker = L.marker([userLat, userLng], {
                            icon: getCustomIcon({ color: '#2563EB', size: 24, label: '🧑', border: '3px solid #fff' })
                        }).bindPopup('<div class="text-center"><b>Lokasi Anda</b></div>');
                        
                        userMarker.addTo(map);
                        markers.push(userMarker);
                        
                        // Tambahkan radius circle
                        radiusCircle = L.circle([userLat, userLng], {
                            radius: radiusFilter * 1000, // convert km to m
                            color: 'green',
                            weight: 1,
                            opacity: 0.2,
                            fillColor: 'green',
                            fillOpacity: 0.1
                        }).addTo(map);

                        // Tambahkan marker bank sampah terdekat
                        filteredLocations.forEach((loc, idx) => {
                            let color = idx === 0 ? '#3ED260' : (idx === 1 ? '#F59E42' : (idx === 2 ? '#3B82F6' : '#16A34A'));
                            let label = idx < 3 ? (idx+1).toString() : null;
                            
                            // Buat popup dengan informasi lebih detail
                            const popupContent = `
                                <div class="location-popup" style="min-width:200px;">
                                    <h3 class="font-bold text-green-700">${loc.nama_lokasi}</h3>
                                    <p class="text-gray-600 mb-1">${loc.alamat}</p>
                                    <div class="flex items-center text-sm text-gray-500 mt-2">
                                        <span>📏 Jarak: ${formatDistance(loc.distance)}</span>
                                    </div>
                                    <div class="mt-3">
                                        <a href="https://www.google.com/maps/dir/?api=1&destination=${loc.latitude},${loc.longitude}" 
                                           target="_blank" 
                                           class="inline-block bg-green-600 text-white text-xs py-1 px-3 rounded-lg hover:bg-green-700">
                                            Petunjuk Arah
                                        </a>
                                    </div>
                                </div>
                            `;
                            
                            // Buat marker dan tambahkan ke map
                            const marker = L.marker([loc.latitude, loc.longitude], {
                                icon: getCustomIcon({ color, size: 28, label, border: '3px solid #fff' })
                            }).bindPopup(popupContent);
                            
                            marker.addTo(map);
                            markers.push(marker);
                        });
                        
                        // Update UI dengan informasi jarak
                        if (filteredLocations.length > 0) {
                            document.getElementById('distance-info').classList.remove('hidden');
                            document.getElementById('nearest-distance').textContent = formatDistance(filteredLocations[0].distance);
                            document.getElementById('total-locations').textContent = filteredLocations.length;
                        } else {
                            document.getElementById('distance-info').classList.add('hidden');
                            document.getElementById('total-locations').textContent = "0";
                        }

                        // Fit bounds dengan padding
                        if (filteredLocations.length > 0) {
                            const bounds = L.latLngBounds([userLat, userLng]);
                            filteredLocations.forEach(loc => bounds.extend([loc.latitude, loc.longitude]));
                            map.fitBounds(bounds, { padding: [50, 50] });
                        } else {
                            map.setView([userLat, userLng], 13);
                        }

                        // Update status
                        loadingSpinner.classList.add('hidden');
                        statusText.innerText = `Menampilkan ${filteredLocations.length} lokasi dalam radius ${radiusFilter} km`;
                    })
                    .catch(err => {
                        loadingSpinner.classList.add('hidden');
                        statusText.innerText = 'Gagal memuat data: ' + err.message;
                    });
            }, function(err) {
                statusEl.classList.add('hidden');
                alert('Gagal mendapatkan lokasi: ' + err.message);
            }, { enableHighAccuracy: true });
        });

        // Event listener untuk filter radius
        document.getElementById('radius-filter').addEventListener('change', function() {
            // Trigger click pada tombol pencarian jika sudah ada hasil sebelumnya
            if (markers.length > 0 && document.getElementById('nearest-distance').textContent !== '-') {
                document.getElementById('find-nearest-btn').click();
            }
        });

        // Load marker default pada load awal
        resetMarkers();
        
        @foreach($locations as $location)
            // Buat popup content yang lebih informatif
            const popupContent_{{$location->lokasi_id}} = `
                <div class="location-popup" style="min-width:200px;">
                    <h3 class="font-bold text-green-700">{{ $location->nama_lokasi }}</h3>
                    <p class="text-gray-600 mb-1">{{ $location->alamat }}</p>
                    <div class="mt-3">
                        <a href="https://www.google.com/maps/dir/?api=1&destination={{ $location->latitude }},{{ $location->longitude }}" 
                           target="_blank" 
                           class="inline-block bg-green-600 text-white text-xs py-1 px-3 rounded-lg hover:bg-green-700">
                            Petunjuk Arah
                        </a>
                    </div>
                </div>
            `;
            
            const marker_{{$location->lokasi_id}} = L.marker(
                [{{ $location->latitude }}, {{ $location->longitude }}], 
                { icon: getCustomIcon({ color: '#16A34A', size: 24, border: '2px solid #fff' }) }
            ).bindPopup(popupContent_{{$location->lokasi_id}});
            
            marker_{{$location->lokasi_id}}.addTo(map);
            markers.push(marker_{{$location->lokasi_id}});
        @endforeach
        
        // Responsive map resizing
        function handleResize() {
            map.invalidateSize();
        }
        
        window.addEventListener('resize', handleResize);
        
        // Fix ukuran peta pada load awal
        setTimeout(function() {
            handleResize();
        }, 300);
    });
</script>
