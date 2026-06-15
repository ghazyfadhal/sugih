<?php $__env->startSection('title', 'Kontak — SUGIH'); ?>

<?php $__env->startSection('content'); ?>
    <section class="pt-32 pb-20 container-page">
        <h1 class="heading-display text-white text-5xl mb-6">Hubungi Kami</h1>

        <?php if(session('success')): ?>
            <div class="bg-emerald-500/20 border border-emerald-400 text-emerald-100 px-4 py-3 rounded mb-6">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('contact.store')); ?>" class="max-w-xl grid gap-4">
            <?php echo csrf_field(); ?>
            <input type="text" name="name" placeholder="Nama Anda"
                   class="rounded-lg bg-white/10 border-white/20 text-white placeholder-white/40">
            <input type="email" name="email" placeholder="Email"
                   class="rounded-lg bg-white/10 border-white/20 text-white placeholder-white/40">
            <input type="text" name="subject" placeholder="Subjek"
                   class="rounded-lg bg-white/10 border-white/20 text-white placeholder-white/40">
            <textarea name="message" rows="5" placeholder="Pesan"
                      class="rounded-lg bg-white/10 border-white/20 text-white placeholder-white/40"></textarea>
            <button type="submit" class="btn-primary w-fit">Kirim Pesan</button>
        </form>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views\pages\contact\index.blade.php ENDPATH**/ ?>