<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>EcoZense - Solusi Ramah Lingkungan</title>
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    </head>
    <body class="font-sans antialiased bg-image-fixed">
        <!-- Navbar -->
        <?php if (isset($component)) { $__componentOriginal81eae4d4474677c5f580c9bfd07bf8bc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81eae4d4474677c5f580c9bfd07bf8bc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81eae4d4474677c5f580c9bfd07bf8bc)): ?>
<?php $attributes = $__attributesOriginal81eae4d4474677c5f580c9bfd07bf8bc; ?>
<?php unset($__attributesOriginal81eae4d4474677c5f580c9bfd07bf8bc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81eae4d4474677c5f580c9bfd07bf8bc)): ?>
<?php $component = $__componentOriginal81eae4d4474677c5f580c9bfd07bf8bc; ?>
<?php unset($__componentOriginal81eae4d4474677c5f580c9bfd07bf8bc); ?>
<?php endif; ?>

        <!-- Hero Section -->
        <?php if (isset($component)) { $__componentOriginal327220d710845b5b975fddfa8e8dcd7f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal327220d710845b5b975fddfa8e8dcd7f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.hero','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal327220d710845b5b975fddfa8e8dcd7f)): ?>
<?php $attributes = $__attributesOriginal327220d710845b5b975fddfa8e8dcd7f; ?>
<?php unset($__attributesOriginal327220d710845b5b975fddfa8e8dcd7f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal327220d710845b5b975fddfa8e8dcd7f)): ?>
<?php $component = $__componentOriginal327220d710845b5b975fddfa8e8dcd7f; ?>
<?php unset($__componentOriginal327220d710845b5b975fddfa8e8dcd7f); ?>
<?php endif; ?>

        <!-- Pusat Informasi Section -->
        <?php if (isset($component)) { $__componentOriginale8997136233aec9136230ca0b68fbd76 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale8997136233aec9136230ca0b68fbd76 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.information-center','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.information-center'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale8997136233aec9136230ca0b68fbd76)): ?>
<?php $attributes = $__attributesOriginale8997136233aec9136230ca0b68fbd76; ?>
<?php unset($__attributesOriginale8997136233aec9136230ca0b68fbd76); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale8997136233aec9136230ca0b68fbd76)): ?>
<?php $component = $__componentOriginale8997136233aec9136230ca0b68fbd76; ?>
<?php unset($__componentOriginale8997136233aec9136230ca0b68fbd76); ?>
<?php endif; ?>

        <!-- About Us Section -->
        <?php if (isset($component)) { $__componentOriginale0434831d1a316fbf2d71b920d37abf7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0434831d1a316fbf2d71b920d37abf7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.about-us','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.about-us'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0434831d1a316fbf2d71b920d37abf7)): ?>
<?php $attributes = $__attributesOriginale0434831d1a316fbf2d71b920d37abf7; ?>
<?php unset($__attributesOriginale0434831d1a316fbf2d71b920d37abf7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0434831d1a316fbf2d71b920d37abf7)): ?>
<?php $component = $__componentOriginale0434831d1a316fbf2d71b920d37abf7; ?>
<?php unset($__componentOriginale0434831d1a316fbf2d71b920d37abf7); ?>
<?php endif; ?>

        <!-- Kenapa Pilih EcoZense Section -->
        <?php if (isset($component)) { $__componentOriginal0ea02759970dd3b4364499a68b08494b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0ea02759970dd3b4364499a68b08494b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.features','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.features'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0ea02759970dd3b4364499a68b08494b)): ?>
<?php $attributes = $__attributesOriginal0ea02759970dd3b4364499a68b08494b; ?>
<?php unset($__attributesOriginal0ea02759970dd3b4364499a68b08494b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0ea02759970dd3b4364499a68b08494b)): ?>
<?php $component = $__componentOriginal0ea02759970dd3b4364499a68b08494b; ?>
<?php unset($__componentOriginal0ea02759970dd3b4364499a68b08494b); ?>
<?php endif; ?>

        <!-- Produk Eco Enzim Section -->
        <?php if (isset($component)) { $__componentOriginalbbf7aaac6fcf79abed980187d0a9fd93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalbbf7aaac6fcf79abed980187d0a9fd93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.products','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.products'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalbbf7aaac6fcf79abed980187d0a9fd93)): ?>
<?php $attributes = $__attributesOriginalbbf7aaac6fcf79abed980187d0a9fd93; ?>
<?php unset($__attributesOriginalbbf7aaac6fcf79abed980187d0a9fd93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbbf7aaac6fcf79abed980187d0a9fd93)): ?>
<?php $component = $__componentOriginalbbf7aaac6fcf79abed980187d0a9fd93; ?>
<?php unset($__componentOriginalbbf7aaac6fcf79abed980187d0a9fd93); ?>
<?php endif; ?>

        <!-- Program Nasabah Section -->
        <?php if (isset($component)) { $__componentOriginal61bee2f24104b68690004926c25d4bcd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal61bee2f24104b68690004926c25d4bcd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.program','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.program'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal61bee2f24104b68690004926c25d4bcd)): ?>
<?php $attributes = $__attributesOriginal61bee2f24104b68690004926c25d4bcd; ?>
<?php unset($__attributesOriginal61bee2f24104b68690004926c25d4bcd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal61bee2f24104b68690004926c25d4bcd)): ?>
<?php $component = $__componentOriginal61bee2f24104b68690004926c25d4bcd; ?>
<?php unset($__componentOriginal61bee2f24104b68690004926c25d4bcd); ?>
<?php endif; ?>

        <!-- Lokasi Bank Sampah Section -->
        <?php if (isset($component)) { $__componentOriginal57be6fe5fa541df233da8390912b04fa = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal57be6fe5fa541df233da8390912b04fa = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.location','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.location'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal57be6fe5fa541df233da8390912b04fa)): ?>
<?php $attributes = $__attributesOriginal57be6fe5fa541df233da8390912b04fa; ?>
<?php unset($__attributesOriginal57be6fe5fa541df233da8390912b04fa); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal57be6fe5fa541df233da8390912b04fa)): ?>
<?php $component = $__componentOriginal57be6fe5fa541df233da8390912b04fa; ?>
<?php unset($__componentOriginal57be6fe5fa541df233da8390912b04fa); ?>
<?php endif; ?>

        <!-- Footer -->
        <?php if (isset($component)) { $__componentOriginal072e9a89eb33ca4c48f7e8f7970944d7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal072e9a89eb33ca4c48f7e8f7970944d7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('home.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal072e9a89eb33ca4c48f7e8f7970944d7)): ?>
<?php $attributes = $__attributesOriginal072e9a89eb33ca4c48f7e8f7970944d7; ?>
<?php unset($__attributesOriginal072e9a89eb33ca4c48f7e8f7970944d7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal072e9a89eb33ca4c48f7e8f7970944d7)): ?>
<?php $component = $__componentOriginal072e9a89eb33ca4c48f7e8f7970944d7; ?>
<?php unset($__componentOriginal072e9a89eb33ca4c48f7e8f7970944d7); ?>
<?php endif; ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\PBL-211\resources\views/welcome.blade.php ENDPATH**/ ?>