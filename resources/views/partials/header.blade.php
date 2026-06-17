<header
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 30)"
    :class="scrolled ? 'bg-sugih-green-700/95 backdrop-blur-md shadow-lg' : 'bg-sugih-green-700'"
    class="fixed top-0 inset-x-0 z-50 transition-all duration-300"
>
    <div class="container-page flex items-center justify-between h-20">
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3" data-testid="brand-logo">
            <img src="{{ asset('images/logo-sugih.svg') }}" alt="SUGIH" class="h-10 w-auto">
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden lg:flex items-center gap-12" data-testid="nav-desktop">
            <a href="{{ request()->routeIs('home') ? '#top' : route('home') }}"
               class="text-base font-bold transition-colors duration-200 hover:text-sugih-gold {{ request()->routeIs('home') ? 'text-sugih-gold' : 'text-white/90' }}">Beranda</a>
            <a href="{{ request()->routeIs('home') ? '#cerita-kami' : route('home') . '#cerita-kami' }}"
               class="text-base font-bold transition-colors duration-200 hover:text-sugih-gold text-white/90">Cerita Kami</a>
            <a href="{{ route('products.index') }}"
               class="text-base font-bold transition-colors duration-200 hover:text-sugih-gold {{ request()->routeIs('products.*') ? 'text-sugih-gold' : 'text-white/90' }}">Produk</a>
            <a href="{{ route('articles.index') }}"
               class="text-base font-bold transition-colors duration-200 hover:text-sugih-gold {{ request()->routeIs('articles.*') ? 'text-sugih-gold' : 'text-white/90' }}">Berita</a>
        </nav>

        {{-- Hamburger --}}
        <button
            type="button"
            @click="open = !open"
            class="text-sugih-gold p-2 -mr-2"
            aria-label="Toggle menu"
            data-testid="nav-toggle"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
        </button>
    </div>

    {{-- Overlay backdrop --}}
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
        class="fixed inset-0 bg-black/50 z-40"
    ></div>

    {{-- Sidebar panel (right-aligned) --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        x-cloak
        class="fixed top-0 right-0 h-full w-72 sm:w-80 bg-sugih-green-800 shadow-2xl z-50 flex flex-col"
    >
        {{-- Close button --}}
        <div class="flex justify-end p-5">
            <button @click="open = false" class="text-sugih-gold hover:text-white transition-colors" aria-label="Close menu">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Menu items --}}
        <nav class="flex-1 px-8 flex flex-col gap-1">
            <a href="{{ request()->routeIs('home') ? '#top' : route('home') }}"
               class="py-4 text-right text-lg font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Beranda</a>
            <a href="{{ request()->routeIs('home') ? '#cerita-kami' : route('home') . '#cerita-kami' }}"
               class="py-4 text-right text-lg font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Cerita Kami</a>
            <a href="{{ route('about') }}"
               class="py-4 text-right text-lg font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Tentang Kami</a>
            <a href="{{ route('products.index') }}"
               class="py-4 text-right text-lg font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Produk</a>
            <a href="{{ route('articles.index') }}"
               class="py-4 text-right text-lg font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Berita</a>
            <a href="{{ route('karir.index') }}"
               class="py-4 text-right text-lg font-bold text-white hover:text-sugih-gold transition-colors border-b border-white/10"
               @click="open = false">Karir</a>
            <a href="#footer"
               class="py-4 text-right text-lg font-bold text-white hover:text-sugih-gold transition-colors"
               @click="open = false">Kontak</a>
        </nav>
    </div>
</header>

