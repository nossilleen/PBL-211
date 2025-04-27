<!-- resources/views/components/home/hero.blade.php -->
<section
    class="min-h-screen flex items-center"
    style="background-image: url('<?php echo e(asset('images/Frame 2305.png')); ?>'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-6 md:px-8 grid md:grid-cols-2 gap-6">
        <div
            class="flex flex-col justify-center pl-4 md:pl-6"
            data-aos="fade-up"
            data-aos-delay="200"
        >
            <h1 class="text-10xl md:text-8xl font-bold text-green-800 mb-6 animate-fade-in">
                Welcome to <br />EcoZense
            </h1>
            <p class="text-green-900 mb-8 animate-slide-up">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.
            </p>
            <div>
                <button
                    class="bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition button-hover-effect"
                >
                    Button
                </button>
            </div>
        </div>
        <div class="flex items-center justify-center" data-aos="fade-left" data-aos-delay="300">
            <img
                src="<?php echo e(asset('images/bg1.jpeg')); ?>"
                alt="Dashboard Preview"
                class="rounded-lg shadow-xl w-full max-w-full md:max-w-lg lg:max-w-xl xl:max-w-2xl opacity-80 hover-scale transition-all duration-300"
            />
        </div>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/components/home/hero.blade.php ENDPATH**/ ?>