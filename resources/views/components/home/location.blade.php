<!-- resources/views/components/home/location.blade.php -->
<section
    class="py-16"
    style="background-image: url('{{ asset('images/bg7.jpeg') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8" data-aos="fade-up">
            Lokasi Bank Sampah di Batam
        </h2>

        <div id="landing-map" style="height: 350px;" class="rounded-lg overflow-hidden shadow-lg max-w-5xl mx-auto mb-4" data-aos="zoom-in" data-aos-delay="200"></div>

        <!-- Button Cari Lokasi Terdekat -->
        <div class="text-center mb-6" data-aos="fade-up" data-aos-delay="250">
            <button id="find-nearest-btn" class="px-5 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition focus:outline-none focus:ring-2 focus:ring-green-500">
                📍 Cari Bank Sampah Terdekat
            </button>
            <p id="nearest-status" class="text-sm text-gray-700 mt-2 hidden"></p>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow-lg max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="300">
            <p class="text-center text-sm">
                Temukan lokasi bank sampah terdekat di berbagai wilayah Batam untuk menyetorkan sampah Anda.
            </p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inisialisasi peta
        const map = L.map('landing-map').setView([1.0456, 104.0305], 12);

        let markers = [];

        // Tambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Batasi area peta agar tidak infinite
        const southWest = L.latLng(-90, -180);
        const northEast = L.latLng(90, 180);
        const bounds = L.latLngBounds(southWest, northEast);
        map.setMaxBounds(bounds);

        // Tambahkan marker untuk setiap lokasi
        @foreach($locations as $location)
            markers.push(
                L.marker([{{ $location->latitude }}, {{ $location->longitude }}])
                    .bindPopup('<b>{{ $location->nama_lokasi }}</b><br>{{ $location->alamat }}')
                    .addTo(map)
            );
        @endforeach

        // Helper: marker dengan default icon jika tidak ada
        function createMarker(lat, lng, options = {}) {
            if (options.icon === undefined) {
                return L.marker([lat, lng]);
            } else {
                return L.marker([lat, lng], { icon: options.icon });
            }
        }

        // Helper: custom marker icon
        function getCustomIcon({ color = '#3ED260', size = 26, shadow = true, label = null, border = '3px solid white' } = {}) {
            let labelHtml = label ? `<span style="position:absolute;top:2px;left:0;width:100%;text-align:center;font-weight:bold;font-size:13px;color:#fff;z-index:2;">${label}</span>` : '';
            return L.divIcon({
                html: `<div style="position:relative;width:${size}px;height:${size}px;">${labelHtml}<div style="background:${color};width:${size}px;height:${size}px;border-radius:50%;border:${border};box-shadow:${shadow ? '0 4px 16px rgba(0,0,0,0.25)' : 'none'};"></div></div>` ,
                iconSize: [size, size],
                iconAnchor: [size/2, size/2],
                className: 'custom-marker-icon'
            });
        }

        // Handler: Cari Lokasi Terdekat
        document.getElementById('find-nearest-btn').addEventListener('click', function () {
            const statusEl = document.getElementById('nearest-status');
            if (!navigator.geolocation) {
                alert('Geolocation tidak didukung oleh browser Anda.');
                return;
            }

            statusEl.classList.remove('hidden');
            statusEl.innerText = 'Mencari lokasi Anda...';

            navigator.geolocation.getCurrentPosition(function(position) {
                const userLat = position.coords.latitude;
                const userLng = position.coords.longitude;

                statusEl.innerText = 'Memuat bank sampah terdekat...';

                fetch(`/api/nearest-locations?lat=${userLat}&lng=${userLng}&limit=10`)
                    .then(resp => resp.json())
                    .then(data => {
                        // Hapus marker lama (kecuali tile layer)
                        markers.forEach(m => map.removeLayer(m));
                        markers = [];

                        // Tambahkan marker lokasi pengguna
                        const userMarker = createMarker(userLat, userLng, {
                            icon: getCustomIcon({ color: '#2563EB', size: 24, label: '🧑', border: '3px solid #fff' })
                        }).addTo(map).bindPopup('<b>Lokasi Anda</b>').openPopup();
                        markers.push(userMarker);

                        // Tambahkan marker bank sampah terdekat
                        data.data.forEach((loc, idx) => {
                            let color = idx === 0 ? '#3ED260' : (idx === 1 ? '#F59E42' : (idx === 2 ? '#3B82F6' : '#16A34A'));
                            let label = idx < 3 ? (idx+1).toString() : null;
                            const marker = createMarker(loc.latitude, loc.longitude, {
                                icon: getCustomIcon({ color, size: 28, label, border: '3px solid #fff' })
                            })
                            .bindPopup(`<b>${loc.nama_lokasi}</b><br>${loc.alamat}`)
                            .addTo(map);
                            markers.push(marker);
                        });

                        // Pusatkan peta ke lokasi pengguna dan jarak ke terdekat
                        map.setView([userLat, userLng], 13);

                        statusEl.innerText = `Menampilkan ${data.data.length} lokasi terdekat.`;
                    })
                    .catch(err => {
                        statusEl.innerText = 'Gagal memuat data: ' + err.message;
                    });
            }, function(err) {
                statusEl.classList.add('hidden');
                alert('Gagal mendapatkan lokasi: ' + err.message);
            }, { enableHighAccuracy: true });
        });

        // Tambahkan marker default pada load awal
        markers.forEach(m => map.removeLayer(m));
        markers = [];
        @foreach($locations as $location)
            markers.push(
                createMarker({{ $location->latitude }}, {{ $location->longitude }}, {
                    icon: getCustomIcon({ color: '#16A34A', size: 24, border: '2px solid #fff' })
                })
                .bindPopup('<b>{{ $location->nama_lokasi }}</b><br>{{ $location->alamat }}')
                .addTo(map)
            );
        @endforeach
    });
</script>
