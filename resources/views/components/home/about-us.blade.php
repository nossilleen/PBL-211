<!-- resources/views/components/home/about-us.blade.php -->
<section class="py-20" id="about-us" style="background-image: url('{{ asset('images/bg3.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-green-500 mb-4" data-aos="fade-up">Tentang EcoZense</h2>
            <div class="w-24 h-1 bg-green-500 mx-auto mb-6" data-aos="fade-up" data-aos-delay="100"></div>
            <p class="text-center max-w-2xl mx-auto mb-12 text-green-400" data-aos="fade-up" data-aos-delay="100">
                Solusi terpadu untuk edukasi Eco Enzim dan marketplace yang menghubungkan masyarakat dengan bank sampah untuk menciptakan lingkungan yang lebih bersih dan berkelanjutan.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
            <div class="order-2 md:order-1" data-aos="fade-right">
                <h3 class="text-2xl font-semibold text-green-600 mb-4">Mengapa EcoZense Ada?</h3>
                <p class="text-center max-w-2xl mx-auto mb-12 text-green-400" data-aos="fade-up" data-aos-delay="100">
                    EcoZense hadir sebagai respons terhadap rendahnya kesadaran dan pemahaman masyarakat mengenai pentingnya pemanfaatan Eco Enzim untuk menjaga kelestarian lingkungan. 
                </p>
                <p class="text-center max-w-2xl mx-auto mb-12 text-green-400" data-aos="fade-up" data-aos-delay="100">
                    Berdasarkan data dari Direktorat Jenderal Cipta Karya tahun 2017, sekitar 60% dari total sampah di Indonesia terdiri dari sampah organik yang dapat menimbulkan pencemaran udara, air, dan menjadi sumber penyakit.
                </p>
                <p class="text-center max-w-2xl mx-auto mb-12 text-green-400" data-aos="fade-up" data-aos-delay="100">
                    Kami percaya bahwa dengan edukasi yang tepat dan akses mudah ke produk Eco Enzim, masyarakat dapat berkontribusi dalam mengurangi dampak negatif sampah organik terhadap lingkungan.
                </p>
            </div>
            <div class="order-1 md:order-2" data-aos="fade-left">
                <img src="{{ asset('images/bg1.jpeg') }}" alt="Eco Enzim Process" class="rounded-lg shadow-xl w-full h-auto object-cover" onerror="this.src='https://via.placeholder.com/600x400?text=Eco+Enzim+Process'">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all" data-aos="fade-up">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h4 class="text-xl font-semibold text-green-700 text-center mb-2">Misi Kami</h4>
                <p class="text-gray-600 text-center">
                    Mengedukasi masyarakat tentang manfaat Eco Enzim dan menyediakan platform untuk mengakses produk ramah lingkungan serta mendorong partisipasi aktif dalam program bank sampah.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h4 class="text-xl font-semibold text-green-700 text-center mb-2">Visi Kami</h4>
                <p class="text-gray-600 text-center">
                    Menciptakan masyarakat yang sadar lingkungan dan aktif dalam praktik pengelolaan sampah organik melalui pemanfaatan Eco Enzim untuk kehidupan yang lebih bersih dan berkelanjutan.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h4 class="text-xl font-semibold text-green-700 text-center mb-2">Nilai-Nilai Kami</h4>
                <p class="text-gray-600 text-center">
                    Keberlanjutan, transparansi, inovasi, dan kolaborasi adalah nilai-nilai utama yang menjadi landasan setiap aspek operasional dan pengembangan EcoZense.
                </p>
            </div>
        </div>

        <div class="text-center" data-aos="fade-up">
            <a href="{{ route('about') }}" class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-8 rounded-full inline-flex items-center transition-all">
                <span>Selengkapnya Tentang Kami</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
</section>
