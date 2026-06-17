<?php $__env->startSection('title', $karir['title'] . ' — Karir SUGIH'); ?>
<?php $__env->startSection('description', 'Lowongan ' . $karir['title'] . ' di CV. Prioritas Group (SUGIH). Lokasi: ' . $karir['location']); ?>

<?php $__env->startSection('content'); ?>

    
    
    

    
    <section class="relative pt-28 pb-16 lg:pt-36 lg:pb-20" data-testid="karir-detail-hero">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('<?php echo e(asset('images/karir-2.png')); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page text-center">
            <span class="inline-block bg-sugih-gold/20 text-sugih-gold text-xs font-bold uppercase tracking-widest
                         px-4 py-1.5 rounded-full mb-4">
                <?php echo e($karir['type']); ?> — <?php echo e($karir['location']); ?>

            </span>
            <h1 class="heading-display text-white text-2xl sm:text-3xl md:text-4xl">
                <?php echo e($karir['title']); ?>

            </h1>
        </div>
    </section>

    
    <section class="relative py-12 lg:py-16" data-testid="karir-detail-content">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('<?php echo e(asset('images/karir.png')); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>

        <div class="container-page">
            <div class="max-w-3xl mx-auto bg-sugih-green-800/80 backdrop-blur-sm border border-white/10
                        rounded-2xl p-8 sm:p-10 lg:p-12 shadow-card-soft">

                
                <h2 class="text-white font-bold text-xl sm:text-2xl mb-8">
                    <?php echo e($karir['title']); ?>

                </h2>

                
                <div class="mb-8">
                    <h3 class="text-white font-bold text-base sm:text-lg mb-4">Deskripsi Pekerjaan:</h3>
                    <ul class="text-white/85 text-sm sm:text-base leading-relaxed space-y-3">
                        <?php $__currentLoopData = $karir['description']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex gap-3">
                                <span class="text-sugih-gold mt-1 shrink-0">•</span>
                                <span><?php echo e($desc); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <div class="mb-10">
                    <h3 class="text-white font-bold text-base sm:text-lg mb-4">Kualifikasi:</h3>
                    <ul class="text-white/85 text-sm sm:text-base leading-relaxed space-y-3">
                        <?php $__currentLoopData = $karir['qualifications']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qual): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex gap-3">
                                <span class="text-sugih-gold mt-1 shrink-0">•</span>
                                <span><?php echo e($qual); ?></span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                
                <div class="flex flex-wrap items-center gap-4 pt-6 border-t border-white/10">
                    <a href="mailto:cvprioritasgroup@gmail.com?subject=Lamaran: <?php echo e(urlencode($karir['title'])); ?>"
                       class="inline-flex items-center justify-center px-8 py-3 rounded-lg
                              bg-sugih-green-700 hover:bg-sugih-green-600 transition-colors duration-300
                              text-white font-bold text-sm shadow-lg">
                        Lamar Sekarang
                    </a>
                    <a href="https://wa.me/628123456789?text=<?php echo e(urlencode('Halo, saya ingin bertanya mengenai lowongan ' . $karir['title'])); ?>"
                       target="_blank" rel="noopener noreferrer"
                       class="text-sugih-gold hover:text-white font-bold text-sm transition-colors">
                        Ada pertanyaan?
                    </a>
                </div>
            </div>

            
            <div class="max-w-3xl mx-auto mt-8">
                <a href="<?php echo e(route('karir.index')); ?>"
                   class="inline-flex items-center gap-2 text-sugih-gold hover:text-white font-bold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Karir
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/karir/show.blade.php ENDPATH**/ ?>