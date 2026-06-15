<?php $__env->startSection('title', 'Detail Artikel — SUGIH'); ?>

<?php $__env->startSection('content'); ?>
    <section class="pt-32 pb-20 container-page">
        <h1 class="heading-display text-white text-5xl mb-6">Detail Artikel</h1>
        <p class="text-white/80">Slug: <code class="text-sugih-gold"><?php echo e($article['slug']); ?></code></p>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views\pages\articles\show.blade.php ENDPATH**/ ?>