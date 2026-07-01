@extends('layouts.app')

@section('title', 'Berita — SUGIH')
@section('description', 'Berita dan artikel terbaru dari SUGIH — kretek berkualitas dari tanah Cianjur.')

@section('content')

    {{-- ============================================================ --}}
    {{--  BERITA INDEX — Hero Banner                                  --}}
    {{-- ============================================================ --}}
    <section class="relative min-h-[50vh] sm:min-h-[60vh] flex items-center justify-center pt-20 overflow-hidden" data-testid="articles-hero">
        <div class="absolute inset-0 -z-10" style="background-image: url('{{ asset('images/berita.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            {{-- Vignette for Navbar --}}
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent"></div>
        </div>

        <div class="container-page">
            <h1 class="heading-display text-center text-white text-5xl sm:text-6xl md:text-7xl drop-shadow-lg" data-aos="fade-up">
                Berita
            </h1>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{--  BERITA INDEX — Expandable Cards via Alpine.js               --}}
    {{-- ============================================================ --}}
    <section class="relative py-20 lg:py-28 min-h-screen bg-sugih-charcoal" 
             data-testid="articles-index" 
             x-data="{ activeArticle: null }"
             x-init="$watch('activeArticle', val => { if(val) { window.lenis?.stop(); document.body.style.overflow='hidden'; } else { window.lenis?.start(); document.body.style.overflow=''; } })">

        <div class="container-page">

            @if(count($articles) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach($articles as $index => $article)
                        {{-- The Card Button --}}
                        <div class="p-3 flex flex-col justify-between items-center bg-zinc-50 shadow-sm rounded-2xl cursor-pointer border border-gray-200/70 hover:border-gray-300 transition-colors"
                             data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}"
                             @click="activeArticle = {{ $article->id }}">
                            <div class="flex gap-4 flex-col w-full">
                                <div>
                                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-56 rounded-lg object-cover object-center">
                                </div>
                                <div class="flex justify-between items-center px-1 pb-1">
                                    <div class="flex flex-col pr-4">
                                        <p class="text-zinc-500 text-sm font-medium mb-1">
                                            {{ $article->created_at->format('d F Y') }}
                                        </p>
                                        <h3 class="text-black font-semibold text-lg leading-snug line-clamp-2">
                                            {{ $article->title }}
                                        </h3>
                                    </div>
                                    <button aria-label="Open article" class="h-8 w-8 shrink-0 flex items-center justify-center rounded-full bg-zinc-50 text-neutral-700 hover:bg-neutral-100 border border-gray-200/90 hover:border-gray-300 transition-colors duration-300 focus:outline-none group">
                                        <div class="transition-transform duration-400 group-hover:rotate-45">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14" />
                                                <path d="M12 5v14" />
                                            </svg>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <p class="text-sugih-gray text-lg">Belum ada berita untuk ditampilkan.</p>
                </div>
            @endif
        </div>

        {{-- Expanded Modals (Teleported to body to avoid z-index/overflow issues) --}}
        <template x-teleport="body">
            <div x-show="activeArticle !== null" x-cloak class="fixed inset-0 z-[100] flex justify-center sm:items-start sm:mt-16 sm:px-4">
                
                {{-- Backdrop Blur --}}
                <div x-show="activeArticle !== null" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-black/60 backdrop-blur-md" 
                     @click="activeArticle = null"></div>

                {{-- The Active Article Container --}}
                @foreach($articles as $article)
                <div x-show="activeArticle === {{ $article->id }}"
                     x-transition:enter="transition ease-out duration-400"
                     x-transition:enter-start="opacity-0 scale-95 translate-y-8"
                     x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                     x-transition:leave-end="opacity-0 scale-95 translate-y-8"
                     class="w-full max-w-[850px] h-full sm:h-auto sm:max-h-[85vh] flex flex-col overflow-auto [scrollbar-width:none] [-ms-overflow-style:none] [-webkit-overflow-scrolling:touch] rounded-2xl sm:rounded-3xl bg-zinc-50 shadow-2xl relative z-10"
                     data-lenis-prevent
                     @keydown.escape.window="activeArticle = null">
                     
                    {{-- Image Header with Bottom Gradient --}}
                    <div class="relative w-full shrink-0">
                        <div class="absolute inset-x-0 bottom-[-1px] h-[70px] z-20 bg-gradient-to-t from-zinc-50 to-transparent"></div>
                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full h-64 sm:h-80 object-cover object-center">
                    </div>

                    {{-- Content Area --}}
                    <div class="relative h-full w-full bg-zinc-50 flex flex-col z-10 -mt-[70px] pt-[70px]">
                        
                        {{-- Title & Close Button --}}
                        <div class="flex justify-between items-start px-6 sm:px-8 py-4 sm:py-6 shrink-0">
                            <div class="pr-6">
                                <p class="text-zinc-500 text-base sm:text-lg mb-1">
                                    {{ $article->created_at->format('d F Y') }}
                                </p>
                                <h3 class="font-semibold text-black text-3xl sm:text-4xl mt-0.5 leading-tight">
                                    {{ $article->title }}
                                </h3>
                            </div>
                            
                            <button @click="activeArticle = null"
                                    aria-label="Close card"
                                    class="h-10 w-10 shrink-0 flex items-center justify-center rounded-full bg-zinc-50 text-neutral-700 hover:bg-neutral-200 border border-gray-200/90 hover:border-gray-300 transition-colors duration-300 group">
                                <div class="transition-transform duration-400 rotate-45 group-hover:rotate-90">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                </div>
                            </button>
                        </div>

                        {{-- Body Text --}}
                        <div class="px-6 sm:px-8 pb-12 flex flex-col items-start gap-4 text-zinc-600 leading-relaxed text-base">
                            <div class="prose prose-zinc max-w-none w-full">
                                {!! $article->content !!}
                            </div>
                        </div>
                        
                    </div>
                </div>
                @endforeach
            </div>
        </template>
    </section>

@endsection

@push('scripts')
<style>
    [x-cloak] { display: none !important; }
</style>
@endpush
