<!-- resources/views/components/navbar/browse.blade.php -->
<nav id="browse-navbar" class="py-3 fixed top-0 left-0 right-0 z-50 navbar-fixed shadow-md transition-all duration-300" style="background-image: url('<?php echo e(asset('images/Frame 2305.png')); ?>'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
        <!-- Logo - Left -->
        <a href="/" class="flex items-center flex-shrink-0" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-transparent p-2 rounded-md">
                <img src="<?php echo e(asset('images/Logo.png')); ?>" alt="EcoZense Logo" class="h-8 sm:h-10 w-auto">
            </div>
        </a>
        
        <!-- Navigation Links - Left of center -->
        <div class="hidden lg:flex space-x-4 xl:space-x-6 ml-4 xl:ml-8" data-aos="fade-down" data-aos-delay="200">
            <a 
                href="/" 
                class="text-white hover:text-green-200 transition-all duration-300 font-medium"
            >Beranda</a>
            <a 
                href="<?php echo e(route('browse.toko')); ?>" 
                class="text-white hover:text-green-200 transition-all duration-300 font-medium"
            >Toko</a>
            <a 
                href="/artikel" 
                class="text-white hover:text-green-200 transition-all duration-300 font-medium"
            >Artikel</a>
            <a 
                href="/events" 
                class="text-white hover:text-green-200 transition-all duration-300 font-medium"
            >Events</a>
            <a 
                href="/about" 
                class="text-white hover:text-green-200 transition-all duration-300 font-medium"
            >About Us</a>
        </div>

        <!-- Search Box - Center/Right -->
        <div class="hidden md:flex flex-grow max-w-md mx-auto">
            <div class="relative w-full">
                <div class="relative">
                    <button id="kategori-dropdown-button" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white px-2 py-1 text-sm rounded-l text-gray-500 flex items-center">
                        <span>Pilih</span>
                        <svg class="w-4 h-4 inline-block ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="kategori-dropdown" class="hidden absolute left-2 top-full mt-1 w-48 bg-white rounded-md shadow-lg z-10">
                        <div class="py-2 rounded-md bg-white">
                            <div class="px-4 py-2 font-semibold text-gray-800 border-b">Pilih Kategori</div>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900 transition-all duration-200">Panduan Pembuatan</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900 transition-all duration-200">Manfaat Sehari-Hari</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900 transition-all duration-200">Tips & Trik</a>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900 transition-all duration-200">Ide Produk</a>
                        </div>
                    </div>
                </div>
                <input 
                    type="text" 
                    placeholder="Search for more than 20,000 articles" 
                    class="w-full pl-20 pr-10 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
                >
                <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- User Actions - Right -->
        <div class="flex items-center space-x-4">
            <a href="#" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </a>
            
            <?php if(auth()->guard()->guest()): ?>
                <a href="<?php echo e(route('login')); ?>" class="text-white hover:text-green-200 font-medium">
                    Log in
                </a>
            <?php else: ?>
                <a href="#" class="w-8 h-8 rounded-full overflow-hidden">
                    <img src="https://ui-avatars.com/api/?name=<?php echo e(Auth::user()->name); ?>&background=2F855A&color=fff" alt="User Profile" class="w-full h-full object-cover">
                </a>
            <?php endif; ?>
        </div>

        <!-- Mobile Menu Button -->
        <button class="lg:hidden ml-2 text-white mobile-menu-button">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="lg:hidden mobile-menu hidden bg-green-900 bg-opacity-95">
        <div class="px-4 py-3 space-y-2">
            <!-- Mobile Search Box -->
            <div class="relative mb-4 mt-2">
                <button id="mobile-kategori-dropdown-button" class="mb-2 px-4 py-2 bg-white w-full text-left rounded-md text-gray-700 flex items-center justify-between">
                    <span>Pilih Kategori</span>
                    <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                
                <!-- Mobile Dropdown Menu -->
                <div id="mobile-kategori-dropdown" class="hidden mb-3 w-full bg-white rounded-md shadow-lg">
                    <div class="py-2 rounded-md bg-white">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900">Panduan Pembuatan</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900">Manfaat Sehari-Hari</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900">Tips & Trik</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-100 hover:text-green-900">Ide Produk</a>
                    </div>
                </div>
                
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search..." 
                        class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500"
                    >
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <a
                href="/"
                class="block text-white hover:text-green-200 py-2 transition-all duration-300"
                >Beranda</a
            >
            <a
                href="<?php echo e(route('browse.toko')); ?>"
                class="block text-white hover:text-green-200 py-2 transition-all duration-300"
                >Toko</a
            >
            <a
                href="/artikel"
                class="block text-white hover:text-green-200 py-2 transition-all duration-300"
                >Artikel</a
            >
            <a
                href="/events"
                class="block text-white hover:text-green-200 py-2 transition-all duration-300"
                >Events</a
            >
            <a
                href="/about"
                class="block text-white hover:text-green-200 py-2 transition-all duration-300"
                >About Us</a
            >
        </div>
    </div>
</nav>

<script>
    // Mobile menu toggle
    document.querySelector('.mobile-menu-button').addEventListener('click', function() {
        document.querySelector('.mobile-menu').classList.toggle('hidden');
    });
    
    // Dropdown kategori toggle (desktop)
    document.getElementById('kategori-dropdown-button').addEventListener('click', function() {
        document.getElementById('kategori-dropdown').classList.toggle('hidden');
    });
    
    // Hide dropdown when clicking outside (desktop)
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById('kategori-dropdown');
        const dropdownButton = document.getElementById('kategori-dropdown-button');
        
        if (!dropdown.contains(event.target) && !dropdownButton.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
    
    // Mobile dropdown kategori toggle
    document.getElementById('mobile-kategori-dropdown-button').addEventListener('click', function() {
        document.getElementById('mobile-kategori-dropdown').classList.toggle('hidden');
    });
</script> <?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/components/navbar/browse.blade.php ENDPATH**/ ?>