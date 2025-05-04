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
            <a href="{{ route('admin.artikel') }}" class="flex items-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition">
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
@endsection 