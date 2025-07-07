<section class="min-h-60vh" style="background-color: #155A52">  
        <div class="container mx-auto px-4 md:px-6 py-16 md:py-24 relative z-10">
            <!-- Enhanced Section Header -->
            <div class="text-center mb-12 md:mb-16" data-aos="fade-up">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-green-400 via-green-300 to-green-400 bg-clip-text text-transparent">
                    Pusat Informasi
                </h2>
                <p class="text-gray-300 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                    Di Pusat Informasi EcoZense, kami menghadirkan artikel, video, dan kegiatan yang membuka wawasan tentang pentingnya menjaga keseimbangan alam.
                </p>
            </div>
            
        <!-- Enhanced Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            <!-- Events Card -->
            <div data-aos="fade-up" data-aos-delay="200" class="group relative">
                <div class="absolute -inset-0.5 rounded-2xl blur opacity-0"></div>
                <div class="relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-gray-100">
                    <a href="/events" class="block h-full">
                        <div class="relative h-56 md:h-64 overflow-hidden group" style="background: none;">
                            <div class="absolute inset-0 z-0 transition-transform duration-500 group-hover:scale-110" style="background: url('{{ asset('images/bg-event.jpg') }}') center center / cover no-repeat;"></div>
                            <div class="absolute inset-0 z-10 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                            <!-- SVG muncul saat hover, dari atas ke tengah -->
                            <div class="absolute left-1/2 -translate-x-1/2 top-0 group-hover:top-1/2 group-hover:-translate-y-1/2 -translate-y-16 opacity-0 group-hover:opacity-100 transition-all duration-500 z-20"
                                 style="transition-property: top, opacity, transform;">
                                <div class="w-36 h-36 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center border border-white/30">
                                    <svg class="w-28 h-28 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-center relative z-20">
                            <h4 class="font-semibold text-lg text-gray-800 mb-2">Kegiatan dan Acara</h4>
                            <p class="text-gray-600 text-sm">Bergabunglah dengan berbagai kegiatan ramah lingkungan</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Video Card -->
            <div data-aos="fade-up" data-aos-delay="300" class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-green-500 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                <div class="relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-gray-100 flex flex-col p-0">
                    <div class="w-full aspect-[16/9] bg-black flex-shrink-0">
                        <div id="info-video-thumbnail-container" class="w-full h-full cursor-pointer group relative">
                            <img src="{{ asset('images/logo.jpg') }}" alt="EcoZense Logo" class="w-full h-full object-cover rounded-t-xl transition-all duration-300" style="aspect-ratio:16/9;">
                            <button id="info-play-button" class="absolute inset-0 flex items-center justify-center text-white text-6xl bg-black bg-opacity-40 rounded-t-xl transition-all duration-300 group-hover:bg-opacity-60 opacity-0 group-hover:opacity-100" style="pointer-events: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                                    <circle cx="40" cy="40" r="40" fill="rgba(34,197,94,0.85)"/>
                                    <polygon points="32,26 58,40 32,54" fill="white"/>
                                </svg>
                            </button>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var infoContainer = document.getElementById('info-video-thumbnail-container');
                                if(infoContainer) {
                                    infoContainer.addEventListener('click', function() {
                                        infoContainer.outerHTML = `<iframe src=\"https://www.youtube.com/embed/bjDkSXm_Mdk?autoplay=1&rel=0&modestbranding=1\" width=\"100%\" height=\"100%\" style=\"aspect-ratio:16/9;\" allow=\"autoplay; encrypted-media\" allowfullscreen title=\"EcoZense YouTube Video\" class=\"w-full h-full object-cover rounded-t-xl transition-all duration-300\"></iframe>`;
                                    });
                                }
                            });
                        </script>
                    </div>
                    <div class="p-6 text-center flex-1 flex flex-col justify-center">
                        <h4 class="font-semibold text-lg text-gray-800 mb-2">Video Animasi Mengenai Eco Enzim</h4>
                        <p class="text-gray-600 text-sm">Pelajari cara membuat eco enzyme yang berkelanjutan</p>
                    </div>
                </div>
            </div>

            <!-- Articles Card -->
            <div data-aos="fade-up" data-aos-delay="400" class="group relative">
                <div class="absolute -inset-0.5 rounded-2xl blur opacity-0"></div>
                <div class="relative bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 overflow-hidden border border-gray-100">
                    <a href="/artikel" class="block h-full">
                        <div class="relative h-56 md:h-64 overflow-hidden group" style="background: none;">
                            <div class="absolute inset-0 z-0 transition-transform duration-500 group-hover:scale-110" style="background: url('{{ asset('images/bg-article.png') }}') center center / cover no-repeat;"></div>
                            <div class="absolute inset-0 z-10 bg-gradient-to-t from-green-900/60 to-transparent opacity-0 group-hover:opacity-80 transition-opacity duration-500"></div>
                            <!-- SVG muncul saat hover, dari atas ke tengah -->
                            <div class="absolute left-1/2 -translate-x-1/2 top-0 group-hover:top-1/2 group-hover:-translate-y-1/2 -translate-y-16 opacity-0 group-hover:opacity-100 transition-all duration-500 z-20"
                                 style="transition-property: top, opacity, transform;">
                                <div class="w-36 h-36 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center border border-white/30">
                                    <svg class="w-28 h-28 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-center relative z-20">
                            <h4 class="font-semibold text-lg text-gray-800 mb-2">Artikel</h4>
                            <p class="text-gray-600 text-sm">Baca artikel terbaru tentang kehidupan berkelanjutan</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="spacer stack3"></div>