@extends('pengelola.layout')

@section('title', 'Dashboard Pengelola - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Beranda Pengelola Bank Sampah</h1>
        <p class="text-gray-600 mt-1">Selamat datang di dasbor pengelola bank sampah EcoZense</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Transaksi Card -->
        <div class="bg-green-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Total Transaksi</h3>
            <p class="text-3xl font-bold text-green-600">{{ $totalTransaksi }}</p>
            <p class="text-sm text-gray-500 mt-2">Semua status</p>
        </div>
        <!-- Transaksi Selesai Card -->
        <div class="bg-yellow-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Transaksi Selesai</h3>
            <p class="text-3xl font-bold text-yellow-600">{{ $totalSelesai }}</p>
            <p class="text-sm text-gray-500 mt-2">Selesai bulan ini</p>
        </div>
        <!-- Pendapatan Card -->
        <div class="bg-purple-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-purple-800 mb-2">Pendapatan</h3>
            <p class="text-3xl font-bold text-purple-600">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-2">Total transfer selesai</p>
        </div>
        <!-- Poin Terkirim Card -->
        <div class="bg-blue-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Poin Terkirim</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalPoinTerkirim }}</p>
            <p class="text-sm text-gray-500 mt-2">Total debit poin</p>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Terbaru</h2>
        <div class="space-y-4">
            @foreach($poinActivities as $activity)
                <div class="flex items-start pb-4 border-b border-gray-100">
                    <div class="bg-yellow-100 p-2 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Berhasil mengirim {{ $activity->amount }} poin ke {{ $activity->description }}</p>
                        <p class="text-sm text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
            @foreach($transaksiActivities as $trx)
                <div class="flex items-start pb-4 border-b border-gray-100">
                    <div class="bg-green-100 p-2 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">Transaksi selesai: {{ $trx->produk->nama_produk ?? '-' }} oleh {{ $trx->user->nama ?? '-' }}</p>
                        <p class="text-sm text-gray-500">{{ $trx->tanggal->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <a href="{{ route('pengelola.riwayat') }}" class="text-green-600 hover:text-green-800 text-sm font-medium">Lihat semua aktivitas →</a>
        </div>
    </div>

    <!-- Statistik Bulanan -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Statistik Transaksi</h2>
            <div class="flex items-center space-x-4">
                <select id="chartRange" class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="30">30 Hari Terakhir</option>
                    <option value="all">Semua Waktu</option>
                </select>
            </div>
        </div>
        <!-- Chart Container -->
        <div class="w-full h-80">
            <canvas id="transactionChart"></canvas>
        </div>
        <!-- Legend -->
        <div class="flex justify-center items-center space-x-6 mt-6">
            <div class="flex items-center">
                <div class="w-3 h-3 rounded-full bg-green-500 mr-2"></div>
                <span class="text-sm text-gray-600">Transaksi Selesai</span>
            </div>
            <div class="flex items-center">
                <div class="w-3 h-3 rounded-full bg-yellow-500 mr-2"></div>
                <span class="text-sm text-gray-600">Transaksi Pending</span>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('transactionChart').getContext('2d');
            const chartData30 = @json($chartData30);
            const chartDataAll = @json($chartDataAll);
            let currentData = chartData30;
            let chartInstance;

            function renderChart(data) {
                const labels = data.map(item => item.date);
                const completedData = data.map(item => item.completed);
                const pendingData = data.map(item => item.pending);
                if (chartInstance) chartInstance.destroy();
                chartInstance = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Transaksi Selesai',
                                data: completedData,
                                borderColor: '#22c55e',
                                backgroundColor: 'rgba(34, 197, 94, 0.1)',
                                tension: 0.4,
                                fill: true
                            },
                            {
                                label: 'Transaksi Pending',
                                data: pendingData,
                                borderColor: '#eab308',
                                backgroundColor: 'rgba(234, 179, 8, 0.1)',
                                tension: 0.4,
                                fill: true
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: true,
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }

            renderChart(currentData);

            document.getElementById('chartRange').addEventListener('change', function() {
                if (this.value === 'all') {
                    currentData = chartDataAll;
                } else {
                    currentData = chartData30;
                }
                renderChart(currentData);
            });
        });
    </script>
@endsection