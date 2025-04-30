<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - EcoZense')</title>
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
            .admin-content {
                margin-left: 256px; /* 64px * 4 (w-64) */
                transition: margin-left 0.3s ease;
            }
            
            .admin-content.sidebar-collapsed {
                margin-left: 0;
            }
            
            #sidebar.collapsed {
                transform: translateX(-100%);
            }
        }
        
        @media (max-width: 767px) {
            .admin-content {
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
        <div class="bg-green-500 text-white shadow-md">
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
        <div class="admin-content flex-1 p-4 md:p-8 w-full transition-all duration-300">
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
            const adminContent = document.querySelector('.admin-content');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const closeSidebarButton = document.getElementById('close-sidebar');
            
            // Function to check viewport width and set appropriate classes
            function checkViewport() {
                if (window.innerWidth < 768) {
                    // Mobile view
                    sidebar.classList.add('-translate-x-full');
                    adminContent.classList.remove('sidebar-collapsed');
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
                    adminContent.classList.toggle('sidebar-collapsed');
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

            // Active menu highlight
            const currentPath = window.location.pathname;
            menuItems.forEach(item => {
                const href = item.getAttribute('href');
                if (currentPath.includes(href)) {
                    item.classList.remove('text-gray-700', 'hover:bg-gray-50');
                    item.classList.add('bg-green-50', 'text-green-700');
                }
            });
            
            // Handle window resize
            window.addEventListener('resize', checkViewport);
        });
    </script>

    @yield('scripts')
</body>
</html> 