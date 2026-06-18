<?php $__env->startSection('header', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="<?php echo e(route('admin.products.index')); ?>" class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Kembali ke Daftar Produk</a>
        <h2 class="text-xl font-bold text-gray-800">Form Tambah Produk</h2>
    </div>
</div>

<form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-4xl">
    <?php echo csrf_field(); ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Kolom Kiri -->
        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all" placeholder="Contoh: SUGIH Kopi Susu">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="collection" class="block text-sm font-semibold text-gray-700 mb-2">Kategori Koleksi <span class="text-red-500">*</span></label>
                <div class="relative">
                    <select id="collection" name="collection" required class="w-full px-4 py-3 rounded-xl border border-gray-300 appearance-none focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all bg-white">
                        <option value="">Pilih Koleksi...</option>
                        <option value="Original Collection" <?php echo e(old('collection') == 'Original Collection' ? 'selected' : ''); ?>>Original Collection</option>
                        <option value="Flavour Collection" <?php echo e(old('collection') == 'Flavour Collection' ? 'selected' : ''); ?>>Flavour Collection</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                <?php $__errorArgs = ['collection'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="tagline" class="block text-sm font-semibold text-gray-700 mb-2">Tagline (Opsional)</label>
                <input type="text" id="tagline" name="tagline" value="<?php echo e(old('tagline')); ?>" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all" placeholder="Contoh: Kopi yang bikin melek">
                <?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status Visibilitas</label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" class="sr-only peer" checked>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                    <span class="ms-3 text-sm font-medium text-gray-700">Tampilkan di Website</span>
                </label>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="space-y-6">
            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Gambar Produk</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#E6C981] transition-colors bg-gray-50 relative">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-[#8B753A] hover:text-[#E6C981] focus-within:outline-none">
                                <span>Upload file</span>
                                <input id="image" name="image" type="file" accept="image/*" class="sr-only">
                            </label>
                            <p class="pl-1">atau drag & drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, WEBP up to 2MB</p>
                    </div>
                </div>
                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Lengkap (Opsional)</label>
                <textarea id="description" name="description" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all"><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>
    </div>

    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
        <button type="submit" class="bg-black text-white px-8 py-3 rounded-xl font-semibold hover:bg-gray-900 transition-colors">
            Simpan Produk
        </button>
    </div>

</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/admin/products/create.blade.php ENDPATH**/ ?>