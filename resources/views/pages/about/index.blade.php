@extends('layouts.app')

@section('title', 'Sejarah — SUGIH')
@section('description', 'Kisah perjalanan SUGIH dan CV. Prioritas Group dari Cianjur — kretek berkelas yang lahir dari filosofi lokal Sugih Mukti.')

@section('content')

    {{-- ============================================================ --}}
    {{--  TENTANG SUGIH  —  Hero + Sejarah Narasi                     --}}
    {{-- ============================================================ --}}
    <section class="relative pt-28 pb-20 lg:pt-36 lg:pb-28 overflow-hidden" data-testid="about-hero">
        {{-- Background — using sejarah.png with dark overlay --}}
        <div class="absolute inset-0 -z-10" style="background-image: url('{{ asset('images/sejarah.png') }}'); background-size: cover; background-position: top center;">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>

        <div class="container-page">
            {{-- Section title --}}
            <h1 class="heading-display text-center text-sugih-gold text-4xl sm:text-5xl md:text-6xl mb-10" data-aos="fade-up">
                Tentang Sugih
            </h1>

            {{-- Intro paragraph --}}
            <p class="text-center text-white/90 text-sm sm:text-base leading-relaxed max-w-4xl mx-auto mb-20 font-normal" data-aos="fade-up" data-aos-delay="100">
                Didirikan di Cianjur pada 2023, Sugih lahir dari filosofi lokal Sugih Mukti, bermakna subur dan kaya, sebagai
                wujud semangat untuk mengangkat potensi tembakau Cianjur menjadi produk kretek yang layak dibanggakan.
                Di bawah naungan CV. Prioritas Group, nama Sugih bukan sekadar merek, melainkan doa kemakmuran bagi
                seluruh pihak yang terlibat dalam setiap produknya.
            </p>

            {{-- ── Story Block 1: Image LEFT, Text RIGHT ─────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-14 items-center mb-20">
                <div class="rounded-2xl overflow-hidden shadow-card-soft max-w-[280px] sm:max-w-sm mx-auto" data-aos="fade-right">
                    <img src="{{ asset('images/img-1.png') }}"
                         alt="Perjalanan awal SUGIH — kegiatan UMKM"
                         class="w-full aspect-[3/4] object-cover">
                </div>
                <div data-aos="fade-left">
                    <p class="text-center text-white/90 text-sm sm:text-base leading-relaxed font-normal">
                        Perjalanan Sugih berawal dari usaha kecil yang tumbuh melalui berbagai kegiatan
                        UMKM. Partisipasi dalam pameran dan bazar menjadi sarana pertama
                        memperkenalkan produk kepada masyarakat luas, sekaligus bukti nyata bahwa
                        semangat untuk berkembang tidak pernah padam sejak hari pertama.
                    </p>
                </div>
            </div>

            {{-- ── Story Block 2: Text LEFT, Image RIGHT ─────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-14 items-center mb-20">
                <div class="order-2 md:order-1" data-aos="fade-right">
                    <p class="text-center text-white/90 text-sm sm:text-base leading-relaxed font-normal">
                        Titik penting dalam perjalanan kami datang ketika produk Sugih mendapat
                        perhatian langsung dari Bupati Cianjur. Pengakuan ini bukan hanya kebanggaan,
                        tetapi menjadi dorongan besar untuk terus memperkuat identitas dan nilai lokal
                        yang kami bawa dalam setiap produk.
                    </p>
                </div>
                <div class="order-1 md:order-2 rounded-2xl overflow-hidden shadow-card-soft max-w-[280px] sm:max-w-sm mx-auto" data-aos="fade-left">
                    <img src="{{ asset('images/img-2.png') }}"
                         alt="Perhatian dari Bupati Cianjur untuk produk Sugih"
                         class="w-full aspect-[3/4] object-cover">
                </div>
            </div>

            {{-- ── Story Block 3: Image LEFT, Text RIGHT ─────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-14 items-center">
                <div class="rounded-2xl overflow-hidden shadow-card-soft max-w-[280px] sm:max-w-sm mx-auto" data-aos="fade-right">
                    <img src="{{ asset('images/img-3.png') }}"
                         alt="Produksi kretek SUGIH di Cianjur"
                         class="w-full aspect-[3/4] object-cover">
                </div>
                <div data-aos="fade-left">
                    <p class="text-center text-white/90 text-sm sm:text-base leading-relaxed font-normal">
                        Sugih meyakini bahwa produk lokal mampu tampil setara dengan merek besar,
                        asalkan dibangun di atas nilai yang jelas: kualitas yang tidak dikompromikan,
                        legalitas yang terjamin, dan kebanggaan budaya Cianjur yang tercermin dalam
                        setiap produk yang kami hadirkan.
                    </p>
                </div>
            </div>
        </div>
    </section>


    {{-- ============================================================ --}}
    {{--  PROFIL MANAJEMEN                                             --}}
    {{-- ============================================================ --}}
    <section class="relative py-20 lg:py-28 overflow-hidden" data-testid="management-section">
        {{-- Background — slightly lighter green for contrast --}}
        <div class="absolute inset-0 -z-10 bg-sugih-green-800"></div>

        <div class="container-page">
            <h2 class="heading-display text-center text-sugih-gold text-3xl sm:text-4xl md:text-5xl mb-16" data-aos="fade-up">
                Profil Manajemen
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 max-w-3xl mx-auto">

                {{-- Member 1 --}}
                <div class="text-center group" data-testid="member-1" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-48 h-48 mx-auto mb-5 rounded-full overflow-hidden border-4 border-sugih-gold/30
                                shadow-card-soft bg-sugih-green-700 flex items-center justify-center
                                transition-transform duration-300 group-hover:scale-105">
                        {{-- Placeholder — akan diganti dengan foto asli --}}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-sugih-gold/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-1">Deni Rahmat</h3>
                    <p class="text-sugih-gold text-sm font-semibold">Founder</p>
                    <p class="text-white/60 text-xs mt-0.5">CV Prioritas Grup</p>
                </div>

                {{-- Member 2 --}}
                <div class="text-center group" data-testid="member-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-48 h-48 mx-auto mb-5 rounded-full overflow-hidden border-4 border-sugih-gold/30
                                shadow-card-soft bg-sugih-green-700 flex items-center justify-center
                                transition-transform duration-300 group-hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-sugih-gold/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-1">Ardjia Adiati Karisma</h3>
                    <p class="text-sugih-gold text-sm font-semibold">Founder</p>
                    <p class="text-white/60 text-xs mt-0.5">CV Prioritas Grup</p>
                </div>

            </div>
        </div>
    </section>

@endsection
