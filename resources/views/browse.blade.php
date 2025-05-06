<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Temukan Bank Sampah dan Toko Eco Enzim di sekitar Anda - EcoZense" />
        <meta name="theme-color" content="#8DD363" />
        <title>Browse Toko - EcoZense</title>
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
        <main class="overflow-x-hidden"> <!-- Menghapus padding top agar background image penuh hingga ke belakang navbar -->
            <!-- Hero Section -->
            <section class="h-[60vh] flex items-center relative">
                <!-- Background image layer -->
                <div class="absolute inset-0 z-0 bg-cover bg-center" style="background-image: url('{{ asset('images/bg3.jpeg') }}')">
                    <!-- Overlay untuk memastikan teks tetap terbaca -->
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>
                <!-- Content -->
                <div class="container mx-auto px-6 md:px-8 relative z-20 py-16 md:py-20">
                    <div class="max-w-4xl mx-auto text-center">
                        <!-- Logo -->
                        <div class="flex justify-center mb-8">
                            <img src="{{ asset('images/Logo.png') }}" alt="EcoZense Logo" class="h-20 md:h-24 w-auto">
                        </div>
                        
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-fade-in">
                            Welcome to EcoZense
                        </h1>
                        <p class="text-xl text-green-100 animate-slide-up mb-8">
                            The Best Eco-Enzyme related website in the world
                        </p>
                        <!-- Search Bar -->
                        <div class="max-w-xl mx-auto mt-8 relative">
                            <div class="flex items-center bg-white rounded-full shadow-lg overflow-hidden border-2 border-green-100 hover:border-green-200 transition-all duration-300">
                                <input type="text" placeholder="Cari toko atau produk..." class="w-full px-6 py-3 text-gray-700 focus:outline-none text-lg">
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

            <!-- Filter Section -->
            <section class="bg-white border-b border-gray-200">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-between items-center py-4">
                        <!-- Category Dropdown -->
                        <div class="w-full md:w-auto mb-4 md:mb-0">
                            <div class="relative">
                                <button id="categoryDropdown" class="flex items-center justify-between w-full md:w-48 px-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none">
                                    <span id="currentCategory" class="text-gray-700">Toko Eco Enzim</span> <!-- Set default to 'Toko Eco Enzim' -->
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <div id="categoryMenu" class="hidden absolute left-0 mt-2 w-full md:w-48 bg-white shadow-lg rounded-md z-50">
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50" data-category="stores">Toko Eco Enzim</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50" data-category="products">Produk Eco Enzim</a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Tabs -->
                        <div class="w-full md:w-auto flex space-x-6">
                            <a href="#" class="text-gray-700 hover:text-green-600 border-b-2 border-transparent hover:border-green-600 px-1 py-2 font-medium">Terpopuler</a>
                            <a href="#" class="text-gray-700 hover:text-green-600 border-b-2 border-green-600 px-1 py-2 font-medium">Terbaru</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Toko Section -->
            <section id="storesSection" class="py-12 bg-gray-100">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Hasil Pencarian</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Bank Sampah Arshafin -->
                        <x-browse.card 
                            image="images/bg1.jpeg"
                            title="Bank Sampah Arshafin"
                            desc="Bank Sampah nomor 1 disekitar batam."
                            alamat="Perumahan Odessa, Blok C-15 No. 1"
                        />
                        
                        <!-- Bank Sampah Steven -->
                        <x-browse.card 
                            image="images/bg2.jpeg"
                            title="Bank Sampah Steven"
                            desc="Egestas elit dui scelerisque et eu purus aliquam vitae habitasse."
                            alamat="Lorem ipsum bla bla bla bla"
                        />
                        
                        <!-- Bank Sampah Arif -->
                        <x-browse.card 
                            image="images/bg3.jpeg"
                            title="Bank Sampah Arif"
                            desc="Bank Sampah Arif adalah yang paling unggul, tak tertandingi, dan tiada duanya di jagat Raya, Di Seluruh Alam Semesta!."
                            alamat="Terletak di pusat galaksi."
                        />
                        
                        <!-- Bank Sampah Thalita -->
                        <x-browse.card 
                            image="images/bg4.jpeg"
                            title="Bank Sampah Thalita"
                            desc="Egestas elit dui scelerisque et eu purus aliquam vitae habitasse."
                            alamat="Lorem ipsum bla bla bla bla"
                        />
                        
                        <!-- Bank Sampah Agnes -->
                        <x-browse.card 
                            image="images/bg5.jpeg"
                            title="Bank Sampah Agnes"
                            desc="Egestas elit dui scelerisque et eu purus aliquam vitae habitasse."
                            alamat="Lorem ipsum bla bla bla bla"
                        />
                        
                        <!-- Bank Sampah Faldy -->
                        <x-browse.card 
                            image="images/bg6.jpeg"
                            title="Bank Sampah Faldy"
                            desc="Egestas elit dui scelerisque et eu purus aliquam vitae habitasse."
                            alamat="Lorem ipsum bla bla bla bla"
                        />
                        
                        <!-- Bank Sampah 7 -->
                        <x-browse.card 
                            image="images/bg1.jpeg"
                            title="Bank Sampah 7"
                            desc="Egestas elit dui scelerisque et eu purus aliquam vitae habitasse."
                            alamat="Lorem ipsum bla bla bla bla"
                        />
                        
                        <!-- Bank Sampah 8 -->
                        <x-browse.card 
                            image="images/bg2.jpeg"
                            title="Bank Sampah 8"
                            desc="Egestas elit dui scelerisque et eu purus aliquam vitae habitasse."
                            alamat="Lorem ipsum bla bla bla bla"
                        />
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        <nav class="inline-flex rounded-md shadow-sm">
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-500 hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#" class="py-2 px-4 bg-green-600 border border-green-600 text-sm leading-5 font-medium text-white hover:bg-green-700">
                                1
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">
                                2
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">
                                3
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-500 hover:bg-gray-50">
                                Next
                            </a>
                        </nav>
                    </div>
                </div>
            </section>

            <!-- Products Section (Hidden by Default) -->
            <section id="productsSection" class="py-12 bg-gray-100 hidden">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold text-gray-800 mb-8">Hasil Pencarian</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                        <!-- Produk 1 -->
                        <x-browse.product-card 
                            image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQtCjhyUngEZ79Rdnw6T1ewkSyNsU_4GBTObQ&s"
                            title="Pupuk Cair Organik"
                            desc="Pupuk cair sangat bagus."
                            price="25.000"
                            status="Available"
                            bank="Arshafin"
                            likes="38"
                        />
                        
                        <!-- Produk 2 -->
                        <x-browse.product-card 
                            image="https://down-id.img.susercontent.com/file/id-11134207-7r98p-lr4bmvhw6e3ddf"
                            title="Sabun Cuci Piring"
                            desc="Sabun cuci piring hasil eco enzim"
                            price="15.000"
                            status="Available"
                            bank="Steven"
                            likes="24"
                        />
                        
                        <!-- Produk 3 -->
                        <x-browse.product-card 
                            image="https://id-live-01.slatic.net/p/eef84c8d6511d6da83ff7d9b70def2e3.jpg"
                            title="Deodoran Ruangan"
                            desc="Deodoran ruangan harum mmmmm.."
                            price="28.000"
                            status="Available"
                            bank="Arif"
                            likes="29"
                        />
                        
                        <!-- Produk 4 -->
                        <x-browse.product-card 
                            image="https://down-id.img.susercontent.com/file/id-11134207-7r98y-lvmrfvo22cy9e4"
                            title="Disinfektan"
                            desc="Disinfektan"
                            price="24.000"
                            status="Available"
                            bank="Thalita"
                            likes="32"
                        />
                        
                        <!-- Produk 5 -->
                        <x-browse.product-card 
                            image="https://down-id.img.susercontent.com/file/id-11134207-7r991-lswhx161pldlca"
                            title="Pestisida"
                            desc="Pestisida pembasmi hama"
                            price="30.000"
                            status="Available"
                            bank="Agnes"
                            likes="14"
                        />
                        
                        <!-- Produk 6 -->
                        <x-browse.product-card 
                            image="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/2/18/42ce5ef7-d502-489d-ba8c-794ae21b11aa.jpg"
                            title="Pembersih Serbaguna"
                            desc="Pembersih Serbaguna yang sangat bermanfaat."
                            price="18.000"
                            status="Available"
                            bank="Faldy"
                            likes="23"
                        />
                        
                        <!-- Produk 7 -->
                        <x-browse.product-card 
                            image="https://www.unesa.ac.id/images/foto-04-08-2023-08-08-24-5583.png"
                            title="Produk 7"
                            desc="Produk"
                            price="5.000"
                            status="Unavailable"
                            bank="Arshafin"
                            likes="10"
                        />
                        
                        <!-- Produk 8 -->
                        <x-browse.product-card 
                            image="https://filebroker-cdn.lazada.co.id/kf/Sa88de6e565304317b183c5fe9d53fe571.jpg"
                            title="Produk 8"
                            desc="Produk"
                            price="5.000"
                            status="Unavailable"
                            bank="Arshafin"
                            likes="10"
                        />

                        <!-- Produk 9 -->
                        <x-browse.product-card 
                            image="https://umsida.ac.id/wp-content/uploads/2021/03/WhatsApp-Image-2021-03-30-at-07.06.06.jpeg"
                            title="Produk 9"
                            desc="Produk"
                            price="5.000"
                            status="Unavailable"
                            bank="Arshafin"
                            likes="10"
                        />

                        <!-- Produk 10 -->
                        <x-browse.product-card 
                            image="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/5/26/a22d75c1-301a-465a-8ad3-7aa3e335563a.jpg"
                            title="Produk 10"
                            desc="Produk"
                            price="5.000"
                            status="Unavailable"
                            bank="Arshafin"
                            likes="10"
                        />
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center">
                        <nav class="inline-flex rounded-md shadow-sm">
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-500 hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#" class="py-2 px-4 bg-green-600 border border-green-600 text-sm leading-5 font-medium text-white hover:bg-green-700">
                                1
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">
                                2
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-700 hover:bg-gray-50">
                                3
                            </a>
                            <a href="#" class="py-2 px-4 bg-white border border-gray-300 text-sm leading-5 font-medium text-gray-500 hover:bg-gray-50">
                                Next
                            </a>
                        </nav>
                    </div>
                </div>
            </section>
            
            <!-- Newsletter Section -->
            <!-- <section class="py-16 bg-green-600">
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
            </section> -->
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