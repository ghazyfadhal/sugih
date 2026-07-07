


<div x-data="{ modalMitraOpen: false }" 
     x-init="$watch('modalMitraOpen', value => document.body.style.overflow = value ? 'hidden' : '')"
     @open-mitra-modal.window="modalMitraOpen = true">

    <div x-show="modalMitraOpen" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4">
        
        <div x-show="modalMitraOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="modalMitraOpen = false"
             class="absolute inset-0 bg-sugih-dark/80 backdrop-blur-sm"></div>

        
        <div x-show="modalMitraOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="relative bg-white border border-sugih-subtle/20 rounded-2xl p-8 sm:p-12 max-w-xl w-full shadow-2xl text-center">
            
            
            <button @click="modalMitraOpen = false" class="absolute top-4 right-4 text-sugih-secondary hover:text-sugih-primary transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h3 class="heading-display text-3xl sm:text-4xl text-sugih-green mb-4">Jadilah Bagian dari SUGIH</h3>
            <p class="text-sugih-secondary text-base mb-8">
                Tertarik menjadi distributor atau reseller resmi SUGIH di kota Anda? Dapatkan harga khusus pabrik dan jadilah agen pertumbuhan bersama kretek berkualitas dari Cianjur.
            </p>

            <a href="https://wa.me/6287713724637?text=Halo%20Manajemen%20SUGIH,%20saya%20tertarik%20untuk%20mengetahui%20syarat%20dan%20ketentuan%20menjadi%20Mitra/Reseller.%20Mohon%20informasinya."
               target="_blank" rel="noopener noreferrer"
               class="btn-primary w-full sm:w-auto">
                <i class="fab fa-whatsapp mr-2 text-xl"></i> Daftar via WhatsApp
            </a>
        </div>
    </div>
</div>
<?php /**PATH D:\SUGIH\sugih\resources\views/partials/mitra-modal.blade.php ENDPATH**/ ?>