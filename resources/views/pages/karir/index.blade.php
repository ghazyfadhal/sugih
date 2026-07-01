@extends('layouts.app')

@section('title', 'Karir — SUGIH')
@section('description', 'Bergabunglah bersama tim SUGIH. Temukan peluang karir di CV. Prioritas Group.')

@section('content')

    {{-- ============================================================ --}}
    {{--  HERO KARIR                                                   --}}
    {{-- ============================================================ --}}
    <section class="relative min-h-[70vh] flex items-center justify-center pt-20 overflow-hidden" data-testid="karir-hero">
        <div class="absolute inset-0 -z-10"
             style="background-image: url('{{ asset('images/karir2.png') }}'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-black/40"></div>
            {{-- Vignette for Navbar --}}
            <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent"></div>
        </div>
    </section>

    {{-- ============================================================ --}}
    {{--  SEMUA LOWONGAN & DESKRIPSI                                   --}}
    {{-- ============================================================ --}}
    <section id="semua-lowongan" class="relative py-20 lg:py-28 min-h-screen bg-sugih-base" data-testid="karir-all">
        {{-- Batik Watermark --}}
        <div class="absolute inset-0 pointer-events-none opacity-15" 
             style="background-image: url('{{ asset('images/batik-cianjur-no-bg.png') }}'); background-repeat: no-repeat; background-position: center; background-size: cover; filter: contrast(120%) drop-shadow(0 0 1px rgba(0,0,0,0.2));">
        </div>
        
        <div class="container-page relative z-10">
            <h1 class="heading-display text-center text-sugih-primary text-4xl sm:text-5xl md:text-6xl mb-4" data-aos="fade-up">
                Karir
            </h1>
            <div class="flex justify-center mb-12" data-aos="fade-up">
                <div class="w-20 h-1 bg-sugih-terracotta rounded-full"></div>
            </div>
            <p class="text-center text-sugih-secondary text-sm sm:text-base md:text-lg leading-relaxed max-w-4xl mx-auto mb-16 font-normal" data-aos="fade-up" data-aos-delay="100">
                Sumber daya manusia adalah kekuatan utama dalam membangun SUGIH. Kami percaya bahwa setiap individu memiliki
                potensi untuk tumbuh dan berkontribusi melalui keterampilan dan kreativitasnya. Bersama kami, jadilah bagian dari perjalanan
                dalam mengembangkan cita rasa kretek lokal yang berkelas dan bernilai budaya tinggi.
            </p>

            <h2 class="heading-display text-center text-sugih-primary text-3xl sm:text-4xl md:text-5xl mb-12" data-aos="fade-up">
                Buka Potensimu
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach($allKarir as $index => $job)
                    <div class="bg-sugih-surface border border-sugih-subtle shadow-sm rounded-xl p-6 flex flex-col
                                hover:border-sugih-green hover:-translate-y-1 transition-all duration-300"
                         data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 100 }}">
                        <h3 class="text-sugih-primary font-bold text-base sm:text-lg mb-4 leading-snug">
                            {{ $job['title'] }}
                        </h3>
                        <p class="text-sugih-secondary text-sm leading-relaxed flex-1 mb-6">
                            {{ Str::limit($job['description'], 120) }}
                        </p>
                        <a href="{{ route('karir.show', $job['slug']) }}"
                           class="inline-block text-center border-2 border-sugih-terracotta text-sugih-terracotta font-bold
                                  py-2 px-6 rounded-lg hover:bg-sugih-terracotta hover:text-white
                                  transition-all duration-300 text-sm">
                            Lihat detail
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
