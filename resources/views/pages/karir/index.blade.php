@extends('layouts.app')

@section('title', 'Karir — SUGIH')
@section('description', 'Bergabunglah bersama tim SUGIH. Temukan peluang karir di CV. Prioritas Group.')

@section('content')

    {{-- ============================================================ --}}
    {{--  HERO KARIR                                                   --}}
    {{-- ============================================================ --}}
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-24" data-testid="karir-hero">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('{{ asset('images/karir-2.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page text-center">
            <h1 class="heading-display text-sugih-gold text-4xl sm:text-5xl md:text-6xl mb-6" data-aos="fade-up">
                Karir
            </h1>
            <p class="text-white/90 text-base sm:text-lg md:text-xl leading-relaxed max-w-4xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Sumber daya manusia adalah kekuatan utama dalam membangun SUGIH. Kami percaya bahwa setiap individu memiliki
                potensi untuk tumbuh dan berkontribusi melalui keterampilan dan kreativitasnya. Bersama kami, jadilah bagian dari perjalanan
                dalam mengembangkan cita rasa kretek lokal yang berkelas dan bernilai budaya tinggi.
            </p>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{--  SEMUA LOWONGAN                                               --}}
    {{-- ============================================================ --}}
    <section id="semua-lowongan" class="relative py-16 lg:py-24" data-testid="karir-all">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('{{ asset('images/karir.png') }}'); background-size: cover; background-position: bottom center;">
            <div class="absolute inset-0 bg-black/70"></div>
        </div>

        <div class="container-page">
            <h2 class="heading-display text-center text-white text-3xl sm:text-4xl md:text-5xl mb-12" data-aos="fade-up">
                Buka Potensimu
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach($allKarir as $index => $job)
                    <div class="bg-sugih-green-800/80 backdrop-blur-sm border border-white/10 rounded-xl p-6 flex flex-col
                                hover:border-sugih-gold/40 transition-all duration-300"
                         data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                        <h3 class="text-white font-bold text-base sm:text-lg mb-4 leading-snug">
                            {{ $job['title'] }}
                        </h3>
                        <ul class="text-white/80 text-sm leading-relaxed space-y-2 flex-1 mb-6">
                            @foreach($job['summary'] as $point)
                                <li class="flex gap-2">
                                    <span class="text-sugih-gold mt-1 shrink-0">•</span>
                                    <span>{{ $point }}</span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('karir.show', $job['slug']) }}"
                           class="inline-block text-center border-2 border-sugih-gold text-sugih-gold font-bold
                                  py-2 px-6 rounded-lg hover:bg-sugih-gold hover:text-sugih-green-900
                                  transition-all duration-300 text-sm">
                            Lihat detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
