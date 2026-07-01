@extends('layouts.app')

@section('title', 'Kontak — SUGIH')

@section('content')
    <section class="relative pt-32 pb-20 container-page min-h-screen">
        {{-- Batik Watermark --}}
        <div class="absolute inset-0 pointer-events-none opacity-15" 
             style="background-image: url('{{ asset('images/batik-cianjur-no-bg.png') }}'); background-repeat: no-repeat; background-position: center; background-size: cover; filter: contrast(120%) drop-shadow(0 0 1px rgba(0,0,0,0.2));">
        </div>
        <div class="relative z-10">
        <h1 class="heading-display text-sugih-green text-5xl mb-6">Hubungi Kami</h1>

        @if(session('success'))
            <div class="bg-emerald-500/20 border border-emerald-400 text-emerald-100 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" class="max-w-xl grid gap-4">
            @csrf
            <input type="text" name="name" placeholder="Nama Anda"
                   class="rounded-lg bg-white border-gray-300 text-sugih-primary placeholder-sugih-muted focus:border-sugih-terracotta focus:ring focus:ring-sugih-terracotta/20">
            <input type="email" name="email" placeholder="Email"
                   class="rounded-lg bg-white border-gray-300 text-sugih-primary placeholder-sugih-muted focus:border-sugih-terracotta focus:ring focus:ring-sugih-terracotta/20">
            <input type="text" name="subject" placeholder="Subjek"
                   class="rounded-lg bg-white border-gray-300 text-sugih-primary placeholder-sugih-muted focus:border-sugih-terracotta focus:ring focus:ring-sugih-terracotta/20">
            <textarea name="message" rows="5" placeholder="Pesan"
                      class="rounded-lg bg-white border-gray-300 text-sugih-primary placeholder-sugih-muted focus:border-sugih-terracotta focus:ring focus:ring-sugih-terracotta/20"></textarea>
            <button type="submit" class="btn-primary w-fit">Kirim Pesan</button>
        </form>
        </div>
    </section>
@endsection
