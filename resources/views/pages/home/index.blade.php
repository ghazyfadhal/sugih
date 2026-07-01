@extends('layouts.app')

@section('title', 'SUGIH — Semua Ingin Sugih')

@section('content')

    {{-- ============================================================ --}}
    {{--  HERO  ::  "Semua Ingin Sugih"                                --}}
    {{-- ============================================================ --}}
    <section
        class="relative isolate min-h-screen flex items-center justify-center text-center grain overflow-hidden pt-20"
        data-testid="hero-section"
    >
        <div class="absolute inset-0 -z-10 bg-black">
            <img src="{{ asset('images/hero-tobacco.jpg') }}"
                 alt="Daun tembakau SUGIH"
                 class="w-full h-full object-cover hero-parallax-bg" style="will-change: transform;">
            <div class="absolute inset-0 bg-black/40"></div>
            {{-- Vignette for Navbar --}}
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent"></div>
        </div>

        <div class="container-page py-24 gs-hero-content">
            {{-- Brand mark — uses the same logo as navbar (smaller size) --}}
            <div class="flex justify-center mb-8 gs-hero-logo" data-aos="fade-down">
                <img src="{{ asset('images/logo-3.svg') }}"
                     alt="SUGIH" class="h-12 sm:h-16 w-auto drop-shadow-2xl">
            </div>

            <h1 class="heading-display text-white text-5xl sm:text-6xl md:text-7xl gs-hero-title" data-aos="fade-up" data-aos-delay="100">
                Semua Ingin Sugih
            </h1>

            <p class="mt-8 max-w-4xl mx-auto text-white/90 text-base sm:text-lg leading-relaxed font-normal gs-hero-desc" data-aos="fade-up" data-aos-delay="200">
                Waktumu terbatas jangan habiskan waktu untuk mencari rasa yang lain.<br>
                Sebab yang mantap sedang kamu buka sekarang dan pencarianmu sudah tuntas.<br>
                Harum Berkelas dan Berkualitas.
            </p>

            <div class="mt-16 flex justify-center gs-hero-arrow" data-aos="fade-up" data-aos-delay="300">
                <a href="#cerita-kami"
                   class="inline-flex items-center justify-center p-3 rounded-full text-white/70 hover:text-sugih-gold transition-colors animate-bounce"
                   aria-label="Scroll ke bawah"
                   data-testid="hero-scroll-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 sm:h-12 sm:w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>


    {{-- ============================================================ --}}
    {{--  CERITA KAMI  (Pinned Section)                                --}}
    {{-- ============================================================ --}}
    <section id="cerita-kami" class="relative min-h-screen overflow-hidden scroll-mt-20 gs-cerita-pin" data-testid="cerita-section">
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/farmer.jpg') }}"
                 alt="Petani tembakau Cianjur" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <div class="container-page h-screen flex items-center">
            <div class="max-w-xl bg-sugih-charcoal/90 backdrop-blur-sm rounded-3xl p-8 sm:p-10 shadow-card-soft border border-white/10 gs-cerita-card">
                <h2 class="heading-display text-white text-4xl sm:text-5xl mb-6 whitespace-nowrap gs-cerita-heading">
                    Cerita Kami
                </h2>

                <p class="text-white/90 leading-relaxed text-base md:text-lg lg:leading-loose gs-scrub-text">
                    Lahir di Cianjur pada 2023, Sugih hadir dari filosofi lokal
                    <em>Sugih Mukti</em>, bermakna subur dan kaya, sebagai wujud
                    semangat untuk mengangkat potensi tembakau Cianjur menjadi
                    produk kretek berkelas. Di bawah naungan CV. Prioritas Group,
                    kami percaya bahwa kemakmuran sejati tumbuh dari tanah
                    sendiri, dikerjakan dengan tangan sendiri.
                </p>

                <div class="mt-8 gs-cerita-cta" style="opacity: 0;">
                    <a href="{{ route('about') }}" class="btn-primary" data-testid="cerita-cta">
                        Lebih lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================ --}}
    {{--  PRODUK KAMI  (Horizontal Scroll Pinning)                     --}}
    {{-- ============================================================ --}}
    @php
        $allProducts = collect($products)->sortBy('sort_order')->values();
    @endphp

    <section class="relative overflow-hidden gs-products-pin" data-testid="products-section">
        {{-- Solid dark background — no image --}}
        <div class="absolute inset-0 -z-10 bg-sugih-charcoal"></div>

        <div class="h-screen flex flex-col justify-center gs-products-inner">
            <div class="container-page">
                <h2 class="heading-display text-center text-white text-4xl sm:text-5xl md:text-6xl mb-12">
                    Produk Kami
                </h2>
            </div>

            {{-- Horizontal scrolling track --}}
            <div class="overflow-hidden">
                <div class="flex flex-nowrap gap-8 pl-8 sm:pl-16 lg:pl-24 gs-products-track" style="will-change: transform;">
                    @foreach($allProducts as $product)
                        <article class="w-[80vw] sm:w-[420px] md:w-[480px] flex-shrink-0
                                        bg-sugih-charcoal/80 backdrop-blur-sm rounded-3xl p-6 sm:p-8 relative
                                        flex flex-col items-center text-center group
                                        shadow-card-soft border {{ $product['collection'] === 'Original Collection' ? 'border-sugih-gold/20' : 'border-sky-300/20' }}
                                        transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_40px_-10px_rgba(184,154,90,0.25)]">
                            
                            {{-- Collection Badge --}}
                            <span class="text-xs font-semibold tracking-widest uppercase mb-4 {{ $product['collection'] === 'Original Collection' ? 'text-sugih-gold' : 'text-sky-300' }}">
                                {{ $product['collection'] }}
                            </span>

                            <div class="flex justify-center mb-6">
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product['name'] }}"
                                     class="h-48 sm:h-56 w-auto object-contain drop-shadow-2xl group-hover:scale-105 transition-transform duration-700 ease-out">
                            </div>

                            <h4 class="heading-display text-white text-2xl sm:text-3xl mb-3">{{ $product['name'] }}</h4>
                            <p class="text-white/75 leading-relaxed text-sm sm:text-base line-clamp-3">
                                {{ $product['tagline'] ?? $product['description'] }}
                            </p>
                        </article>
                    @endforeach

                    {{-- Spacer so last card doesn't clip --}}
                    <div class="w-16 sm:w-24 flex-shrink-0"></div>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================ --}}
    {{--  BERITA                                                       --}}
    {{-- ============================================================ --}}
    <section class="relative py-24 lg:py-28 overflow-hidden" data-testid="articles-section">
        <div class="absolute inset-0 -z-10 bg-sugih-charcoal">
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/30 to-transparent"></div>
        </div>

        <div class="container-page">
            <h2 class="heading-display text-center text-white text-4xl sm:text-5xl md:text-6xl mb-14" data-aos="fade-up">
                Berita Terkini
            </h2>

            <div class="relative max-w-4xl mx-auto">
                <div class="swiper article-swiper">
                    <div class="swiper-wrapper">
                        @foreach($articles as $article)
                            <div class="swiper-slide">
                                <a href="{{ route('articles.index') }}"
                                   class="block relative rounded-3xl overflow-hidden shadow-card-soft group">
                                    <img src="{{ $article->image_url }}"
                                         alt="{{ $article['title'] }}"
                                         class="w-full h-72 sm:h-96 object-cover transition-transform duration-700 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/40 to-transparent"></div>
                                    <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                                        <h3 class="heading-display text-white text-2xl sm:text-3xl mb-2">
                                            {{ $article['title'] }}
                                        </h3>
                                        <p class="text-white/80 text-sm line-clamp-2">{{ $article['excerpt'] }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button"
                        class="article-swiper-prev carousel-arrow absolute -left-2 sm:-left-14 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Sebelumnya" data-testid="article-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 6l-6 6 6 6"/>
                    </svg>
                </button>
                <button type="button"
                        class="article-swiper-next carousel-arrow absolute -right-2 sm:-right-14 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Berikutnya" data-testid="article-next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6"/>
                    </svg>
                </button>

                <div class="article-swiper-pagination flex justify-center mt-8 !static"></div>
            </div>

            <div class="mt-14 text-center">
                <a href="{{ route('articles.index') }}" class="btn-primary" data-testid="all-articles-btn">
                    Lihat Semua Berita
                </a>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script type="module">
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        if (!window.gsap || !window.ScrollTrigger) return;
        const g = window.gsap;
        const ST = window.ScrollTrigger;

        // ═══════════════════════════════════════════
        // 1. HERO — Background Parallax
        // ═══════════════════════════════════════════
        g.to('.hero-parallax-bg', {
            yPercent: 30,
            ease: 'none',
            scrollTrigger: {
                trigger: '[data-testid="hero-section"]',
                start: 'top top',
                end: 'bottom top',
                scrub: true
            }
        });

        // ═══════════════════════════════════════════
        // 1b. HERO — Content Fade Out on Scroll
        // ═══════════════════════════════════════════
        const heroTl = g.timeline({
            scrollTrigger: {
                trigger: '[data-testid="hero-section"]',
                start: 'top top',
                end: '60% top',
                scrub: true
            }
        });

        heroTl
            .to('.gs-hero-arrow', { opacity: 0, y: -30, duration: 0.2 }, 0)
            .to('.gs-hero-desc',  { opacity: 0, y: -50, duration: 0.4 }, 0.1)
            .to('.gs-hero-title', { opacity: 0, y: -60, duration: 0.4 }, 0.2)
            .to('.gs-hero-logo',  { opacity: 0, y: -40, duration: 0.3 }, 0.3);

        // ═══════════════════════════════════════════
        // 2. CERITA KAMI — Pinned + Orchestrated
        // ═══════════════════════════════════════════
        const ceritaTl = g.timeline({
            scrollTrigger: {
                trigger: '.gs-cerita-pin',
                start: 'top top',
                end: '+=2000',   // 2000px of virtual scroll distance
                pin: true,
                scrub: 1,
                anticipatePin: 1
            }
        });

        // 2a. Card slides in from left
        ceritaTl.fromTo('.gs-cerita-card',
            { opacity: 0, x: -100 },
            { opacity: 1, x: 0, duration: 0.15, ease: 'power3.out' },
            0
        );

        // 2b. Heading fades in
        ceritaTl.fromTo('.gs-cerita-heading',
            { opacity: 0, y: 20 },
            { opacity: 1, y: 0, duration: 0.1, ease: 'power2.out' },
            0.05
        );

        // 2c. Text scrubbing (word by word)
        if (window.SplitType) {
            const textToScrub = new window.SplitType('.gs-scrub-text', { types: 'words' });
            
            ceritaTl.fromTo(textToScrub.words,
                { opacity: 0.15 },
                { opacity: 1, stagger: 0.02, ease: 'none' },
                0.15
            );

            // 2d. CTA button fades in after text
            ceritaTl.to('.gs-cerita-cta',
                { opacity: 1, duration: 0.1, ease: 'power2.out' },
                0.85
            );
        }

        // ═══════════════════════════════════════════
        // 3. PRODUK — Horizontal Scroll Pinning
        // ═══════════════════════════════════════════
        const productsTrack = document.querySelector('.gs-products-track');
        
        if (productsTrack) {
            function getScrollAmount() {
                return -(productsTrack.scrollWidth - window.innerWidth + 64);
            }

            g.to(productsTrack, {
                x: getScrollAmount,
                ease: 'none',
                scrollTrigger: {
                    trigger: '.gs-products-pin',
                    start: 'top top',
                    end: () => `+=${Math.abs(getScrollAmount())}`,
                    pin: true,
                    scrub: 1,
                    invalidateOnRefresh: true,
                    anticipatePin: 1
                }
            });
        }

    }, 200);
});
</script>
@endpush
