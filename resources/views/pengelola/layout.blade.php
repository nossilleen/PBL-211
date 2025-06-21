<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Pengelola - EcoZense')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @stack('styles')
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Sidebar toggle button */
        .sidebar-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        .pengelola-navbar {
            background-image: url('/images/Frame 2305.png');
            background-size: cover;
            background-position: center;
        }
        
        @media (min-width: 768px) {
            .pengelola-content {
                margin-left: 256px;
                transition: margin-left 0.3s ease;
                width: calc(100% - 256px); /* Adjust width to account for sidebar */
                max-width: 100%;
                float: right;
            }
            
            .pengelola-content.sidebar-collapsed {
                margin-left: 0;
                width: 100%;
            }
            
            #sidebar {
                top: 0;
                height: 100vh;
                z-index: 60;
                width: 256px;
                transition: transform 0.3s ease;
            }
            
            #sidebar.sidebar-collapsed {
                transform: translateX(-100%);
            }

            /* Navbar menyesuaikan dengan sidebar */
            .pengelola-navbar {
                position: fixed;
                left: 256px;
                right: 0;
                width: auto;
                transition: left 0.3s ease;
            }

            .pengelola-navbar.sidebar-collapsed {
                left: 0;
            }
        }
        
        @media (max-width: 767px) {
            .pengelola-content {
                margin-left: 0;
                width: 100%;
            }
            
            #sidebar {
                top: 0;
                height: 100vh;
                z-index: 60;
            }

            .pengelola-navbar {
                position: fixed;
                left: 0;
                right: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen overflow-x-hidden">
    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
        <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
    </div>

    <!-- Sidebar with adjusted positioning -->
    <div id="sidebar" class="w-64 bg-white shadow-md overflow-y-auto fixed transform transition-transform duration-300 md:translate-x-0 -translate-x-full">
        <div class="p-6 flex flex-col h-full">
            <!-- Fixed EcoZense Logo -->
            <div class="mb-6">
                <div class="w-24 h-24 mx-auto">
                    <img src="{{ asset('images/logo.jpg') }}" alt="EcoZense" class="w-full h-full object-contain">
                </div>
            </div>
            <h2 class="text-xl font-bold text-gray-800 mb-6">Dashboard</h2>
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('pengelola.index') }}" id="menu-beranda" data-route="pengelola.index" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengelola.alamat') }}" id="menu-alamat" data-route="pengelola.alamat" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Alamat
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengelola.toko') }}" id="menu-toko" data-route="pengelola.toko" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Toko
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengelola.riwayat') }}" id="menu-riwayat" data-route="pengelola.riwayat" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 17l4 4 4-4m0-5V3m-8 4v10a4 4 0 004 4h4" />
                            </svg>
                            Riwayat
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengelola.pesanan') }}" id="menu-pesanan" data-route="pengelola.pesanan" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Pesanan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pengelola.poin.index') }}" id="menu-poin" data-route="pengelola.poin.index" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Poin
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('sidebar-logout-form').submit();" 
                           class="flex items-center px-4 py-3 text-red-600 hover:text-red-800 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </a>
                        <form id="sidebar-logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- Close button for mobile -->
            <button id="close-sidebar" class="mt-6 md:hidden px-4 py-2 bg-gray-200 text-gray-700 rounded-lg flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Tutup Menu
            </button>
        </div>
    </div>

    <!-- Overlay for mobile sidebar -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden md:hidden"></div>

    <!-- Navbar dengan hamburger menu -->
    <nav class="pengelola-navbar text-white shadow-md fixed top-0 h-16 z-40">
        <div class="h-full flex items-center px-4">
            <div class="flex items-center">
                <!-- Hamburger menu - visible in all views -->
                <button id="sidebar-toggle" class="sidebar-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="ml-4 text-xl font-semibold">Pengelola Bank Sampah Dashboard </span>
            </div>
            
            <!-- Profile section -->
            <div class="flex items-center ml-auto">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-green-600">
                            <span class="text-sm font-semibold">{{ substr(Auth::user()->nama, 0, 1) }}</span>
                        </div>
                        <span class="text-white font-medium">{{ Auth::user()->nama }}</span>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                        <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kembali ke Homepage</a>
                        
                        <div class="border-t border-gray-100"></div>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div class="min-h-screen flex">
        <!-- Main Content with proper padding and width -->
        <div class="pengelola-content p-4 md:p-8 transition-all duration-300 mt-16">
            <div class="container mx-auto">
                @yield('content')
            </div>
        </div>
    </div>

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
        
        // Sidebar toggle and menu functionality
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const pengelolaContent = document.querySelector('.pengelola-content');
            const pengelolaNavbar = document.querySelector('.pengelola-navbar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const closeSidebarButton = document.getElementById('close-sidebar');
            
            // Function to check viewport width and set appropriate classes
            function checkViewport() {
                if (window.innerWidth < 768) {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('md:translate-x-0');
                } else {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('md:translate-x-0');
                }
            }

            // Highlight active menu item
            function highlightActiveMenu() {
                const currentRoute = '{{ Route::currentRouteName() }}';
                const menuItems = document.querySelectorAll('.menu-item');
                
                menuItems.forEach(item => {
                    const itemRoute = item.getAttribute('data-route');
                    if (itemRoute === currentRoute) {
                        item.classList.add('bg-green-50', 'text-green-600');
                        item.classList.remove('text-gray-700');
                    } else {
                        item.classList.remove('bg-green-50', 'text-green-600');
                        item.classList.add('text-gray-700');
                    }
                });
            }

            // Call highlight function on page load
            highlightActiveMenu();

            // Toggle sidebar
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('md:translate-x-0');
                pengelolaContent.classList.toggle('sidebar-collapsed');
                pengelolaNavbar.classList.toggle('sidebar-collapsed');
            });

            // Close sidebar on mobile
            closeSidebarButton.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });

            // Show overlay when sidebar is open on mobile
            sidebarToggle.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    sidebarOverlay.classList.toggle('hidden');
                }
            });

            // Close sidebar when clicking overlay
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });

            // Check viewport on load and resize
            window.addEventListener('resize', checkViewport);
            checkViewport();
        });
    </script>

    @stack('scripts')
</body>
</html>