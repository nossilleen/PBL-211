

<?php $__env->startSection('content'); ?>
<!-- Tambahkan navbar browse di awal konten -->
<?php if (isset($component)) { $__componentOriginalb6e9c29412aa8a3203ea7e5deeb02fc4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb6e9c29412aa8a3203ea7e5deeb02fc4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar.browse','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar.browse'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb6e9c29412aa8a3203ea7e5deeb02fc4)): ?>
<?php $attributes = $__attributesOriginalb6e9c29412aa8a3203ea7e5deeb02fc4; ?>
<?php unset($__attributesOriginalb6e9c29412aa8a3203ea7e5deeb02fc4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6e9c29412aa8a3203ea7e5deeb02fc4)): ?>
<?php $component = $__componentOriginalb6e9c29412aa8a3203ea7e5deeb02fc4; ?>
<?php unset($__componentOriginalb6e9c29412aa8a3203ea7e5deeb02fc4); ?>
<?php endif; ?>

<div class="container mx-auto px-4 py-8 mt-20">
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-900 to-green-700 text-white rounded-lg p-8 mb-10 relative overflow-hidden">
        <div class="relative z-10 max-w-2xl">
            <h1 class="text-4xl font-bold mb-4">Welcome to EcoZense</h1>
            <p class="text-xl mb-4">The Best Eco-Enzyme related website in the world</p>
        </div>
        <div class="absolute right-0 top-0 h-full w-1/2 flex items-center justify-center">
            <img src="<?php echo e(asset('images/Logo.png')); ?>" alt="EcoZense Logo" class="h-32 object-contain opacity-80">
        </div>
    </div>

    <!-- Search Results Section -->
    <div class="mb-10">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Hasil Pencarian</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $tokos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toko): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="toko-card">
                    <?php echo $__env->make('components.browse-toko.card', ['toko' => $toko], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            
            <div>
                <h4 class="font-bold text-lg mb-4">Product</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Product</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Product</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Product</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Product</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Product</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Product</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-bold text-lg mb-4">Company</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Company</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Company</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Company</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Company</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Company</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-gray-900">Company</a></li>
                </ul>
            </div>
            
            <div class="md:col-span-1">
                <!-- Empty column to match the layout in the image -->
            </div>
        </div>
        
        <div class="text-center text-sm text-gray-600 border-t pt-4">
            <p>© 2010 - 2020 — Privacy — Terms</p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/browse-toko.blade.php ENDPATH**/ ?>