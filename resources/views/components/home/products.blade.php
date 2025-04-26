<!-- resources/views/components/home/products.blade.php -->
<section
    class="py-16"
    style="background-image: url('{{ asset('images/bg5.jpeg') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-6" data-aos="fade-up">
            Produk Eco Enzim terlaris
        </h2>
        <h3 class="text-xl text-center mb-12" data-aos="fade-up" data-aos-delay="100">bulan ini</h3>

        <div class="grid md:grid-cols-4 gap-6">
            <!-- Produk 1 -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect"
                data-aos="fade-up"
                data-aos-delay="200"
            >
                <div class="bg-black h-48 flex items-center justify-center">
                    <div class="w-10 h-10 bg-white rounded hover-scale"></div>
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 1</h4>
                    <div class="flex justify-between items-center">
                        <a
                            href="#"
                            class="text-blue-600 transition-all duration-300 hover:text-blue-800"
                            >See More ›</a
                        >
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <button
                        class="w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect"
                    >
                        Beli
                    </button>
                </div>
            </div>

            <!-- Produk 2 -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect"
                data-aos="fade-up"
                data-aos-delay="300"
            >
                <div class="bg-black h-48 flex items-center justify-center">
                    <div class="w-10 h-10 bg-white rounded hover-scale"></div>
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 2</h4>
                    <div class="flex justify-between items-center">
                        <a
                            href="#"
                            class="text-blue-600 transition-all duration-300 hover:text-blue-800"
                            >See More ›</a
                        >
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <button
                        class="w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect"
                    >
                        Beli
                    </button>
                </div>
            </div>

            <!-- Produk 3 -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect"
                data-aos="fade-up"
                data-aos-delay="400"
            >
                <div class="bg-black h-48 flex items-center justify-center">
                    <div class="w-10 h-10 bg-white rounded hover-scale"></div>
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 3</h4>
                    <div class="flex justify-between items-center">
                        <a
                            href="#"
                            class="text-blue-600 transition-all duration-300 hover:text-blue-800"
                            >See More ›</a
                        >
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <button
                        class="w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect"
                    >
                        Beli
                    </button>
                </div>
            </div>

            <!-- Produk 4 -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect"
                data-aos="fade-up"
                data-aos-delay="500"
            >
                <div class="bg-black h-48 flex items-center justify-center">
                    <div class="w-10 h-10 bg-white rounded hover-scale"></div>
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 4</h4>
                    <div class="flex justify-between items-center">
                        <a
                            href="#"
                            class="text-blue-600 transition-all duration-300 hover:text-blue-800"
                            >See More ›</a
                        >
                    </div>
                </div>
                <div class="px-6 pb-6">
                    <button
                        class="w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect"
                    >
                        Beli
                    </button>
                </div>
            </div>
        </div>

        <div class="text-center mt-10" data-aos="fade-up" data-aos-delay="600">
            <button
                class="bg-black text-white px-8 py-3 rounded hover:bg-gray-900 transition button-hover-effect"
            >
                See more
            </button>
        </div>
    </div>
</section>
