<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="Detail Produk Eco Enzim - EcoZense" />
        <meta name="theme-color" content="#8DD363" />
        <title>Detail Produk - EcoZense</title>
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
        <main class="overflow-x-hidden pt-20">
            <!-- Product Detail Section -->
            <section class="py-8 bg-white">
                <div class="container mx-auto px-4">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <div class="flex flex-col md:flex-row gap-8">
                            <!-- Product Image -->
                            <div class="w-full md:w-1/3">
                                <div class="bg-white rounded-lg overflow-hidden">
                                    <img id="mainImage" src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/2/18/42ce5ef7-d502-489d-ba8c-794ae21b11aa.jpg" alt="Pupuk Organik Cair" class="w-full h-auto object-cover">
                                </div>
                            </div>
                            
                            <!-- Product Details -->
                            <div class="w-full md:w-2/3">
                                <div class="flex items-center justify-between">
                                    <h1 class="text-3xl font-bold text-gray-800">Pupuk Organik Cair</h1>
                                    
                                    <!-- Share and Like Buttons -->
                                    <div class="flex items-center">
                                        <!-- Share Button -->
                                        <div class="ml-4">
                                            <button class="flex items-center text-gray-500 hover:text-green-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Like Button -->
                                        <div class="ml-2">
                                            <button class="flex items-center text-gray-500 hover:text-red-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="text-3xl font-bold text-yellow-500 mb-6">Rp50.000</div>
                                
                                <!-- Product Info -->
                                <div class="space-y-3 mb-6">
                                    <div class="flex">
                                        <span class="w-40 text-gray-600">Status Ketersediaan</span>
                                        <span class="text-green-600 font-medium">Available</span>
                                    </div>
                                    
                                    <div class="flex">
                                        <span class="w-40 text-gray-600">Bank Sampah</span>
                                        <span class="text-gray-800">Thalita</span>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-8">
                                    <button class="w-full md:w-auto px-8 py-3 bg-green-600 text-white font-medium rounded-md hover:bg-green-700 transition-colors font-['Lexend_Deca',_sans-serif]" onclick="document.getElementById('popup-beli').classList.remove('hidden')">
                                        Beli Sekarang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Product Tabs Section -->
            <section class="py-8 bg-gray-100">
                <div class="container mx-auto px-4">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <!-- Tabs -->
                        <div class="border-b border-gray-200 mb-6">
                            <div class="flex space-x-8">
                                <button id="tab-deskripsi" class="text-green-600 border-b-2 border-green-600 pb-4 font-medium focus:outline-none" onclick="changeTab('deskripsi')">Deskripsi</button>
                            </div>
                        </div>
                        
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <!-- Description Tab -->
                            <div id="content-deskripsi" class="text-gray-700 leading-relaxed space-y-4">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Deskripsi</h3>
                                <p>
                                    Pupuk Organik Cair ini terbuat dari hasil fermentasi limbah organik dengan metode eco enzyme. 
                                    Sangat baik untuk menyuburkan tanaman dan meningkatkan hasil panen.
                                </p>
                                <p>
                                    Pupuk ini ramah lingkungan, bebas bahan kimia berbahaya, dan dapat digunakan untuk berbagai jenis tanaman. 
                                    Mengandung nutrisi lengkap yang dibutuhkan tanaman untuk pertumbuhan yang optimal.
                                </p>
                                <p>
                                    Cara penggunaan: Encerkan 1 bagian pupuk dengan 10 bagian air, kemudian siramkan ke tanah di sekitar tanaman. 
                                    Aplikasikan 1-2 kali seminggu untuk hasil terbaik.
                                </p>
                                <p>
                                    Satu botol (1 liter) dapat digunakan hingga 10 kali pengenceran, tergantung luas area tanaman.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Related Products Section -->
            <section class="py-8 bg-gray-100">
                <div class="container mx-auto px-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Serupa</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Produk 1 -->
                        <x-browse.product-card 
                            image="https://www.unesa.ac.id/images/foto-04-08-2023-08-08-24-5583.png"
                            title="Pupuk Cair Organik"
                            desc="Pupuk cair sangat bagus."
                            price="25.000"
                            status="Available"
                            bank="Arshafin"
                            likes="38"
                        />
                        
                        <!-- Produk 2 -->
                        <x-browse.product-card 
                            image="https://filebroker-cdn.lazada.co.id/kf/Sa88de6e565304317b183c5fe9d53fe571.jpg"
                            title="Sabun Cuci Piring"
                            desc="Sabun cuci piring hasil eco enzim"
                            price="15.000"
                            status="Available"
                            bank="Steven"
                            likes="24"
                        />
                        
                        <!-- Produk 3 -->
                        <x-browse.product-card 
                            image="https://umsida.ac.id/wp-content/uploads/2021/03/WhatsApp-Image-2021-03-30-at-07.06.06.jpeg"
                            title="Deodoran Ruangan"
                            desc="Deodoran ruangan harum mmmmm.."
                            price="28.000"
                            status="Available"
                            bank="Arif"
                            likes="29"
                        />
                        
                        <!-- Produk 4 -->
                        <x-browse.product-card 
                            image="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/5/26/a22d75c1-301a-465a-8ad3-7aa3e335563a.jpg"
                            title="Disinfektan"
                            desc="Disinfektan"
                            price="24.000"
                            status="Available"
                            bank="Thalita"
                            likes="32"
                        />
                    </div>
                </div>
            </section>
        </main>
        
        <!-- Footer -->
        <x-home.footer />
        
        <!-- Scripts for Preloader -->
        <script>
            window.addEventListener('load', function() {
                const preloader = document.getElementById('preloader');
                setTimeout(function() {
                    preloader.classList.add('opacity-0');
                    setTimeout(function() {
                        preloader.style.display = 'none';
                    }, 500);
                }, 800);
            });
            
            // Tab functionality
            function changeTab(tabName) {
                // Hide all content
                document.getElementById('content-deskripsi').classList.add('hidden');
                
                // Reset all tabs
                document.getElementById('tab-deskripsi').classList.remove('text-green-600', 'border-b-2', 'border-green-600');
                document.getElementById('tab-deskripsi').classList.add('text-gray-500');
                
                // Activate selected tab
                document.getElementById('content-' + tabName).classList.remove('hidden');
                document.getElementById('tab-' + tabName).classList.remove('text-gray-500');
                document.getElementById('tab-' + tabName).classList.add('text-green-600', 'border-b-2', 'border-green-600');
            }
        </script>

        <!-- Modal Pop Up -->
        <div id="popup-beli" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40 hidden font-['Lexend_Deca',_sans-serif]">
            <div class="bg-white rounded-xl shadow-2xl max-w-md w-full p-8 relative animate-fade-in">
                <!-- Tombol Close -->
                <button
                    class="absolute top-3 right-3 text-gray-400 hover:text-green-700 text-2xl font-bold"
                    onclick="document.getElementById('popup-beli').classList.add('hidden')"
                    aria-label="Tutup"
                >&times;</button>
                <h2 class="text-2xl font-bold text-green-700 mb-4 text-center">Konfirmasi Pembelian</h2>
                <div class="mb-4">
                    <div class="text-gray-700 font-semibold mb-1">Rekening Penjual</div>
                    <div class="bg-gray-100 rounded px-4 py-2 text-gray-800 text-sm select-all">BCA 1234567890 a.n. EcoZense</div>
                </div>
                <div class="mb-4 flex items-center justify-between">
                    <span class="font-semibold text-gray-700">Jumlah</span>
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="changeQty(-1)" class="w-8 h-8 rounded bg-gray-200 hover:bg-gray-300 text-xl font-bold flex items-center justify-center">-</button>
                        <span id="qty" class="w-8 text-center font-semibold">1</span>
                        <button type="button" onclick="changeQty(1)" class="w-8 h-8 rounded bg-gray-200 hover:bg-gray-300 text-xl font-bold flex items-center justify-center">+</button>
                    </div>
                </div>
                <div class="mb-6 flex items-center justify-between">
                    <span class="font-semibold text-gray-700">Total Harga</span>
                    <span id="total-harga" class="text-green-700 font-bold text-lg">Rp50.000</span>
                </div>
                <div class="flex flex-col gap-3">
                    <button class="bg-green-600 text-white py-2 rounded-md font-semibold hover:bg-green-700 transition">Bayar Sekarang</button>
                    <button class="bg-gray-200 text-gray-700 py-2 rounded-md font-semibold hover:bg-gray-300 transition" onclick="document.getElementById('popup-beli').classList.add('hidden')">Batal</button>
                </div>
            </div>
        </div>
        <script>
            // Harga satuan produk (ganti sesuai harga produk)
            const hargaSatuan = 50000;
            let qty = 1;

            function changeQty(val) {
                qty += val;
                if (qty < 1) qty = 1;
                document.getElementById('qty').innerText = qty;
                document.getElementById('total-harga').innerText = 'Rp' + (qty * hargaSatuan).toLocaleString('id-ID');
            }
        </script>
    </body>
</html> 