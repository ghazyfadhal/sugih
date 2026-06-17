<header
    x-data="{ open: false, scrolled: false, modalMitraOpen: false }"
    x-init="
        window.addEventListener('scroll', () => scrolled = window.scrollY > 30);
        $watch('modalMitraOpen', value => document.body.style.overflow = value ? 'hidden' : '');
    "
    :class="scrolled ? 'bg-sugih-green-700/95 backdrop-blur-md shadow-lg' : 'bg-sugih-green-700'"
    class="fixed top-0 inset-x-0 z-[60] transition-all duration-300"
>
    <div class="container-page flex items-center justify-between h-20">
        
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3" data-testid="brand-logo">
            <img src="<?php echo e(asset('images/logo-sugih.svg')); ?>" alt="SUGIH" class="h-10 w-auto">
        </a>

        
        <nav class="hidden lg:flex items-center gap-12" data-testid="nav-desktop">
            <a href="<?php echo e(request()->routeIs('home') ? '#top' : route('home')); ?>"
               class="nav-link <?php echo e(request()->routeIs('home') ? 'text-sugih-gold' : 'text-white/90'); ?>">Beranda</a>
            <a href="<?php echo e(route('about')); ?>"
               class="nav-link <?php echo e(request()->routeIs('about') ? 'text-sugih-gold' : 'text-white/90'); ?>">Sejarah</a>
            <a href="<?php echo e(route('products.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('products.*') ? 'text-sugih-gold' : 'text-white/90'); ?>">Produk</a>
            <a href="<?php echo e(route('articles.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('articles.*') ? 'text-sugih-gold' : 'text-white/90'); ?>">Berita</a>
        </nav>

        
        <button
            type="button"
            @click="open = !open"
            class="text-sugih-gold p-2 -mr-2 transition-transform duration-300"
            :class="open ? 'rotate-90' : 'rotate-0'"
            aria-label="Toggle menu"
            data-testid="nav-toggle"
        >
            
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
            
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        x-cloak
        class="fixed top-20 inset-x-0 bottom-0 bg-black/50 z-40"
    ></div>

    
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        x-cloak
        class="fixed top-20 right-0 h-[calc(100vh-5rem)] w-72 sm:w-80 bg-sugih-green-800 shadow-2xl z-50 flex flex-col border-t border-white/10"
    >

        
        <nav class="flex-1 px-8 pt-6 pb-10 flex flex-col gap-1 overflow-y-auto">
            <a href="<?php echo e(request()->routeIs('home') ? '#top' : route('home')); ?>"
               class="py-4 text-right text-xl font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Beranda</a>
            <a href="<?php echo e(route('about')); ?>"
               class="py-4 text-right text-xl font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Sejarah</a>
            <a href="<?php echo e(route('products.index')); ?>"
               class="py-4 text-right text-xl font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Produk</a>
            <a href="<?php echo e(route('articles.index')); ?>"
               class="py-4 text-right text-xl font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Berita</a>
            <a href="<?php echo e(route('karir.index')); ?>"
               class="py-4 text-right text-xl font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Karir</a>
            <a href="#footer"
               class="py-4 text-right text-xl font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Kontak</a>
            <button type="button"
               class="py-4 text-right text-xl font-bold text-white hover:text-sugih-gold transition-colors underline decoration-white/40 underline-offset-4 hover:decoration-sugih-gold"
               @click="open = false; modalMitraOpen = true">Gabung Mitra</button>
        </nav>
    </div>

    
    
    
    <div x-show="modalMitraOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
        
        <div x-show="modalMitraOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="modalMitraOpen = false"
             class="absolute inset-0 bg-sugih-green-900/80 backdrop-blur-sm"></div>

        
        <div x-show="modalMitraOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="relative bg-sugih-green-800 border border-sugih-gold/20 rounded-2xl p-8 sm:p-12 max-w-xl w-full shadow-2xl text-center">
            
            
            <button @click="modalMitraOpen = false" class="absolute top-4 right-4 text-white/60 hover:text-white transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 class="heading-display text-3xl sm:text-4xl text-white mb-4">Jadilah Bagian dari SUGIH</h3>
            <p class="text-sugih-cream text-base mb-8">
                Tertarik menjadi distributor atau reseller resmi SUGIH di kota Anda? Dapatkan harga khusus pabrik dan jadilah agen pertumbuhan bersama kretek berkualitas dari Cianjur.
            </p>

            <a href="https://wa.me/628123456789?text=Halo%20Manajemen%20SUGIH,%20saya%20tertarik%20untuk%20mengetahui%20syarat%20dan%20ketentuan%20menjadi%20Mitra/Reseller.%20Mohon%20informasinya."
               target="_blank" rel="noopener noreferrer"
               class="btn-primary w-full sm:w-auto">
                <i class="fab fa-whatsapp mr-2 text-xl"></i> Daftar via WhatsApp
            </a>
        </div>
    </div>

</header>
<?php /**PATH D:\SUGIH\sugih\resources\views/partials/header.blade.php ENDPATH**/ ?>