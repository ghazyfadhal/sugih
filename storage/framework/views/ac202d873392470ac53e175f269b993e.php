

<?php $__env->startSection('header', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- Stats Card: Products -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center">
        <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
        </div>
        <div class="ml-6">
            <h3 class="text-gray-500 text-sm font-medium">Total Produk</h3>
            <p class="text-3xl font-bold text-gray-800"><?php echo e(\App\Models\Product::count()); ?></p>
        </div>
    </div>

    <!-- Stats Card: Articles -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center">
        <div class="w-14 h-14 rounded-full bg-green-50 text-green-500 flex items-center justify-center">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
        </div>
        <div class="ml-6">
            <h3 class="text-gray-500 text-sm font-medium">Total Artikel</h3>
            <p class="text-3xl font-bold text-gray-800"><?php echo e(\App\Models\Article::count()); ?></p>
        </div>
    </div>

    <!-- Stats Card: Careers -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center">
        <div class="w-14 h-14 rounded-full bg-purple-50 text-purple-500 flex items-center justify-center">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
        </div>
        <div class="ml-6">
            <h3 class="text-gray-500 text-sm font-medium">Lowongan Karir</h3>
            <p class="text-3xl font-bold text-gray-800"><?php echo e(\App\Models\Career::count()); ?></p>
        </div>
    </div>

</div>

<div class="mt-8 bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Selamat Datang di Admin Panel SUGIH</h2>
    <p class="text-gray-600">
        Panel Admin ini memungkinkan Anda untuk mengelola konten website seperti <strong>Produk</strong>, <strong>Artikel/Berita</strong>, dan <strong>Karir</strong>. 
        Karena masalah kompatibilitas sistem server dengan Filament, panel ini dibangun secara khusus (Custom Build) agar sangat ringan, cepat, dan 100% aman bagi <i>database</i> Anda.
    </p>
    <div class="mt-6">
        <p class="text-sm text-gray-500 italic">Pilih menu di sebelah kiri untuk mulai mengelola data.</p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>