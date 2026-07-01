

<?php $__env->startSection('title', 'Karir — SUGIH'); ?>
<?php $__env->startSection('description', 'Bergabunglah bersama tim SUGIH. Temukan peluang karir di CV. Prioritas Group.'); ?>

<?php $__env->startSection('content'); ?>

    
    
    
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-24" data-testid="karir-hero">
        <div class="absolute inset-0 -z-10 bg-sugih-brown">
            <div class="w-full h-full mix-blend-luminosity opacity-40" style="background-image: url('<?php echo e(asset('images/karir-2.png')); ?>'); background-size: cover; background-position: center;"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-sugih-ivory/80 via-sugih-ivory/90 to-sugih-ivory"></div>
        </div>

        <div class="container-page text-center">
            <h1 class="heading-display text-sugih-brown text-4xl sm:text-5xl md:text-6xl mb-6" data-aos="fade-up">
                Karir
            </h1>
            <p class="text-sugih-charcoal text-base sm:text-lg md:text-xl leading-relaxed max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Sumber daya manusia adalah kekuatan utama dalam membangun SUGIH. Kami percaya bahwa setiap individu memiliki
                potensi untuk tumbuh dan berkontribusi melalui keterampilan dan kreativitasnya. Bersama kami, jadilah bagian dari perjalanan
                dalam mengembangkan cita rasa kretek lokal yang berkelas dan bernilai budaya tinggi.
            </p>
        </div>
    </section>

    
    
    
    <section id="semua-lowongan" class="relative py-16 lg:py-24" data-testid="karir-all">
        <div class="absolute inset-0 -z-10 bg-sugih-brown">
            <div class="w-full h-full mix-blend-luminosity opacity-40" style="background-image: url('<?php echo e(asset('images/karir.png')); ?>'); background-size: cover; background-position: bottom center;"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-sugih-ivory/90 via-sugih-ivory/95 to-sugih-ivory"></div>
        </div>

        <div class="container-page">
            <h2 class="heading-display text-center text-sugih-brown text-3xl sm:text-4xl md:text-5xl mb-12" data-aos="fade-up">
                Buka Potensimu
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allKarir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="bg-white backdrop-blur-sm border border-gray-100 shadow-md rounded-xl p-6 flex flex-col
                                hover:border-sugih-terracotta/40 hover:-translate-y-1 transition-all duration-300"
                         data-aos="fade-up" data-aos-delay="<?php echo e(($index % 3) * 100); ?>">
                        <h3 class="text-sugih-charcoal font-bold text-base sm:text-lg mb-4 leading-snug">
                            <?php echo e($job['title']); ?>

                        </h3>
                        <p class="text-sugih-gray text-sm leading-relaxed flex-1 mb-6">
                            <?php echo e(Str::limit($job['description'], 120)); ?>

                        </p>
                        <a href="<?php echo e(route('karir.show', $job['slug'])); ?>"
                           class="inline-block text-center border-2 border-sugih-terracotta text-sugih-terracotta font-bold
                                  py-2 px-6 rounded-lg hover:bg-sugih-terracotta hover:text-white
                                  transition-all duration-300 text-sm">
                            Lihat detail
                        </a>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SUGIH\sugih\resources\views/pages/karir/index.blade.php ENDPATH**/ ?>