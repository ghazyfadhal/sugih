<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - SUGIH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .heading-display { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    
    @if(Auth::check())
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside class="w-64 bg-sugih-green-900 text-white flex flex-col transition-all duration-300 relative z-20">
            <div class="h-20 shrink-0 flex items-center justify-center border-b border-white/10">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/admin-logo.svg') }}" alt="SUGIH Admin Logo" class="h-8 w-auto">
                    <span class="text-xs font-light tracking-widest text-sugih-gold mt-1">ADMIN</span>
                </div>
            </div>
            
            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-sugih-green-800 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-sugih-gold text-sugih-green-900 font-bold' : 'text-gray-300' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>
                
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-sugih-green-800 transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-sugih-gold text-sugih-green-900 font-bold' : 'text-gray-300' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Produk
                </a>
                
                <a href="{{ route('admin.articles.index') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-sugih-green-800 transition-colors {{ request()->routeIs('admin.articles.*') ? 'bg-sugih-gold text-sugih-green-900 font-bold' : 'text-gray-300' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                    Artikel
                </a>

                <a href="{{ route('admin.careers.index') }}" class="flex items-center px-4 py-3 rounded-xl hover:bg-sugih-green-800 transition-colors {{ request()->routeIs('admin.careers.*') ? 'bg-sugih-gold text-sugih-green-900 font-bold' : 'text-gray-300' }}">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Karir
                </a>
            </nav>

            <div class="p-4 border-t border-white/10">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 rounded-xl hover:bg-red-900/50 text-red-400 transition-colors">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col relative z-0 overflow-y-auto">
            <!-- Header -->
            <header class="h-20 shrink-0 bg-white border-b border-gray-200 flex items-center justify-between px-8 z-10 sticky top-0">
                <h1 class="text-2xl font-bold text-gray-800 heading-display">@yield('header')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-sm font-medium text-gray-500">Welcome, {{ Auth::user()->name }}</span>
                    <div class="w-10 h-10 rounded-full bg-sugih-gold flex items-center justify-center text-sugih-green-900 font-bold">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
    @else
        @yield('content')
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Dirty Form Checker
            let isDirty = false;
            const dirtyForms = document.querySelectorAll('form.dirty-check');
            
            dirtyForms.forEach(form => {
                const inputs = form.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    input.addEventListener('change', () => isDirty = true);
                    input.addEventListener('input', () => isDirty = true);
                });

                // Disable dirty check upon intended submission
                form.addEventListener('submit', () => isDirty = false);
            });

            window.addEventListener('beforeunload', function (e) {
                if (isDirty) {
                    e.preventDefault();
                    e.returnValue = '';
                }
            });

            // 2. Drag & Drop Upload Handlers
            const dropZones = document.querySelectorAll('.drop-zone');
            dropZones.forEach(zone => {
                const input = zone.querySelector('input[type="file"]');
                const labelText = zone.querySelector('.file-name-text');
                
                // Prevent default behavior to allow drop
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    zone.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                // Highlight effect
                ['dragenter', 'dragover'].forEach(eventName => {
                    zone.addEventListener(eventName, () => {
                        zone.classList.add('border-sugih-gold', 'bg-gray-100');
                    }, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    zone.addEventListener(eventName, () => {
                        zone.classList.remove('border-sugih-gold', 'bg-gray-100');
                    }, false);
                });

                // Handle drop
                zone.addEventListener('drop', (e) => {
                    let dt = e.dataTransfer;
                    let files = dt.files;

                    if (files.length) {
                        input.files = files;
                        if (labelText) {
                            labelText.textContent = 'File terpilih: ' + files[0].name;
                        }
                    }
                }, false);

                // Handle traditional click & select
                if (input) {
                    input.addEventListener('change', function() {
                        if (this.files && this.files.length > 0 && labelText) {
                            labelText.textContent = 'File terpilih: ' + this.files[0].name;
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
