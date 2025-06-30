<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="EcoZense - Profil Nasabah" />
        <meta name="theme-color" content="#8DD363" />
        <title>Profil Nasabah - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <!-- Preloader -->
        <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
        </div>

        <!-- Navbar -->
        <x-home.navbar />

        <script>
            // Immediately set navbar background on profile page
            document.addEventListener('DOMContentLoaded', function() {
                const navbar = document.getElementById('main-navbar');
                if (navbar) {
                    navbar.classList.remove('bg-transparent');
                    navbar.classList.add('navbar-scrolled', 'shadow-md');
                    navbar.style.backgroundImage = "url('{{ asset('images/Frame 2305.png') }}')";
                    navbar.style.backgroundSize = "cover";
                    navbar.style.backgroundPosition = "center";
                }
            });
        </script>

        <!-- Main Content -->
        <main class="pt-16 min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Profile Section -->
                <div class="flex flex-col lg:flex-row mt-8 gap-8">
                    <!-- Left Eco Enzyme -->
                    <div class="container mx-auto py-8 px-4">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <!-- Eco Enzyme (Kiri) -->
                            <div class="w-full lg:w-1/4">
                                <x-Eco Enzyme.container />
                            </div>

        <!-- Main Content (Kanan) -->
        <div id="main-content" class="w-full lg:w-3/4">
            <!-- Profile Section (Default Visible) -->
            <div id="profile-section">
                <x-profile.information />
            </div>
            
            <!-- Dashboard Section (Hidden by Default) -->
            <div id="dashboard-section" class="hidden">
                <x-dashboard.container />
            </div>
<!-- Favorit Section -->
<div id="favorit-section" class="hidden">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-green-700 mb-4">Favorit Saya</h2>

        @if(count($favoritArtikels ?? []) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($favoritArtikels as $artikel)
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow hover:shadow-lg transition">
                <img src="{{ asset($artikel->gambar) }}" alt="{{ $artikel->judul }}" class="h-40 w-full object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $artikel->judul }}</h3>
                    <p class="text-sm text-gray-600 mb-2 line-clamp-3">{{ $artikel->excerpt }}</p>
                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="text-green-600 hover:underline text-sm font-medium">Lihat Selengkapnya</a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-500 py-10">
            <p class="text-sm">Kamu belum menyukai artikel apa pun.</p>
            <p class="text-sm">Temukan artikel menarik di halaman <a href="{{ route('artikel.index') }}" class="text-green-600 hover:underline">Artikel</a>.</p>
        </div>
        @endif
    </div>
</div>


            <!-- Pesanan Section (Hidden by Default) -->
            <div id="pesanan-section" class="hidden">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-green-700 mb-4">Pesanan Aktif</h2>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Produk</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Jumlah</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Total</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Metode</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Status</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($pesananAktif ?? [] as $pesanan)
                                <tr>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <div class="h-12 w-12 flex-shrink-0">
                                                <img class="h-12 w-12 rounded-md object-cover" src="{{ $pesanan->produk->gambar_utama ?? '/images/produk/default.jpg' }}" alt="{{ $pesanan->produk->nama_produk ?? 'Produk' }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $pesanan->produk->nama_produk ?? 'Produk' }}</div>
                                                <div class="text-sm text-gray-500">{{ $pesanan->tanggal->format('d M Y') ?? '' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-900">{{ $pesanan->jumlah_produk ?? '1' }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-900">Rp{{ number_format($pesanan->harga_total ?? 0, 0, ',', '.') }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-900">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $pesanan->pay_method == 'poin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $pesanan->pay_method == 'poin' ? 'Poin' : 'Transfer' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        @php
                                            $statusClass = [
                                                'belum dibayar' => 'bg-red-100 text-red-800',
                                                'menunggu konfirmasi' => 'bg-yellow-100 text-yellow-800',
                                                'sedang dikirim' => 'bg-blue-100 text-blue-800',
                                                'selesai' => 'bg-green-100 text-green-800',
                                                'dibatalkan' => 'bg-gray-100 text-gray-800'
                                            ];
                                            $status = $pesanan->status ?? 'belum dibayar';
                                            $statusText = ucwords($status);
                                        @endphp
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $statusText }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm font-medium">
                                        @if($pesanan->status == 'belum dibayar' && $pesanan->pay_method == 'transfer')
                                        <button type="button" onclick="openUploadModal('{{ $pesanan->transaksi_id }}')" class="text-green-600 hover:text-green-900 mr-3">Upload Bukti</button>
                                        @endif
                                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
                                    </td>
                                </tr>
                                @endforeach

                                @if(empty($pesananAktif) || count($pesananAktif) == 0)
                                <tr>
                                    <td colspan="6" class="py-6 px-4 text-center text-gray-500">
                                        Tidak ada pesanan aktif saat ini
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Riwayat Transaksi Section (Hidden by Default) -->
            <div id="riwayat-section" class="hidden">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-green-700 mb-4">Riwayat Transaksi</h2>
                    
                    <div class="mb-4">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                            <div class="flex items-center space-x-2">
                                <span class="text-sm text-gray-500">Filter:</span>
                                <select id="status-filter" class="form-select text-sm border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                    <option value="all">Semua Status</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="dibatalkan">Dibatalkan</option>
                                </select>
                            </div>
                            <div class="relative">
                                <input type="text" id="search-riwayat" placeholder="Cari produk..." class="form-input w-full md:w-60 pr-8 text-sm border-gray-300 rounded-md focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Produk</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Jumlah</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Total</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Metode</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Status</th>
                                    <th class="py-3 px-4 bg-green-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($riwayatTransaksi ?? [] as $transaksi)
                                <tr>
                                    <td class="py-4 px-4">
                                        <div class="flex items-center">
                                            <div class="h-12 w-12 flex-shrink-0">
                                                <img class="h-12 w-12 rounded-md object-cover" src="{{ $transaksi->produk->gambar_utama ?? '/images/produk/default.jpg' }}" alt="{{ $transaksi->produk->nama_produk ?? 'Produk' }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $transaksi->produk->nama_produk ?? 'Produk' }}</div>
                                                <div class="text-sm text-gray-500">{{ $transaksi->tanggal->format('d M Y') ?? '' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-4 text-sm text-gray-900">{{ $transaksi->jumlah_produk ?? '1' }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-900">Rp{{ number_format($transaksi->harga_total ?? 0, 0, ',', '.') }}</td>
                                    <td class="py-4 px-4 text-sm text-gray-900">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $transaksi->pay_method == 'poin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                                            {{ $transaksi->pay_method == 'poin' ? 'Poin' : 'Transfer' }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        @php
                                            $statusClass = [
                                                'selesai' => 'bg-green-100 text-green-800',
                                                'dibatalkan' => 'bg-gray-100 text-gray-800'
                                            ];
                                            $status = $transaksi->status ?? 'selesai';
                                            $statusText = ucwords($status);
                                        @endphp
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass[$status] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $statusText }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-sm font-medium">
                                        <a href="#" class="text-blue-600 hover:text-blue-900">Detail</a>
                                    </td>
                                </tr>
                                @endforeach

                                @if(empty($riwayatTransaksi) || count($riwayatTransaksi) == 0)
                                <tr>
                                    <td colspan="6" class="py-6 px-4 text-center text-gray-500">
                                        Tidak ada riwayat transaksi
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const favoritLink = document.getElementById('nav-favorit');
const favoritSection = document.getElementById('favorit-section');

if (favoritLink) {
    favoritLink.addEventListener('click', function(e) {
        e.preventDefault();
        hideAllSections();
        favoritSection.classList.remove('hidden');
        resetAllNavLinks();
        favoritLink.classList.add('bg-white', 'border-green-600');
        favoritLink.classList.remove('border-transparent', 'hover:border-green-600');
    });
}

        // Get navigation links
        const profileLink = document.getElementById('nav-profile');
        const dashboardLink = document.getElementById('nav-dashboard');
        const pesananLink = document.getElementById('nav-pesanan');
        const riwayatLink = document.getElementById('nav-riwayat');
        
        // Get content sections
        const profileSection = document.getElementById('profile-section');
        const dashboardSection = document.getElementById('dashboard-section');
        const pesananSection = document.getElementById('pesanan-section');
        const riwayatSection = document.getElementById('riwayat-section');
        
        // Function to hide all sections
        function hideAllSections() {
            profileSection.classList.add('hidden');
            dashboardSection.classList.add('hidden');
            if (pesananSection) pesananSection.classList.add('hidden');
            if (riwayatSection) riwayatSection.classList.add('hidden');
        }
        
        // Function to reset all nav links
        function resetAllNavLinks() {
            if (favoritLink) {
    favoritLink.classList.remove('bg-white', 'border-green-600');
    favoritLink.classList.add('border-transparent', 'hover:border-green-600');
}

            profileLink.classList.remove('bg-white', 'border-green-600');
            profileLink.classList.add('border-transparent', 'hover:border-green-600');
            dashboardLink.classList.remove('bg-white', 'border-green-600');
            dashboardLink.classList.add('border-transparent', 'hover:border-green-600');
            
            if (pesananLink) {
                pesananLink.classList.remove('bg-white', 'border-green-600');
                pesananLink.classList.add('border-transparent', 'hover:border-green-600');
            }
            
            if (riwayatLink) {
                riwayatLink.classList.remove('bg-white', 'border-green-600');
                riwayatLink.classList.add('border-transparent', 'hover:border-green-600');
            }
        }
        
        // Add click events to navigation links
        if (profileLink && dashboardLink) {
            profileLink.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                profileSection.classList.remove('hidden');
                
                resetAllNavLinks();
                profileLink.classList.add('bg-white', 'border-green-600');
                profileLink.classList.remove('border-transparent', 'hover:border-green-600');
            });
            
            dashboardLink.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                dashboardSection.classList.remove('hidden');
                
                resetAllNavLinks();
                dashboardLink.classList.add('bg-white', 'border-green-600');
                dashboardLink.classList.remove('border-transparent', 'hover:border-green-600');
            });
        }
        
        // Add click events for new navigation links
        if (pesananLink) {
            pesananLink.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                pesananSection.classList.remove('hidden');
                
                resetAllNavLinks();
                pesananLink.classList.add('bg-white', 'border-green-600');
                pesananLink.classList.remove('border-transparent', 'hover:border-green-600');
            });
        }
        
        if (riwayatLink) {
            riwayatLink.addEventListener('click', function(e) {
                e.preventDefault();
                hideAllSections();
                riwayatSection.classList.remove('hidden');
                
                resetAllNavLinks();
                riwayatLink.classList.add('bg-white', 'border-green-600');
                riwayatLink.classList.remove('border-transparent', 'hover:border-green-600');
            });
        }
        
        // Filter and search functionality for riwayat transaksi
        const statusFilter = document.getElementById('status-filter');
        const searchInput = document.getElementById('search-riwayat');
        
        if (statusFilter) {
            statusFilter.addEventListener('change', filterRiwayat);
        }
        
        if (searchInput) {
            searchInput.addEventListener('input', filterRiwayat);
        }
        
        function filterRiwayat() {
            const status = statusFilter.value;
            const searchTerm = searchInput.value.toLowerCase();
            const rows = document.querySelectorAll('#riwayat-section tbody tr');
            
            rows.forEach(row => {
                const statusCell = row.querySelector('td:nth-child(5) span');
                const productNameCell = row.querySelector('td:nth-child(1) .text-sm.font-medium');
                
                if (!statusCell || !productNameCell) return;
                
                const rowStatus = statusCell.textContent.trim().toLowerCase();
                const productName = productNameCell.textContent.trim().toLowerCase();
                
                const statusMatch = status === 'all' || rowStatus === status;
                const searchMatch = productName.includes(searchTerm);
                
                if (statusMatch && searchMatch) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }
    });
    
    // Fungsi untuk toggle section berdasarkan hash
    function toggleSectionByHash() {

        const profileSection = document.getElementById('profile-section');
        const dashboardSection = document.getElementById('dashboard-section');
        const pesananSection = document.getElementById('pesanan-section');
        const riwayatSection = document.getElementById('riwayat-section');
        const favoritSection = document.getElementById('favorit-section');
if (favoritSection) favoritSection.classList.add('hidden'); // hide dulu di atas

if (window.location.hash === '#favorit') {
    if (favoritSection) favoritSection.classList.remove('hidden');
    return;
}

        
        // Hide all sections first
        if (profileSection) profileSection.classList.add('hidden');
        if (dashboardSection) dashboardSection.classList.add('hidden');
        if (pesananSection) pesananSection.classList.add('hidden');
        if (riwayatSection) riwayatSection.classList.add('hidden');
        if (favoritSection) favoritSection.classList.add('hidden'); // tambahkan ini

        // Show section based on hash
        if (window.location.hash === '#dashboard') {
        if (dashboardSection) dashboardSection.classList.remove('hidden');
    } else if (window.location.hash === '#pesanan') {
        if (pesananSection) pesananSection.classList.remove('hidden');
    } else if (window.location.hash === '#riwayat') {
        if (riwayatSection) riwayatSection.classList.remove('hidden');
    } else if (window.location.hash === '#favorit') {
        if (favoritSection) favoritSection.classList.remove('hidden'); // tambahkan ini
    } else {
        if (profileSection) profileSection.classList.remove('hidden');
    }
    }
    // Script untuk mengakhiri preloader
    window.addEventListener('load', function() {
        // Cek apakah elemen preloader ada di halaman
        const preloader = document.getElementById('preloader');
        if (preloader) {
            // Tambahkan class untuk animasi fade out
            preloader.classList.add('preloader-hide');
            // Hapus preloader setelah animasi selesai
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 500); // Waktu sesuai dengan durasi animasi fade out
        }
        // Toggle section sesuai hash saat load
        toggleSectionByHash();
    });
    // Toggle section saat hash berubah
    window.addEventListener('hashchange', toggleSectionByHash);
</script>

<!-- Portal modal yang benar-benar baru dan terpisah (di luar body) -->
<div id="uploadModalPortal" class="fixed inset-0 bg-black bg-opacity-50 hidden" style="z-index: 9999; display: flex; align-items: center; justify-content: center;">
    <div class="bg-white rounded-lg w-full max-w-md mx-4 shadow-xl">
        <div class="flex justify-between items-center p-4 border-b">
            <h3 class="text-lg font-medium text-gray-900">Upload Bukti Transfer</h3>
            <button type="button" id="closeUploadModalBtn" class="text-gray-400 hover:text-gray-500">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <form id="uploadForm" action="{{ url('/transaksi/upload-bukti') }}" method="POST" enctype="multipart/form-data" class="p-4">
            @csrf
            <input type="hidden" id="transaksi_id_new" name="transaksi_id" value="">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="bukti_transfer_new">
                    File Bukti Transfer
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="file-upload-new" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-green-500">
                                <span>Upload file</span>
                                <input id="file-upload-new" name="bukti_transfer" type="file" class="sr-only" accept="image/*" required>
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF hingga 2MB
                        </p>
                    </div>
                </div>
                <div id="file-preview-new" class="mt-2 hidden">
                    <div class="flex items-center justify-between p-2 bg-green-50 rounded">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span id="file-name-new" class="text-sm text-gray-700"></span>
                        </div>
                        <button type="button" id="removeFileBtn" class="text-gray-400 hover:text-gray-500">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end mt-4">
                <button type="button" id="cancelUploadBtn" class="mr-2 py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Batal
                </button>
                <button type="submit" class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>

    </body>
</html>
