<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SUGIH')) — Semua Ingin Sugih</title>
    <meta name="description" content="@yield('description', 'SUGIH — kretek berkualitas dari tanah Cianjur. Diproduksi oleh CV. Prioritas Group.')">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">

    {{-- Vite assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body id="top" class="min-h-screen flex flex-col bg-sugih-green-900">

    @include('partials.header')

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.warning')
    @include('partials.footer')

    @stack('scripts')
</body>
</html>
