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
                    <div class="container mx-auto py-8 px-4">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <!-- Sidebar (Kiri) -->
                            <div class="w-full lg:w-1/4">
                                <x-sidebar.container />
                            </div>

        <!-- Main Content (Kanan) -->
        <div id="main-content" class="w-full lg:w-3/4">
            <!-- Profile Section (Default Visible only for nasabah) -->
            <div id="profile-section" class="{{ isset($showDashboard) && $showDashboard ? 'hidden' : '' }}">
                <x-profile.information />
            </div>
            
            <!-- Dashboard Section (Hidden by Default for nasabah, visible for admin and pengelola) -->
            <div id="dashboard-section" class="{{ isset($showDashboard) && $showDashboard ? '' : 'hidden' }}">
                <x-dashboard.container />
            </div>

            <!-- Notifikasi Section (Hidden by Default) -->
            <div id="notifikasi-section" class="hidden">
                <x-profile.notifikasi :notifications="$notifications" />
            </div>

            <!-- Poin saya Section (Hidden by Default) -->
            <div id="poin-saya-section" class="hidden">
                <x-profile.poin-saya />
            </div>

            <!-- Pesanan Section (Hidden by Default) -->
            <div id="pesanan-section" class="hidden">
                @include('components.profile.pesanan', ['pesananAktif' => $pesananAktif])
            </div>

            <!-- Riwayat Transaksi Section (Hidden by Default) -->
            <div id="riwayat-section" class="hidden">
                <x-profile.riwayat-transaksi :riwayatTransaksi="$riwayatTransaksi" />
            </div>

            <!-- Edit Profile Section (Hidden by Default) -->
            <div id="edit-profile-section" class="hidden">
                <x-profile.edit-profile />
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('[id^="nav-"]');
        const sections = document.querySelectorAll('[id$="-section"]');
        const userRole = "{{ Auth::user()->role }}";
        
        function resetAllNavLinks() {
            navLinks.forEach(link => {
                link.classList.remove('bg-white', 'border-green-600');
                link.classList.add('border-transparent', 'hover:border-green-600');
            });
        }

        function hideAllSections() {
            sections.forEach(section => {
                section.classList.add('hidden');
            });
        }

        // Fungsi untuk menampilkan section tertentu
        function showSection(sectionId) {
            hideAllSections();
            resetAllNavLinks();
            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.remove('hidden');
            }
            const navId = sectionId.replace('-section', '');
            const navLink = document.getElementById('nav-' + navId);
            if (navLink) {
                navLink.classList.add('bg-white', 'border-green-600');
                navLink.classList.remove('border-transparent', 'hover:border-green-600');
            }
        }
        window.showSection = showSection;

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const targetSectionId = this.id.replace('nav-', '') + '-section';
                
                showSection(targetSectionId);
                
                // Update the URL hash (without triggering hashchange)
                const hash = this.getAttribute('href');
                if (hash && hash !== '#') {
                    window.history.pushState(null, '', hash);
                }
            });
        });
        
        // Fungsi untuk toggle section berdasarkan hash
        function toggleSectionByHash() {
            const hash = window.location.hash;
            
            if (hash === '#dashboard') {
                showSection('dashboard-section');
            } else if (hash === '#notifikasi') {
                showSection('notifikasi-section');
            } else if (hash === '#poin-saya') {
                showSection('poin-saya-section');
            } else if (hash === '#pesanan') {
                showSection('pesanan-section');
            } else if (hash === '#riwayat') {
                showSection('riwayat-section');
            } else {
                // Default to profile for nasabah
                if (userRole === 'nasabah') {
                    showSection('profile-section');
                    // Make sure the profile nav link is active
                    const profileNav = document.getElementById('nav-profile');
                    if (profileNav) {
                        profileNav.classList.add('bg-white', 'border-green-600');
                        profileNav.classList.remove('border-transparent', 'hover:border-green-600');
                    }
                } else {
                    // For admin/pengelola, default to dashboard
                    showSection('dashboard-section');
                }
            }
        }
        
        // Initial section toggle based on hash or default to profile
        toggleSectionByHash();
        
        // Toggle section when hash changes
        window.addEventListener('hashchange', toggleSectionByHash);

        // Handle active section from redirect
        const activeSection = '{{ session("activeSection") }}';
        if (activeSection) {
            // Hide all sections first
            document.querySelectorAll('[id$="-section"]').forEach(section => {
                section.classList.add('hidden');
            });
            
            // Show the active section
            const targetSection = document.getElementById(activeSection + '-section');
            if (targetSection) {
                targetSection.classList.remove('hidden');
            }
            
            // Update sidebar active state
            const sidebarLinks = document.querySelectorAll('.sidebar-link');
            sidebarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('data-section') === activeSection) {
                    link.classList.add('active');
                }
            });
        }
    });
    
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
    });
</script>

<!-- Portal modal yang benar-benar baru -->
<div id="uploadModalPortal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center" style="z-index: 9999;">
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
    
    <!-- Script untuk modal upload bukti transfer -->
    <script>
        // Inisialisasi script modal
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Modal script loaded');
            
            // Fungsi untuk menangani tombol close
            var closeBtn = document.getElementById('closeUploadModalBtn');
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    console.log('Close button clicked');
                    hideModal();
                });
            } else {
                console.error('Close button not found');
            }
            
            // Fungsi untuk menangani tombol cancel
            var cancelBtn = document.getElementById('cancelUploadBtn');
            if (cancelBtn) {
                cancelBtn.addEventListener('click', function() {
                    console.log('Cancel button clicked');
                    hideModal();
                });
            } else {
                console.error('Cancel button not found');
            }
            
            // Fungsi untuk menangani preview file
            var fileUpload = document.getElementById('file-upload-new');
            if (fileUpload) {
                fileUpload.addEventListener('change', function(e) {
                    console.log('File selected');
                    var fileName = e.target.files[0]?.name;
                    if (fileName) {
                        document.getElementById('file-name-new').textContent = fileName;
                        document.getElementById('file-preview-new').classList.remove('hidden');
                    }
                });
            } else {
                console.error('File upload input not found');
            }
            
            // Fungsi untuk menangani tombol remove file
            var removeBtn = document.getElementById('removeFileBtn');
            if (removeBtn) {
                removeBtn.addEventListener('click', function() {
                    console.log('Remove file button clicked');
                    var fileUpload = document.getElementById('file-upload-new');
                    if (fileUpload) fileUpload.value = '';
                    var filePreview = document.getElementById('file-preview-new');
                    if (filePreview) filePreview.classList.add('hidden');
                });
            } else {
                console.error('Remove file button not found');
            }
            
            // Override fungsi global openUploadModal
            window.openUploadModal = function(transaksiId) {
                console.log('Open upload modal with ID:', transaksiId);
                
                // Aktifkan tab Pesanan
                var pesananLink = document.getElementById('nav-pesanan');
                var pesananSection = document.getElementById('pesanan-section');
                
                if (pesananLink && pesananSection) {
                    // Hide all sections
                    var allSections = document.querySelectorAll('#profile-section, #dashboard-section, #pesanan-section, #riwayat-section');
                    allSections.forEach(function(section) {
                        section.classList.add('hidden');
                    });
                    
                    // Show pesanan section
                    pesananSection.classList.remove('hidden');
                    
                    // Reset all nav links
                    var allLinks = document.querySelectorAll('[id^="nav-"]');
                    allLinks.forEach(function(link) {
                        link.classList.remove('bg-white', 'border-green-600');
                        link.classList.add('border-transparent', 'hover:border-green-600');
                    });
                    
                    // Activate pesanan link
                    pesananLink.classList.add('bg-white', 'border-green-600');
                    pesananLink.classList.remove('border-transparent', 'hover:border-green-600');
                }
                
                // Set transaksi ID
                document.getElementById('transaksi_id_new').value = transaksiId;
                
                // Show modal
                var modal = document.getElementById('uploadModalPortal');
                if (modal) {
                    modal.classList.remove('hidden');
                    console.log('Modal should be visible now');
                } else {
                    console.error('Modal element not found');
                }
            };
            
            // Fungsi untuk menyembunyikan modal
            function hideModal() {
                var modal = document.getElementById('uploadModalPortal');
                if (modal) {
                    modal.classList.add('hidden');
                    console.log('Modal hidden');
                } else {
                    console.error('Modal element not found when hiding');
                }
            }
        });
    </script>
</html>