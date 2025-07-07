<!-- resources/views/components/home/hero.blade.php -->
<section
    class="min-h-screen flex items-center py-20 md:py-0" 
    style="background-image: url('{{ asset('images/Frame 2305.png') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
            <div
                class="flex flex-col justify-center text-center md:text-left order-2 md:order-1 px-4 md:pl-6"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-green-800 mb-4 md:mb-6 animate-fade-in">
                    Selamat datang <br class="hidden md:block" /> di EcoZense
                </h1>
                <p class="text-green-900 text-base md:text-lg mb-6 md:mb-8 animate-slide-up max-w-xl mx-auto md:mx-0">
                EcoZense adalah platform edukatif dan kolaboratif yang dirancang untuk menginspirasi gaya hidup ramah lingkungan. Dengan fitur toko, artikel informatif, dan event komunitas. EcoZense mendorong masyarakat untuk lebih peduli terhadap lingkungan melalui aksi nyata dan inovatif.
                </p>
                <div>
                    <a href="{{ route('register') }}">
                        <button
                               class="bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition button-hover-effect"
                        >
                                Mulai Sekarang
                        </button>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center order-1 md:order-2 mb-8 md:mb-0" data-aos="fade-left" data-aos-delay="300">
                <div id="video-thumbnail-container" class="relative w-full max-w-md mx-auto md:max-w-full lg:max-w-xl xl:max-w-2xl cursor-pointer group" style="aspect-ratio: 16/9;">
                    <img src="{{ asset('images/logo.jpg') }}" alt="EcoZense Logo" class="rounded-lg w-full h-full object-cover border-4 shadow-[0_0_0_16px_rgba(34,197,94,0.35),0_0_64px_16px_rgba(34,197,94,0.45)] opacity-95 group-hover:opacity-100 transition-all duration-300" style="border-color: rgb(22,101,52); aspect-ratio: 16/9;">
                    <button id="play-button" class="absolute inset-0 flex items-center justify-center text-white text-6xl bg-black bg-opacity-40 rounded-lg transition-all duration-300 group-hover:bg-opacity-60 opacity-0 group-hover:opacity-100" style="pointer-events: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80" fill="none">
                            <circle cx="40" cy="40" r="40" fill="rgba(34,197,94,0.85)"/>
                            <polygon points="32,26 58,40 32,54" fill="white"/>
                        </svg>
                    </button>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var container = document.getElementById('video-thumbnail-container');
                        container.addEventListener('click', function() {
                            container.outerHTML = `<iframe src=\"https://www.youtube.com/embed/aR4x_YLIr28?autoplay=1&rel=0&modestbranding=1\" width=\"100%\" height=\"100%\" style=\"aspect-ratio:16/9;\" allow=\"autoplay; encrypted-media\" allowfullscreen title=\"EcoZense YouTube Video\" class=\"rounded-lg border-4 shadow-[0_0_0_16px_rgba(34,197,94,0.35),0_0_64px_16px_rgba(34,197,94,0.45)] w-full h-full object-cover mx-auto md:max-w-full lg:max-w-xl xl:max-w-2xl opacity-95 hover:opacity-100 hover:scale-105 transition-all duration-300 transform hover:-translate-y-1\" ></iframe>`;
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</section>

<div class="spacer stack1"></div>

