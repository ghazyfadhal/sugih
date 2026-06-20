<div x-data="ageVerification()"
     x-init="checkVerification()"
     x-show="showModal"
     x-cloak
     class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/60"
     style="background-image: url('{{ asset('images/age-verificarion.png') }}'); background-size: cover; background-position: center; background-blend-mode: multiply;">
    
    {{-- Main Box --}}
    <div class="bg-[#f0c326] border-[3px] border-[#101010] rounded-2xl p-6 sm:p-10 max-w-lg w-[90%] shadow-[0_10px_40px_rgba(0,0,0,0.8)] text-center text-[#101010]">
        
        <h2 class="font-extrabold text-3xl sm:text-4xl mb-6 text-white" 
            style="-webkit-text-stroke: 1.5px black; text-shadow: 2px 2px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 0px 4px 4px rgba(0,0,0,0.5);">
            Verifikasi Usia
        </h2>
        
        <p class="text-sm sm:text-base font-semibold mb-6 leading-relaxed">
            Situs web ini berisi informasi tentang produk yang mengandung tembakau dan hanya ditujukan untuk perokok berusia 21 tahun ke atas yang tinggal di Indonesia.
        </p>

        <p class="text-base sm:text-lg font-bold mb-8">
            Apakah anda sudah berumur 21 tahun?
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 sm:gap-10">
            <button @click="deny()"
                    class="bg-[#c21414] hover:bg-[#9a1010] text-white font-bold py-2.5 px-10 rounded-xl border-2 border-[#7a0d0d] shadow-[0_4px_10px_rgba(0,0,0,0.3)] transition-all hover:scale-105">
                Tidak
            </button>
            <button @click="verify()"
                    class="bg-[#246e33] hover:bg-[#1c5527] text-white font-bold py-2.5 px-10 rounded-xl border-2 border-[#16421f] shadow-[0_4px_10px_rgba(0,0,0,0.3)] transition-all hover:scale-105">
                Ya
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('ageVerification', () => ({
            showModal: false,
            checkVerification() {
                const isVerified = localStorage.getItem('age_verified');
                if (!isVerified) {
                    this.showModal = true;
                    // Disable scroll
                    document.body.style.overflow = 'hidden';
                }
            },
            verify() {
                localStorage.setItem('age_verified', 'true');
                this.showModal = false;
                // Enable scroll
                document.body.style.overflow = '';
            },
            deny() {
                alert('Untuk mengakses situs anda harus berusia 21+');
            }
        }))
    });
</script>
