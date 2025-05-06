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
                    <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2021/2/18/42ce5ef7-d502-489d-ba8c-794ae21b11aa.jpg" alt="Produk Eco Enzim" class="object-cover h-full w-full">
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 1</h4>
                    <div class="flex justify-between items-center">

                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{ url('/product/1') }}"
                        class="block w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect text-center"
                    >
                        Beli
                    </a>
                </div>
            </div>

            <!-- Produk 2 -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect"
                data-aos="fade-up"
                data-aos-delay="300"
            >
                <div class="bg-black h-48 flex items-center justify-center">
                    <img src="https://www.unesa.ac.id/images/foto-04-08-2023-08-08-24-5583.png" alt="Produk Eco Enzim" class="object-cover h-full w-full">
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 2</h4>
                    <div class="flex justify-between items-center">

                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{ url('/product/1') }}"
                        class="block w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect text-center"
                    >
                        Beli
                    </a>
                </div>
            </div>

            <!-- Produk 3 -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect"
                data-aos="fade-up"
                data-aos-delay="400"
            >
                <div class="bg-black h-48 flex items-center justify-center">
                    <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/5/26/a22d75c1-301a-465a-8ad3-7aa3e335563a.jpg" alt="Produk Eco Enzim" class="object-cover h-full w-full">
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 3</h4>
                    <div class="flex justify-between items-center">

                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{ url('/browse') }}"
                        class="block w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect text-center"
                    >
                        Beli
                    </a>
                </div>
            </div>

            <!-- Produk 4 -->
            <div
                class="bg-white rounded-lg overflow-hidden shadow-lg card-hover-effect"
                data-aos="fade-up"
                data-aos-delay="500"
            >
                <div class="bg-black h-48 flex items-center justify-center">
                    <img src="https://filebroker-cdn.lazada.co.id/kf/Sa88de6e565304317b183c5fe9d53fe571.jpg" alt="Produk Eco Enzim" class="object-cover h-full w-full">
                </div>
                <div class="p-6">
                    <h4 class="font-semibold mb-4">Produk Eco enzim 4</h4>
                    <div class="flex justify-between items-center">

                    </div>
                </div>
                <div class="px-6 pb-6">
                    <a href="{{ url('/product/1') }}"
                        class="block w-full border border-green-600 text-green-600 rounded py-2 hover:bg-green-600 hover:text-white transition button-hover-effect text-center"
                    >
                        Beli
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-10" data-aos="fade-up" data-aos-delay="600">
            <button
                class="bg-black text-white px-8 py-3 rounded hover:bg-gray-900 transition button-hover-effect"
            >
                <a href="{{ url('/browse') }}">See more</a>
            </button>
        </div>
    </div>
</section>
