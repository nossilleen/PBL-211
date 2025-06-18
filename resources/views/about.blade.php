<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
        <meta name="description" content="EcoZense - Tentang Kami" />
        <meta name="theme-color" content="#8DD363" />
        <title>Tentang Kami</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- AOS Library -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-image-fixed overflow-x-hidden">
        <!-- Preloader -->
        <div id="preloader" class="fixed inset-0 bg-green-50 z-[9999] flex items-center justify-center">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-green-600"></div>
        </div>

        <!-- Navbar -->
        <x-home.navbar />

        <!-- Main Content Wrapper -->
        <main class="overflow-hidden">
            <!-- Hero Section dengan Parallax Effect -->
            <section class="relative py-20 md:py-40 bg-gradient-to-b from-green-500 to-green-900">
                <div class="absolute inset-0 overflow-hidden opacity-20">
                    <img src="{{ asset('images/bg3.jpeg') }}" alt="Pattern" class="w-full h-full object-cover animate-slow-pulse">
                </div>
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center max-w-3xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
                        <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 md:mb-6 leading-tight">Tentang Kami - Tim PBL TRPL 211</h1>
                        <div class="w-24 h-1 bg-green-300 mx-auto mb-6 md:mb-8"></div>
                        <p class="text-lg md:text-xl text-green-100 mb-8 md:mb-10">Kami adalah sekelompok pengembang muda dari Program Studi Teknologi Rekayasa Perangkat Lunak yang tergabung dalam Tim PBL 211. Kami percaya bahwa teknologi dapat menjadi solusi nyata bagi permasalahan di sekitar kita.</p>
                        <a href="#misi-kami" class="inline-block text-white bg-green-600 hover:bg-green-700 py-2 px-6 md:py-3 md:px-8 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 font-medium text-sm md:text-base">
                            Pelajari Lebih Lanjut
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 inline-block ml-2 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Floating elements for decoration -->
                <div class="hidden md:block absolute left-10 top-1/3 w-16 h-16 bg-green-300 rounded-full opacity-20 animate-float"></div>
                <div class="hidden md:block absolute right-10 top-1/4 w-20 h-20 bg-green-300 rounded-full opacity-20 animate-float-slow"></div>
                <div class="hidden md:block absolute left-1/4 bottom-10 w-12 h-12 bg-green-300 rounded-full opacity-20 animate-float-reverse"></div>
            </section>

            <!-- Main Content Section - Improved with modern design -->
            <section id="misi-kami" class="py-12 md:py-20 bg-gray-50 relative">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-32 md:w-64 h-32 md:h-64 bg-green-100 rounded-full -mr-16 md:-mr-32 -mt-8 md:-mt-16 opacity-30"></div>
                <div class="absolute bottom-0 left-0 w-36 md:w-72 h-36 md:h-72 bg-green-200 rounded-full -ml-16 md:-ml-36 -mb-8 md:-mb-16 opacity-30"></div>
                
                <div class="container mx-auto px-4 relative z-10">
                    <div class="max-w-4xl mx-auto">
                        <div class="mb-12 md:mb-16 text-center" data-aos="fade-up">
                            <h2 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">Siapa Kami</h2>
                            <div class="w-16 md:w-24 h-1 bg-green-300 mx-auto mb-6 md:mb-8"></div>
                        </div>
                        
                        <div class="bg-white p-6 md:p-8 rounded-xl shadow-lg mb-10 md:mb-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="flex flex-col md:flex-row items-center">
                                <div class="md:w-1/3 mb-6 md:mb-0">
                                    <img src="{{ asset('images/logo.jpg') }}" alt="EcoZense Logo" class="w-36 h-36 md:w-48 md:h-48 object-contain mx-auto md:mx-0 rounded-lg p-4 bg-green-50 border-2 border-green-100">
                                </div>
                                <div class="md:w-2/3 md:pl-8">
                                    <h3 class="text-xl md:text-2xl font-semibold text-green-700 mb-3 md:mb-4 text-center md:text-left"> Tentang Tim Pengembang</h3>
                                    <p class="text-gray-600 mb-3 md:mb-4 text-sm md:text-base">
                                    Tim PBL 211 adalah sekelompok mahasiswa dari Program Studi Teknologi Rekayasa Perangkat Lunak yang berkolaborasi dalam pengembangan aplikasi EcoZense sebagai bagian dari pembelajaran berbasis proyek (Project-Based Learning).
                                    </p>
                                    <p class="text-gray-600 mb-3 md:mb-4 text-sm md:text-base">
                                    Terdiri dari enam orang dengan latar belakang dan minat yang beragam di bidang pengembangan perangkat lunak, kami menggabungkan keahlian dalam perancangan antarmuka, pemrograman web, manajemen proyek, dan pengujian sistem untuk menciptakan solusi digital yang fungsional dan berdampak nyata.
                                    </p>
                                    <p class="text-gray-600 text-sm md:text-base">
                                    Dengan semangat kolaborasi, inovasi, dan kepedulian terhadap lingkungan, kami merancang EcoZense untuk menjadi platform yang tidak hanya bermanfaat secara teknologi, tetapi juga mampu menjawab tantangan pengelolaan sampah organik di masyarakat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 mb-10 md:mb-16">
                            <div class="bg-white p-5 md:p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow border-t-4 border-green-600" data-aos="fade-up" data-aos-delay="100">
                                <div class="w-12 h-12 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg md:text-xl font-semibold text-green-800 mb-2 md:mb-3 text-center">Misi Kami</h3>
                                <p class="text-gray-600 text-center text-sm md:text-base">
                                    Mengedukasi dan memfasilitasi masyarakat dalam pengolahan sampah organik menjadi Eco Enzim untuk mewujudkan gaya hidup berkelanjutan.
                                </p>
                            </div>
                            <div class="bg-white p-5 md:p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow border-t-4 border-green-600" data-aos="fade-up" data-aos-delay="200">
                                <div class="w-12 h-12 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg md:text-xl font-semibold text-green-800 mb-2 md:mb-3 text-center">Visi Kami</h3>
                                <p class="text-gray-600 text-center text-sm md:text-base">
                                    Menjadi platform terdepan dalam mengembangkan solusi Eco Enzim yang berkelanjutan untuk lingkungan yang lebih bersih dan sehat.
                                </p>
                            </div>
                            <div class="bg-white p-5 md:p-6 rounded-xl shadow-lg hover:shadow-xl transition-shadow border-t-4 border-green-600" data-aos="fade-up" data-aos-delay="300">
                                <div class="w-12 h-12 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                    </svg>
                                </div>
                                <h3 class="text-lg md:text-xl font-semibold text-green-800 mb-2 md:mb-3 text-center">Nilai Kami</h3>
                                <p class="text-gray-600 text-center text-sm md:text-base">
                                    Keberlanjutan, Inovasi, Kolaborasi, Edukasi, dan Dampak Positif pada lingkungan dan masyarakat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Why We Exist Section - Improved with modern card design -->
            <section class="py-12 md:py-20 bg-white relative">
                <!-- Decorative wave SVG -->
                <div class="absolute top-0 left-0 right-0 h-12 md:h-20 overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute -top-10 w-full h-40">
                        <path fill="#F9FAFB" fill-opacity="1" d="M0,128L48,149.3C96,171,192,213,288,208C384,203,480,149,576,128C672,107,768,117,864,144C960,171,1056,213,1152,218.7C1248,224,1344,192,1392,176L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
                    </svg>
                </div>
                
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center max-w-3xl mx-auto mb-10 md:mb-16" data-aos="fade-up">
                        <h2 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">Mengapa Kami Ada</h2>
                        <div class="w-16 md:w-24 h-1 bg-green-300 mx-auto mb-6 md:mb-8"></div>
                        <p class="text-gray-600 text-sm md:text-base px-2">
                        Kami hadir sebagai tim mahasiswa yang ingin menggabungkan teknologi dan kepedulian sosial melalui pengembangan aplikasi berbasis proyek nyata.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        <div class="group" data-aos="fade-up" data-aos-delay="100">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 h-full border border-gray-100">
                                <div class="bg-green-600 h-2 md:h-3 w-full"></div>
                                <div class="p-5 md:p-8">
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 md:mb-6 transform transition-transform group-hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4 group-hover:text-green-600 transition-colors">Belajar dari Proyek Nyata</h3>
                                    <p class="text-gray-600 text-sm md:text-base">
                                    Kami percaya bahwa pembelajaran terbaik terjadi saat teori bertemu praktik.
                                    Melalui proyek EcoZense, kami menerapkan langsung ilmu pengembangan perangkat lunak untuk membangun aplikasi yang berdampak nyata.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group" data-aos="fade-up" data-aos-delay="200">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 h-full border border-gray-100">
                                <div class="bg-green-600 h-2 md:h-3 w-full"></div>
                                <div class="p-5 md:p-8">
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 md:mb-6 transform transition-transform group-hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4 group-hover:text-green-600 transition-colors">Kolaborasi dan Inovasi</h3>
                                    <p class="text-gray-600 text-sm md:text-base">
                                    Kami datang dari latar belakang dan keahlian yang beragam.
                                    Dengan menggabungkan kemampuan dalam desain, pemrograman, dan analisis, kami bekerja sama sebagai satu tim yang solid untuk menciptakan solusi digital berkelanjutan.
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group" data-aos="fade-up" data-aos-delay="300">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 h-full border border-gray-100">
                                <div class="bg-green-600 h-2 md:h-3 w-full"></div>
                                <div class="p-5 md:p-8">
                                    <div class="w-12 h-12 md:w-16 md:h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 md:mb-6 transform transition-transform group-hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-8 md:w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                        </svg>
                                    </div>
                                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-3 md:mb-4 group-hover:text-green-600 transition-colors">Berkarya untuk Lingkungan</h3>
                                    <p class="text-gray-600 text-sm md:text-base">
                                    Lebih dari sekadar tugas kampus.
                                    Proyek ini adalah bentuk kepedulian kami terhadap lingkungan. Kami berharap EcoZense dapat menjadi langkah kecil dari generasi muda untuk menghadirkan perubahan positif di masyarakat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Commitment Section - Enhanced with interactive design -->
            <section class="py-12 md:py-20 bg-gradient-to-b from-white to-green-50 relative">
                <!-- Decorative circles -->
                <div class="hidden md:block absolute top-1/4 left-10 w-24 h-24 bg-green-200 rounded-full opacity-30"></div>
                <div class="hidden md:block absolute bottom-1/4 right-10 w-32 h-32 bg-green-200 rounded-full opacity-30"></div>
                
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center max-w-3xl mx-auto mb-10 md:mb-16" data-aos="fade-up">
                        <h2 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">Komitmen Kami</h2>
                        <div class="w-16 md:w-24 h-1 bg-green-300 mx-auto mb-6 md:mb-8"></div>
                        <p class="text-gray-600 text-sm md:text-base px-2">
                        Tim PBL 211 bukan hanya sekadar menyelesaikan proyek. Kami berkomitmen untuk terus belajar, tumbuh, dan memberi dampak melalui kerja tim dan teknologi.


                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10">
                        <div class="group rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl" data-aos="fade-right">
                            <div class="h-40 md:h-56 bg-cover bg-center" style="background-image: url('{{ asset('images/bg1.jpeg') }}')">
                                <div class="h-full w-full bg-gradient-to-t from-green-900 to-transparent flex items-end p-4 md:p-6">
                                    <h3 class="text-xl md:text-2xl font-bold text-white group-hover:scale-105 transition-transform">Rasa Ingin Tahu yang Tinggi</h3>
                                </div>
                            </div>
                            <div class="p-4 md:p-6 bg-white">
                                <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">
                                Kami memulai proyek ini dengan rasa penasaran dan semangat belajar yang besar. Setiap tantangan adalah kesempatan untuk memahami lebih dalam dunia teknologi dan pengembangan aplikasi.
                                </p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Belajar Terus</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Riset Mandiri</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Explorasi</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl" data-aos="fade-left">
                            <div class="h-40 md:h-56 bg-cover bg-center" style="background-image: url('{{ asset('images/bg2.jpeg') }}')">
                                <div class="h-full w-full bg-gradient-to-t from-green-900 to-transparent flex items-end p-4 md:p-6">
                                    <h3 class="text-xl md:text-2xl font-bold text-white group-hover:scale-105 transition-transform">Tumbuh Lewat Proses</h3>
                                </div>
                            </div>
                            <div class="p-4 md:p-6 bg-white">
                                <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">
                                Kami percaya bahwa kesalahan adalah bagian dari perjalanan. Kami belajar dari kegagalan, memperbaikinya bersama, dan terus melangkah untuk menjadi versi terbaik dari diri kami sebagai tim.
                                </p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Belajar dari Gagal</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Evaluasi</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Progres Bersama</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl" data-aos="fade-right">
                            <div class="h-40 md:h-56 bg-cover bg-center" style="background-image: url('{{ asset('images/bg4.jpeg') }}')">
                                <div class="h-full w-full bg-gradient-to-t from-green-900 to-transparent flex items-end p-4 md:p-6">
                                    <h3 class="text-xl md:text-2xl font-bold text-white group-hover:scale-105 transition-transform">Terbuka dan Komunikatif</h3>
                                </div>
                            </div>
                            <div class="p-4 md:p-6 bg-white">
                                <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">
                                Setiap ide dihargai. Kami menjaga komunikasi terbuka, saling mendengarkan, dan menyelesaikan perbedaan pendapat dengan kepala dingin. Karena kami tahu: tim yang kuat dibangun dari kepercayaan.
                                </p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Diskusi Sehat</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Tim Solid</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Dengar Aktif</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-2xl" data-aos="fade-left">
                            <div class="h-40 md:h-56 bg-cover bg-center" style="background-image: url('{{ asset('images/bg3.jpeg') }}')">
                                <div class="h-full w-full bg-gradient-to-t from-green-900 to-transparent flex items-end p-4 md:p-6">
                                    <h3 class="text-xl md:text-2xl font-bold text-white group-hover:scale-105 transition-transform">Bekerja dengan Tujuan</h3>
                                </div>
                            </div>
                            <div class="p-4 md:p-6 bg-white">
                                <p class="text-gray-600 mb-4 md:mb-6 text-sm md:text-base">
                                Kami tidak hanya membuat aplikasi — kami membangun sesuatu yang bermakna. Setiap baris kode yang kami tulis punya misi: menciptakan dampak dan menyelesaikan masalah nyata.
                                </p>
                                <div class="flex flex-wrap gap-2">
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Makna di Balik Teknologi</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Proyek Bermisi</span>
                                    <span class="px-2 py-1 md:px-3 md:py-1 bg-green-100 text-green-700 rounded-full text-xs md:text-sm">Tech With Purpose</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Team Section - Enhanced with modern interactive cards -->
            <section class="py-16 md:py-20 bg-white relative">
                <!-- Decorative wave SVG bottom -->
                <div class="absolute bottom-0 left-0 right-0 h-20 overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-40">
                        <path fill="#F0FDF4" fill-opacity="1" d="M0,64L48,80C96,96,192,128,288,138.7C384,149,480,139,576,122.7C672,107,768,85,864,96C960,107,1056,149,1152,154.7C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>
                
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                        <h2 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">Tim Kami</h2>
                        <div class="w-24 h-1 bg-green-300 mx-auto mb-6 md:mb-8"></div>
                        <p class="text-gray-600 px-4">
                            Kenali orang-orang hebat di balik EcoZense yang berdedikasi mewujudkan misi keberlanjutan lingkungan.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
                        <div class="group" data-aos="fade-up" data-aos-delay="100">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 border border-gray-100 h-full">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('images/arshafin.jpg') }}" alt="Arshafin Alfisyahrin - Back-End Developer" class="w-full h-32 md:h-40 object-cover object-center transform transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2 transform translate-y-full group-hover:translate-y-0 transition-transform">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                            </a>
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 md:p-4">
                                    <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Arshafin Alfisyahrin</h3>
                                    <p class="text-green-600 mb-2 text-center text-xs md:text-sm">4342401075</p>
                                    <div class="border-t border-gray-100 pt-2 mt-2">
                                        <p class="text-gray-600 text-xs md:text-sm mb-2 text-center font-medium">Database Design & Backend Programmer</p>
                                        <p class="text-gray-500 text-xs italic text-center">"Would Rather Watch A Tree Grow or A Knee Grow"</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group" data-aos="fade-up" data-aos-delay="200">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 border border-gray-100 h-full">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('images/arif.jpg') }}" alt="Muhamad Ariffadhlullah - Project Manager" class="w-full h-32 md:h-40 object-cover object-center transform transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2 transform translate-y-full group-hover:translate-y-0 transition-transform">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                            </a>
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 md:p-4">
                                    <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Muhamad Ariffadhlullah</h3>
                                    <p class="text-green-600 mb-2 text-center text-xs md:text-sm">4342401070</p>
                                    <div class="border-t border-gray-100 pt-2 mt-2">
                                        <p class="text-gray-600 text-xs md:text-sm mb-2 text-center font-medium">Database Design & Frontend Programmer</p>
                                        <p class="text-gray-500 text-xs italic text-center">"Think Lightly of Yourself and Deeply of The World"</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group" data-aos="fade-up" data-aos-delay="300">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 border border-gray-100 h-full">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('images/steven.jpg') }}" alt="Steven Kumala - Full-Stack Developer" class="w-full h-32 md:h-40 object-cover object-center transform transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2 transform translate-y-full group-hover:translate-y-0 transition-transform">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                            </a>
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 md:p-4">
                                    <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Steven Kumala</h3>
                                    <p class="text-green-600 mb-2 text-center text-xs md:text-sm">4342401068</p>
                                    <div class="border-t border-gray-100 pt-2 mt-2">
                                        <p class="text-gray-600 text-xs md:text-sm mb-2 text-center font-medium">Quality Assurance & Frontend Programmer</p>
                                        <p class="text-gray-500 text-xs italic text-center">"Have you ever played Roblox Tower Defense with your life on the line?"</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group" data-aos="fade-up" data-aos-delay="400">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 border border-gray-100 h-full">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('images/faldy.jpg') }}" alt="Muhammad Faldy Rizaldi - UI/UX Designer" class="w-full h-32 md:h-40 object-cover object-center transform transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2 transform translate-y-full group-hover:translate-y-0 transition-transform">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                            </a>
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 md:p-4">
                                    <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Muhammad Faldy Rizaldi</h3>
                                    <p class="text-green-600 mb-2 text-center text-xs md:text-sm">4342401079</p>
                                    <div class="border-t border-gray-100 pt-2 mt-2">
                                        <p class="text-gray-600 text-xs md:text-sm mb-2 text-center font-medium">Quality Assurance & UI/UX Design</p>
                                        <p class="text-gray-500 text-xs italic text-center">"ya"</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group" data-aos="fade-up" data-aos-delay="500">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 border border-gray-100 h-full">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('images/thalita.jpg') }}" alt="Thalita Aurelia Marsim - UI/UX Designer" class="w-full h-32 md:h-40 object-cover object-center transform transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2 transform translate-y-full group-hover:translate-y-0 transition-transform">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                            </a>
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 md:p-4">
                                    <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Thalita Aurelia Marsim</h3>
                                    <p class="text-green-600 mb-2 text-center text-xs md:text-sm">4342401066</p>
                                    <div class="border-t border-gray-100 pt-2 mt-2">
                                        <p class="text-gray-600 text-xs md:text-sm mb-2 text-center font-medium">Business Analyst & Backend Programmer</p>
                                        <p class="text-gray-500 text-xs italic text-center">"I may live in the shadows of the frontend, but I hold the system together."</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group" data-aos="fade-up" data-aos-delay="600">
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform group-hover:-translate-y-2 border border-gray-100 h-full">
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('images/agnes.jpg') }}" alt="Agnes Natalia Silalahi - UI/UX Designer" class="w-full h-32 md:h-40 object-cover object-center transform transition-transform group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-green-900 via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-2 transform translate-y-full group-hover:translate-y-0 transition-transform">
                                        <div class="flex space-x-2 justify-center">
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                    <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                            </a>
                                            <a href="#" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-green-700 hover:bg-green-600 hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-3 md:p-4">
                                    <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Agnes Natalia Silalahi</h3>
                                    <p class="text-green-600 mb-2 text-center text-xs md:text-sm">4342401082</p>
                                    <div class="border-t border-gray-100 pt-2 mt-2">
                                        <p class="text-gray-600 text-xs md:text-sm mb-2 text-center font-medium">UI/UX Design & Frontend Programmer</p>
                                        <p class="text-gray-500 text-xs italic text-center">"Out of the mountain of despair, a stone of hope."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Stats Section - Enhanced with modern design -->
            <section class="py-12 md:py-20 bg-cover bg-center relative" style="background-image: url('{{ asset('images/bg5.jpeg') }}')">
                <div class="absolute inset-0 bg-green-900/70"></div>
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center mb-10 md:mb-16" data-aos="fade-up">
                        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Dampak Kami</h2>
                        <div class="w-16 md:w-24 h-1 bg-green-300 mx-auto mb-6 md:mb-8"></div>
                        <p class="text-green-100 max-w-2xl mx-auto text-sm md:text-base px-2">
                            Dengan dukungan dari berbagai pihak, kami telah mencapai dampak positif yang signifikan untuk lingkungan dan masyarakat.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8">
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 md:p-8 text-center transform transition-all hover:scale-105 hover:bg-white/20" data-aos="fade-up" data-aos-delay="100">
                            <div class="w-12 h-12 md:w-20 md:h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-10 md:w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-5xl font-bold mb-2 md:mb-4 text-white" data-count="600">
                                <span class="counter">0</span>+
                            </div>
                            <div class="text-green-100 font-medium text-sm md:text-lg">Pengguna Aktif</div>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 md:p-8 text-center transform transition-all hover:scale-105 hover:bg-white/20" data-aos="fade-up" data-aos-delay="200">
                            <div class="w-12 h-12 md:w-20 md:h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-10 md:w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-5xl font-bold mb-2 md:mb-4 text-white">
                                <span class="counter">2.5</span> ton
                            </div>
                            <div class="text-green-100 font-medium text-sm md:text-lg">Sampah Organik</div>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 md:p-8 text-center transform transition-all hover:scale-105 hover:bg-white/20" data-aos="fade-up" data-aos-delay="300">
                            <div class="w-12 h-12 md:w-20 md:h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-10 md:w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-5xl font-bold mb-2 md:mb-4 text-white" data-count="150">
                                <span class="counter">0</span>+
                            </div>
                            <div class="text-green-100 font-medium text-sm md:text-lg">Produk Eco Enzim</div>
                        </div>
                        
                        <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 md:p-8 text-center transform transition-all hover:scale-105 hover:bg-white/20" data-aos="fade-up" data-aos-delay="400">
                            <div class="w-12 h-12 md:w-20 md:h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 md:mb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-10 md:w-10 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="text-3xl md:text-5xl font-bold mb-2 md:mb-4 text-white" data-count="12">
                                <span class="counter">0</span>
                            </div>
                            <div class="text-green-100 font-medium text-sm md:text-lg">Bank Sampah</div>
                        </div>
                    </div>
                </div>
                
                <!-- Script for counter animation -->
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const observerOptions = {
                            root: null,
                            rootMargin: '0px',
                            threshold: 0.1
                        };
                        
                        const observer = new IntersectionObserver((entries) => {
                            entries.forEach(entry => {
                                if (entry.isIntersecting) {
                                    const counters = entry.target.querySelectorAll('.counter');
                                    counters.forEach(counter => {
                                        const target = counter.closest('[data-count]') 
                                            ? parseInt(counter.closest('[data-count]').getAttribute('data-count')) 
                                            : parseInt(counter.textContent);
                                        let count = 0;
                                        const updateCounter = () => {
                                            const increment = target / 30;
                                            if (count < target) {
                                                count += increment;
                                                counter.textContent = Math.ceil(count);
                                                setTimeout(updateCounter, 50);
                                            } else {
                                                counter.textContent = target;
                                            }
                                        };
                                        updateCounter();
                                    });
                                    observer.unobserve(entry.target);
                                }
                            });
                        }, observerOptions);
                        
                        const statsSection = document.querySelector('section.py-12.md\\:py-20.bg-cover');
                        if (statsSection) {
                            observer.observe(statsSection);
                        }
                    });
                </script>
            </section>
            
            <!-- Call to Action - Improved with modern design -->
            <section class="py-16 md:py-24 lg:py-32 bg-cover bg-center relative" style="background-image: url('{{ asset('images/bg6.jpeg') }}')">
                <div class="absolute inset-0 bg-gradient-to-r from-green-900/80 to-green-700/80"></div>
                <div class="container mx-auto px-4 relative z-10">
                    <div class="max-w-5xl mx-auto bg-white/10 backdrop-blur-md rounded-2xl p-6 md:p-10 text-center shadow-xl" data-aos="zoom-in">
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4 md:mb-6">Bergabunglah dengan Pergerakan Eco Enzim</h2>
                        <p class="text-green-100 mb-6 md:mb-8 text-base md:text-lg max-w-3xl mx-auto">
                            Jadilah bagian dari solusi untuk lingkungan yang lebih bersih dan sehat. Mari bersama-sama mengubah sampah organik menjadi sumber daya bernilai melalui Eco Enzim.
                        </p>
                        <div class="flex flex-col md:flex-row justify-center gap-3 md:gap-5">
                            <a href="{{ route('register') }}" class="bg-white text-green-700 hover:bg-green-100 py-2 md:py-3 px-6 md:px-8 rounded-full font-semibold transition-all text-sm md:text-base shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Daftar Sekarang
                            </a>
                                                       <a href="#" class="bg-transparent border-2 border-white text-white hover:bg-white/10 py-2 md:py-3 px-6 md:px-8 rounded-full font-semibold transition-all text-sm md:text-base shadow-lg hover:shadow-xl transform hover:-translate-y-1 mt-3 md:mt-0">
                                Pelajari Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section - Improved with modern design -->
            <section class="py-12 md:py-20 bg-gradient-to-b from-green-50 to-white relative">
                <!-- Decorative elements -->
                <div class="hidden md:block absolute top-0 right-0 w-64 h-64 bg-green-100 rounded-full -mr-32 opacity-20"></div>
                <div class="hidden md:block absolute bottom-0 left-0 w-64 h-64 bg-green-100 rounded-full -ml-32 opacity-20"></div>
                
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center max-w-3xl mx-auto mb-10 md:mb-16" data-aos="fade-up">
                        <h2 class="text-3xl md:text-4xl font-bold text-green-800 mb-4">Pertanyaan yang Sering Diajukan</h2>
                        <div class="w-16 md:w-24 h-1 bg-green-300 mx-auto mb-6 md:mb-8"></div>
                        <p class="text-gray-600 text-sm md:text-base px-2">
                            Temukan jawaban untuk pertanyaan umum tentang Eco Enzim dan EcoZense.
                        </p>
                    </div>
                    
                    <div class="max-w-3xl mx-auto">
                        <div class="space-y-4 md:space-y-6" data-aos="fade-up">
                            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                                <button class="faq-question w-full px-4 py-3 md:px-6 md:py-4 text-left focus:outline-none flex justify-between items-center">
                                    <span class="text-base md:text-lg font-medium text-gray-800">Apa itu Eco Enzim?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-green-600 transform transition-transform faq-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="faq-answer px-4 py-0 md:px-6 h-0 overflow-hidden transition-all duration-300">
                                    <p class="text-gray-600 pb-4 text-sm md:text-base">
                                        Eco Enzim adalah cairan hasil fermentasi sisa buah-buahan dan sayuran dengan gula merah atau molase dan air. Proses fermentasi ini menghasilkan larutan yang kaya akan enzim, asam organik, dan senyawa bermanfaat lainnya yang dapat digunakan sebagai pembersih alami, pupuk, dan pengusir serangga.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                                <button class="faq-question w-full px-4 py-3 md:px-6 md:py-4 text-left focus:outline-none flex justify-between items-center">
                                    <span class="text-base md:text-lg font-medium text-gray-800">Bagaimana cara membuat Eco Enzim?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-green-600 transform transition-transform faq-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="faq-answer px-4 py-0 md:px-6 h-0 overflow-hidden transition-all duration-300">
                                    <p class="text-gray-600 pb-4 text-sm md:text-base">
                                        Untuk membuat Eco Enzim, Anda memerlukan: 1 bagian gula merah/molase, 3 bagian sisa buah/sayur, dan 10 bagian air. Campurkan semua bahan dalam wadah plastik atau kaca, tutup rapat tapi tidak kedap udara, lalu fermentasi selama 3 bulan. Eco Enzim siap digunakan saat cairan berwarna kecoklatan dan beraroma seperti cuka buah.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                                <button class="faq-question w-full px-4 py-3 md:px-6 md:py-4 text-left focus:outline-none flex justify-between items-center">
                                    <span class="text-base md:text-lg font-medium text-gray-800">Apa manfaat Eco Enzim?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-green-600 transform transition-transform faq-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="faq-answer px-4 py-0 md:px-6 h-0 overflow-hidden transition-all duration-300">
                                    <ul class="text-gray-600 pb-4 space-y-2 list-disc list-inside text-sm md:text-base">
                                        <li>Pembersih serbaguna untuk rumah tangga</li>
                                        <li>Pupuk organik untuk tanaman</li>
                                        <li>Pengusir serangga alami</li>
                                        <li>Pembersih saluran air</li>
                                        <li>Penghilang bau tidak sedap</li>
                                        <li>Mengurangi polusi udara</li>
                                        <li>Mengolah sampah organik menjadi produk bernilai</li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg">
                                <button class="faq-question w-full px-4 py-3 md:px-6 md:py-4 text-left focus:outline-none flex justify-between items-center">
                                    <span class="text-base md:text-lg font-medium text-gray-800">Bagaimana cara bergabung dengan EcoZense?</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-green-600 transform transition-transform faq-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="faq-answer px-4 py-0 md:px-6 h-0 overflow-hidden transition-all duration-300">
                                    <p class="text-gray-600 pb-4 text-sm md:text-base">
                                        Untuk bergabung dengan EcoZense, Anda dapat mendaftar melalui platform kami secara online atau menghadiri salah satu workshop kami. Sebagai anggota, Anda akan mendapatkan akses ke panduan, tutorial, forum komunitas, dan kesempatan untuk berpartisipasi dalam berbagai kegiatan dan program yang kami selenggarakan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Script for FAQ accordion -->
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const questions = document.querySelectorAll('.faq-question');
                        
                        questions.forEach(question => {
                            question.addEventListener('click', () => {
                                const answer = question.nextElementSibling;
                                const icon = question.querySelector('.faq-icon');
                                
                                // Check if answer is currently open
                                const isOpen = answer.classList.contains('active');
                                
                                // Close all other answers
                                document.querySelectorAll('.faq-answer').forEach(ans => {
                                    ans.classList.remove('active');
                                    ans.style.paddingTop = '0';
                                    ans.style.paddingBottom = '0';
                                    ans.style.height = '0';
                                });
                                
                                // Reset all icons
                                document.querySelectorAll('.faq-icon').forEach(ic => {
                                    ic.style.transform = 'rotate(0deg)';
                                });
                                
                                // Toggle current answer if it wasn't open before
                                if (!isOpen) {
                                    answer.classList.add('active');
                                    answer.style.height = answer.scrollHeight + 'px';
                                    answer.style.paddingTop = '16px';
                                    answer.style.paddingBottom = '16px';
                                    icon.style.transform = 'rotate(180deg)';
                                }
                            });
                        });
                    });
                </script>
            </section>
            
            <!-- Contact Section - Improved with modern design -->
            <section class="py-20 bg-gradient-to-b from-gray-50 to-green-50 relative">
                <!-- Decorative elements -->
                <div class="absolute top-0 left-0 w-full h-20 overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute -top-10 w-full h-40 text-white fill-current">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                    </svg>
                </div>
                
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center mb-16" data-aos="fade-up">
                        <h2 class="text-4xl font-bold text-green-800 mb-4">Hubungi Kami</h2>
                        <div class="w-24 h-1 bg-green-300 mx-auto mb-8"></div>
                        <p class="text-gray-600 max-w-2xl mx-auto">
                            Jika Anda memiliki pertanyaan, saran, atau ingin berkolaborasi dengan EcoZense, jangan ragu untuk menghubungi kami melalui informasi kontak di bawah ini.
                        </p>
                    </div>
                    
                    <div class="max-w-4xl mx-auto">
                        <div data-aos="fade-up" class="bg-white p-10 rounded-xl shadow-xl relative overflow-hidden">
                            <!-- Decorative green circles -->
                            <div class="absolute -top-10 -right-10 w-40 h-40 bg-green-100 rounded-full opacity-50"></div>
                            <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-green-100 rounded-full opacity-50"></div>
                            
                            <div class="relative z-10">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                                    <div class="text-center transform transition-transform hover:scale-105">
                                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>
                                        <h3 class="font-semibold text-gray-800 text-lg mb-2">Alamat</h3>
                                        <p class="text-gray-600">Jl. Ahmad Yani, Batam 29461, Kepulauan Riau, Indonesia</p>
                                    </div>
                                    
                                    <div class="text-center transform transition-transform hover:scale-105">
                                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <h3 class="font-semibold text-gray-800 text-lg mb-2">Email</h3>
                                        <p class="text-gray-600">info@ecozense.id</p>
                                    </div>
                                    
                                    <div class="text-center transform transition-transform hover:scale-105">
                                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                            </svg>
                                        </div>
                                        <h3 class="font-semibold text-gray-800 text-lg mb-2">Telepon</h3>
                                        <p class="text-gray-600">+62 778 469856</p>
                                    </div>
                                </div>
                                
                                <div class="mt-12 pt-10 border-t border-gray-200">
                                    <h3 class="font-semibold text-gray-800 text-xl mb-6 text-center">Ikuti Kami</h3>
                                    <div class="flex space-x-6 justify-center">
                                        <a href="#" class="group">
                                            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0 .002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="#" class="group">
                                            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 1-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.036.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="#" class="group">
                                            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="#" class="group">
                                            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="#" class="group">
                                            <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-colors">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                                    <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="mt-12 pt-10 border-t border-gray-200 text-center">
                                    <p class="text-gray-600 mb-4">Tertarik berkolaborasi atau memiliki pertanyaan?</p>
                                    <a href="#" class="inline-block bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-8 rounded-full transition-colors shadow-md hover:shadow-lg">
                                        Kirim Pesan Kami
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

<!-- AOS Library -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

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

    // Back to top button
    const backToTopBtn = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.remove('opacity-0', 'invisible');
            backToTopBtn.classList.add('opacity-100', 'visible');
        } else {
            backToTopBtn.classList.add('opacity-0', 'invisible');
            backToTopBtn.classList.remove('opacity-100', 'visible');
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Initialize AOS animation
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // FAQ accordion functionality
        const detailsElements = document.querySelectorAll('details');
        
        detailsElements.forEach((el) => {
            el.addEventListener('click', (e) => {
                // Close all other details when one is opened
                if (el.open) {
                    detailsElements.forEach((details) => {
                        if (details !== el) {
                            details.open = false;
                        }
                    });
                }
            });
        });
    });
</script>
</body>
</html>