@extends('layouts.app')

@section('title', $article['title'] . ' — SUGIH')
@section('description', $article['excerpt'])

@section('content')

    {{-- ============================================================ --}}
    {{--  ARTICLE DETAIL — Gambar di atas, tanggal, judul, isi          --}}
    {{-- ============================================================ --}}
    <article class="bg-sugih-mustard-900 min-h-screen" data-testid="article-detail">

        {{-- Hero image (full-width) --}}
        <div class="w-full pt-20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-8">
                <div class="rounded-2xl overflow-hidden shadow-card-soft" data-aos="fade-up">
                    <img src="{{ $article->image_url }}"
                         alt="{{ $article['title'] }}"
                         class="w-full aspect-[16/9] object-cover">
                </div>
            </div>
        </div>

        {{-- Article content --}}
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">

            {{-- Date --}}
            <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                <span class="text-sugih-mustard text-sm font-semibold tracking-wide">
                    {{ $article->created_at->format('d F Y') }}
                </span>
                <div class="w-16 h-1 bg-red-600 mt-3"></div>
            </div>

            {{-- Title --}}
            <h1 class="heading-display text-white text-2xl sm:text-3xl md:text-4xl leading-tight mb-8" data-aos="fade-up" data-aos-delay="150">
                {{ $article['title'] }}
            </h1>

            {{-- Body --}}
            <div class="prose-sugih text-white/90 text-base sm:text-lg leading-relaxed space-y-6" data-aos="fade-up" data-aos-delay="200">
                {!! $article['content'] !!}
            </div>

            {{-- Back link --}}
            <div class="mt-14 pt-8 border-t border-white/10">
                <a href="{{ route('articles.index') }}"
                   class="inline-flex items-center gap-2 text-sugih-mustard hover:text-white font-bold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Berita
                </a>
            </div>
        </div>
    </article>

@endsection
