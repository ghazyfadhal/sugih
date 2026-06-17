<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', config('app.name', 'SUGIH')); ?> — Semua Ingin Sugih</title>
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'SUGIH — kretek berkualitas dari tanah Cianjur. Diproduksi oleh CV. Prioritas Group.'); ?>">

    
    <link rel="icon" href="<?php echo e(asset('images/favicon.svg')); ?>" type="image/svg+xml">

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body id="top" class="min-h-screen flex flex-col bg-sugih-green-900">

    <?php echo $__env->make('partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="flex-1">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <?php echo $__env->make('partials.warning', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->make('partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\SUGIH\sugih\resources\views/layouts/app.blade.php ENDPATH**/ ?>