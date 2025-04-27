<!-- resources/views/components/navbar/artikel.blade.php -->
<nav id="artikel-navbar" class="py-3 fixed top-0 left-0 right-0 z-50 navbar-fixed bg-gradient-to-r from-green-900 to-green-700 shadow-md transition-all duration-300">
    <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
        <!-- Logo - Left -->
        <a href="/" class="flex items-center flex-shrink-0" data-aos="fade-right" data-aos-delay="100">
            <div class="bg-transparent p-2 rounded-md">
                <img src="<?php echo e(asset('images/Logo.png')); ?>" alt="EcoZense Logo" class="h-10 w-auto">
            </div>
        </a>
        
        <!-- Navigation Links - Right of Logo -->
        <div class="hidden md:flex space-x-6 ml-8" data-aos="fade-down" data-aos-delay="200">
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

        <!-- Spacer to push user actions to right -->
        <div class="flex-grow"></div>

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
        <button class="md:hidden ml-2 text-white mobile-menu-button">
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
    <div class="md:hidden mobile-menu hidden bg-green-800 bg-opacity-95">
        <div class="px-4 py-3 space-y-2">
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
</script> <?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/components/navbar/artikel.blade.php ENDPATH**/ ?>