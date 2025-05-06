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
            <p class="text-3xl font-bold text-blue-600">12</p>
            <p class="text-sm text-gray-500 mt-2">Menunggu verifikasi</p>
        </div>

        <!-- Pesanan Diproses Card -->
        <div class="bg-yellow-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Sedang Diproses</h3>
            <p class="text-3xl font-bold text-yellow-600">8</p>
            <p class="text-sm text-gray-500 mt-2">Pesanan dalam proses</p>
        </div>
        
        <!-- Pesanan Selesai Card -->
        <div class="bg-green-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Pesanan Selesai</h3>
            <p class="text-3xl font-bold text-green-600">45</p>
            <p class="text-sm text-gray-500 mt-2">Bulan ini</p>
        </div>
        
        <!-- Pendapatan Card -->
        <div class="bg-purple-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-purple-800 mb-2">Total Pendapatan</h3>
            <p class="text-3xl font-bold text-purple-600">Rp 4.5jt</p>
            <p class="text-sm text-gray-500 mt-2">Dari penjualan produk</p>
        </div>
    </div>

    <!-- Filters & Tabs -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex border-b border-gray-200">
                <button class="py-2 px-4 text-green-600 border-b-2 border-green-600 font-medium text-sm focus:outline-none">
                    Menunggu Verifikasi
                </button>
                <button class="py-2 px-4 text-gray-500 font-medium text-sm hover:text-gray-700 focus:outline-none">
                    Diproses
                </button>
                <button class="py-2 px-4 text-gray-500 font-medium text-sm hover:text-gray-700 focus:outline-none">
                    Dikirim
                </button>
                <button class="py-2 px-4 text-gray-500 font-medium text-sm hover:text-gray-700 focus:outline-none">
                    Selesai
                </button>
                <button class="py-2 px-4 text-gray-500 font-medium text-sm hover:text-gray-700 focus:outline-none">
                    Dibatalkan
                </button>
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

    <!-- Waiting for Verification Orders -->
    <div class="space-y-6">
        <!-- Order Card 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="flex items-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Menunggu Verifikasi</span>
                            <span class="ml-3 text-sm text-gray-500">Order ID: #ORD78965</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2">Ani Setiawati</h3>
                        <p class="text-sm text-gray-500">2 Mei 2023, 14:30</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-gray-800">Rp 450.000</p>
                        <p class="text-sm text-gray-500">Pembayaran: Transfer Bank</p>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 pt-4">
                    <div class="flex flex-col md:flex-row items-start gap-6">
                        <!-- Order Items -->
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-700 mb-3">Produk yang Dipesan</h4>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 rounded-lg bg-gray-200 overflow-hidden mr-3 flex-shrink-0">
                                        <img src="https://via.placeholder.com/100" alt="Eco Tote Bag" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Eco Tote Bag</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span>2 x Rp 75.000</span>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <p class="font-medium text-gray-800">Rp 150.000</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-12 h-12 rounded-lg bg-gray-200 overflow-hidden mr-3 flex-shrink-0">
                                        <img src="https://via.placeholder.com/100" alt="Bambu Straw Set" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Bambu Straw Set</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span>3 x Rp 100.000</span>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <p class="font-medium text-gray-800">Rp 300.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Proof -->
                        <div class="md:w-1/3">
                            <h4 class="font-medium text-gray-700 mb-3">Bukti Pembayaran</h4>
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <div class="p-2">
                                    <img src="https://via.placeholder.com/800x500" alt="Bukti Transfer" class="w-full h-auto rounded">
                                </div>
                                <div class="p-3 bg-gray-50">
                                    <p class="text-sm font-medium text-gray-700">Transfer Bank BCA</p>
                                    <p class="text-sm text-gray-500">2 Mei 2023, 13:42</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-4 flex justify-end space-x-3">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
                    Tolak Pesanan
                </button>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors">
                    Verifikasi & Proses
                </button>
            </div>
        </div>
        
        <!-- Order Card 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="flex items-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Menunggu Verifikasi</span>
                            <span class="ml-3 text-sm text-gray-500">Order ID: #ORD78963</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2">Budi Santoso</h3>
                        <p class="text-sm text-gray-500">1 Mei 2023, 10:15</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-gray-800">Rp 225.000</p>
                        <p class="text-sm text-gray-500">Pembayaran: Transfer Bank</p>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 pt-4">
                    <div class="flex flex-col md:flex-row items-start gap-6">
                        <!-- Order Items -->
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-700 mb-3">Produk yang Dipesan</h4>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 rounded-lg bg-gray-200 overflow-hidden mr-3 flex-shrink-0">
                                        <img src="https://via.placeholder.com/100" alt="Tempat Sampah Organik" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Tempat Sampah Organik</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span>1 x Rp 225.000</span>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <p class="font-medium text-gray-800">Rp 225.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Proof -->
                        <div class="md:w-1/3">
                            <h4 class="font-medium text-gray-700 mb-3">Bukti Pembayaran</h4>
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <div class="p-2">
                                    <img src="https://via.placeholder.com/800x500" alt="Bukti Transfer" class="w-full h-auto rounded">
                                </div>
                                <div class="p-3 bg-gray-50">
                                    <p class="text-sm font-medium text-gray-700">Transfer Bank Mandiri</p>
                                    <p class="text-sm text-gray-500">1 Mei 2023, 09:58</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-4 flex justify-end space-x-3">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
                    Tolak Pesanan
                </button>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors">
                    Verifikasi & Proses
                </button>
            </div>
        </div>

        <!-- Order Card 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6 border-b border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <div class="flex items-center">
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-semibold">Menunggu Verifikasi</span>
                            <span class="ml-3 text-sm text-gray-500">Order ID: #ORD78960</span>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mt-2">Dewi Lestari</h3>
                        <p class="text-sm text-gray-500">30 April 2023, 16:45</p>
                    </div>
                    <div class="text-right">
                        <p class="text-lg font-bold text-gray-800">Rp 375.000</p>
                        <p class="text-sm text-gray-500">Pembayaran: Transfer Bank</p>
                    </div>
                </div>
                
                <div class="border-t border-gray-100 pt-4">
                    <div class="flex flex-col md:flex-row items-start gap-6">
                        <!-- Order Items -->
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-700 mb-3">Produk yang Dipesan</h4>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <div class="w-12 h-12 rounded-lg bg-gray-200 overflow-hidden mr-3 flex-shrink-0">
                                        <img src="https://via.placeholder.com/100" alt="Eco Bottle Set" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Eco Bottle Set</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span>1 x Rp 175.000</span>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <p class="font-medium text-gray-800">Rp 175.000</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="w-12 h-12 rounded-lg bg-gray-200 overflow-hidden mr-3 flex-shrink-0">
                                        <img src="https://via.placeholder.com/100" alt="Lunch Box Bambu" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">Lunch Box Bambu</p>
                                        <div class="flex items-center text-sm text-gray-500">
                                            <span>2 x Rp 100.000</span>
                                        </div>
                                    </div>
                                    <div class="ml-auto text-right">
                                        <p class="font-medium text-gray-800">Rp 200.000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Proof -->
                        <div class="md:w-1/3">
                            <h4 class="font-medium text-gray-700 mb-3">Bukti Pembayaran</h4>
                            <div class="border border-gray-200 rounded-lg overflow-hidden">
                                <div class="p-2">
                                    <img src="https://via.placeholder.com/800x500" alt="Bukti Transfer" class="w-full h-auto rounded">
                                </div>
                                <div class="p-3 bg-gray-50">
                                    <p class="text-sm font-medium text-gray-700">Transfer Bank BNI</p>
                                    <p class="text-sm text-gray-500">30 April 2023, 16:20</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 p-4 flex justify-end space-x-3">
                <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-300 transition-colors">
                    Tolak Pesanan
                </button>
                <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition-colors">
                    Verifikasi & Proses
                </button>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-700">
                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">3</span> dari <span class="font-medium">12</span> pesanan
            </p>
        </div>
        <div class="flex space-x-1">
            <a href="#" class="px-3 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-50">
                Sebelumnya
            </a>
            <a href="#" class="px-3 py-2 bg-green-600 border border-green-600 rounded-md text-sm font-medium text-white hover:bg-green-700">
                1
            </a>
            <a href="#" class="px-3 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-50">
                2
            </a>
            <a href="#" class="px-3 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-50">
                3
            </a>
            <a href="#" class="px-3 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-50">
                4
            </a>
            <a href="#" class="px-3 py-2 bg-white border border-gray-300 rounded-md text-sm font-medium text-gray-500 hover:bg-gray-50">
                Berikutnya
            </a>
        </div>
    </div>

    <!-- Modal for Order Details -->
    <div id="orderDetailModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                Detail Pesanan #ORD78965
                            </h3>
                            <div class="mt-2">
                                <!-- Modal content would go here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Verifikasi & Proses
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // For demo purposes only
        document.addEventListener('DOMContentLoaded', function() {
            // Filter tabs functionality would be here
            const tabButtons = document.querySelectorAll('.border-b button');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('text-green-600', 'border-b-2', 'border-green-600');
                        btn.classList.add('text-gray-500');
                    });
                    
                    // Add active class to clicked button
                    this.classList.remove('text-gray-500');
                    this.classList.add('text-green-600', 'border-b-2', 'border-green-600');
                });
            });
            
            // For demo, we would add modal open/close functionality here
        });
    </script>
@endsection 