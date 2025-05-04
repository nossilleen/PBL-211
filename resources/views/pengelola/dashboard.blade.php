@extends('pengelola.layout')

@section('title', 'Dashboard Pengelola - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-gray-600 mt-1">Selamat datang di dashboard pengelola bank sampah EcoZense</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Sampah Card -->
        <div class="bg-green-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-green-800 mb-2">Total Sampah</h3>
            <p class="text-3xl font-bold text-green-600">250 kg</p>
            <p class="text-sm text-gray-500 mt-2">Terkumpul bulan ini</p>
        </div>

        <!-- Nasabah Card -->
        <div class="bg-blue-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-blue-800 mb-2">Total Nasabah</h3>
            <p class="text-3xl font-bold text-blue-600">15</p>
            <p class="text-sm text-gray-500 mt-2">Aktif bulan ini</p>
        </div>

        <!-- Transaksi Card -->
        <div class="bg-yellow-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-yellow-800 mb-2">Transaksi</h3>
            <p class="text-3xl font-bold text-yellow-600">68</p>
            <p class="text-sm text-gray-500 mt-2">Selesai bulan ini</p>
        </div>
        
        <!-- Pendapatan Card -->
        <div class="bg-purple-50 rounded-lg p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-purple-800 mb-2">Pendapatan</h3>
            <p class="text-3xl font-bold text-purple-600">Rp 1.2jt</p>
            <p class="text-sm text-gray-500 mt-2">Total bulan ini</p>
        </div>
    </div>

    <!-- Aktivitas Terbaru -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6 h-full">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Terbaru</h2>
                <div class="space-y-4">
                    <div class="flex items-start pb-4 border-b border-gray-100">
                        <div class="bg-green-100 p-2 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Budi Santoso menyetorkan 5kg plastik</p>
                            <p class="text-sm text-gray-500">Hari ini, 09:45</p>
                        </div>
                    </div>
                    <div class="flex items-start pb-4 border-b border-gray-100">
                        <div class="bg-blue-100 p-2 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Ani Wijaya mendaftar sebagai nasabah baru</p>
                            <p class="text-sm text-gray-500">Kemarin, 15:30</p>
                        </div>
                    </div>
                    <div class="flex items-start pb-4 border-b border-gray-100">
                        <div class="bg-yellow-100 p-2 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Dedi Cahyono menukarkan 200 poin</p>
                            <p class="text-sm text-gray-500">Kemarin, 14:15</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-red-100 p-2 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Stok produk daur ulang hampir habis</p>
                            <p class="text-sm text-gray-500">2 hari yang lalu, 10:10</p>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium">Lihat semua aktivitas →</a>
                </div>
            </div>
        </div>
        
        <!-- Jenis Sampah Chart -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Jenis Sampah</h2>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Plastik</span>
                        <span class="text-sm font-medium text-gray-700">48%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 48%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Kertas</span>
                        <span class="text-sm font-medium text-gray-700">24%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 24%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Logam</span>
                        <span class="text-sm font-medium text-gray-700">16%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-yellow-600 h-2.5 rounded-full" style="width: 16%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium text-gray-700">Kaca</span>
                        <span class="text-sm font-medium text-gray-700">12%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-purple-600 h-2.5 rounded-full" style="width: 12%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Bulanan -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Statistik Bulanan</h2>
            <div>
                <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option>Januari 2023</option>
                    <option>Februari 2023</option>
                    <option>Maret 2023</option>
                    <option selected>April 2023</option>
                </select>
            </div>
        </div>
        <div class="h-64 flex items-end justify-between px-2">
            <div class="flex flex-col items-center">
                <div class="bg-green-500 w-8 rounded-t-lg" style="height: 40%"></div>
                <span class="text-xs mt-2">Minggu 1</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="bg-green-500 w-8 rounded-t-lg" style="height: 65%"></div>
                <span class="text-xs mt-2">Minggu 2</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="bg-green-500 w-8 rounded-t-lg" style="height: 85%"></div>
                <span class="text-xs mt-2">Minggu 3</span>
            </div>
            <div class="flex flex-col items-center">
                <div class="bg-green-500 w-8 rounded-t-lg" style="height: 55%"></div>
                <span class="text-xs mt-2">Minggu 4</span>
            </div>
        </div>
    </div>
@endsection 