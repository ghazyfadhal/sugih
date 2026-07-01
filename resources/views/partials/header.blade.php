@php
    $isLightTop = request()->is('kontak*') || request()->is('contact*');
    $defaultText = $isLightTop ? 'text-sugih-primary' : 'text-white/90';
@endphp
<header
    x-data="{ open: false, scrolled: false }"
    x-init="window.addEventListener('scroll', () => scrolled = window.scrollY > 30);"
    :class="scrolled ? 'bg-sugih-base/60 backdrop-blur-lg shadow-sm' : 'bg-transparent'"
    class="fixed top-0 inset-x-0 z-[60] transition-all duration-300"
>
    <div class="container-page flex items-center justify-between h-20">
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3" data-testid="brand-logo">
            <img src="{{ asset('images/logo-3.svg') }}" alt="SUGIH" class="h-10 w-auto">
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden lg:flex items-center gap-12" data-testid="nav-desktop">
            <a href="{{ request()->routeIs('home') ? '#top' : route('home') }}"
               class="nav-link"
               :class="scrolled ? 'hover:text-sugih-gold {{ request()->routeIs('home') ? 'text-sugih-terracotta' : 'text-sugih-primary' }}' : 'hover:text-sugih-green {{ request()->routeIs('home') ? 'text-sugih-green' : $defaultText }}'">Beranda</a>
            <a href="{{ route('about') }}"
               class="nav-link"
               :class="scrolled ? 'hover:text-sugih-gold {{ request()->routeIs('about') ? 'text-sugih-terracotta' : 'text-sugih-primary' }}' : 'hover:text-sugih-green {{ request()->routeIs('about') ? 'text-sugih-green' : $defaultText }}'">Sejarah</a>
            <a href="{{ route('products.index') }}"
               class="nav-link"
               :class="scrolled ? 'hover:text-sugih-gold {{ request()->routeIs('products.*') ? 'text-sugih-terracotta' : 'text-sugih-primary' }}' : 'hover:text-sugih-green {{ request()->routeIs('products.*') ? 'text-sugih-green' : $defaultText }}'">Produk</a>
            <a href="{{ route('articles.index') }}"
               class="nav-link"
               :class="scrolled ? 'hover:text-sugih-gold {{ request()->routeIs('articles.*') ? 'text-sugih-terracotta' : 'text-sugih-primary' }}' : 'hover:text-sugih-green {{ request()->routeIs('articles.*') ? 'text-sugih-green' : $defaultText }}'">Berita</a>
        </nav>

        {{-- Hamburger --}}
        <button
            type="button"
            @click="open = !open"
            class="p-2 -mr-2 transition-transform duration-300"
            :class="[open ? 'rotate-90' : 'rotate-0', scrolled ? 'text-sugih-primary' : '{{ $isLightTop ? 'text-sugih-primary' : 'text-sugih-green' }}']"
            aria-label="Toggle menu"
            data-testid="nav-toggle"
        >
            {{-- Hamburger icon --}}
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16"/>
            </svg>
            {{-- Close (X) icon --}}
            <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
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
        class="fixed top-20 inset-x-0 bottom-0 bg-black/50 z-40"
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
        class="fixed top-20 right-0 h-[calc(100vh-5rem)] w-72 sm:w-80 bg-sugih-base shadow-2xl z-50 flex flex-col border-t border-sugih-subtle/20"
    >

        {{-- Menu items --}}
        <nav class="flex-1 px-8 pt-6 pb-10 flex flex-col gap-1 overflow-y-auto">
            <a href="{{ request()->routeIs('home') ? '#top' : route('home') }}"
               class="py-4 text-right text-xl font-bold text-sugih-primary hover:text-sugih-green transition-colors border-b border-sugih-subtle/20"
               @click="open = false">Beranda</a>
            <a href="{{ route('about') }}"
               class="py-4 text-right text-xl font-bold text-sugih-primary hover:text-sugih-green transition-colors border-b border-sugih-subtle/20"
               @click="open = false">Sejarah</a>
            <a href="{{ route('products.index') }}"
               class="py-4 text-right text-xl font-bold text-sugih-primary hover:text-sugih-green transition-colors border-b border-sugih-subtle/20"
               @click="open = false">Produk</a>
            <a href="{{ route('articles.index') }}"
               class="py-4 text-right text-xl font-bold text-sugih-primary hover:text-sugih-green transition-colors border-b border-sugih-subtle/20"
               @click="open = false">Berita</a>
            <a href="{{ route('karir.index') }}"
               class="py-4 text-right text-xl font-bold text-sugih-primary hover:text-sugih-green transition-colors border-b border-sugih-subtle/20"
               @click="open = false">Karir</a>
            <a href="#footer"
               class="py-4 text-right text-xl font-bold text-sugih-primary hover:text-sugih-green transition-colors border-b border-sugih-subtle/20"
               @click="open = false">Kontak</a>
            <button type="button"
               class="py-4 text-right text-xl font-bold text-sugih-primary hover:text-sugih-green transition-colors underline decoration-sugih-subtle/40 underline-offset-4 hover:decoration-sugih-green"
               @click="open = false; $dispatch('open-mitra-modal')">Gabung Mitra</button>
        </nav>
    </div>
</header>
