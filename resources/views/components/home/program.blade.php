<!-- resources/views/components/home/program.blade.php -->
<section
    class="min-h-screen flex items-center"
    style="background-image: url('{{ asset('images/blob2.svg') }}'); background-size: cover; background-position: center;"
>
    <div class="container mx-auto px-4 flex justify-center">
        <div
            class="background-color:y ellow; bg-opacity-50 rounded-full py-16 px-8 md:px-16 max-w-2xl text-center card-hover-effect"
            data-aos="zoom-in"
        >
            <h2 class="text-4xl font-bold mb-6" data-aos="fade-up" data-aos-delay="100">
                Program Nasabah
            </h2>
            <p class="mb-8" data-aos="fade-up" data-aos-delay="200">
                Bergabung menjadi nasabah bank sampah melalui program ini!
            </p>
            <a href="{{ route('register') }}"
                class="bg-black text-white px-12 py-3 rounded hover:bg-gray-900 transition button-hover-effect inline-block"
                data-aos="fade-up"
                data-aos-delay="300"
            >
                Join
            </a>
        </div>
    </div>
</section>

<div class="spacer2 wave5"></div>