@extends('layouts.app')

@section('title', 'Produk — SUGIH')
@section('description', 'Jelajahi seluruh varian rokok kretek SUGIH — Original Collection dan Flavour Collection.')

@section('content')

    {{-- ============================================================ --}}
    {{--  HERO PRODUK — Background + overlay                           --}}
    {{-- ============================================================ --}}
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 min-h-screen" data-testid="products-page">
        {{-- Background --}}
        <div class="absolute inset-0 -z-10"
             style="background-image: url('{{ asset('images/product-bg.jpg') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            {{-- Vignette for Navbar --}}
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent"></div>
        </div>

        <div class="container-page">

            {{-- Page title --}}
            <h1 class="heading-display text-center text-white text-4xl sm:text-5xl md:text-6xl mb-4" data-aos="fade-up">
                Produk Kami
            </h1>
            <div class="flex justify-center mb-16" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-1 bg-sugih-terracotta rounded-full"></div>
            </div>

            {{-- ── Product Showcase Swiper (Aroma-style) ───────── --}}
            <div class="relative max-w-6xl mx-auto" x-data="productShowcase()" x-cloak data-aos="fade-up" data-aos-delay="200">

                <div class="swiper product-page-swiper">
                    <div class="swiper-wrapper items-center">
                        @foreach($products as $index => $product)
                            <div class="swiper-slide flex justify-center" data-index="{{ $index }}">
                                <div class="product-slide-inner transition-all duration-500 flex justify-center">
                                    <img src="{{ $product->image_url }}"
                                         alt="{{ $product['name'] }}"
                                         class="h-64 sm:h-72 md:h-80 lg:h-96 w-auto object-contain drop-shadow-xl
                                                transition-all duration-500">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Navigation arrows --}}
                <button type="button"
                        class="product-page-prev carousel-arrow absolute left-0 sm:-left-6 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Produk sebelumnya">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 6l-6 6 6 6"/>
                    </svg>
                </button>
                <button type="button"
                        class="product-page-next carousel-arrow absolute right-0 sm:-right-6 top-1/2 -translate-y-1/2 z-10"
                        aria-label="Produk berikutnya">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6l6 6-6 6"/>
                    </svg>
                </button>

                {{-- Product info (below the carousel) --}}
                <div class="mt-10 text-center">
                    @foreach($products as $index => $product)
                        <div class="product-info-panel transition-all duration-500"
                             data-panel="{{ $index }}"
                             style="{{ $index !== 0 ? 'display:none;' : '' }}">
                            <h2 class="heading-display text-white text-2xl sm:text-3xl md:text-4xl mb-4">
                                {{ $product['name'] }}
                            </h2>
                            <p class="text-white/85 text-sm sm:text-base md:text-lg leading-relaxed max-w-3xl mx-auto">
                                {{ $product['description'] }}
                            </p>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination dots --}}
                <div class="product-page-pagination flex justify-center mt-10 !static"></div>
            </div>

        </div>
    </section>

@endsection

@push('scripts')
<script>
    function productShowcase() {
        return {
            init() {
                // handled by app.js Swiper init
            }
        };
    }
</script>
@endpush
