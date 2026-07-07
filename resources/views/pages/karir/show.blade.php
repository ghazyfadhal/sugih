@extends('layouts.app')

@section('title', $karir['title'] . ' — Karir SUGIH')
@section('description', 'Lowongan ' . $karir['title'] . ' di CV. Prioritas Group (SUGIH). Lokasi: ' . $karir['location'])

@section('content')

    {{-- ============================================================ --}}
    {{--  KARIR DETAIL — Background + Job Info                         --}}
    {{-- ============================================================ --}}

    {{-- Hero area with background --}}
    <section class="relative min-h-[50vh] flex items-center justify-center pt-20 overflow-hidden" data-testid="karir-detail-hero">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('{{ asset('images/karir2.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/60"></div>
            {{-- Vignette for Navbar --}}
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent"></div>
        </div>

        <div class="container-page text-center">
            <span class="inline-block bg-sugih-mustard text-white text-xs font-bold uppercase tracking-widest
                         px-4 py-1.5 rounded-full mb-4 shadow-sm" data-aos="fade-down">
                {{ $karir['type'] }} — {{ $karir['location'] }}
            </span>
            <h1 class="heading-display text-white text-3xl sm:text-4xl md:text-5xl drop-shadow-lg" data-aos="fade-up">
                {{ $karir['title'] }}
            </h1>
        </div>
    </section>

    {{-- Detail content --}}
    <section class="relative py-16 lg:py-24 bg-sugih-base" data-testid="karir-detail-content">
        {{-- Batik Watermark --}}
        <div class="absolute inset-0 pointer-events-none opacity-15" 
             style="background-image: url('{{ asset('images/batik-cianjur-no-bg.png') }}'); background-repeat: no-repeat; background-position: center; background-size: cover; filter: contrast(120%) drop-shadow(0 0 1px rgba(0,0,0,0.2));">
        </div>

        <div class="container-page relative z-10">
            <div class="max-w-3xl mx-auto bg-sugih-surface border border-sugih-subtle
                        rounded-2xl p-8 sm:p-10 lg:p-12 shadow-sm" data-aos="fade-up">

                {{-- Job Title --}}
                <h2 class="text-sugih-primary font-bold text-xl sm:text-2xl mb-8">
                    {{ $karir['title'] }}
                </h2>

                {{-- Deskripsi Pekerjaan --}}
                <div class="mb-8">
                    <h3 class="text-sugih-primary font-bold text-base sm:text-lg mb-4">Deskripsi Pekerjaan:</h3>
                    <ul class="text-sugih-secondary text-sm sm:text-base leading-relaxed space-y-3">
                        @foreach(explode("\n", trim($karir['description'])) as $desc)
                            <li class="flex gap-3">
                                <span class="text-sugih-green mt-1 shrink-0">•</span>
                                <span>{{ trim($desc) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Kualifikasi --}}
                <div class="mb-10">
                    <h3 class="text-sugih-primary font-bold text-base sm:text-lg mb-4">Kualifikasi:</h3>
                    <ul class="text-sugih-secondary text-sm sm:text-base leading-relaxed space-y-3">
                        @foreach(explode("\n", trim($karir['requirements'])) as $qual)
                            <li class="flex gap-3">
                                <span class="text-sugih-green mt-1 shrink-0">•</span>
                                <span>{{ trim($qual) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Action buttons --}}
                <div class="flex flex-wrap items-center gap-4 pt-6 border-t border-sugih-subtle">
                    <a href="mailto:cvprioritasgrup@gmail.com?subject=Lamaran: {{ urlencode($karir['title']) }}"
                       class="btn-primary">
                        Lamar Sekarang
                    </a>
                </div>
            </div>

            {{-- Back link --}}
            <div class="max-w-3xl mx-auto mt-8">
                <a href="{{ route('karir.index') }}"
                   class="inline-flex items-center gap-2 text-sugih-secondary hover:text-sugih-primary font-bold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Karir
                </a>
            </div>
        </div>
    </section>

@endsection
