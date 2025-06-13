@extends('pengelola.layout')

@section('title', 'Kelola Pesanan - Pengelola EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Pesanan</h1>
        <p class="text-gray-600 mt-1">Verifikasi dan proses pesanan produk dari nasabah</p>
    </div>
    
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Pesanan Baru Card -->
        <div class="bg-blue-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Pesanan Baru</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $pesananBaru }}</p>
            <p class="text-sm text-gray-500 mt-2">Menunggu verifikasi</p>
        </div>

        <!-- Pesanan Diproses Card -->
        <div class="bg-yellow-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Sedang Diproses</h3>
            <p class="text-3xl font-bold text-yellow-600">{{ $sedangDiproses }}</p>
            <p class="text-sm text-gray-500 mt-2">Pesanan dalam proses</p>
        </div>
        
        <!-- Pesanan Selesai Card -->
        <div class="bg-green-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Pesanan Selesai</h3>
            <p class="text-3xl font-bold text-green-600">{{ $pesananSelesai }}</p>
            <p class="text-sm text-gray-500 mt-2">Bulan ini</p>
        </div>
        
        <!-- Pendapatan Card -->
        <div class="bg-purple-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-purple-800 mb-2">Total Pendapatan</h3>
            <p class="text-3xl font-bold text-purple-600">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            <p class="text-sm text-gray-500 mt-2">Dari penjualan produk</p>
        </div>
    </div>

    <!-- Filters & Tabs -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex border-b border-gray-200">
                <a href="{{ route('pengelola.pesanan', ['status' => 'menunggu konfirmasi']) }}" 
                   class="py-2 px-4 {{ $status == 'menunggu konfirmasi' ? 'text-green-600 border-b-2 border-green-600' : 'text-gray-500' }} font-medium text-sm hover:text-gray-700">
                    Menunggu Verifikasi
                </a>
                <a href="{{ route('pengelola.pesanan', ['status' => 'sedang dikirim']) }}"
                   class="py-2 px-4 {{ $status == 'sedang dikirim' ? 'text-green-600 border-b-2 border-green-600' : 'text-gray-500' }} font-medium text-sm hover:text-gray-700">
                    Diproses
                </a>
                <a href="{{ route('pengelola.pesanan', ['status' => 'selesai']) }}"
                   class="py-2 px-4 {{ $status == 'selesai' ? 'text-green-600 border-b-2 border-green-600' : 'text-gray-500' }} font-medium text-sm hover:text-gray-700">
                    Selesai
                </a>
                <a href="{{ route('pengelola.pesanan', ['status' => 'dibatalkan']) }}"
                   class="py-2 px-4 {{ $status == 'dibatalkan' ? 'text-green-600 border-b-2 border-green-600' : 'text-gray-500' }} font-medium text-sm hover:text-gray-700">
                    Dibatalkan
                </a>
            </div>
            
            <div class="flex items-center space-x-2">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari pesanan..." 
                           class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500 w-64">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                </div>
                
                <select class="rounded-lg border-gray-300 text-sm focus:ring-green-500 focus:border-green-500">
                    <option value="all">Semua Periode</option>
                    <option value="today">Hari Ini</option>
                    <option value="week">Minggu Ini</option>
                    <option value="month">Bulan Ini</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Pesanan Table -->
    <div class="space-y-6">
        @foreach($pesananMasuk as $pesanan)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header with status and order ID -->
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="flex items-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">
                                {{ ucfirst($pesanan->status) }}
                            </span>
                            <span class="ml-3 text-sm text-gray-500">#{{ $pesanan->transaksi_id }}</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2">{{ $pesanan->user->nama }}</h3>
                        <p class="text-sm text-gray-500">{{ $pesanan->tanggal->format('d M Y, H:i') }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-gray-800">
                            @if($pesanan->pay_method == 'poin')
                                {{ number_format($pesanan->poin_used, 0, ',', '.') }} Poin
                            @else
                                Rp{{ number_format($pesanan->harga_total, 0, ',', '.') }}
                            @endif
                        </p>
                        <p class="text-sm text-gray-500">via {{ $pesanan->pay_method }}</p>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="flex items-center justify-between">
                    <div class="flex items-start space-x-4">
                        <div class="w-16 h-16 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                            <img src="{{ asset('storage/' . $pesanan->produk->gambar_utama) }}" 
                                 alt="{{ $pesanan->produk->nama_produk }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h4 class="font-medium text-gray-800">{{ $pesanan->produk->nama_produk }}</h4>
                            <p class="text-sm text-gray-600">
                                {{ $pesanan->jumlah_produk }} × 
                                @if($pesanan->pay_method == 'poin')
                                    {{ number_format($pesanan->produk->harga_points, 0, ',', '.') }} Poin
                                @else
                                    Rp{{ number_format($pesanan->produk->harga, 0, ',', '.') }}
                                @endif
                            </p>
                        </div>
                    </div>
                    @if($pesanan->bukti_transfer)
                        <button onclick="showBuktiTransfer('{{ $pesanan->bukti_transfer }}')" 
                                class="inline-flex items-center px-3 py-2 border border-blue-100 rounded-lg text-sm font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 transition-colors duration-150 ease-in-out">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Bukti Transfer
                        </button>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            @if($pesanan->status == 'menunggu konfirmasi')
            <div class="bg-gray-50 p-4 flex justify-end space-x-3">
                <button onclick="handleTolak('{{ $pesanan->transaksi_id }}')"
                        class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Tolak Pesanan
                </button>
                <button onclick="handleVerifikasi('{{ $pesanan->transaksi_id }}')"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700">
                    Verifikasi & Proses
                </button>
            </div>
            @elseif($pesanan->status == 'sedang dikirim')
            <div class="bg-gray-50 p-4 flex justify-end space-x-3">
                <button onclick="handleSelesai('{{ $pesanan->transaksi_id }}')"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700">
                    Tandai Selesai
                </button>
            </div>
            @endif
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        @if ($pesananMasuk->hasPages())
            <nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 rounded-lg shadow-sm">
                <div class="hidden sm:block">
                    <p class="text-sm text-gray-700">
                        Menampilkan
                        <span class="font-medium">{{ $pesananMasuk->firstItem() }}</span>
                        sampai
                        <span class="font-medium">{{ $pesananMasuk->lastItem() }}</span>
                        dari
                        <span class="font-medium">{{ $pesananMasuk->total() }}</span>
                        hasil
                    </p>
                </div>
                
                <div class="flex flex-1 justify-between gap-x-2 sm:justify-end">
                    @if ($pesananMasuk->onFirstPage())
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Sebelumnya
                        </span>
                    @else
                        <a href="{{ $pesananMasuk->previousPageUrl() }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors duration-150 ease-in-out">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Sebelumnya
                        </a>
                    @endif

                    <div class="hidden md:flex items-center gap-x-2">
                        @foreach ($pesananMasuk->getUrlRange(1, $pesananMasuk->lastPage()) as $page => $url)
                            @if ($page == $pesananMasuk->currentPage())
                                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 bg-green-50 border border-green-300 rounded-lg">
                                    {{ $page }}
                            </span>
                            @else
                                <a href="{{ $url }}" 
                                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors duration-150 ease-in-out">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    </div>

                    @if ($pesananMasuk->hasMorePages())
                        <a href="{{ $pesananMasuk->nextPageUrl() }}" 
                           class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-colors duration-150 ease-in-out">
                            Berikutnya
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    @else
                        <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-50 border border-gray-300 rounded-lg cursor-not-allowed">
                            Berikutnya
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    @endif
                </div>
            </nav>
        @endif
    </div>

    <!-- View-only Modal for Bukti Transfer -->
    <div id="buktiTransferModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75"></div>
            <div class="relative bg-white rounded-lg max-w-3xl w-full">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h3 class="text-lg font-medium text-gray-900">
                        Bukti Transfer
                    </h3>
                    <button onclick="closeBuktiModal()" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="p-6">
                    <img id="buktiTransferImage" src="" alt="Bukti Transfer" class="w-full h-auto rounded-lg">
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden forms for actions -->
    <form id="tolakForm" method="POST" class="hidden">@csrf</form>
    <form id="verifikasiForm" method="POST" class="hidden">@csrf</form>
    <form id="selesaiForm" method="POST" class="hidden">@csrf</form>

    <!-- Add SweetAlert2 CSS and JS in the header or before closing body -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

    <!-- Update the JavaScript functions -->
    <script>
    function showBuktiTransfer(buktiTransfer) {
        const modal = document.getElementById('buktiTransferModal');
        const image = document.getElementById('buktiTransferImage');
        image.src = `{{ asset('storage') }}/${buktiTransfer}`;
        modal.classList.remove('hidden');
    }

    function closeBuktiModal() {
        document.getElementById('buktiTransferModal').classList.add('hidden');
    }

    function handleVerifikasi(transaksiId) {
        Swal.fire({
            title: 'Verifikasi Pesanan?',
            text: "Pesanan akan diproses setelah diverifikasi",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Verifikasi',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('verifikasiForm');
                form.action = `{{ url('pengelola/pesanan') }}/${transaksiId}/verifikasi`;
                form.submit();
            }
        });
    }

    function handleTolak(transaksiId) {
        Swal.fire({
            title: 'Tolak Pesanan?',
            text: "Pesanan yang ditolak tidak dapat dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Tolak',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('tolakForm');
                form.action = `{{ url('pengelola/pesanan') }}/${transaksiId}/tolak`;
                form.submit();
            }
        });
    }

    function handleSelesai(transaksiId) {
        Swal.fire({
            title: 'Tandai Selesai?',
            text: "Pesanan akan dipindahkan ke riwayat transaksi",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#22c55e',
            cancelButtonColor: '#64748b',
            confirmButtonText: 'Ya, Selesai',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('selesaiForm');
                form.action = `{{ url('pengelola/pesanan') }}/${transaksiId}/selesai`;
                form.submit();
            }
        });
    }

    // Close modal on outside click
    window.onclick = function(event) {
        const modal = document.getElementById('buktiTransferModal');
        if (event.target === modal) {
            closeBuktiModal();
        }
    }
    </script>
@endsection