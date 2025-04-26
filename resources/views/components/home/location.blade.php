<!-- resources/views/components/home/location.blade.php -->
<section class="py-16" style="background-image: url('{{ asset('images/bg7.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-8" data-aos="fade-up">Lokasi Bank Sampah di Batam</h2>
        
        <div class="rounded-lg overflow-hidden shadow-lg max-w-5xl mx-auto" data-aos="zoom-in" data-aos-delay="200">
            <!-- Menggunakan peta dari Scribble Maps untuk menampilkan lokasi bank sampah di Batam -->
            <img src="https://www.scribblemaps.com/api/maps/images/m4WWZe7WeT_thumb_1200x630.jpg" alt="Peta Lokasi Bank Sampah di Batam" class="w-full h-96 object-cover hover-scale" />
            <div class="bg-white p-4">
                <p class="text-center text-sm" data-aos="fade-up" data-aos-delay="300">Lokasi bank sampah yang tersebar di berbagai wilayah Batam</p>
                <div class="mt-3 text-center" data-aos="fade-up" data-aos-delay="400">
                    <a href="#" class="text-blue-600 hover:underline transition-all duration-300">Lihat peta lebih detail</a>
                </div>
            </div>
        </div>
    </div>
</section> 