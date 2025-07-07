@extends('admin.layout')

@section('title', 'Beranda Admin - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Beranda Admin</h1>
        <p class="text-gray-600 mt-1">Selamat datang di dasbor admin EcoZense</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Users Card -->
        <div class="bg-blue-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Total Pengguna</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
            <p class="text-sm text-gray-500 mt-2">Semua pengguna</p>
        </div>

        <!-- Articles Card -->
        <div class="bg-green-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Total Artikel</h3>
            <p class="text-3xl font-bold text-green-600">{{ $totalArticles }}</p>
            <p class="text-sm text-gray-500 mt-2">Artikel tersedia</p>
        </div>

        <!-- Events Card -->
        <div class="bg-purple-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-purple-800 mb-2">Total Acara</h3>
            <p class="text-3xl font-bold text-purple-600">{{ $totalEvents }}</p>
            <p class="text-sm text-gray-500 mt-2">Acara tersedia</p>
        </div>

        <!-- Submissions Card -->
        <div class="bg-yellow-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Pengajuan Baru</h3>
            <p class="text-3xl font-bold text-yellow-600">{{ $pendingUpgrades }}</p>
            <p class="text-sm text-gray-500 mt-2">Butuh persetujuan</p>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Pintasan</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('admin.artikel.index') }}" class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition">
                <div class="rounded-full bg-green-100 p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Buat Artikel & Acara</h4>
                    <p class="text-sm text-gray-600 mt-1">Tambah artikel atau acara baru</p>
                </div>
            </a>
            
            <a href="{{ route('admin.pengajuan') }}" class="flex items-center p-4 bg-yellow-50 hover:bg-yellow-100 rounded-lg transition">
                <div class="rounded-full bg-yellow-100 p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Pengajuan</h4>
                    <p class="text-sm text-gray-600 mt-1">Kelola pengajuan user</p>
                </div>
            </a>
            
            <a href="{{ route('admin.user') }}" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition">
                <div class="rounded-full bg-blue-100 p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Data Pengguna</h4>
                    <p class="text-sm text-gray-600 mt-1">Kelola data pengguna</p>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Peta Lokasi Bank Sampah Section (Card Style) -->
    <div class="max-w-8xl mx-auto bg-white rounded-lg shadow-lg p-6 mb-8 mt-20">
        <h2 class="text-2xl font-bold text-center mb-6">Peta Lokasi Bank Sampah</h2>
        <div id="admin-map" style="height: 400px;" class="rounded-lg overflow-hidden shadow-lg mb-4"></div>
        <p class="text-center text-sm text-gray-600 mt-2">
            Temukan lokasi bank sampah terdaftar di sistem EcoZense.
        </p>
    </div>

    @push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #admin-map {
            z-index: 1;
            position: relative;
        }
        .navbar-fixed, .pengelola-navbar {
            z-index: 1050 !important;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
        .leaflet-control, .leaflet-top, .leaflet-popup {
            z-index: 100 !important;
        }
    </style>
    @endpush

    @push('scripts')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi peta
            const map = L.map('admin-map').setView([1.0456, 104.0305], 12);

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

            // Perbaiki ukuran map setelah render/layout
            setTimeout(function() {
                map.invalidateSize();
            }, 300);
        });
    </script>
    @endpush

    <!-- Recent Activity Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
            <a href="#" class="text-sm text-blue-500 hover:text-blue-700">Lihat Semua</a>
        </div>

        <div class="space-y-4">
            @forelse($recentActivities as $activity)
            <div class="flex items-start p-4 hover:bg-gray-50 rounded-lg transition">
                    <div class="bg-{{ $activity['color'] }}-100 rounded-full p-2 mr-4">
                        @if($activity['icon'] === 'user')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $activity['color'] }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                        @elseif($activity['icon'] === 'article')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $activity['color'] }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                        @elseif($activity['icon'] === 'event')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $activity['color'] }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @elseif($activity['icon'] === 'upgrade')
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-{{ $activity['color'] }}-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        @endif
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                            <h4 class="text-sm font-medium text-gray-800">{{ $activity['title'] }}</h4>
                            <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($activity['time'])->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-gray-600 mt-1">{{ $activity['description'] }}</p>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <p class="text-gray-500">Belum ada aktivitas terbaru</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Statistik Kunjungan Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Statistik Kunjungan</h2>
            <div>
                <select id="period-filter" class="form-select rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="7d" {{ $period === '7d' ? 'selected' : '' }}>7 Hari Terakhir</option>
                    <option value="30d" {{ $period === '30d' ? 'selected' : '' }}>30 Hari Terakhir</option>
                    <option value="all" {{ $period === 'all' ? 'selected' : '' }}>Semua Waktu</option>
                </select>
            </div>
        </div>
        <div style="height: 320px;">
            <canvas id="visitChart"></canvas>
        </div>
        <div class="mt-4 pt-4 border-t border-gray-200 flex justify-end">
            <div class="text-sm text-gray-600 bg-blue-50 px-4 py-2 rounded-lg">
                <p>Total Kunjungan: <span class="font-medium" id="total-visits-text">{{ number_format($visitStats['total']) }}</span></p>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('visitChart').getContext('2d');
            const totalVisitsElement = document.getElementById('total-visits-text');
            const filterElement = document.getElementById('period-filter');
            
            // Inisialisasi Chart
            const visitChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($visitStats['labels']) !!},
                    datasets: [{
                        label: 'Jumlah Kunjungan',
                        data: {!! json_encode($visitStats['counts']) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                        pointBorderColor: '#fff',
                        pointHoverBackgroundColor: '#fff',
                        pointHoverBorderColor: 'rgba(59, 130, 246, 1)'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    animation: {
                        duration: 500, // Durasi animasi dalam ms
                        easing: 'easeInOutQuad' // Jenis animasi
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) { if (Number.isInteger(value)) { return value; } },
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return ` Kunjungan: ${context.raw}`;
                                }
                            }
                        }
                    }
                }
            });

            // Event listener untuk dropdown filter
            filterElement.addEventListener('change', function() {
                const selectedPeriod = this.value;
                const apiUrl = `{{ route('admin.api.visit_stats') }}?period=${selectedPeriod}`;

                // Ambil data baru dari API
                fetch(apiUrl)
                    .then(response => response.json())
                    .then(data => {
                        // Perbarui data chart
                        visitChart.data.labels = data.labels;
                        visitChart.data.datasets[0].data = data.counts;
                        visitChart.update(); // Render ulang chart dengan animasi

                        // Perbarui teks total kunjungan
                        totalVisitsElement.textContent = data.total.toLocaleString('id-ID');
                    })
                    .catch(error => console.error('Error fetching visit stats:', error));
            });
        });
    </script>
@endsection