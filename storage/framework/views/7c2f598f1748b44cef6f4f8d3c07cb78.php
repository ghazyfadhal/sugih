

<?php $__env->startSection('header', 'Tambah Lowongan Karir'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-6 flex justify-between items-center">
    <div>
        <a href="<?php echo e(route('admin.careers.index')); ?>" class="text-sm text-gray-500 hover:text-black mb-2 inline-block">&larr; Kembali ke Daftar Lowongan</a>
        <h2 class="text-xl font-bold text-gray-800">Form Tambah Lowongan</h2>
    </div>
</div>

<form action="<?php echo e(route('admin.careers.store')); ?>" method="POST" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 max-w-4xl">
    <?php echo csrf_field(); ?>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Kolom Kiri -->
        <div class="space-y-6">
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Posisi / Judul <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="<?php echo e(old('title')); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all" placeholder="Contoh: Barista, Social Media Specialist">
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="department" class="block text-sm font-semibold text-gray-700 mb-2">Departemen / Divisi <span class="text-red-500">*</span></label>
                <input type="text" id="department" name="department" value="<?php echo e(old('department')); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all" placeholder="Contoh: Operasional, Marketing">
                <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="location" class="block text-sm font-semibold text-gray-700 mb-2">Lokasi Penempatan <span class="text-red-500">*</span></label>
                <input type="text" id="location" name="location" value="<?php echo e(old('location')); ?>" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all" placeholder="Contoh: Bandung, Indonesia">
                <?php $__errorArgs = ['location'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">Tipe Pekerjaan <span class="text-red-500">*</span></label>
                <div class="relative">
                    <select id="type" name="type" required class="w-full px-4 py-3 rounded-xl border border-gray-300 appearance-none focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all bg-white">
                        <option value="">Pilih Tipe...</option>
                        <option value="Full-time" <?php echo e(old('type') == 'Full-time' ? 'selected' : ''); ?>>Full-time</option>
                        <option value="Part-time" <?php echo e(old('type') == 'Part-time' ? 'selected' : ''); ?>>Part-time</option>
                        <option value="Contract" <?php echo e(old('type') == 'Contract' ? 'selected' : ''); ?>>Contract</option>
                        <option value="Internship" <?php echo e(old('type') == 'Internship' ? 'selected' : ''); ?>>Internship</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            
            <div class="pt-4 border-t border-gray-100">
                <label class="block text-sm font-semibold text-gray-700 mb-4">Status Lowongan</label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" class="sr-only peer" checked>
                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                    <span class="ms-3 text-sm font-medium text-gray-700">Terima Lamaran (Buka)</span>
                </label>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="space-y-6">
            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi Pekerjaan <span class="text-red-500">*</span></label>
                <textarea id="description" name="description" rows="6" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all" placeholder="Tuliskan gambaran pekerjaan, tanggung jawab, dll..."><?php echo e(old('description')); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div>
                <label for="requirements" class="block text-sm font-semibold text-gray-700 mb-2">Persyaratan Pekerjaan <span class="text-red-500">*</span></label>
                <textarea id="requirements" name="requirements" rows="6" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#E6C981] focus:border-[#E6C981] outline-none transition-all" placeholder="Tuliskan syarat pendidikan, pengalaman, skill yang dibutuhkan..."><?php echo e(old('requirements')); ?></textarea>
                <p class="text-xs text-gray-500 mt-1">Anda bisa menggunakan daftar titik-titik (bullet points) atau HTML.</p>
                <?php $__errorArgs = ['requirements'];
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
            Simpan Lowongan
        </button>
    </div>

</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/admin/careers/create.blade.php ENDPATH**/ ?>