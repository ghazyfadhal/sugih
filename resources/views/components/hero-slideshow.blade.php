@props([
    'folder' => '',
    'fallbackImage' => ''
])

<div id="hero-slider-{{ Str::slug($folder) }}" class="absolute inset-0 w-full h-full -z-10 bg-gray-100">
    <!-- Skeleton Loading Background -->
    <div id="hero-loader-{{ Str::slug($folder) }}" class="absolute inset-0 w-full h-full bg-gray-200 animate-pulse transition-opacity duration-1000 z-0"></div>

    <!-- Gambar pertama/default sebagai fallback -->
    @if($fallbackImage)
        <img id="hero-initial-img-{{ Str::slug($folder) }}" src="{{ $fallbackImage }}" class="absolute inset-0 w-full h-full object-cover object-center transition-opacity duration-1000 z-10" loading="eager" fetchpriority="high" alt="Slideshow Image">
    @else
        <!-- Placeholder jika tidak ada fallback -->
        <img id="hero-initial-img-{{ Str::slug($folder) }}" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="absolute inset-0 w-full h-full object-cover object-center transition-opacity duration-1000 opacity-0 z-10" loading="eager" fetchpriority="high" alt="Slideshow Placeholder">
    @endif
</div>

@push('scripts')
@once
    <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js@2"></script>
    <script>
        // Supabase Client Initialization (Shared across all slideshows)
        const SUPABASE_URL = '{{ config('supabase.url') }}';
        const SUPABASE_ANON_KEY = '{{ config('supabase.anon_key') }}';
        const SUPABASE_BUCKET = '{{ config('supabase.storage.bucket', 'sugih-public') }}';
        
        let supabaseClient = null;
        if (SUPABASE_URL && SUPABASE_ANON_KEY) {
            supabaseClient = supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);
        }
    </script>
@endonce

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (!supabaseClient) {
            console.error('Supabase Client tidak terkonfigurasi. Periksa config(supabase.url/anon_key)');
            return;
        }

        const sliderId = 'hero-slider-{{ Str::slug($folder) }}';
        const initialImgId = 'hero-initial-img-{{ Str::slug($folder) }}';
        const loaderId = 'hero-loader-{{ Str::slug($folder) }}';
        const folderPath = '{{ $folder }}';
        
        const heroSlider = document.getElementById(sliderId);
        const initialImg = document.getElementById(initialImgId);
        const heroLoader = document.getElementById(loaderId);
        
        let images = [];
        if (initialImg && initialImg.src && !initialImg.src.startsWith('data:image')) {
            images.push(initialImg.src);
        }
        let currentIndex = 0;

        async function fetchSliderImages() {
            try {
                // Mengambil daftar file dari folder spesifik di dalam bucket sugih-public
                const { data, error } = await supabaseClient
                    .storage
                    .from(SUPABASE_BUCKET)
                    .list(folderPath, {
                        limit: 15,
                        offset: 0,
                        sortBy: { column: 'name', order: 'asc' },
                    });
                
                if (error) {
                    console.error('Gagal mengambil gambar dari Supabase Storage:', error);
                    return;
                }

                if (data && data.length > 0) {
                    // Filter: hanya ambil file valid (bukan placeholder folder kosong dari Supabase) dan kecualikan gambar Cerita Kami
                    const imageFiles = data.filter(file => file.name && file.name !== '.emptyFolderPlaceholder' && file.id && !file.name.includes('pexels-tranthangnhat-27792454'));
                    
                    let supabaseImages = imageFiles.map(file => {
                        const filePath = folderPath ? `${folderPath}/${file.name}` : file.name;
                        const { data: publicUrlData } = supabaseClient
                            .storage
                            .from(SUPABASE_BUCKET)
                            .getPublicUrl(filePath, {
                                transform: {
                                    width: 1920,
                                    height: 800,
                                    resize: 'cover',
                                    quality: 80,
                                    format: 'webp'
                                }
                            });
                        return publicUrlData.publicUrl;
                    });

                    if (supabaseImages.length > 0) {
                        // Acak (Shuffle) urutan gambar agar dinamis
                        images = supabaseImages.sort(() => Math.random() - 0.5);
                        
                        // Preload gambar pertama di belakang layar agar tidak ada 'kedip'
                        const imgPreload = new Image();
                        imgPreload.src = images[0];
                        imgPreload.onload = () => {
                            initialImg.src = images[0];
                            initialImg.classList.remove('opacity-0');
                            
                            // Fade out efek loading setelah gambar siap
                            if (heroLoader) {
                                heroLoader.classList.add('opacity-0');
                                setTimeout(() => heroLoader.remove(), 1000);
                            }
                            
                            // Memulai slideshow setelah gambar pertama beres
                            startSlider();
                        };
                        return; // startSlider ditangani di dalam onload
                    }
                }
            } catch (err) {
                console.error('Exception saat memuat gambar slideshow:', err);
            }
            
            // Memulai slideshow (jika gagal memuat gambar baru, gunakan fallback)
            startSlider();
        }

        function startSlider() {
            if (images.length <= 1) return;

            setInterval(() => {
                currentIndex = (currentIndex + 1) % images.length;
                
                const nextImg = document.createElement('img');
                nextImg.src = images[currentIndex];
                nextImg.className = 'absolute inset-0 w-full h-full object-cover object-center opacity-0 transition-opacity duration-1000';
                
                heroSlider.appendChild(nextImg);
                
                // Animasi fade in
                setTimeout(() => {
                    nextImg.classList.remove('opacity-0');
                    nextImg.classList.add('opacity-100');
                }, 50);

                // Hapus gambar lama setelah durasi transisi selesai (1000ms + buffer 50ms)
                setTimeout(() => {
                    while (heroSlider.children.length > 1) {
                        heroSlider.removeChild(heroSlider.firstChild);
                    }
                }, 1050);
            }, 5000);
        }

        fetchSliderImages();
    });
</script>
@endpush
