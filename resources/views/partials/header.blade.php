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
            <a href="{{ route('home') }}"
               class="text-base font-bold transition-colors duration-200 hover:text-sugih-gold {{ request()->routeIs('home') ? 'text-sugih-gold' : 'text-white/90' }}">Beranda</a>
            <a href="{{ route('about') }}"
               class="text-base font-bold transition-colors duration-200 hover:text-sugih-gold {{ request()->routeIs('about') ? 'text-sugih-gold' : 'text-white/90' }}">Sejarah</a>
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

    {{-- Mobile drawer --}}
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-cloak
        class="lg:hidden bg-sugih-green-800 border-t border-sugih-green-600"
    >
        <nav class="container-page py-6 flex flex-col gap-4 text-white font-bold">
            <a href="{{ route('home') }}" class="py-2 hover:text-sugih-gold">Beranda</a>
            <a href="{{ route('about') }}" class="py-2 hover:text-sugih-gold">Sejarah</a>
            <a href="{{ route('products.index') }}" class="py-2 hover:text-sugih-gold">Produk</a>
            <a href="{{ route('articles.index') }}" class="py-2 hover:text-sugih-gold">Berita</a>
            <a href="{{ route('contact') }}" class="py-2 hover:text-sugih-gold">Kontak</a>
        </nav>
    </div>
</header>

