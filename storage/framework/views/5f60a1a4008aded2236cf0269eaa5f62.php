<?php $__env->startSection('title', 'Berita — SUGIH'); ?>
<?php $__env->startSection('description', 'Berita dan artikel terbaru dari SUGIH — kretek berkualitas dari tanah Cianjur.'); ?>

<?php $__env->startSection('content'); ?>

    
    
    
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 min-h-screen" data-testid="articles-index">
        <div class="absolute inset-0 -z-10 bg-sugih-green-900"></div>

        <div class="container-page">
            <h1 class="heading-display text-center text-sugih-gold text-4xl sm:text-5xl md:text-6xl mb-14" data-aos="fade-up">
                Berita
            </h1>

            <?php if(count($articles) > 0): ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('articles.show', $article['slug'])); ?>"
                           class="group block rounded-2xl overflow-hidden bg-sugih-green-800 shadow-card-soft
                                  hover:shadow-xl hover:-translate-y-1 transition-all duration-300"
                           data-aos="fade-up" data-aos-delay="<?php echo e(($index % 3) * 100); ?>">
                            
                            <div class="aspect-[16/10] overflow-hidden">
                                <img src="<?php echo e(asset($article['image'])); ?>"
                                     alt="<?php echo e($article['title']); ?>"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            
                            <div class="p-6">
                                <span class="text-sugih-gold text-xs font-semibold tracking-wide uppercase">
                                    <?php echo e($article['date']); ?>

                                </span>
                                <h3 class="text-white font-bold text-lg mt-2 mb-3 leading-snug group-hover:text-sugih-gold transition-colors">
                                    <?php echo e($article['title']); ?>

                                </h3>
                                <p class="text-white/70 text-sm leading-relaxed line-clamp-3">
                                    <?php echo e($article['excerpt']); ?>

                                </p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <div class="text-center py-20">
                    <p class="text-white/60 text-lg">Belum ada berita untuk ditampilkan.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/articles/index.blade.php ENDPATH**/ ?>