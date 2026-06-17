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
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/hero-tobacco.jpg') }}"
                 alt="Daun tembakau SUGIH"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page py-24 animate-fade-up">
            {{-- Brand mark — uses the same logo as navbar (smaller size) --}}
            <div class="flex justify-center mb-8" data-aos="fade-down">
                <img src="{{ asset('images/logo-sugih.png') }}"
                     alt="SUGIH" class="h-12 sm:h-16 w-auto drop-shadow-2xl">
            </div>

            <h1 class="heading-display text-white text-5xl sm:text-6xl md:text-7xl" data-aos="fade-up" data-aos-delay="100">
                Semua Ingin Sugih
            </h1>

            <p class="mt-8 max-w-2xl mx-auto text-white/90 text-base sm:text-lg leading-relaxed font-normal" data-aos="fade-up" data-aos-delay="200">
                Waktumu terbatas jangan habiskan waktu untuk mencari rasa yang lain.<br>
                Sebab yang mantap sedang kamu buka sekarang dan pencarianmu sudah tuntas.<br>
                Harum Berkelas dan Berkualitas.
            </p>

            <div class="mt-16 flex justify-center" data-aos="fade-up" data-aos-delay="300">
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
    {{--  CERITA KAMI                                                  --}}
    {{-- ============================================================ --}}
    <section id="cerita-kami" class="relative min-h-[90vh] pt-32 pb-24 lg:pt-40 lg:pb-32 overflow-hidden scroll-mt-20" data-testid="cerita-section">
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('images/farmer.jpg') }}"
                 alt="Petani tembakau Cianjur" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page">
            <div class="max-w-xl bg-sugih-green-700/90 backdrop-blur-sm rounded-md p-8 sm:p-10 shadow-card-soft" data-aos="fade-right">
                <h2 class="heading-display text-white text-4xl sm:text-5xl mb-6 whitespace-nowrap">
                    Cerita Kami
                </h2>

                <p class="text-white/90 leading-relaxed text-base">
                    Lahir di Cianjur pada 2023, Sugih hadir dari filosofi lokal
                    <em>Sugih Mukti</em>, bermakna subur dan kaya, sebagai wujud
                    semangat untuk mengangkat potensi tembakau Cianjur menjadi
                    produk kretek berkelas. Di bawah naungan CV. Prioritas Group,
                    kami percaya bahwa kemakmuran sejati tumbuh dari tanah
                    sendiri, dikerjakan dengan tangan sendiri.
                </p>

                <div class="mt-8">
                    <a href="{{ route('about') }}" class="btn-primary" data-testid="cerita-cta">
                        Lebih lanjut
                    </a>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================ --}}
    {{--  PRODUK KAMI                                                  --}}
    {{--  Background: bagian ATAS dari product-bg.jpg (foto vertikal)  --}}
    {{-- ============================================================ --}}
    @php
        $originalProducts = collect($products)->where('collection', 'Original Collection')->values();
        $flavourProducts  = collect($products)->where('collection', 'Flavour Collection')->values();
    @endphp

    <section class="relative py-24 lg:py-28 overflow-hidden" data-testid="products-section">
        {{-- Background: top portion of the vertical image --}}
        <div class="absolute inset-0 -z-10" style="background-image: url('{{ asset('images/product-bg.jpg') }}'); background-size: cover; background-position: top center;">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page">
            <h2 class="heading-display text-center text-white text-4xl sm:text-5xl md:text-6xl mb-16" data-aos="fade-up">
                Produk Kami
            </h2>

            {{-- ── Original Collection ─────────────────────────── --}}
            <div class="mb-20" data-testid="original-collection">
                <div class="flex items-center gap-4 mb-10" data-aos="fade-up">
                    <div class="h-px flex-1 bg-sugih-gold/30"></div>
                    <h3 class="heading-display text-sugih-gold text-2xl sm:text-3xl tracking-wide whitespace-nowrap">
                        Original Collection
                    </h3>
                    <div class="h-px flex-1 bg-sugih-gold/30"></div>
                </div>

                <div class="grid grid-cols-1 gap-8 max-w-3xl mx-auto">
                    @foreach($originalProducts as $product)
                        <article class="bg-sugih-green-800/40 backdrop-blur-sm rounded-3xl p-6 sm:p-10
                                        grid grid-cols-1 md:grid-cols-[260px_1fr] gap-8 items-center
                                        shadow-card-soft border border-sugih-gold/10
                                        transition-transform duration-300 hover:-translate-y-1">
                            <div class="flex justify-center">
                                <img
                                    src="{{ asset($product['image']) }}"
                                    alt="{{ $product['name'] }}"
                                    class="h-52 sm:h-64 w-auto object-contain drop-shadow-2xl"
                                >
                            </div>

                            <div class="text-white">
                                <div class="flex flex-wrap items-center gap-3 mb-3">
                                    <h4 class="heading-display text-3xl sm:text-4xl">{{ $product['name'] }}</h4>
                                </div>

                                <p class="text-white/85 leading-relaxed">
                                    {{ $product['description'] }}
                                </p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            {{-- ── Flavour Collection ──────────────────────────── --}}
            <div data-testid="flavour-collection">
                <div class="flex items-center gap-4 mb-10" data-aos="fade-up">
                    <div class="h-px flex-1 bg-sky-300/30"></div>
                    <h3 class="heading-display text-sky-300 text-2xl sm:text-3xl tracking-wide whitespace-nowrap">
                        Flavour Collection
                    </h3>
                    <div class="h-px flex-1 bg-sky-300/30"></div>
                </div>

                <div class="relative">
                    <div class="swiper product-swiper">
                        <div class="swiper-wrapper">
                            @foreach($flavourProducts as $product)
                                <div class="swiper-slide">
                                    <article class="bg-sugih-green-800/40 backdrop-blur-sm rounded-3xl p-6 sm:p-10
                                                    grid grid-cols-1 md:grid-cols-[260px_1fr] gap-8 items-center
                                                    shadow-card-soft border border-sky-300/10
                                                    transition-transform duration-300 hover:-translate-y-1">
                                        <div class="flex justify-center">
                                            <img
                                                src="{{ asset($product['image']) }}"
                                                alt="{{ $product['name'] }}"
                                                class="h-44 sm:h-56 w-auto object-contain drop-shadow-2xl"
                                            >
                                        </div>

                                        <div class="text-white">
                                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                                <h4 class="heading-display text-3xl sm:text-4xl">{{ $product['name'] }}</h4>
                                            </div>

                                            <p class="text-white/85 leading-relaxed">
                                                {{ $product['description'] }}
                                            </p>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>

                        {{-- Arrows — inside the swiper container, anchored to slide edges --}}
                        <button type="button"
                                class="product-swiper-prev carousel-arrow absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 z-10"
                                aria-label="Sebelumnya" data-testid="product-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 6l-6 6 6 6"/>
                            </svg>
                        </button>
                        <button type="button"
                                class="product-swiper-next carousel-arrow absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 z-10"
                                aria-label="Berikutnya" data-testid="product-next">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6"/>
                            </svg>
                        </button>
                    </div>

                    <div class="product-swiper-pagination flex justify-center mt-6 !static"></div>
                </div>
            </div>
        </div>
    </section>




    {{-- ============================================================ --}}
    {{--  BERITA                                                       --}}
    {{--  Background: bagian BAWAH dari product-bg.jpg (foto vertikal) --}}
    {{-- ============================================================ --}}
    <section class="relative py-24 lg:py-28 overflow-hidden" data-testid="articles-section">
        {{-- Background: bottom portion of the vertical image --}}
        <div class="absolute inset-0 -z-10" style="background-image: url('{{ asset('images/product-bg.jpg') }}'); background-size: cover; background-position: bottom center;">
            <div class="absolute inset-0 bg-black/60"></div>
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
                                <a href="{{ route('articles.show', $article['slug']) }}"
                                   class="block relative rounded-3xl overflow-hidden shadow-card-soft group">
                                    <img src="{{ asset($article['image']) }}"
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
