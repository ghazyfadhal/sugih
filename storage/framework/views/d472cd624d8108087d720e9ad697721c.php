

<?php $__env->startSection('title', 'Karir — SUGIH'); ?>
<?php $__env->startSection('description', 'Bergabunglah bersama tim SUGIH. Temukan peluang karir di CV. Prioritas Group.'); ?>

<?php $__env->startSection('content'); ?>

    
    
    
    <section class="relative min-h-[50vh] sm:min-h-[60vh] flex items-center justify-center pt-20 overflow-hidden" data-testid="karir-hero">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('<?php echo e(asset('images/karir2.png')); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent"></div>
        </div>

        <div class="container-page text-center">
            <h1 class="heading-display text-white text-5xl sm:text-6xl md:text-7xl drop-shadow-lg" data-aos="fade-up">
                Karir
            </h1>
        </div>
    </section>

    
    
    
    <section id="semua-lowongan" class="relative py-20 lg:py-28 min-h-screen bg-sugih-base" data-testid="karir-all">
        
        <div class="absolute inset-0 pointer-events-none opacity-15" 
             style="background-image: url('<?php echo e(asset('images/batik-cianjur-no-bg.png')); ?>'); background-repeat: no-repeat; background-position: left center; background-size: auto 120%; filter: contrast(120%) drop-shadow(0 0 1px rgba(0,0,0,0.2));">
        </div>
        
        <div class="container-page relative z-10">
            <p class="text-center text-sugih-secondary text-sm sm:text-base md:text-lg leading-relaxed max-w-4xl mx-auto mb-16 font-normal" data-aos="fade-up" data-aos-delay="100">
                Sumber daya manusia adalah kekuatan utama dalam membangun SUGIH. Kami percaya bahwa setiap individu memiliki
                potensi untuk tumbuh dan berkontribusi melalui keterampilan dan kreativitasnya. Bersama kami, jadilah bagian dari perjalanan
                dalam mengembangkan cita rasa kretek lokal yang berkelas dan bernilai budaya tinggi.
            </p>

            <h2 class="heading-display text-center text-sugih-primary text-3xl sm:text-4xl md:text-5xl mb-12" data-aos="fade-up">
                Buka Potensimu
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allKarir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="bg-sugih-surface border border-sugih-subtle shadow-sm rounded-xl p-6 flex flex-col
                                hover:border-sugih-gold hover:-translate-y-1 transition-all duration-300"
                         data-aos="fade-up" data-aos-delay="<?php echo e(($index % 3) * 100); ?>">
                        <h3 class="text-sugih-primary font-bold text-base sm:text-lg mb-4 leading-snug">
                            <?php echo e($job['title']); ?>

                        </h3>
                        <p class="text-sugih-secondary text-sm leading-relaxed flex-1 mb-6">
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