@extends('layouts.app')

@section('title', 'Berita — SUGIH')
@section('description', 'Berita dan artikel terbaru dari SUGIH — kretek berkualitas dari tanah Cianjur.')

@section('content')

    {{-- ============================================================ --}}
    {{--  BERITA INDEX — Daftar semua artikel                          --}}
    {{-- ============================================================ --}}
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 min-h-screen" data-testid="articles-index">
        <div class="absolute inset-0 -z-10 bg-sugih-green-900"></div>

        <div class="container-page">
            <h1 class="heading-display text-center text-sugih-gold text-4xl sm:text-5xl md:text-6xl mb-14">
                Berita
            </h1>

            @if(count($articles) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach($articles as $article)
                        <a href="{{ route('articles.show', $article['slug']) }}"
                           class="group block rounded-2xl overflow-hidden bg-sugih-green-800 shadow-card-soft
                                  hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                            {{-- Image --}}
                            <div class="aspect-[16/10] overflow-hidden">
                                <img src="{{ asset($article['image']) }}"
                                     alt="{{ $article['title'] }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            {{-- Content --}}
                            <div class="p-6">
                                <span class="text-sugih-gold text-xs font-semibold tracking-wide uppercase">
                                    {{ $article['date'] }}
                                </span>
                                <h3 class="text-white font-bold text-lg mt-2 mb-3 leading-snug group-hover:text-sugih-gold transition-colors">
                                    {{ $article['title'] }}
                                </h3>
                                <p class="text-white/70 text-sm leading-relaxed line-clamp-3">
                                    {{ $article['excerpt'] }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <p class="text-white/60 text-lg">Belum ada berita untuk ditampilkan.</p>
                </div>
            @endif
        </div>
    </section>

@endsection
