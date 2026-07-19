@extends('layouts.app')

@section('title', 'Sejarah — SUGIH')
@section('description', 'Kisah perjalanan SUGIH dan CV. Prioritas Group dari Cianjur — kretek berkelas yang lahir dari filosofi lokal Sugih Mukti.')

@section('content')

    {{-- ============================================================ --}}
    {{--  TENTANG SUGIH  —  Hero Banner                               --}}
    {{-- ============================================================ --}}
    <section class="relative min-h-[70vh] flex items-center justify-center pt-20 overflow-hidden" data-testid="about-hero">
        <x-hero-slideshow />
        
        <div class="absolute inset-0 bg-black/40 pointer-events-none"></div>
        {{-- Vignette for Navbar --}}
        <div class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-black/80 to-transparent pointer-events-none"></div>
    </section>

    {{-- ============================================================ --}}
    {{--  SEJARAH NARASI                                               --}}
    {{-- ============================================================ --}}
    <section class="relative py-20 lg:py-28 overflow-hidden bg-sugih-base">
        {{-- Batik Watermark --}}
        <div class="absolute inset-0 pointer-events-none opacity-15" 
             style="background-image: url('{{ asset('images/batik-cianjur-no-bg.png') }}'); background-repeat: no-repeat; background-position: center; background-size: cover; filter: contrast(120%) drop-shadow(0 0 1px rgba(0,0,0,0.2));">
        </div>
        <div class="container-page relative z-10">
            {{-- Section title --}}
            <h1 class="heading-display text-center text-sugih-primary text-4xl sm:text-5xl md:text-6xl mb-4" data-aos="fade-up">
                Tentang Sugih
            </h1>
            <div class="flex justify-center mb-12" data-aos="fade-up">
                <div class="w-20 h-1 bg-sugih-terracotta rounded-full"></div>
            </div>

            {{-- Intro paragraph with scrubbing --}}
            <p class="text-center text-sugih-secondary text-sm sm:text-base md:text-lg leading-relaxed lg:leading-loose max-w-4xl mx-auto mb-24 font-normal gs-about-intro">
                Didirikan di Cianjur pada 2023, Sugih lahir dari filosofi lokal Sugih Mukti, bermakna subur dan kaya, sebagai
                wujud semangat untuk mengangkat potensi tembakau Cianjur menjadi produk kretek yang layak dibanggakan.
                Di bawah naungan CV. Prioritas Group, nama Sugih bukan sekadar merek, melainkan doa kemakmuran bagi
                seluruh pihak yang terlibat dalam setiap produknya.
            </p>

            {{-- ── Story Block 1: Image LEFT, Text RIGHT ─────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-14 items-center mb-20">
                <div class="rounded-2xl overflow-hidden shadow-card-soft max-w-[280px] sm:max-w-sm mx-auto gs-about-img">
                    <img src="{{ asset('images/img-1.png') }}"
                         alt="Perjalanan awal SUGIH — kegiatan UMKM"
                         class="w-full aspect-[3/4] object-cover">
                </div>
                <div>
                    <p class="text-center text-sugih-secondary text-sm sm:text-base md:text-lg leading-relaxed lg:leading-loose font-normal gs-about-story-1">
                        Perjalanan Sugih berawal dari usaha kecil yang tumbuh melalui berbagai kegiatan
                        UMKM. Partisipasi dalam pameran dan bazar menjadi sarana pertama
                        memperkenalkan produk kepada masyarakat luas, sekaligus bukti nyata bahwa
                        semangat untuk berkembang tidak pernah padam sejak hari pertama.
                    </p>
                </div>
            </div>

            {{-- ── Story Block 2: Text LEFT, Image RIGHT ─────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-14 items-center mb-20">
                <div class="order-2 md:order-1">
                    <p class="text-center text-sugih-secondary text-sm sm:text-base md:text-lg leading-relaxed lg:leading-loose font-normal gs-about-story-2">
                        Titik penting dalam perjalanan kami datang ketika produk Sugih mendapat
                        perhatian langsung dari Bupati Cianjur, dr. Mohammad Wahyu Ferdian, Sp.OG. Pengakuan ini bukan hanya kebanggaan,
                        tetapi menjadi dorongan besar untuk terus memperkuat identitas dan nilai lokal
                        yang kami bawa dalam setiap produk.
                    </p>
                </div>
                <div class="order-1 md:order-2 rounded-2xl overflow-hidden shadow-card-soft max-w-[280px] sm:max-w-sm mx-auto gs-about-img">
                    <img src="{{ asset('images/img-2.png') }}"
                         alt="Perhatian dari Bupati Cianjur untuk produk Sugih"
                         class="w-full aspect-[3/4] object-cover">
                </div>
            </div>

            {{-- ── Story Block 3: Image LEFT, Text RIGHT ─────────── --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-14 items-center">
                <div class="rounded-2xl overflow-hidden shadow-card-soft max-w-[280px] sm:max-w-sm mx-auto gs-about-img">
                    <img src="{{ asset('images/img-3.png') }}"
                         alt="Produksi kretek SUGIH di Cianjur"
                         class="w-full aspect-[3/4] object-cover">
                </div>
                <div>
                    <p class="text-center text-sugih-secondary text-sm sm:text-base md:text-lg leading-relaxed lg:leading-loose font-normal gs-about-story-3">
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
        {{-- Background --}}
        <div class="absolute inset-0 -z-10 bg-sugih-dark"></div>

        <div class="container-page">
            <h2 class="heading-display text-center text-white text-3xl sm:text-4xl md:text-5xl mb-16" data-aos="fade-up">
                Profil Manajemen
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 max-w-3xl mx-auto">

                {{-- Member 1: Deni Rahmat --}}
                <div class="text-center group flex flex-col items-center gs-founder" data-testid="member-1">
                    <div class="w-56 h-56 sm:w-64 sm:h-64 mx-auto mb-6 rounded-full overflow-hidden border-4 border-sugih-mustard/30
                                shadow-card-soft bg-sugih-dark
                                transition-transform duration-300 group-hover:scale-105 gs-founder-photo">
                        <img src="{{ asset('images/DeniRahmat.png') }}"
                             alt="Deni Rahmat — Founder CV Prioritas Group"
                             class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
                    </div>
                    <h3 class="heading-display text-white text-2xl sm:text-3xl mb-1 gs-founder-name">Deni Rahmat</h3>
                    <p class="text-sugih-mustard text-base sm:text-lg font-semibold gs-founder-role">Founder</p>
                    <p class="text-white/60 text-sm sm:text-base mt-1 gs-founder-company">CV Prioritas Group</p>
                </div>

                {{-- Member 2: Ardjia Adiati Karisma --}}
                <div class="text-center group flex flex-col items-center gs-founder" data-testid="member-2">
                    <div class="w-56 h-56 sm:w-64 sm:h-64 mx-auto mb-6 rounded-full overflow-hidden border-4 border-sugih-mustard/30 
                                shadow-card-soft bg-sugih-dark
                                transition-transform duration-300 group-hover:scale-105 gs-founder-photo">
                        <img src="{{ asset('images/ArdjiaAdiatiKarisma.png') }}"
                             alt="Ardjia Adiati Karisma — Founder CV Prioritas Group"
                             class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
                    </div>
                    <h3 class="heading-display text-white text-2xl sm:text-3xl mb-1 gs-founder-name">Ardjia Adiati Karisma</h3>
                    <p class="text-sugih-mustard text-base sm:text-lg font-semibold gs-founder-role">Founder</p>
                    <p class="text-white/60 text-sm sm:text-base mt-1 gs-founder-company">CV Prioritas Group</p>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script type="module">
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        if (!window.gsap || !window.ScrollTrigger || !window.SplitType) return;
        const g = window.gsap;

        // ═══════════════════════════════════════════
        // 1. Scrubbing Typography — All story paragraphs
        // ═══════════════════════════════════════════
        const scrubTargets = [
            '.gs-about-intro',
            '.gs-about-story-1',
            '.gs-about-story-2',
            '.gs-about-story-3'
        ];

        scrubTargets.forEach(selector => {
            const el = document.querySelector(selector);
            if (!el) return;

            const split = new window.SplitType(el, { types: 'words' });

            g.fromTo(split.words,
                { opacity: 0.15 },
                {
                    opacity: 1,
                    stagger: 0.05,
                    ease: 'none',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 80%',
                        end: 'bottom 50%',
                        scrub: 1
                    }
                }
            );
        });

        // ═══════════════════════════════════════════
        // 2. Story Block Images — Parallax + Reveal
        // ═══════════════════════════════════════════
        const storyImages = document.querySelectorAll('.gs-about-img');
        storyImages.forEach(img => {
            // Reveal: fade-in + scale-up
            g.fromTo(img,
                { opacity: 0, scale: 0.85, y: 40 },
                {
                    opacity: 1,
                    scale: 1,
                    y: 0,
                    duration: 1,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: img,
                        start: 'top 90%',
                        end: 'top 55%',
                        scrub: 1
                    }
                }
            );

            // Parallax: image moves slower than surrounding content
            g.to(img, {
                yPercent: -15,
                ease: 'none',
                scrollTrigger: {
                    trigger: img,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: true
                }
            });
        });

        // ═══════════════════════════════════════════
        // 3. Founder Section — Scale-up + Stagger
        // ═══════════════════════════════════════════
        const founders = document.querySelectorAll('.gs-founder');
        founders.forEach((founder, i) => {
            const photo = founder.querySelector('.gs-founder-photo');
            const name = founder.querySelector('.gs-founder-name');
            const role = founder.querySelector('.gs-founder-role');
            const company = founder.querySelector('.gs-founder-company');

            const tl = g.timeline({
                scrollTrigger: {
                    trigger: founder,
                    start: 'top 85%',
                    end: 'top 50%',
                    scrub: 1
                }
            });

            // Photo scales up from small
            tl.fromTo(photo,
                { opacity: 0, scale: 0.5 },
                { opacity: 1, scale: 1, duration: 0.5, ease: 'back.out(1.4)' },
                0
            );

            // Name slides up
            tl.fromTo(name,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.3, ease: 'power2.out' },
                0.3
            );

            // Role fades in
            tl.fromTo(role,
                { opacity: 0, y: 10 },
                { opacity: 1, y: 0, duration: 0.2, ease: 'power2.out' },
                0.5
            );

            // Company fades in
            tl.fromTo(company,
                { opacity: 0 },
                { opacity: 1, duration: 0.2 },
                0.6
            );
        });

    }, 200);
});
</script>
@endpush
