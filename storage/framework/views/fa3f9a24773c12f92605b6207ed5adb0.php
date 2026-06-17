<?php $__env->startSection('title', $article['title'] . ' — SUGIH'); ?>
<?php $__env->startSection('description', $article['excerpt']); ?>

<?php $__env->startSection('content'); ?>

    
    
    
    <article class="bg-sugih-green-900 min-h-screen" data-testid="article-detail">

        
        <div class="w-full pt-20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
                <div class="rounded-2xl overflow-hidden shadow-card-soft" data-aos="fade-up">
                    <img src="<?php echo e(asset($article['image'])); ?>"
                         alt="<?php echo e($article['title']); ?>"
                         class="w-full aspect-[16/9] object-cover">
                </div>
            </div>
        </div>

        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

            
            <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                <span class="text-sugih-gold text-sm font-semibold tracking-wide">
                    <?php echo e($article['date']); ?>

                </span>
                <div class="w-16 h-1 bg-red-600 mt-3"></div>
            </div>

            
            <h1 class="heading-display text-white text-2xl sm:text-3xl md:text-4xl leading-tight mb-8" data-aos="fade-up" data-aos-delay="150">
                <?php echo e($article['title']); ?>

            </h1>

            
            <div class="prose-sugih text-white/90 text-base sm:text-lg leading-relaxed space-y-6" data-aos="fade-up" data-aos-delay="200">
                <?php echo $article['body']; ?>

            </div>

            
            <div class="mt-14 pt-8 border-t border-white/10">
                <a href="<?php echo e(route('articles.index')); ?>"
                   class="inline-flex items-center gap-2 text-sugih-gold hover:text-white font-bold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Berita
                </a>
            </div>
        </div>
    </article>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/articles/show.blade.php ENDPATH**/ ?>