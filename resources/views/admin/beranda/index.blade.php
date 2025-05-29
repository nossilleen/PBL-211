@extends('admin.layout')

@section('title', 'Beranda Admin - EcoZense')

@section('content')
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Beranda Admin</h1>
        <p class="text-gray-600 mt-1">Selamat datang di dashboard admin EcoZense</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Users Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Pengguna</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">125</h3>
                </div>
                <div class="rounded-full bg-blue-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium">
                <span class="text-green-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    12%
                </span>
                <span class="text-gray-500 ml-2">Dari bulan lalu</span>
            </div>
        </div>

        <!-- Articles Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Artikel</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">28</h3>
                </div>
                <div class="rounded-full bg-green-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium">
                <span class="text-green-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    8%
                </span>
                <span class="text-gray-500 ml-2">Dari bulan lalu</span>
            </div>
        </div>

        <!-- Events Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Event</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">5</h3>
                </div>
                <div class="rounded-full bg-purple-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium">
                <span class="text-green-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    2
                </span>
                <span class="text-gray-500 ml-2">Baru bulan ini</span>
            </div>
        </div>

        <!-- Submissions Card -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Pengajuan Baru</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">8</h3>
                </div>
                <div class="rounded-full bg-yellow-50 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm font-medium">
                <span class="text-red-500 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    4
                </span>
                <span class="text-gray-500 ml-2">Butuh persetujuan</span>
            </div>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
            <a href="#" class="text-sm text-blue-500 hover:text-blue-700">Lihat Semua</a>
        </div>

        <div class="space-y-4">
            <!-- Activity Items -->
            <div class="flex items-start p-4 hover:bg-gray-50 rounded-lg transition">
                <div class="bg-blue-100 rounded-full p-2 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h4 class="text-sm font-medium text-gray-800">Pengguna Baru Terdaftar</h4>
                        <span class="text-xs text-gray-500">2 jam yang lalu</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Budi Santoso telah mendaftar sebagai nasabah baru</p>
                </div>
            </div>

            <div class="flex items-start p-4 hover:bg-gray-50 rounded-lg transition">
                <div class="bg-green-100 rounded-full p-2 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h4 class="text-sm font-medium text-gray-800">Artikel Baru Dipublikasikan</h4>
                        <span class="text-xs text-gray-500">5 jam yang lalu</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Manfaat Eco Enzim untuk Kesehatan telah dipublikasikan</p>
                </div>
            </div>

            <div class="flex items-start p-4 hover:bg-gray-50 rounded-lg transition">
                <div class="bg-yellow-100 rounded-full p-2 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h4 class="text-sm font-medium text-gray-800">Pengajuan Baru</h4>
                        <span class="text-xs text-gray-500">1 hari yang lalu</span>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Ani Wijaya mengajukan diri sebagai pengelola bank sampah</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links Section -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Pintasan</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('artikel.index') }}" class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition">
                <div class="rounded-full bg-green-100 p-3 mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div>
                    <h4 class="font-medium text-gray-800">Artikel & Event</h4>
                    <p class="text-sm text-gray-600 mt-1">Kelola artikel dan acara</p>
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
                    <h4 class="font-medium text-gray-800">Data User</h4>
                    <p class="text-sm text-gray-600 mt-1">Kelola data pengguna</p>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Statistik Kunjungan Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8 mt-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Statistik Kunjungan Website</h2>
            <div class="inline-flex rounded-md shadow-sm" role="group">
                <button type="button" id="weekly-btn" class="bg-blue-600 text-white px-4 py-2 text-sm font-medium rounded-l-lg active">
                    Mingguan
                </button>
                <button type="button" id="monthly-btn" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 text-sm font-medium">
                    Bulanan
                </button>
                <button type="button" id="yearly-btn" class="bg-gray-200 hover:bg-gray-300 px-4 py-2 text-sm font-medium rounded-r-lg">
                    Tahunan
                </button>
            </div>
        </div>

        <!-- Grafik Statistik Kunjungan -->
        <div class="w-full h-72 relative">
            <!-- Grafik Mingguan (defaultnya aktif) -->
            <div id="weekly-chart" class="w-full h-full">
                <div class="flex h-full items-end space-x-2 justify-center">
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">320</div>
                        <div class="bg-blue-500 w-14 rounded-t-md relative group hover:bg-blue-600 transition-colors" style="height: 45%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">45%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Sen</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">480</div>
                        <div class="bg-blue-500 w-14 rounded-t-md relative group hover:bg-blue-600 transition-colors" style="height: 65%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">65%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Sel</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">290</div>
                        <div class="bg-blue-500 w-14 rounded-t-md relative group hover:bg-blue-600 transition-colors" style="height: 40%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">40%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Rab</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">576</div>
                        <div class="bg-blue-500 w-14 rounded-t-md relative group hover:bg-blue-600 transition-colors" style="height: 80%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">80%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Kam</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">542</div>
                        <div class="bg-blue-500 w-14 rounded-t-md relative group hover:bg-blue-600 transition-colors" style="height: 75%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">75%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Jum</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">428</div>
                        <div class="bg-blue-500 w-14 rounded-t-md relative group hover:bg-blue-600 transition-colors" style="height: 60%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">60%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Sab</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">216</div>
                        <div class="bg-blue-500 w-14 rounded-t-md relative group hover:bg-blue-600 transition-colors" style="height: 30%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">30%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Min</span>
                    </div>
                </div>
            </div>

            <!-- Grafik Bulanan (hidden secara default) -->
            <div id="monthly-chart" class="w-full h-full hidden">
                <div class="flex h-full items-end space-x-1 justify-center">
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">640</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 45%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">45%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Jan</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">520</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 35%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">35%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Feb</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">780</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 55%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">55%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Mar</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">840</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 60%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">60%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Apr</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">980</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 70%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">70%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Mei</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">920</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 65%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">65%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Jun</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">1.050</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 75%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">75%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Jul</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">1.184</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 85%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">85%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Agu</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">1.120</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 80%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">80%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Sep</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">882</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 62%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">62%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Okt</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">952</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 68%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">68%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Nov</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">1.260</div>
                        <div class="bg-green-500 w-8 rounded-t-md relative group hover:bg-green-600 transition-colors" style="height: 90%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">90%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">Des</span>
                    </div>
                </div>
            </div>

            <!-- Grafik Tahunan (hidden secara default) -->
            <div id="yearly-chart" class="w-full h-full hidden">
                <div class="flex h-full items-end space-x-6 mx-auto justify-center">
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">18.240</div>
                        <div class="bg-purple-500 w-16 rounded-t-md relative group hover:bg-purple-600 transition-colors" style="height: 60%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">60%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">2021</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">45.600</div>
                        <div class="bg-purple-500 w-16 rounded-t-md relative group hover:bg-purple-600 transition-colors" style="height: 75%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">75%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">2022</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">85.322</div>
                        <div class="bg-purple-500 w-16 rounded-t-md relative group hover:bg-purple-600 transition-colors" style="height: 85%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">85%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">2023</span>
                    </div>
                    <div class="flex flex-col items-center justify-end h-full">
                        <div class="text-xs font-medium text-gray-700 mb-1">124.568</div>
                        <div class="bg-purple-500 w-16 rounded-t-md relative group hover:bg-purple-600 transition-colors" style="height: 95%">
                            <span class="absolute inset-0 flex items-center justify-center text-white font-bold opacity-0 group-hover:opacity-100">95%</span>
                        </div>
                        <span class="text-xs mt-2 text-gray-600 font-medium">2024</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-600 bg-gray-100 px-4 py-2 rounded-lg">
                <p>Periode: <span class="font-medium" id="visit-period">Mingguan (15-21 Jul 2024)</span></p>
            </div>
            <div class="text-sm text-gray-600 bg-blue-50 px-4 py-2 rounded-lg">
                <p>Total: <span class="font-medium" id="visit-statistic">2.456</span> kunjungan</p>
            </div>
        </div>
    </div>

    <!-- Produk Terlaris Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Produk Terlaris</h2>
            <a href="#" class="text-sm text-blue-500 hover:text-blue-700">Lihat Semua Produk</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">
                        <th scope="col" class="px-6 py-4 w-2/5">PRODUK</th>
                        <th scope="col" class="px-6 py-4">KATEGORI</th>
                        <th scope="col" class="px-6 py-4">TERJUAL</th>
                        <th scope="col" class="px-6 py-4">PENDAPATAN</th>
                        <th scope="col" class="px-6 py-4">TREND</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden border border-gray-200">
                                    <img class="h-full w-full object-cover" src="{{ asset('images/produk/eco-enzyme.jpg') }}" alt="Eco Enzyme">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Eco Enzyme Premium</div>
                                    <div class="text-xs text-gray-500">SKU: ECO-001</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Enzim</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">168 unit</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Rp 8.400.000</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                12%
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden border border-gray-200">
                                    <img class="h-full w-full object-cover" src="{{ asset('images/produk/pupuk-cair.jpg') }}" alt="Pupuk Cair">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Pupuk Cair Organik</div>
                                    <div class="text-xs text-gray-500">SKU: PCO-002</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Pupuk</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">132 unit</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Rp 5.280.000</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                8%
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden border border-gray-200">
                                    <img class="h-full w-full object-cover" src="{{ asset('images/produk/sabun-cair.jpg') }}" alt="Sabun Cair">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Sabun Cair Eco Enzyme</div>
                                    <div class="text-xs text-gray-500">SKU: SCE-003</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Pembersih</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">95 unit</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Rp 2.850.000</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                </svg>
                                3%
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 rounded-full overflow-hidden border border-gray-200">
                                    <img class="h-full w-full object-cover" src="{{ asset('images/produk/kit-pembuatan.jpg') }}" alt="Kit Pembuatan">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">Starter Kit Pembuatan</div>
                                    <div class="text-xs text-gray-500">SKU: KIT-004</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Peralatan</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">76 unit</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">Rp 7.600.000</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                </svg>
                                15%
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Statistik Kunjungan Filter Script
        document.addEventListener('DOMContentLoaded', function() {
            const weeklyBtn = document.getElementById('weekly-btn');
            const monthlyBtn = document.getElementById('monthly-btn'); 
            const yearlyBtn = document.getElementById('yearly-btn');
            
            const weeklyChart = document.getElementById('weekly-chart');
            const monthlyChart = document.getElementById('monthly-chart');
            const yearlyChart = document.getElementById('yearly-chart');
            
            const visitStatistic = document.getElementById('visit-statistic');
            const visitPeriod = document.getElementById('visit-period');
            
            weeklyBtn.addEventListener('click', function() {
                // Update tombol aktif
                weeklyBtn.classList.add('bg-blue-600', 'text-white');
                weeklyBtn.classList.remove('bg-gray-200', 'hover:bg-gray-300');
                
                monthlyBtn.classList.remove('bg-blue-600', 'text-white');
                monthlyBtn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                
                yearlyBtn.classList.remove('bg-blue-600', 'text-white');
                yearlyBtn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                
                // Update tampilan chart
                weeklyChart.classList.remove('hidden');
                monthlyChart.classList.add('hidden');
                yearlyChart.classList.add('hidden');
                
                // Update teks statistik
                visitStatistic.textContent = '2.456';
                visitPeriod.textContent = 'Mingguan (15-21 Jul 2024)';
            });
            
            monthlyBtn.addEventListener('click', function() {
                // Update tombol aktif
                monthlyBtn.classList.add('bg-blue-600', 'text-white');
                monthlyBtn.classList.remove('bg-gray-200', 'hover:bg-gray-300');
                
                weeklyBtn.classList.remove('bg-blue-600', 'text-white');
                weeklyBtn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                
                yearlyBtn.classList.remove('bg-blue-600', 'text-white');
                yearlyBtn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                
                // Update tampilan chart
                weeklyChart.classList.add('hidden');
                monthlyChart.classList.remove('hidden');
                yearlyChart.classList.add('hidden');
                
                // Update teks statistik
                visitStatistic.textContent = '10.842';
                visitPeriod.textContent = 'Bulanan (Juli 2024)';
            });
            
            yearlyBtn.addEventListener('click', function() {
                // Update tombol aktif
                yearlyBtn.classList.add('bg-blue-600', 'text-white');
                yearlyBtn.classList.remove('bg-gray-200', 'hover:bg-gray-300');
                
                weeklyBtn.classList.remove('bg-blue-600', 'text-white');
                weeklyBtn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                
                monthlyBtn.classList.remove('bg-blue-600', 'text-white');
                monthlyBtn.classList.add('bg-gray-200', 'hover:bg-gray-300');
                
                // Update tampilan chart
                weeklyChart.classList.add('hidden');
                monthlyChart.classList.add('hidden');
                yearlyChart.classList.remove('hidden');
                
                // Update teks statistik
                visitStatistic.textContent = '124.568';
                visitPeriod.textContent = 'Tahunan (2024)';
            });
        });
    </script>
@endsection