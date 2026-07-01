<footer id="footer" class="bg-sugih-dark text-sugih-surface" data-testid="footer">
    <div class="container-page py-10 grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- Alamat + Sosial Media --}}
        <div>
            <h4 class="heading-mark text-xl font-bold text-sugih-mustard mb-3">Alamat</h4>
            <p class="text-base font-semibold leading-relaxed">
                Munjul, Kec. Cilaku, Kab. Cianjur,<br>
                Jawa Barat 43285
            </p>

            {{-- Sosial Media --}}
            <h4 class="heading-mark text-xl font-bold text-sugih-mustard mb-3 mt-8">Sosial Media</h4>
            <div class="flex items-center gap-5">
                <a href="https://www.facebook.com/share/17XFTLBsuN/?mibextid=wwXIfr" target="_blank" rel="noopener noreferrer"
                   aria-label="Facebook"
                   class="text-white/70 hover:text-sugih-mustard transition-colors">
                    <i class="fab fa-facebook-f fa-lg"></i>
                </a>
                <a href="https://www.instagram.com/sugih_byprioritasgroup/" target="_blank" rel="noopener noreferrer"
                   aria-label="Instagram"
                   class="text-white/70 hover:text-sugih-mustard transition-colors">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
                <a href="https://www.youtube.com/@Sugihkretek" target="_blank" rel="noopener noreferrer"
                   aria-label="Youtube"
                   class="text-white/70 hover:text-sugih-mustard transition-colors">
                    <i class="fab fa-youtube fa-lg"></i>
                </a>
            </div>
        </div>

        {{-- Kontak Kami --}}
        <div>
            <h4 class="heading-mark text-xl font-bold text-sugih-mustard mb-3">Kontak Kami</h4>
            <div class="text-base font-semibold leading-relaxed space-y-4">
                <div>
                    <span class="block text-white/70">Whatsapp:</span>
                    <a href="https://wa.me/628123456789" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 text-white hover:text-sugih-mustard transition-colors underline decoration-white/40 underline-offset-4 hover:decoration-sugih-mustard mt-1">
                        <i class="fab fa-whatsapp"></i>
                        <span>+62 123 456 789</span>
                    </a>
                </div>
                <div class="pt-2">
                    <span class="block text-white/70">Email:</span>
                    <a href="mailto:cvprioritasgroup@gmail.com"
                       class="inline-flex items-center gap-2 text-white hover:text-sugih-mustard transition-colors underline decoration-white/40 underline-offset-4 hover:decoration-sugih-mustard mt-1">
                        <i class="fas fa-envelope"></i>
                        <span>cvprioritasgroup@gmail.com</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Peta lokasi --}}
        <div>
            <h4 class="heading-mark text-xl font-bold text-sugih-mustard mb-3">Peta Lokasi</h4>
            <div class="inline-block bg-white p-2 rounded-lg">
                <img src="{{ asset('images/qr-location.png') }}"
                     alt="QR Lokasi" class="h-28 w-28 object-contain">
            </div>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="container-page py-5 text-base font-bold text-white/60 flex justify-center text-center">
            <p>&copy; {{ date('Y') }} CV. Prioritas Group. All rights reserved.</p>
        </div>
    </div>

    {{-- Pita Legalitas Minimalis --}}
    <div class="bg-sugih-dark py-3 border-t border-sugih-mustard/20">
        <div class="container-page flex items-center justify-center gap-3 text-sugih-surface text-xs sm:text-sm font-semibold tracking-wide text-center">
            <i class="fas fa-shield-alt text-sugih-mustard text-base"></i>
            <p>Diproduksi di bawah pengawasan ketat. Dilengkapi Pita Cukai Resmi Republik Indonesia.</p>
        </div>
    </div>
</footer>
