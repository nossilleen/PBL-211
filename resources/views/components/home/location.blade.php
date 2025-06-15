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
            L.marker([{{ $location->latitude }}, {{ $location->longitude }}])
                .bindPopup('<b>{{ $location->nama_lokasi }}</b><br>{{ $location->alamat }}')
                .addTo(map);
        @endforeach
    });
</script>
