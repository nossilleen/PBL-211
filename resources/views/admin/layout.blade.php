<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - EcoZense')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

        .admin-navbar {
            background-image: url('/images/Frame 2305.png');
            background-size: cover;
            background-position: center;
        }
        
        @media (min-width: 768px) {
            .admin-content {
                margin-left: 256px;
                transition: margin-left 0.3s ease;
                width: calc(100% - 256px); /* Adjust width to account for sidebar */
                max-width: 100%;
                float: right;
            }
            
            .admin-content.sidebar-collapsed {
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
            .admin-navbar {
                position: fixed;
                left: 256px;
                right: 0;
                width: auto;
                transition: left 0.3s ease;
            }

            .admin-navbar.sidebar-collapsed {
                left: 0;
            }
        }
        
        @media (max-width: 767px) {
            .admin-content {
                margin-left: 0;
                width: 100%;
            }
            
            #sidebar {
                top: 0;
                height: 100vh;
                z-index: 60;
            }

            .admin-navbar {
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
                    <img src="{{ asset('images/logo.png') }}" alt="EcoZense" class="w-full h-full object-contain">
                </div>
            </div>
            <h2 class="text-xl font-bold text-gray-800 mb-6">Dashboard</h2>
            <nav class="flex-grow">
                <ul class="space-y-4">
                    <li>
                        <a href="/admin" id="menu-beranda" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="/admin/artikel" id="menu-artikel" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                            Artikel & Event
                        </a>
                    </li>
                    <li>
                        <a href="/admin/pengajuan" id="menu-pengajuan" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            Pengajuan
                        </a>
                    </li>
                    <li>
                        <a href="/admin/user" id="menu-user" class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg transition-colors menu-item">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            Data User
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
    <nav class="admin-navbar text-white shadow-md fixed top-0 h-16 z-40">
        <div class="h-full flex items-center px-4">
            <div class="flex items-center">
                <!-- Hamburger menu - visible in all views -->
                <button id="sidebar-toggle" class="sidebar-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <span class="ml-4 text-xl font-semibold">Admin Dashboard</span>
            </div>
            
            <!-- Profile section -->
            <div class="flex items-center ml-auto">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <div class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-green-600">
                            <span class="text-sm font-semibold">
                                {{ Auth::check() && Auth::user()->nama ? substr(Auth::user()->nama, 0, 1) : '-' }}
                            </span>
                        </div>
                        <span class="text-white font-medium">{{ Auth::user()->nama }}</span>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50" style="display: none;">
                        <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kembali ke Homepage</a>
                        
                        <div class="border-t border-gray-100"></div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Wrapper -->
    <div class="min-h-screen flex">
        <!-- Main Content with proper padding and width -->
        <div class="admin-content p-4 md:p-8 transition-all duration-300 mt-16">
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
            const adminContent = document.querySelector('.admin-content');
            const adminNavbar = document.querySelector('.admin-navbar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const closeSidebarButton = document.getElementById('close-sidebar');
            
            // Function to check viewport width and set appropriate classes
            function checkViewport() {
                if (window.innerWidth < 768) {
                    // Mobile view
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('sidebar-collapsed');
                    adminContent.classList.remove('sidebar-collapsed');
                    adminNavbar.classList.remove('sidebar-collapsed');
                } else {
                    // Desktop view - initialize with sidebar shown
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.remove('sidebar-collapsed');
                }
            }
            
            // Initial check
            checkViewport();
            
            // Toggle sidebar visibility
            sidebarToggle.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    // Mobile behavior
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                } else {
                    // Desktop behavior
                    sidebar.classList.toggle('sidebar-collapsed');
                    adminContent.classList.toggle('sidebar-collapsed');
                    adminNavbar.classList.toggle('sidebar-collapsed');
                }
            });
            
            // Close sidebar on overlay click (mobile)
            sidebarOverlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });
            
            // Close sidebar with button (mobile)
            closeSidebarButton.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('hidden');
            });
            
            // Adjust layout on window resize
            window.addEventListener('resize', checkViewport);
            
            // Highlight active menu item
            const currentPath = window.location.pathname;
            const menuItems = document.querySelectorAll('.menu-item');

            menuItems.forEach(item => {
                const href = item.getAttribute('href');
                if (href === currentPath || (currentPath.startsWith(href) && href !== '/')) {
                    menuItems.forEach(i => i.classList.remove('bg-green-50', 'text-green-600', 'font-medium'));
                    item.classList.add('bg-green-50', 'text-green-600', 'font-medium');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>