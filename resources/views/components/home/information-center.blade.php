<!-- resources/views/components/home/information-center.blade.php -->
<section
    id="information-center"
    class="min-h-screen flex items-center py-16 md:py-24"
    style="background-image: url('{{ asset('images/bg2.jpeg') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4 md:px-6">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-4 md:mb-8" data-aos="fade-up">Pusat Informasi</h2>
        <p class="text-center max-w-xl sm:max-w-2xl mx-auto mb-8 md:mb-12 text-sm sm:text-base" data-aos="fade-up" data-aos-delay="100">
            Di Pusat Informasi EcoZense, kami menghadirkan artikel, video, dan kegiatan yang membuka wawasan tentang pentingnya menjaga keseimbangan alam.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Card 1 - Events -->
            <div data-aos="fade-up" data-aos-delay="200" class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg shadow-lg h-full">
                <a href="/events" class="block h-full">
                    <div
                        class="bg-cover bg-center rounded-t-lg overflow-hidden h-48 sm:h-60 md:h-64 transition-transform duration-300 hover:scale-105"
                        style="background-image: url('{{ asset('images/bg3.jpeg') }}');"
                    >
                        <div class="p-4 sm:p-6 flex flex-col justify-between h-full bg-gradient-to-b from-transparent to-black/50">
                            <h3 class="text-xl sm:text-2xl font-bold text-white mb-2">EVENTS</h3>
                            <div
                                class="rounded-full w-12 h-12 md:w-14 md:h-14 flex items-center justify-center bg-white/20 border border-white transition-transform duration-300 hover:scale-110"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h4 class="font-semibold">Kegiatan dan Event</h4>
                    </div>
                </a>
            </div>

            <!-- Card 2 - Video -->
            <div data-aos="fade-up" data-aos-delay="300" class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg shadow-lg h-full">
                <div class="h-48 sm:h-60 md:h-64 rounded-t-lg overflow-hidden">
                    <iframe 
                        src="https://drive.google.com/file/d/1cSYkE_qRdEnRY_PwwJFJJxKba309gKD6/preview" 
                        allow="autoplay"
                        allowfullscreen
                        class="w-full h-full"
                        loading="lazy"
                    ></iframe>
                </div>
                <div class="text-center p-4">
                    <h4 class="font-semibold">Video Animasi Mengenai Eco Enzim</h4>
                </div>
            </div>

            <!-- Card 3 - Artikel -->
            <div data-aos="fade-up" data-aos-delay="400" class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg shadow-lg h-full">
                <a href="/artikel" class="block h-full">
                    <div
                        class="bg-cover bg-center rounded-t-lg overflow-hidden h-48 sm:h-60 md:h-64 transition-transform duration-300 hover:scale-105"
                        style="background-image: url('{{ asset('images/bg5.jpeg') }}');"
                    >
                        <div class="p-4 sm:p-6 flex flex-col justify-between h-full bg-gradient-to-b from-transparent to-black/50">
                            <h3 class="text-xl sm:text-2xl font-bold text-white mb-2">ARTIKEL</h3>
                            <div
                                class="rounded-full w-12 h-12 md:w-14 md:h-14 flex items-center justify-center bg-white/20 border border-white transition-transform duration-300 hover:scale-110"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6 text-white"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-4">
                        <h4 class="font-semibold">Artikel</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
