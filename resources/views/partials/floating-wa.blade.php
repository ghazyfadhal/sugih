{{-- 
    Floating WhatsApp Button 
    Sticks to the bottom-right of the screen.
--}}
<div class="fixed bottom-6 right-6 z-50 flex items-center gap-4 group" x-data="{ showTooltip: true }" x-init="setTimeout(() => showTooltip = false, 5000)">
    
    {{-- Tooltip / Text Bubble --}}
    <div class="relative bg-white text-sugih-mustard-900 text-sm font-bold py-2 px-4 rounded-full shadow-lg
                transition-all duration-300 origin-right
                group-hover:opacity-100 group-hover:scale-100 group-hover:translate-x-0"
         :class="showTooltip ? 'opacity-100 scale-100 translate-x-0' : 'opacity-0 scale-95 translate-x-4 pointer-events-none'">
        Ada pertanyaan? Chat Kami
        
        {{-- Triangle pointer --}}
        <div class="absolute top-1/2 -right-2 -translate-y-1/2 border-[6px] border-transparent border-l-white"></div>
    </div>

    {{-- The Button --}}
    <a href="https://wa.me/6287713724637?text=Halo%20Admin%20SUGIH,%20saya%20punya%20pertanyaan%20seputar%20produk/kemitraan."
       target="_blank" rel="noopener noreferrer"
       class="flex items-center justify-center w-14 h-14 bg-green-500 text-white rounded-full shadow-lg 
              hover:bg-green-600 hover:scale-110 transition-all duration-300
              focus:outline-none focus:ring-4 focus:ring-green-500/50"
       aria-label="Chat WhatsApp">
        <i class="fab fa-whatsapp text-3xl"></i>
    </a>
</div>
