<div class="bg-white rounded-lg overflow-hidden shadow-md">
    <div class="h-48 overflow-hidden">
        <img src="<?php echo e(asset('images/' . $toko['gambar'])); ?>" alt="<?php echo e($toko['nama']); ?>" class="w-full h-full object-cover">
    </div>
    <div class="p-4">
        <h3 class="text-lg font-semibold mb-2"><?php echo e($toko['nama']); ?></h3>
        <p class="text-sm text-gray-600 mb-3"><?php echo e($toko['deskripsi']); ?></p>
        
        <div class="mb-4">
            <p class="text-xs text-gray-500 font-medium">Alamat:</p>
            <p class="text-xs text-gray-600"><?php echo e($toko['alamat']); ?></p>
        </div>
        
        <a href="#" class="block w-full bg-green-500 hover:bg-green-600 text-white text-center py-2 rounded-md transition duration-300">
            Belanja
        </a>
    </div>
</div> <?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/components/browse-toko/card.blade.php ENDPATH**/ ?>