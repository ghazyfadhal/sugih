@extends('layouts.app')

@section('title', $karir['title'] . ' — Karir SUGIH')
@section('description', 'Lowongan ' . $karir['title'] . ' di CV. Prioritas Group (SUGIH). Lokasi: ' . $karir['location'])

@section('content')

    {{-- ============================================================ --}}
    {{--  KARIR DETAIL — Background + Job Info                         --}}
    {{-- ============================================================ --}}

    {{-- Hero area with background --}}
    <section class="relative pt-28 pb-16 lg:pt-36 lg:pb-20" data-testid="karir-detail-hero">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('{{ asset('images/karir-2.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page text-center">
            <span class="inline-block bg-sugih-gold/20 text-sugih-gold text-xs font-bold uppercase tracking-widest
                         px-4 py-1.5 rounded-full mb-4" data-aos="fade-down">
                {{ $karir['type'] }} — {{ $karir['location'] }}
            </span>
            <h1 class="heading-display text-white text-2xl sm:text-3xl md:text-4xl" data-aos="fade-up">
                {{ $karir['title'] }}
            </h1>
        </div>
    </section>

    {{-- Detail content --}}
    <section class="relative py-12 lg:py-16" data-testid="karir-detail-content">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('{{ asset('images/karir.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>

        <div class="container-page">
            <div class="max-w-3xl mx-auto bg-sugih-green-800/80 backdrop-blur-sm border border-white/10
                        rounded-2xl p-8 sm:p-10 lg:p-12 shadow-card-soft" data-aos="fade-up">

                {{-- Job Title --}}
                <h2 class="text-white font-bold text-xl sm:text-2xl mb-8">
                    {{ $karir['title'] }}
                </h2>

                {{-- Deskripsi Pekerjaan --}}
                <div class="mb-8">
                    <h3 class="text-white font-bold text-base sm:text-lg mb-4">Deskripsi Pekerjaan:</h3>
                    <ul class="text-white/85 text-sm sm:text-base leading-relaxed space-y-3">
                        @foreach(explode("\n", trim($karir['description'])) as $desc)
                            <li class="flex gap-3">
                                <span class="text-sugih-gold mt-1 shrink-0">•</span>
                                <span>{{ trim($desc) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Kualifikasi --}}
                <div class="mb-10">
                    <h3 class="text-white font-bold text-base sm:text-lg mb-4">Kualifikasi:</h3>
                    <ul class="text-white/85 text-sm sm:text-base leading-relaxed space-y-3">
                        @foreach(explode("\n", trim($karir['requirements'])) as $qual)
                            <li class="flex gap-3">
                                <span class="text-sugih-gold mt-1 shrink-0">•</span>
                                <span>{{ trim($qual) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Action buttons --}}
                <div class="flex flex-wrap items-center gap-4 pt-6 border-t border-white/10">
                    <a href="mailto:cvprioritasgroup@gmail.com?subject=Lamaran: {{ urlencode($karir['title']) }}"
                       class="inline-flex items-center justify-center px-8 py-3 rounded-lg
                              bg-sugih-green-700 hover:bg-sugih-green-600 transition-colors duration-300
                              text-white font-bold text-sm shadow-lg">
                        Lamar Sekarang
                    </a>
                </div>
            </div>

            {{-- Back link --}}
            <div class="max-w-3xl mx-auto mt-8">
                <a href="{{ route('karir.index') }}"
                   class="inline-flex items-center gap-2 text-sugih-gold hover:text-white font-bold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Karir
                </a>
            </div>
        </div>
    </section>

@endsection
