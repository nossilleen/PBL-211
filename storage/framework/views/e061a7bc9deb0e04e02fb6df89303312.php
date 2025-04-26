<!-- resources/views/components/home/information-center.blade.php -->
<section
    class="min-h-screen flex items-center"
    style="background-image: url('<?php echo e(asset('images/bg2.jpeg')); ?>'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8" data-aos="fade-up">Pusat Informasi</h2>
        <p class="text-center max-w-2xl mx-auto mb-12" data-aos="fade-up" data-aos-delay="100">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        </p>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Card 1 - Events -->
            <div data-aos="fade-up" data-aos-delay="200">
                <div
                    class="bg-cover bg-center rounded-lg overflow-hidden shadow-lg card-hover-effect mb-4"
                    style="background-image: url('<?php echo e(asset('images/bg3.jpeg')); ?>'); height: 270px;"
                >
                    <div class="p-8 flex flex-col justify-between h-full">
                        <h3 class="text-3xl font-bold text-white mb-4">Events</h3>
                        <div
                            class="rounded-full w-24 h-24 flex items-center justify-center bg-white bg-opacity-20 border-2 border-white hover-scale"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-10 w-10 text-white"
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
                        >Learn More</a
                    >
                </div>
            </div>

            <!-- Card 2 - Video -->
            <div data-aos="fade-up" data-aos-delay="300">
                <div
                    class="bg-black rounded-lg overflow-hidden shadow-lg flex items-center justify-center card-hover-effect mb-4"
                    style="height: 270px"
                >
                    <div
                        class="rounded-full w-24 h-24 flex items-center justify-center bg-gray-800 bg-opacity-50 border-2 border-white hover-scale"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-10 w-10 text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="font-semibold mb-2">Video Animasi Mengenai Eco Enzim</h4>
                    <a href="#" class="text-blue-700 hover:underline transition-all duration-300"
                        >Learn More</a
                    >
                </div>
            </div>

            <!-- Card 3 - Artikel -->
            <div data-aos="fade-up" data-aos-delay="400">
                <div
                    class="bg-cover bg-center rounded-lg overflow-hidden shadow-lg card-hover-effect mb-4"
                    style="background-image: url('<?php echo e(asset('images/bg5.jpeg')); ?>'); height: 270px;"
                >
                    <div class="p-8 flex flex-col justify-between h-full">
                        <h3 class="text-3xl font-bold text-white mb-4">ARTIKEL</h3>
                        <div
                            class="rounded-full w-24 h-24 flex items-center justify-center bg-white bg-opacity-20 border-2 border-white hover-scale"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-10 w-10 text-white"
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
                    <a href="#" class="text-blue-700 hover:underline transition-all duration-300"
                        >Learn More</a
                    >
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\xampp\htdocs\laravel\PBL-211\resources\views/components/home/information-center.blade.php ENDPATH**/ ?>