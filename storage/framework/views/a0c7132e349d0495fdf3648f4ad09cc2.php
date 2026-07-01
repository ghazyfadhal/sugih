<?php $__env->startSection('title', 'Produk — SUGIH'); ?>
<?php $__env->startSection('description', 'Jelajahi seluruh varian rokok kretek SUGIH — Original Collection dan Flavour Collection.'); ?>

<?php $__env->startSection('content'); ?>

    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 min-h-screen" data-testid="products-page">
        
        <div class="absolute inset-0 -z-10" style="background-image: url('<?php echo e(asset('images/product-bg.jpg')); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent"></div>
        </div>

        <div class="container-page">

            
            <h1 class="heading-display text-center text-white text-4xl sm:text-5xl md:text-6xl mb-4" data-aos="fade-up">
                Produk Kami
            </h1>
            <div class="flex justify-center mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-1 bg-sugih-terracotta rounded-full"></div>
            </div>

            
            <div class="relative max-w-7xl mx-auto min-h-[60vh] flex items-center justify-center" 
                 x-data="{ selectedProduct: null }" x-cloak data-aos="fade-up" data-aos-delay="200">
                 
                
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 w-full max-w-7xl mx-auto transition-all duration-700 product-showcase-grid"
                     :class="selectedProduct ? 'opacity-0 scale-95 pointer-events-none absolute inset-0' : 'opacity-100 scale-100 relative'">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="flex justify-center items-center cursor-pointer group relative product-item transition-all duration-500 ease-out"
                             @click="selectedProduct = <?php echo e($product->id); ?>">
                             
                            
                            <div class="absolute inset-0 bg-white/5 blur-3xl rounded-full -z-10 scale-75 group-hover:scale-100 group-hover:bg-sugih-gold/20 transition-all duration-700"></div>

                            
                            <div class="flex justify-center items-center">
                                <img src="<?php echo e($product->image_url); ?>"
                                     alt="<?php echo e($product['name']); ?>"
                                     class="w-full max-w-[200px] sm:max-w-[240px] md:max-w-[280px] h-auto drop-shadow-2xl group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-700 ease-out">
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="absolute inset-0 flex flex-col md:flex-row items-center w-full h-full"
                         x-show="selectedProduct === <?php echo e($product->id); ?>"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 -translate-x-12"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-12"
                         style="display: none;">
                         
                        
                        <button type="button" @click="selectedProduct = null"
                                class="absolute top-0 right-0 md:-right-8 lg:-right-16 z-50 p-3 text-white/60 hover:text-white bg-white/10 hover:bg-white/20 rounded-full backdrop-blur-md transition-all hover:rotate-90">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        
                        <div class="w-full md:w-1/2 flex justify-center p-4 md:p-8 relative">
                            
                            <div class="absolute inset-0 bg-sugih-gold/10 blur-3xl rounded-full -z-10 scale-75 animate-pulse"></div>
                            
                            <div class="flex justify-center items-center animate-[float_4s_ease-in-out_infinite]">
                                <img src="<?php echo e($product->image_url); ?>"
                                     alt="<?php echo e($product['name']); ?>"
                                     class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg h-auto drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                            </div>
                        </div>

                        
                        <div class="w-full md:w-1/2 flex flex-col justify-center p-6 md:p-12 text-center md:text-left">
                            <h2 class="heading-display text-white text-4xl sm:text-5xl lg:text-6xl mb-6 leading-tight drop-shadow-lg">
                                <?php echo e($product['name']); ?>

                            </h2>
                            <p class="text-white/85 text-base sm:text-lg lg:text-xl leading-relaxed">
                                <?php echo e($product['description']); ?>

                            </p>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<style>
    /* Opsi 3: Focus & Blur Effect */
    .product-showcase-grid:has(> .product-item:hover) > .product-item:not(:hover) {
        opacity: 0.3;
        filter: blur(4px);
        transform: scale(0.95);
    }
</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/products/index.blade.php ENDPATH**/ ?>