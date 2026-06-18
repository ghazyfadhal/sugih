

<?php $__env->startSection('content'); ?>
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
        
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-3 mb-4">
                <img src="<?php echo e(asset('images/admin-logo.svg')); ?>" alt="SUGIH Admin Logo" class="h-16 w-auto">
                <span class="text-xl font-light tracking-widest text-gray-500 mt-2">ADMIN</span>
            </div>
            <p class="text-gray-500 text-sm">Masuk untuk mengelola website</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="bg-red-50 text-red-600 p-4 rounded-xl mb-6 text-sm border border-red-100">
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-6">
            <?php echo csrf_field(); ?>
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <input id="email" name="email" type="email" value="<?php echo e(old('email')); ?>" required autofocus class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input id="password" name="password" type="password" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-sugih-green-900 text-sugih-gold rounded-xl py-3 px-4 font-semibold hover:bg-sugih-green-800 transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-sugih-green-900">
                    Masuk ke Dashboard
                </button>
            </div>
        </form>

        <div class="mt-8 text-center">
            <a href="<?php echo e(route('home')); ?>" class="text-sm text-gray-500 hover:text-black transition-colors">
                &larr; Kembali ke Website
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/admin/login.blade.php ENDPATH**/ ?>