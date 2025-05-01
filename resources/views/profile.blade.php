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
                    <!-- Left Sidebar -->
                    <div class="w-full lg:w-1/4">
                        <div class="bg-green-50 rounded-lg shadow overflow-hidden border border-green-100">
                            <div class="p-6 flex flex-col items-center bg-white border-b border-green-100">
                                <div class="relative group">
                                    <div class="w-24 h-24 rounded-full bg-green-600 flex items-center justify-center text-white text-3xl font-bold shadow-md overflow-hidden">
                                        {{ substr(Auth::user()->nama, 0, 1) }}
                                    </div>
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-full flex items-center justify-center transition-all duration-300 cursor-pointer opacity-0 group-hover:opacity-100">
                                        <div class="text-white text-xs font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <span>Ubah Foto</span>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="text-xl font-bold mt-4">{{ Auth::user()->nama }}</h2>
                                <p class="text-gray-500 text-sm">Nasabah</p>
                                <div class="mt-1 text-green-600 hover:text-green-700 transition-colors">
                                    <a href="#" class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                        <span>Edit Profil</span>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <a href="#" class="block px-6 py-3 bg-white flex items-center transition-colors border-l-4 border-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span class="font-medium text-green-600">Profil</span>
                                </a>
                                <a href="#" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    <span class="font-medium group-hover:text-green-600">Notifikasi</span>
                                </a>
                                <a href="#" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="font-medium group-hover:text-green-600">Poin Saya</span>
                                </a>
                                <a href="#" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                    </svg>
                                    <span class="font-medium group-hover:text-green-600">Pesanan</span>
                                </a>
                                <a href="#" class="block px-6 py-3 hover:bg-white flex items-center transition-colors border-l-4 border-transparent hover:border-green-600 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500 group-hover:text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                    <span class="font-medium group-hover:text-green-600">Riwayat Transaksi</span>
                                </a>
                                <a href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                   class="block px-6 py-3 hover:bg-white flex items-center transition-colors text-red-500 border-l-4 border-transparent hover:border-red-500 group">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    <span class="font-medium group-hover:text-red-600">Log Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Area -->
                    <div class="w-full lg:w-3/4">
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
                            <div class="bg-green-600 px-6 py-4 flex justify-between items-center">
                                <h1 class="text-xl font-bold text-white">Informasi Profil</h1>
                                <a href="#" class="text-white hover:text-green-100 transition-colors flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                    Edit
                                </a>
                            </div>

                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-500">Nama Lengkap</h3>
                                        <p class="text-lg font-medium">{{ Auth::user()->nama }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-500">Nomor Telepon</h3>
                                        <p class="text-lg">{{ Auth::user()->no_hp }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-500">Email</h3>
                                        <p class="text-lg">{{ Auth::user()->email }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-500">Tanggal Lahir</h3>
                                        <p class="text-lg">{{ Auth::user()->tanggal_lahir ? date('d F Y', strtotime(Auth::user()->tanggal_lahir)) : 'Belum disetel' }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-500">Jenis Kelamin</h3>
                                        <p class="text-lg">{{ Auth::user()->jenis_kelamin == 'L' ? 'Laki-laki' : (Auth::user()->jenis_kelamin == 'P' ? 'Perempuan' : 'Belum disetel') }}</p>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-sm font-medium text-gray-500">Alamat</h3>
                                        <p class="text-lg">{{ Auth::user()->alamat ?: 'Belum disetel' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <!-- Points Card -->
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                <div class="bg-green-50 p-4 border-b border-green-100">
                                    <h3 class="font-semibold text-green-800">Poin Saya</h3>
                                </div>
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <p class="text-3xl font-bold text-green-600">0</p>
                                        <p class="text-sm text-gray-500 mt-1">Total poin</p>
                                    </div>
                                    <div class="bg-green-100 rounded-full p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="border-t border-gray-100 p-4">
                                    <a href="#" class="text-green-600 hover:text-green-800 text-sm font-medium flex items-center">
                                        Lihat riwayat poin
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            
                            <!-- Transactions Card -->
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                                <div class="bg-blue-50 p-4 border-b border-blue-100">
                                    <h3 class="font-semibold text-blue-800">Transaksi</h3>
                                </div>
                                <div class="p-6 flex items-center justify-between">
                                    <div>
                                        <p class="text-3xl font-bold text-blue-600">0</p>
                                        <p class="text-sm text-gray-500 mt-1">Total transaksi</p>
                                    </div>
                                    <div class="bg-blue-100 rounded-full p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="border-t border-gray-100 p-4">
                                    <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                        Lihat riwayat transaksi
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Recent Activities -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                            <div class="bg-purple-600 px-6 py-4">
                                <h2 class="text-xl font-bold text-white">Aktivitas Terbaru</h2>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center justify-center py-8">
                                    <div class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada aktivitas</h3>
                                        <p class="mt-1 text-gray-500">Aktivitas Anda akan muncul di sini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>



        <!-- Back to top button -->
        <button id="back-to-top" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>

        <script>
            // Preloader
            window.addEventListener('load', () => {
                const preloader = document.getElementById('preloader');
                setTimeout(() => {
                    preloader.classList.add('opacity-0');
                    setTimeout(() => {
                        preloader.style.display = 'none';
                    }, 300);
                }, 500);
            });

            // Back to top button
            const backToTopBtn = document.getElementById('back-to-top');
            
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.remove('opacity-0', 'invisible');
                    backToTopBtn.classList.add('opacity-100', 'visible');
                } else {
                    backToTopBtn.classList.add('opacity-0', 'invisible');
                    backToTopBtn.classList.remove('opacity-100', 'visible');
                }
            });
            
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>
    </body>
</html> 