<footer id="footer" class="bg-sugih-green-700 text-white" data-testid="footer">
    <div class="container-page py-10 grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- Alamat --}}
        <div>
            <h4 class="heading-mark text-lg font-bold text-sugih-gold mb-3">Alamat</h4>
            <p class="text-sm font-semibold leading-relaxed">
                Munjul, Kec. Cilaku, Kab. Cianjur,<br>
                Jawa Barat 43285
            </p>

            <div class="flex items-center gap-4 mt-5 text-sugih-gold">
                <a href="#" aria-label="Facebook"  class="hover:text-white"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" aria-label="Youtube"   class="hover:text-white"><i class="fab fa-youtube fa-lg"></i></a>
                <a href="#" aria-label="Instagram" class="hover:text-white"><i class="fab fa-instagram fa-lg"></i></a>
            </div>
        </div>

        {{-- Kontak --}}
        <div>
            <h4 class="heading-mark text-lg font-bold text-sugih-gold mb-3">Kontak Kami</h4>
            <div class="text-sm font-semibold leading-relaxed space-y-4">
                <div>
                    <span class="block text-white/70">Whatsapp:</span>
                    <a href="https://wa.me/628123456789" target="_blank" rel="noopener noreferrer" class="hover:text-sugih-gold transition-colors block">
                        +62 123 456 789
                    </a>
                </div>
                <div>
                    <span class="block text-white/70">Email:</span>
                    <a href="mailto:cvprioritasgroup@gmail.com" class="hover:text-sugih-gold transition-colors block">
                        cvprioritasgroup@gmail.com
                    </a>
                </div>
            </div>
        </div>

        {{-- Peta lokasi --}}
        <div>
            <h4 class="heading-mark text-lg font-bold text-sugih-gold mb-3">Peta Lokasi</h4>
            <div class="inline-block bg-white p-2 rounded-lg">
                <img src="{{ asset('images/qr-location.png') }}"
                     alt="QR Lokasi" class="h-28 w-28 object-contain">
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container-page py-5 text-sm font-bold text-white/60 flex justify-center text-center">
            <p>© {{ date('Y') }} CV. Prioritas Group. All rights reserved.</p>
        </div>
    </div>
</footer>

{{-- Font Awesome (icons sosial) --}}
@push('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endpush
