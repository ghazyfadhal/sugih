@extends('layouts.app')

@section('title', 'Produk — SUGIH')
@section('description', 'Jelajahi seluruh varian rokok kretek SUGIH — Original Collection dan Flavour Collection.')

@section('content')

    {{-- ============================================================ --}}
    {{--  WRAPPER FOR STATE                                           --}}
    {{-- ============================================================ --}}
    <div x-data="{ selectedProduct: null }" x-cloak class="relative">


        {{-- ============================================================ --}}
        {{--  PRODUK  —  Hero Banner                                       --}}
        {{-- ============================================================ --}}
        <section class="relative min-h-[70vh] flex items-center justify-center pt-20 overflow-hidden" data-testid="products-hero">
        <x-hero-slideshow />
        
        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
        {{-- Vignette for Navbar --}}
        <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent pointer-events-none"></div>
    </section>

    {{-- ============================================================ --}}
    {{--  PRODUK  —  Showcase Content                                  --}}
    {{-- ============================================================ --}}
    <section class="relative py-20 lg:py-28 overflow-hidden bg-sugih-base" data-testid="products-showcase">
        {{-- Batik Watermark --}}
        <div class="absolute inset-0 pointer-events-none opacity-15 z-0" 
             style="background-image: url('{{ asset('images/batik-cianjur-no-bg.png') }}'); background-repeat: no-repeat; background-position: center; background-size: cover; filter: contrast(120%) drop-shadow(0 0 1px rgba(0,0,0,0.2));">
        </div>

        {{-- ============================================================ --}}
        {{--  BUBBLES LAYER (Behind details, above batik)                 --}}
        {{-- ============================================================ --}}
        @foreach($products as $product)
            @if($product->bubbles->count())
                <div class="absolute inset-0 overflow-hidden pointer-events-none z-[5]"
                     x-show="selectedProduct === {{ $product->id }}"
                     x-transition:enter="transition ease-out duration-1000"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-500"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     style="display: none;">
                    @for($i = 0; $i < 10; $i++)
                        @php $bubble = $product->bubbles[$i % $product->bubbles->count()]; @endphp
                        <div class="product-bubble product-bubble-{{ $i + 1 }}">
                            <img src="{{ $bubble->image_url }}" alt="" class="w-full h-full object-contain opacity-90 drop-shadow-md">
                        </div>
                    @endfor
                </div>
            @endif
        @endforeach

        <div class="container-page relative z-10">

            {{-- Page title --}}
            <h1 class="heading-display text-center text-sugih-primary text-4xl sm:text-5xl md:text-6xl mb-4" data-aos="fade-up">
                Produk Kami
            </h1>
            <div class="flex justify-center mb-16" data-aos="fade-up">
                <div class="w-20 h-1 bg-sugih-terracotta rounded-full"></div>
            </div>

            {{-- ── Interactive 3D Product Showcase ───────── --}}
            <div class="relative max-w-7xl mx-auto min-h-[60vh] flex items-center justify-center" 
                 data-aos="fade-up" data-aos-delay="200">
                 
                {{-- Showcase View: Grid of Images --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 w-full max-w-7xl mx-auto transition-all duration-700 product-showcase-grid"
                     :class="selectedProduct ? 'opacity-0 scale-95 pointer-events-none absolute inset-0' : 'opacity-100 scale-100 relative'">
                    @foreach($products as $index => $product)
                        <div class="flex justify-center items-center cursor-pointer group relative product-item transition-all duration-500 ease-out"
                             @click="selectedProduct = {{ $product->id }}">
                             
                            {{-- Spotlight / Glow --}}
                            <div class="absolute inset-0 bg-sugih-mustard/10 blur-3xl rounded-full -z-10 scale-75 group-hover:scale-100 group-hover:bg-sugih-mustard/30 transition-all duration-700"></div>

                            {{-- Image Container with Levitation Effect --}}
                            <div class="flex justify-center items-center h-[180px] sm:h-[220px] md:h-[260px]">
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product['name'] }}"
                                     class="max-w-full max-h-full object-contain drop-shadow-2xl group-hover:scale-105 group-hover:-translate-y-4 transition-all duration-700 ease-out">
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Detail View: Image on Left, Text on Right --}}
                @foreach($products as $product)
                    <div class="absolute inset-0 flex flex-col md:flex-row items-center w-full h-full"
                         x-show="selectedProduct === {{ $product->id }}"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 -translate-x-12"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-12"
                         style="display: none;">

                        {{-- Close Button --}}
                        <button type="button" @click="selectedProduct = null"
                                class="absolute top-0 right-0 md:-right-8 lg:-right-16 z-50 p-3 text-sugih-primary/60 hover:text-sugih-primary bg-sugih-mustard/10 hover:bg-sugih-mustard/20 rounded-full backdrop-blur-md transition-all hover:rotate-90 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        {{-- Left: Image --}}
                        <div class="w-full md:w-1/2 flex justify-center p-4 md:p-8 relative z-10">
                            {{-- Decorative glow --}}
                            <div class="absolute inset-0 bg-sugih-mustard/20 blur-3xl rounded-full -z-10 scale-75 animate-pulse"></div>
                            
                            <div class="flex justify-center items-center h-[280px] sm:h-[350px] md:h-[400px] animate-[float_4s_ease-in-out_infinite]">
                                <img src="{{ $product->image_url }}"
                                     alt="{{ $product['name'] }}"
                                     class="max-w-full max-h-full object-contain drop-shadow-2xl hover:scale-105 transition-transform duration-700">
                            </div>
                        </div>

                        {{-- Right: Details --}}
                        <div class="w-full md:w-1/2 flex flex-col justify-center p-6 md:p-12 text-center md:text-left relative z-10">
                            <h2 class="heading-display text-sugih-primary text-4xl sm:text-5xl lg:text-6xl mb-6 leading-tight drop-shadow-sm">
                                {{ $product['name'] }}
                            </h2>
                            <p class="text-sugih-secondary text-base sm:text-lg lg:text-xl leading-relaxed">
                                {{ $product['description'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    </div>

@endsection

@push('scripts')
<style>
    /* Focus & Blur Effect on hover */
    .product-showcase-grid:has(> .product-item:hover) > .product-item:not(:hover) {
        opacity: 0.3;
        filter: blur(4px);
        transform: scale(0.95);
    }

    /* ── Floating Bubbles Animation ── */
    .product-bubble {
        position: absolute;
        bottom: -150px;
        animation: bubbleFloat linear infinite;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-bubble-1  { width: 90px;  height: 90px;  left: 5%;  animation-duration: 9s;  z-index: 1; }
    .product-bubble-2  { width: 110px; height: 110px; left: 15%; animation-duration: 10s; animation-delay: 1.2s; z-index: 0; }
    .product-bubble-3  { width: 140px; height: 140px; left: 30%; animation-duration: 11s; animation-delay: 2.5s; z-index: 1; }
    .product-bubble-4  { width: 95px;  height: 95px;  left: 45%; animation-duration: 8.5s; animation-delay: 0.8s; z-index: 0; }
    .product-bubble-5  { width: 120px; height: 120px; left: 60%; animation-duration: 13s; animation-delay: 3.5s; z-index: 1; }
    .product-bubble-6  { width: 105px; height: 105px; left: 72%; animation-duration: 9.5s; animation-delay: 1.8s; z-index: 0; }
    .product-bubble-7  { width: 150px; height: 150px; left: 82%; animation-duration: 14s; animation-delay: 4.2s; z-index: 1; }
    .product-bubble-8  { width: 85px;  height: 85px;  left: 92%; animation-duration: 7.5s; animation-delay: 2.8s; z-index: 0; }
    .product-bubble-9  { width: 125px; height: 125px; left: 10%; animation-duration: 10s; animation-delay: 5.5s; z-index: 1; }
    .product-bubble-10 { width: 115px; height: 115px; left: 50%; animation-duration: 12s; animation-delay: 0.5s; z-index: 0; }

    @keyframes bubbleFloat {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 0.6;
        }
        50% {
            opacity: 0.8;
        }
        100% {
            transform: translateY(-120vh) rotate(360deg);
            opacity: 0;
        }
    }
</style>
@endpush
