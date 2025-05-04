<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Pengelola - EcoZense')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Sidebar toggle button */
        .sidebar-toggle {
            position: fixed;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            background-color: #10B981;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 0 5px 5px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 45;
            cursor: pointer;
            box-shadow: 2px 0 5px rgba(0,0,0,0.2);
        }
        
        @media (min-width: 768px) {
            .pengelola-content {
                margin-left: 256px; /* 64px * 4 (w-64) */
                transition: margin-left 0.3s ease;
            }
            
            .pengelola-content.sidebar-collapsed {
                margin-left: 0;
            }
            
            #sidebar.collapsed {
                transform: translateX(-100%);
            }
        }
        
        @media (max-width: 767px) {
            .pengelola-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 min-h-screen">
    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
        <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
    </div>
    
    <!-- Top Navbar -->
    <div class="bg-green-600 text-white shadow-md">
        <div class="container mx-auto px-9">
            <div class="flex justify-between items-center py-6">
                <div class="flex items-center space-x-4">
                </div>
            </div>
        </div>
    </div>
    
    <!-- Include the navbar component -->
    @include('components.home.navbar')
    
    <!-- Sidebar toggle button -->
    <div class="sidebar-toggle" id="sidebar-toggle" style="top: 75px;">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </div>

    <div class="flex min-h-screen pt-16">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-white shadow-md h-screen z-40 overflow-y-auto fixed transform transition-transform duration-300 md:translate-x-0 -translate-x-full">
            <div class="p-6 flex flex-col h-full">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Dashboard</h2>
                <nav class="flex-grow">
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
                            <a href="#" id="menu-toko" data-route="pengelola.toko" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Toko
                            </a>
                        </li>
                        <li>
                            <a href="#" id="menu-poin" data-route="pengelola.poin" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
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
        <div id="sidebar-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden md:hidden"></div>

        <!-- Main Content -->
        <div class="pengelola-content flex-1 p-4 md:p-8 w-full transition-all duration-300">
            @yield('content')
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

        // Sidebar toggle
        document.addEventListener('DOMContentLoaded', () => {
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const pengelolaContent = document.querySelector('.pengelola-content');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const closeSidebarButton = document.getElementById('close-sidebar');
            
            // Function to check viewport width and set appropriate classes
            function checkViewport() {
                if (window.innerWidth < 768) {
                    // Mobile view
                    sidebar.classList.add('-translate-x-full');
                    pengelolaContent.classList.remove('sidebar-collapsed');
                } else {
                    // Desktop view - initialize with sidebar shown
                    sidebar.classList.remove('-translate-x-full');
                }
            }
            
            // Initial check
            checkViewport();
            
            // Toggle sidebar
            sidebarToggle.addEventListener('click', () => {
                if (window.innerWidth >= 768) {
                    // Desktop behavior
                    sidebar.classList.toggle('collapsed');
                    pengelolaContent.classList.toggle('sidebar-collapsed');
                } else {
                    // Mobile behavior
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                    document.body.classList.toggle('overflow-hidden');
                }
            });
            
            // Close sidebar with close button (mobile)
            if (closeSidebarButton) {
                closeSidebarButton.addEventListener('click', () => {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                });
            }
            
            // Close sidebar when overlay is clicked
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', () => {
                    sidebar.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                });
            }
            
            // Close sidebar when menu item is clicked on mobile
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', () => {
                    if (window.innerWidth < 768) {
                        sidebar.classList.add('-translate-x-full');
                        sidebarOverlay.classList.add('hidden');
                        document.body.classList.remove('overflow-hidden');
                    }
                });
            });

            // Active menu highlight with improved route matching
            const currentPath = window.location.pathname;
            
            // Determine current route based on path
            let currentRoute = '';
            if (currentPath === '/pengelola') {
                currentRoute = 'pengelola.index';
            } else if (currentPath === '/pengelola/alamat') {
                currentRoute = 'pengelola.alamat';
            } else if (currentPath.startsWith('/pengelola/toko')) {
                currentRoute = 'pengelola.toko';
            } else if (currentPath.startsWith('/pengelola/poin')) {
                currentRoute = 'pengelola.poin';
            }
            
            // Highlight the appropriate menu item
            menuItems.forEach(item => {
                const itemRoute = item.getAttribute('data-route');
                
                // If this menu item has a route that matches the current route
                if (itemRoute && itemRoute === currentRoute) {
                    item.classList.remove('text-gray-700', 'hover:bg-gray-50');
                    item.classList.add('bg-green-50', 'text-green-700', 'font-medium');
                }
                
                // For items without data-route, fall back to path-based matching
                if (!itemRoute) {
                    const href = item.getAttribute('href');
                    if (href === '#' || href.startsWith('javascript')) return;
                    
                    let itemPath;
                    // Extract path from href for comparison
                    if (href.includes('http')) {
                        try {
                            const url = new URL(href);
                            itemPath = url.pathname;
                        } catch (e) {
                            itemPath = href;
                        }
                    } else {
                        itemPath = href.split('?')[0];
                    }
                    
                    const isActive = 
                        currentPath === itemPath || 
                        (itemPath !== '/' && currentPath.startsWith(itemPath));
                        
                    if (isActive) {
                        item.classList.remove('text-gray-700', 'hover:bg-gray-50');
                        item.classList.add('bg-green-50', 'text-green-700', 'font-medium');
                    }
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', checkViewport);
        });
    </script>

    @yield('scripts')
</body>
</html> 