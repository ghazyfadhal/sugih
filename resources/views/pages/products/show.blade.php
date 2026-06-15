@extends('layouts.app')

@section('title', 'Detail Produk — SUGIH')

@section('content')
    <section class="pt-32 pb-20 container-page">
        <h1 class="heading-display text-white text-5xl mb-6">Detail Produk</h1>
        <p class="text-white/80">Slug: <code class="text-sugih-gold">{{ $product['slug'] }}</code></p>
    </section>
@endsection
