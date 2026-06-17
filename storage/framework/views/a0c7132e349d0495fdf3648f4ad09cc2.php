<?php $__env->startSection('title', 'Produk — SUGIH'); ?>
<?php $__env->startSection('description', 'Jelajahi seluruh varian rokok kretek SUGIH — Original Collection dan Flavour Collection.'); ?>

<?php $__env->startSection('content'); ?>

    
    
    
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 min-h-screen" data-testid="products-page">
        
        <div class="absolute inset-0 -z-10"
             style="background-image: url('<?php echo e(asset('images/product-bg.jpg')); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page">

            
            <h1 class="heading-display text-center text-sugih-gold text-4xl sm:text-5xl md:text-6xl mb-4" data-aos="fade-up">
                Produk Kami
            </h1>
            <div class="flex justify-center mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-1 bg-sugih-red rounded-full"></div>
            </div>

            
            <div class="relative max-w-6xl mx-auto" x-data="productShowcase()" x-cloak data-aos="fade-up" data-aos-delay="200">

                <div class="swiper product-page-swiper">
                    <div class="swiper-wrapper items-center">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide flex justify-center" data-index="<?php echo e($index); ?>">
                                <div class="product-slide-inner transition-all duration-500 flex justify-center">
                                    <img src="<?php echo e(asset($product['image'])); ?>"
                                         alt="<?php echo e($product['name']); ?>"
                                         class="h-64 sm:h-72 md:h-80 lg:h-96 w-auto object-contain drop-shadow-2xl
                                                transition-all duration-500">
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <button type="button"
                        class="product-page-prev carousel-arrow absolute left-0 sm:-left-6 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Produk sebelumnya">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 6l-6 6 6 6"/>
                    </svg>
                </button>
                <button type="button"
                        class="product-page-next carousel-arrow absolute right-0 sm:-right-6 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Produk berikutnya">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6"/>
                    </svg>
                </button>

                
                <div class="mt-10 text-center">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product-info-panel transition-all duration-500"
                             data-panel="<?php echo e($index); ?>"
                             style="<?php echo e($index !== 0 ? 'display:none;' : ''); ?>">
                            <h2 class="heading-display text-white text-2xl sm:text-3xl md:text-4xl mb-4">
                                <?php echo e($product['name']); ?>

                            </h2>
                            <p class="text-white/80 text-sm sm:text-base md:text-lg leading-relaxed max-w-3xl mx-auto">
                                <?php echo e($product['description']); ?>

                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="product-page-pagination flex justify-center mt-10 !static"></div>
            </div>

        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    function productShowcase() {
        return {
            init() {
                // handled by app.js Swiper init
            }
        };
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/products/index.blade.php ENDPATH**/ ?>