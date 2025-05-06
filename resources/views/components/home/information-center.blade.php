<!-- resources/views/components/home/information-center.blade.php -->
<section
    id="information-center"
    class="min-h-screen flex items-center py-16 md:py-24"
    style="background-image: url('{{ asset('images/bg2.jpeg') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4 md:px-6">
        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-center mb-4 md:mb-8" data-aos="fade-up">Pusat Informasi</h2>
        <p class="text-center max-w-xl sm:max-w-2xl mx-auto mb-8 md:mb-12 text-sm sm:text-base" data-aos="fade-up" data-aos-delay="100">
        Di Pusat Informasi EcoZense, kami menghadirkan artikel, video, 
        dan kegiatan yang membuka wawasan tentang pentingnya menjaga keseimbangan alam.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Card 1 - Events -->
            <div data-aos="fade-up" data-aos-delay="200" class="h-full">
                <div
                    class="bg-cover bg-center rounded-lg overflow-hidden shadow-lg card-hover-effect mb-4 h-48 sm:h-60 md:h-64 lg:h-72"
                    style="background-image: url('{{ asset('images/bg3.jpeg') }}');"
                >
                    <div class="p-4 sm:p-6 md:p-8 flex flex-col justify-between h-full">
                        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-2 md:mb-4">Events</h3>
                        <div
                            class="rounded-full w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 flex items-center justify-center bg-white bg-opacity-20 border-2 border-white hover-scale"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 md:h-8 md:w-8 lg:h-10 lg:w-10 text-white"
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
                <div class="text-center">
                    <h4 class="font-semibold mb-2">Kegiatan dan Event</h4>
                    <a href="#" class="text-blue-700 hover:underline transition-all duration-300"
                        >Lihat Selengkapnya</a
                    >
                </div>
            </div>

            <!-- Card 2 - Video -->
            <div data-aos="fade-up" data-aos-delay="300" class="h-full flex flex-col items-center justify-center">
                <div class="flex items-center justify-center w-full mb-4">
                    <iframe 
                        src="https://drive.google.com/file/d/1cSYkE_qRdEnRY_PwwJFJJxKba309gKD6/preview" 
                        allow="autoplay"
                        allowfullscreen
                        class="rounded-lg shadow-lg border-2 border-green-200 w-full h-48 sm:h-60 md:h-64 lg:h-72 max-w-full mx-auto"
                        style="background: #000;"
                    ></iframe>
                </div>
                <div class="text-center">
                    <h4 class="font-semibold mb-2">Video Animasi Mengenai Eco Enzim</h4>
                </div>
            </div>

            <!-- Card 3 - Artikel -->
            <div data-aos="fade-up" data-aos-delay="400" class="h-full sm:col-span-2 lg:col-span-1">
                <div
                    class="bg-cover bg-center rounded-lg overflow-hidden shadow-lg card-hover-effect mb-4 h-48 sm:h-60 md:h-64 lg:h-72"
                    style="background-image: url('{{ asset('images/bg5.jpeg') }}');"
                >
                    <div class="p-4 sm:p-6 md:p-8 flex flex-col justify-between h-full">
                        <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-white mb-2 md:mb-4">ARTIKEL</h3>
                        <div
                            class="rounded-full w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 flex items-center justify-center bg-white bg-opacity-20 border-2 border-white hover-scale cursor-pointer"
                            onclick="window.location.href='/artikel'"
                            title="Lihat Artikel"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 md:h-8 md:w-8 lg:h-10 lg:w-10 text-white"
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
                <div class="text-center">
                    <h4 class="font-semibold mb-2">Artikel</h4>
                </div>
            </div>
        </div>
    </div>
</section>
