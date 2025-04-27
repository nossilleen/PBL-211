

<?php $__env->startSection('content'); ?>
<!-- Tambahkan navbar artikel di awal konten -->
<?php if (isset($component)) { $__componentOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar.artikel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar.artikel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3)): ?>
<?php $attributes = $__attributesOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3; ?>
<?php unset($__attributesOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3)): ?>
<?php $component = $__componentOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3; ?>
<?php unset($__componentOriginaldab9ccf700cc8e9f61a9fb45ecf5eeb3); ?>
<?php endif; ?>

<div class="container mx-auto px-4 py-8 mt-20">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-900 to-green-700 text-white rounded-lg p-8 mb-10 relative overflow-hidden">
        <div class="relative z-10 max-w-2xl">
            <h1 class="text-4xl font-bold mb-4">Artikel EcoZense</h1>
            <p class="text-xl mb-4">Berbagai artikel dan informasi seputar eco-enzyme dan lingkungan</p>
        </div>
        <div class="absolute right-0 top-0 h-full w-1/2 flex items-center justify-center">
            <img src="<?php echo e(asset('images/Logo.png')); ?>" alt="EcoZense Logo" class="h-32 object-contain opacity-80">
        </div>
    </div>

    <!-- Featured Article -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Artikel Pilihan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/600x300" alt="Featured Article" class="w-full h-64 object-cover">
                <div class="p-6">
                    <span class="text-green-600 font-medium">Lingkungan</span>
                    <h3 class="text-2xl font-bold mt-2 mb-3">Manfaat Eco-Enzyme untuk Lingkungan Rumah</h3>
                    <p class="text-gray-600 mb-4">Pelajari bagaimana eco-enzyme dapat membantu mengurangi penggunaan bahan kimia berbahaya di rumah Anda sekaligus mengurangi sampah organik.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500">5 Mei 2023 • 8 menit membaca</span>
                        <a href="#" class="text-green-600 hover:text-green-800 font-medium">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 gap-6">
                <div class="bg-white rounded-lg overflow-hidden shadow-md flex">
                    <img src="https://via.placeholder.com/300x200" alt="Article" class="w-1/3 object-cover">
                    <div class="p-4 w-2/3">
                        <span class="text-green-600 font-medium text-sm">Tutorial</span>
                        <h3 class="text-lg font-bold mt-1 mb-2">Cara Membuat Eco-Enzyme dari Limbah Dapur</h3>
                        <p class="text-gray-600 text-sm mb-2 line-clamp-2">Panduan langkah demi langkah untuk membuat eco-enzyme dari sisa buah dan sayur.</p>
                        <span class="text-xs text-gray-500">3 Juni 2023</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md flex">
                    <img src="https://via.placeholder.com/300x200" alt="Article" class="w-1/3 object-cover">
                    <div class="p-4 w-2/3">
                        <span class="text-green-600 font-medium text-sm">Kesehatan</span>
                        <h3 class="text-lg font-bold mt-1 mb-2">Manfaat Eco-Enzyme untuk Kesehatan Tubuh</h3>
                        <p class="text-gray-600 text-sm mb-2 line-clamp-2">Temukan bagaimana eco-enzyme dapat digunakan sebagai bahan alami untuk perawatan tubuh.</p>
                        <span class="text-xs text-gray-500">15 Mei 2023</span>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg overflow-hidden shadow-md flex">
                    <img src="https://via.placeholder.com/300x200" alt="Article" class="w-1/3 object-cover">
                    <div class="p-4 w-2/3">
                        <span class="text-green-600 font-medium text-sm">Pertanian</span>
                        <h3 class="text-lg font-bold mt-1 mb-2">Eco-Enzyme sebagai Pupuk Organik</h3>
                        <p class="text-gray-600 text-sm mb-2 line-clamp-2">Aplikasi eco-enzyme pada tanaman dan manfaatnya untuk pertumbuhan tanaman.</p>
                        <span class="text-xs text-gray-500">22 April 2023</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Articles -->
    <div class="mb-10">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Artikel Terbaru</h2>
            <div class="flex space-x-2">
                <button class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Semua</button>
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Lingkungan</button>
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Tutorial</button>
                <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Kesehatan</button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php for($i = 1; $i <= 6; $i++): ?>
            <div class="bg-white rounded-lg overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/400x250" alt="Article Image" class="w-full h-48 object-cover">
                <div class="p-5">
                    <span class="text-green-600 font-medium text-sm">Lingkungan</span>
                    <h3 class="text-xl font-bold mt-2 mb-3">Artikel Terbaru <?php echo e($i); ?></h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-500"><?php echo e($i); ?> Juni 2023</span>
                        <a href="#" class="text-green-600 hover:text-green-800 font-medium">Baca</a>
                    </div>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        
        <div class="flex justify-center mt-8">
            <button class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 font-medium">Lihat Lebih Banyak</button>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="bg-green-100 rounded-lg p-8 mb-10">
        <div class="max-w-xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-gray-800 mb-3">Dapatkan Artikel Terbaru</h2>
            <p class="text-gray-600 mb-6">Berlangganan newsletter kami untuk mendapatkan update artikel terbaru tentang eco-enzyme dan lingkungan.</p>
            <div class="flex">
                <input type="email" placeholder="Alamat Email Anda" class="px-4 py-3 rounded-l-md w-full focus:outline-none">
                <button class="bg-green-600 text-white px-6 py-3 rounded-r-md hover:bg-green-700 font-medium">Berlangganan</button>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="border-t pt-8 pb-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
                <h4 class="font-bold text-lg mb-4">ECOZENSE</h4>
                <div class="mb-4">
                    <h5 class="font-medium mb-2">Latest Blog Post</h5>
                    <h6 class="font-semibold mb-2">Ready to get started?</h6>
                    <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            
            <div>
                <h4 class="font-bold text-lg mb-4">Artikel</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Lingkungan</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Tutorial</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Kesehatan</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Pertanian</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Bisnis</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-bold text-lg mb-4">Company</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Kontak</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Karir</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">FAQ</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-bold text-lg mb-4">Ikuti Kami</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="text-center text-sm text-gray-600 border-t pt-4">
            <p>© 2023 EcoZense — Privacy — Terms</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/artikel.blade.php ENDPATH**/ ?>