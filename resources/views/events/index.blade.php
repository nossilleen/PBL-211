<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Event EcoZense - Temukan berbagai acara edukatif dan kolaboratif seputar eco enzim, daur ulang, dan lingkungan hijau." />
        <meta name="theme-color" content="#8DD363" />
        <title>Event - EcoZense</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 overflow-x-hidden">
        <!-- Preloader -->
        <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
        </div>

        <!-- Navbar -->
        <x-home.navbar />

        <!-- Main Content Wrapper -->
        <main class="overflow-x-hidden">
            <!-- Hero Section for Articles -->
            <section class="h-[60vh] flex items-center relative">
                <!-- Background image layer -->
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('images/bg1.jpeg') }}" class="w-full h-full object-cover" alt="Background">
                </div>
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-green-900/50 z-10"></div>
                
                <!-- Content -->
                <div class="container mx-auto px-6 md:px-8 relative z-20 py-16 md:py-20">
                    <div class="max-w-4xl mx-auto text-center">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">
                            Event & Kegiatan
                        </h1>
                        <p class="text-xl text-green-100 animate-slide-up mb-8">
                            Temukan berbagai acara edukatif dan kolaboratif seputar eco enzim, daur ulang, dan lingkungan hijau.
                        </p>
                        
                        <!-- Search Bar -->
                        <div class="max-w-xl mx-auto mt-8 relative">
                            <div class="flex items-center bg-white rounded-full shadow-lg overflow-hidden border-2 border-green-100 hover:border-green-200 transition-all duration-300">
                                <input type="text" placeholder="Cari event..." class="w-full px-6 py-3 text-gray-700 focus:outline-none text-lg">
                                <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 transition-all duration-300 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Category and Tabs Section -->
            <section class="bg-white border-b border-gray-200">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-between items-center py-4">
                        <!-- Category Dropdown -->
                        <div class="w-full md:w-auto mb-4 md:mb-0">
                            <div class="relative">
                                <button id="categoryDropdown" class="flex items-center justify-between w-full md:w-48 px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none">
                                    <span class="text-gray-700">Pilih Kategori</span>
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="categoryMenu" class="hidden absolute left-0 mt-2 w-full md:w-48 bg-white shadow-lg rounded-md z-50">
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Semua Kategori</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Terbaru</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Populer</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Event Mendatang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Toko Section -->
            <section id="storesSection" class="py-12 bg-gray-100">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Ragam Event</h2>
                    <div class="flex flex-wrap justify-center gap-4 mb-8">
  <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Workshop Eco Enzim</button>
  <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Pengumpulan Sampah</button>
  <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Pelatihan Olah Sampah</button>
  <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Bazar Produk Eco Enzim</button>
  <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-full text-sm font-medium transition duration-300">Seminar Lingkungan</button>
</div>




<div class="mt-8">
    <p class="text-2xl font-bold text-gray-500">Semua Event</p>
</div>



                    <!-- More Button -->
                    <div class="flex justify-end mb-6">
                        <button class="bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition-all duration-300">
                            More &gt;
                        </button>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Bank Sampah Arshafin -->
                        <x-events.card 
                            image="images/bg1.jpeg"
                            title="Seminar Edukasi Eco Enzim"
                            desc="Pelajari manfaat Eco Enzim dan cara penggunannya untuk menjaga lingkungan di sekitar masyarakat."
                        />

                        <!-- Bank Sampah Steven -->
                        <x-events.card 
                            image="images/bg2.jpeg"
                            title="Penanaman Pohon Eco Enzim"
                            desc="Tanam pohon dengan Eco Enzim untuk perbaiki kualitas tanah dan udara."
                        />

                        <!-- Bank Sampah Arif -->
                        <x-events.card 
                            image="images/bg3.jpeg"
                            title="Hidup Hijau Dengan Eco Enzim"
                            desc="Eco Enzim punya banyak manfaat, tidak hanya untuk limbah makanan! Temukan di Dialog Konservasi!"
                        />

                        <!-- Bank Sampah Thalita -->
                        <x-events.card 
                            image="images/bg4.jpeg"
                            title="Eco Enzim untuk Masa Depan yang Lebih Sehat"
                            desc="Ikuti seminar dan praktik pembuatan eco enzim bersama Dr. Joean Oon &amp; Lyu Ming."
                        />
                    </div>

                    
                    <div class="mt-8 mb-6">
  <p class="text-2xl font-bold text-gray-800">Event mendatang</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
  <!-- Event Card -->
  <div class="bg-green-100 rounded shadow p-4 flex flex-col justify-between">
    <div class="flex items-center space-x-4">
      <img src="images/bg1.jpeg"
           alt="Pameran Produk Eco Enzim"
           class="w-20 h-20 rounded object-cover border border-black bg-white" />
      <div>
        <p class="text-green-700 font-semibold text-sm">Pameran</p>
        <h3 class="text-base font-bold text-gray-800 leading-tight">Pameran Produk Eco Enzim</h3>
      </div>
    </div>
    <div class="grid grid-cols-3 text-center text-xs text-gray-700 mt-4">
      <div>
        <p class="font-semibold">25 Apr</p>
        <p class="text-[10px] text-gray-500">Date</p>
      </div>
      <div>
        <p class="font-semibold">17:00</p>
        <p class="text-[10px] text-gray-500">Time</p>
      </div>
      <div>
        <p class="font-semibold">Sekupang</p>
        <p class="text-[10px] text-gray-500">Location</p>
      </div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="text-green-700 text-sm font-medium hover:underline">See More ›</a>
    </div>
  </div>

  <!-- Ulangi card untuk setiap event -->
  <!-- Card 2 -->
  <div class="bg-green-100 rounded shadow p-4 flex flex-col justify-between">
    <div class="flex items-center space-x-4">
      <img src="images/bg2.jpeg"
           alt="Workshop Pembuatan Eco Enzim"
           class="w-20 h-20 rounded object-cover border border-black bg-white" />
      <div>
        <p class="text-green-700 font-semibold text-sm">Workshop</p>
        <h3 class="text-base font-bold text-gray-800 leading-tight">Workshop Pembuatan Eco Enzim</h3>
      </div>
    </div>
    <div class="grid grid-cols-3 text-center text-xs text-gray-700 mt-4">
      <div>
        <p class="font-semibold">26 Apr</p>
        <p class="text-[10px] text-gray-500">Date</p>
      </div>
      <div>
        <p class="font-semibold">14:00</p>
        <p class="text-[10px] text-gray-500">Time</p>
      </div>
      <div>
        <p class="font-semibold">Batu Aji</p>
        <p class="text-[10px] text-gray-500">Location</p>
      </div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="text-green-700 text-sm font-medium hover:underline">See More ›</a>
    </div>
  </div>

  <div class="bg-green-100 rounded shadow p-4 flex flex-col justify-between">
    <div class="flex items-center space-x-4">
      <img src="images/bg3.jpeg"
           alt="Seminar Manfaat Eco Enzim"
           class="w-20 h-20 rounded object-cover border border-black bg-white" />
      <div>
        <p class="text-green-700 font-semibold text-sm">Seminar</p>
        <h3 class="text-base font-bold text-gray-800 leading-tight">Seminar Manfaat Eco Enzim</h3>
      </div>
    </div>
    <div class="grid grid-cols-3 text-center text-xs text-gray-700 mt-4">
      <div>
        <p class="font-semibold">27 Apr</p>
        <p class="text-[10px] text-gray-500">Date</p>
      </div>
      <div>
        <p class="font-semibold">15:00</p>
        <p class="text-[10px] text-gray-500">Time</p>
      </div>
      <div>
        <p class="font-semibold">Batam Center</p>
        <p class="text-[10px] text-gray-500">Location</p>
      </div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="text-green-700 text-sm font-medium hover:underline">See More ›</a>
    </div>
  </div>

  <div class="bg-green-100 rounded shadow p-4 flex flex-col justify-between">
    <div class="flex items-center space-x-4">
      <img src="images/bg4.jpeg"
           alt="Webinar Eco Enzim dan Konservasi Lingkungan"
           class="w-20 h-20 rounded object-cover border border-black bg-white" />
      <div>
        <p class="text-green-700 font-semibold text-sm">Webinar</p>
        <h3 class="text-base font-bold text-gray-800 leading-tight">Webinar Eco Enzim dan Konservasi Lingkungan</h3>
      </div>
    </div>
    <div class="grid grid-cols-3 text-center text-xs text-gray-700 mt-4">
      <div>
        <p class="font-semibold">27 Apr</p>
        <p class="text-[10px] text-gray-500">Date</p>
      </div>
      <div>
        <p class="font-semibold">17:00</p>
        <p class="text-[10px] text-gray-500">Time</p>
      </div>
      <div>
        <p class="font-semibold">Batam Center</p>
        <p class="text-[10px] text-gray-500">Location</p>
      </div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="text-green-700 text-sm font-medium hover:underline">See More ›</a>
    </div>
  </div>

  <div class="bg-green-100 rounded shadow p-4 flex flex-col justify-between">
    <div class="flex items-center space-x-4">
      <img src="images/bg1.jpeg"
           alt="Pelatihan Pembuatan Sabun Eco Enzim Untuk Rumah Tangga"
           class="w-20 h-20 rounded object-cover border border-black bg-white" />
      <div>
        <p class="text-green-700 font-semibold text-sm">Pelatihan</p>
        <h3 class="text-base font-bold text-gray-800 leading-tight">Pelatihan Pembuatan Sabun Eco Enzim Untuk Rumah Tangga</h3>
      </div>
    </div>
    <div class="grid grid-cols-3 text-center text-xs text-gray-700 mt-4">
      <div>
        <p class="font-semibold">28 Apr</p>
        <p class="text-[10px] text-gray-500">Date</p>
      </div>
      <div>
        <p class="font-semibold">09:00</p>
        <p class="text-[10px] text-gray-500">Time</p>
      </div>
      <div>
        <p class="font-semibold">Tiban Center</p>
        <p class="text-[10px] text-gray-500">Location</p>
      </div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="text-green-700 text-sm font-medium hover:underline">See More ›</a>
    </div>
  </div>

  <div class="bg-green-100 rounded shadow p-4 flex flex-col justify-between">
    <div class="flex items-center space-x-4">
      <img src="images/bg2.jpeg"
           alt="Workshop Eco Enzim Untuk Perawatan Tanaman Hias"
           class="w-20 h-20 rounded object-cover border border-black bg-white" />
      <div>
        <p class="text-green-700 font-semibold text-sm">Workshop</p>
        <h3 class="text-base font-bold text-gray-800 leading-tight">Workshop Eco Enzim Untuk Perawatan Tanaman Hias</h3>
      </div>
    </div>
    <div class="grid grid-cols-3 text-center text-xs text-gray-700 mt-4">
      <div>
        <p class="font-semibold">28 Apr</p>
        <p class="text-[10px] text-gray-500">Date</p>
      </div>
      <div>
        <p class="font-semibold">09:00</p>
        <p class="text-[10px] text-gray-500">Time</p>
      </div>
      <div>
        <p class="font-semibold">Tiban Center</p>
        <p class="text-[10px] text-gray-500">Location</p>
      </div>
    </div>
    <div class="mt-3 text-center">
      <a href="#" class="text-green-700 text-sm font-medium hover:underline">See More ›</a>
    </div>
  </div>

</div>

<!-- Tombol More -->
<div class="text-center mt-6">
  <a href="#" class="text-blue-600 font-medium text-sm hover:underline">More ›</a>
</div>




            <!-- Newsletter Section -->
            <section class="py-16 bg-green-600">
                <div class="container mx-auto px-4">
                    <div class="max-w-3xl mx-auto text-center">
                        <h2 class="text-3xl font-bold text-white mb-4">ECOZENSE</h2>
                        <h3 class="text-2xl font-semibold text-white mb-6">Ready to get started?</h3>
                        <p class="text-green-100 mb-8">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        
                        <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 md:space-x-4">
                            <input type="email" placeholder="Email address" class="px-6 py-3 rounded-md focus:outline-none focus:ring-2 focus:ring-green-400">
                            <button class="px-6 py-3 bg-white text-green-700 font-medium rounded-md hover:bg-green-100 transition-colors">Subscribe</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <x-home.footer />

        <!-- Back to top button -->
        <button id="back-to-top" class="fixed bottom-6 right-6 bg-green-600 text-white w-12 h-12 rounded-full shadow-lg flex items-center justify-center opacity-0 invisible transition-all duration-300 z-50 hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
            </svg>
        </button>

        <script>
            // Preloader
            window.addEventListener('load', function() {
                document.getElementById('preloader').style.opacity = '0';
                setTimeout(function() {
                    document.getElementById('preloader').style.display = 'none';
                }, 500);
            });
            
            // Category dropdown
            const categoryDropdown = document.getElementById('categoryDropdown');
            const categoryMenu = document.getElementById('categoryMenu');
            const currentCategory = document.getElementById('currentCategory');
            const storesSection = document.getElementById('storesSection');
            const productsSection = document.getElementById('productsSection');
            const categoryLinks = document.querySelectorAll('#categoryMenu a');
            
            if (categoryDropdown && categoryMenu) {
                categoryDropdown.addEventListener('click', function() {
                    categoryMenu.classList.toggle('hidden');
                });
                
                // Toggle between views based on category selection
                categoryLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        
                        // Update dropdown text
                        currentCategory.textContent = this.textContent;
                        
                        // Hide category menu
                        categoryMenu.classList.add('hidden');
                        
                        // Get selected category
                        const category = this.getAttribute('data-category');
                        
                        // Show/hide sections based on selection
                        if (category === 'products') {
                            storesSection.classList.add('hidden');
                            productsSection.classList.remove('hidden');
                        } else if (category === 'stores') {
                            storesSection.classList.remove('hidden');
                            productsSection.classList.add('hidden');
                        } else {
                            // 'all' or default
                            storesSection.classList.remove('hidden');
                            productsSection.classList.add('hidden');
                        }
                    });
                });
                
                // Close the dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!categoryDropdown.contains(event.target)) {
                        categoryMenu.classList.add('hidden');
                    }
                });
            }
            
            // Back to top button
            const backToTopButton = document.getElementById('back-to-top');
            
            if (backToTopButton) {
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTopButton.classList.remove('opacity-0', 'invisible');
                        backToTopButton.classList.add('opacity-100', 'visible');
                    } else {
                        backToTopButton.classList.remove('opacity-100', 'visible');
                        backToTopButton.classList.add('opacity-0', 'invisible');
                    }
                });
                
                backToTopButton.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        </script>
    </body>
</html>
