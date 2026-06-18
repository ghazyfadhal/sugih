

<?php $__env->startSection('header', 'Kelola Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-xl font-bold text-gray-800">Daftar Produk</h2>
        <p class="text-gray-500 text-sm">Kelola katalog produk SUGIH (Original & Flavour).</p>
    </div>
    <a href="<?php echo e(route('admin.products.create')); ?>" class="bg-sugih-green-900 text-sugih-gold px-5 py-2.5 rounded-xl font-semibold hover:bg-sugih-green-800 transition-colors flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
        Tambah Produk
    </a>
</div>

<?php if(session('success')): ?>
    <div class="mb-6 bg-green-50 text-green-700 p-4 rounded-xl border border-green-100 flex items-center">
        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-sm text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-4 font-medium">Gambar</th>
                    <th class="px-6 py-4 font-medium">Nama Produk</th>
                    <th class="px-6 py-4 font-medium">Koleksi</th>
                    <th class="px-6 py-4 font-medium">Status</th>
                    <th class="px-6 py-4 font-medium text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <?php if($product->image): ?>
                            <img src="<?php echo e($product->image_url); ?>" class="w-16 h-16 object-cover rounded-lg border border-gray-200">
                        <?php else: ?>
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-semibold text-gray-800"><?php echo e($product->name); ?></div>
                        <div class="text-xs text-gray-500"><?php echo e($product->tagline ?? '-'); ?></div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium <?php echo e($product->collection == 'Original Collection' ? 'bg-[#E6C981]/20 text-[#8B753A]' : 'bg-purple-100 text-purple-700'); ?>">
                            <?php echo e($product->collection); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <?php if($product->is_active): ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full"></span> Aktif
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <span class="w-2 h-2 mr-1.5 bg-gray-500 rounded-full"></span> Draft
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            Edit
                        </a>
                        <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                        <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        Belum ada data produk.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($products->hasPages()): ?>
        <div class="px-6 py-4 border-t border-gray-100">
            <?php echo e($products->links()); ?>

        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/admin/products/index.blade.php ENDPATH**/ ?>