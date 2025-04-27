<!-- resources/views/components/home/hero.blade.php -->
<section
    class="min-h-screen flex items-center py-20 md:py-0"
    style="background-image: url('<?php echo e(asset('images/Frame 2305.png')); ?>'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4 md:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center">
            <div
                class="flex flex-col justify-center text-center md:text-left order-2 md:order-1 px-4 md:pl-6"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-green-800 mb-4 md:mb-6 animate-fade-in">
                    Welcome to <br class="hidden md:block" />EcoZense
                </h1>
                <p class="text-green-900 text-base md:text-lg mb-6 md:mb-8 animate-slide-up max-w-xl mx-auto md:mx-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua.
                </p>
                <div>
                    <button
                        class="bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition button-hover-effect"
                    >
                        Mulai Sekarang
                    </button>
                </div>
            </div>
            <div class="flex items-center justify-center order-1 md:order-2 mb-8 md:mb-0" data-aos="fade-left" data-aos-delay="300">
                <img
                    src="<?php echo e(asset('images/bg1.jpeg')); ?>"
                    alt="Dashboard Preview"
                    class="rounded-lg shadow-xl w-full max-w-md mx-auto md:max-w-full lg:max-w-xl xl:max-w-2xl opacity-80 hover-scale transition-all duration-300"
                    loading="lazy"
                />
            </div>
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/components/home/hero.blade.php ENDPATH**/ ?>