<?php $__env->startSection('title', 'SUGIH — Semua Ingin Sugih'); ?>

<?php $__env->startSection('content'); ?>

    
    
    
    <section
        class="relative isolate min-h-screen flex items-center justify-center text-center grain overflow-hidden pt-20"
        data-testid="hero-section"
    >
        <div class="absolute inset-0 -z-10">
            <img src="<?php echo e(asset('images/hero-tobacco.jpg')); ?>"
                 alt="Daun tembakau SUGIH"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-sugih-green-900/40 via-black/40 to-sugih-green-900/70"></div>
        </div>

        <div class="container-page py-24 animate-fade-up">
            
            <div class="flex justify-center mb-8">
                <img src="<?php echo e(asset('images/wordmark-sugih.svg')); ?>"
                     alt="SUGIH" class="h-16 sm:h-20 w-auto">
            </div>

            <h1 class="heading-display text-white text-5xl sm:text-6xl md:text-7xl">
                Semua Ingin Sugih
            </h1>

            <p class="mt-8 max-w-2xl mx-auto text-white/85 text-base sm:text-lg leading-relaxed font-light">
                Waktumu terbatas jangan habiskan waktu untuk mencari rasa yang lain.<br>
                Sebab yang mantap sedang kamu buka sekarang dan pencarianmu sudah tuntas.<br>
                <span class="italic">Harum Berkelas dan Berkualitas.</span>
            </p>

            <div class="mt-12">
                <a href="<?php echo e(route('about')); ?>" class="btn-primary" data-testid="hero-cta">
                    Lebih lanjut
                </a>
            </div>
        </div>
    </section>


    
    
    
    <section class="relative py-24 lg:py-32 overflow-hidden" data-testid="cerita-section">
        <div class="absolute inset-0 -z-10">
            <img src="<?php echo e(asset('images/farmer.jpg')); ?>"
                 alt="Petani tembakau Cianjur" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/30"></div>
        </div>

        <div class="container-page">
            <div class="max-w-xl bg-sugih-green-700/90 backdrop-blur-sm rounded-md p-8 sm:p-10 shadow-card-soft">
                <h2 class="heading-display text-white text-4xl sm:text-5xl mb-6">
                    Cerita <br class="hidden sm:block">Kami
                </h2>

                <p class="text-white/90 leading-relaxed text-base">
                    Lahir di Cianjur pada 2023, Sugih hadir dari filosofi lokal
                    <em>Sugih Mukti</em>, bermakna subur dan kaya, sebagai wujud
                    semangat untuk mengangkat potensi tembakau Cianjur menjadi
                    produk kretek berkelas. Di bawah naungan CV. Prioritas Group,
                    kami percaya bahwa kemakmuran sejati tumbuh dari tanah
                    sendiri, dikerjakan dengan tangan sendiri.
                </p>

                <div class="mt-8">
                    <a href="<?php echo e(route('about')); ?>" class="btn-primary" data-testid="cerita-cta">
                        Lebih lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>


    
    
    
    <section class="relative py-24 lg:py-28 overflow-hidden" data-testid="products-section">
        <div class="absolute inset-0 -z-10">
            <img src="<?php echo e(asset('images/product-bg.jpg')); ?>"
                 alt="Tembakau kering" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-sugih-green-900/85"></div>
        </div>

        <div class="container-page">
            <h2 class="heading-display text-center text-white text-4xl sm:text-5xl md:text-6xl mb-14">
                Produk Kami
            </h2>

            <div class="relative">
                <div class="swiper product-swiper">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <article class="bg-sugih-green-800/40 backdrop-blur-sm rounded-3xl p-6 sm:p-10
                                                grid grid-cols-1 md:grid-cols-[260px_1fr] gap-8 items-center
                                                shadow-card-soft">
                                    <div class="flex justify-center">
                                        <img
                                            src="<?php echo e(asset($product['image'])); ?>"
                                            alt="<?php echo e($product['name']); ?>"
                                            class="h-44 sm:h-56 w-auto object-contain drop-shadow-2xl"
                                        >
                                    </div>

                                    <div class="text-white">
                                        <div class="flex flex-wrap items-center gap-3 mb-3">
                                            <h3 class="heading-display text-3xl sm:text-4xl"><?php echo e($product['name']); ?></h3>
                                            <?php if(!empty($product['tagline'])): ?>
                                                <span class="inline-flex items-center px-4 py-1.5 rounded-full
                                                             bg-sky-300/90 text-sugih-green-900 text-xs font-bold">
                                                    <?php echo e($product['tagline']); ?>

                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <p class="text-white/85 leading-relaxed">
                                            <?php echo e($product['description']); ?>

                                        </p>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <button type="button"
                        class="product-swiper-prev carousel-arrow absolute -left-2 sm:-left-6 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Sebelumnya" data-testid="product-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 6l-6 6 6 6"/>
                    </svg>
                </button>
                <button type="button"
                        class="product-swiper-next carousel-arrow absolute -right-2 sm:-right-6 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Berikutnya" data-testid="product-next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6"/>
                    </svg>
                </button>

                <div class="product-swiper-pagination flex justify-center mt-8 !static"></div>
            </div>
        </div>
    </section>


    
    
    
    <section class="relative py-24 lg:py-28 overflow-hidden" data-testid="articles-section">
        <div class="absolute inset-0 -z-10">
            <img src="<?php echo e(asset('images/article-bg.jpg')); ?>"
                 alt="" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-sugih-green-900/85"></div>
        </div>

        <div class="container-page">
            <h2 class="heading-display text-center text-white text-4xl sm:text-5xl md:text-6xl mb-14">
                Berita
            </h2>

            <div class="relative max-w-4xl mx-auto">
                <div class="swiper article-swiper">
                    <div class="swiper-wrapper">
                        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo e(route('articles.show', $article['slug'])); ?>"
                                   class="block relative rounded-3xl overflow-hidden shadow-card-soft group">
                                    <img src="<?php echo e(asset($article['image'])); ?>"
                                         alt="<?php echo e($article['title']); ?>"
                                         class="w-full h-72 sm:h-96 object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
                                    <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                                        <h3 class="heading-display text-white text-2xl sm:text-3xl mb-2">
                                            <?php echo e($article['title']); ?>

                                        </h3>
                                        <p class="text-white/80 text-sm line-clamp-2"><?php echo e($article['excerpt']); ?></p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <button type="button"
                        class="article-swiper-prev carousel-arrow absolute -left-2 sm:-left-14 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Sebelumnya" data-testid="article-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 6l-6 6 6 6"/>
                    </svg>
                </button>
                <button type="button"
                        class="article-swiper-next carousel-arrow absolute -right-2 sm:-right-14 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Berikutnya" data-testid="article-next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6"/>
                    </svg>
                </button>

                <div class="article-swiper-pagination flex justify-center mt-8 !static"></div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views\pages\home\index.blade.php ENDPATH**/ ?>