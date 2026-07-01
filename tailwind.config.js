import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"Inter"', ...defaultTheme.fontFamily.sans],
                display: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
                heading: ['"Playfair Display"', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                sugih: {
                    // Light Neo-Vernacular Palette
                    ivory: '#FAF8F5',      // Body background utama
                    cream: '#F2EDE4',      // Background alternatif
                    brown: '#5C3D1E',      // Brand utama
                    walnut: '#3E2A14',     // Varian gelap
                    tan: '#C4A882',        // Varian terang (border)
                    charcoal: '#2C2317',   // Teks utama
                    gray: '#6B5E52',       // Teks sekunder
                    muted: '#A89B8C',      // Teks tersier
                    
                    // Aksen & CTA
                    terracotta: '#C87941', 
                    gold: '#B89A5A',       
                    amber: '#D4A04A',
                    
                    // Base Greens (Legacy)
                    green: {
                        50:  '#eef6ee',
                        100: '#d3e7d4',
                        200: '#a8cfaa',
                        300: '#73b079',
                        400: '#3f8e4a',
                        500: '#1f6b2a',
                        600: '#155121',
                        700: '#103f1a',
                        800: '#0b2c12',
                        900: '#06200b',
                    },
                },
            },
            backgroundImage: {
                'hero-tobacco': "url('/images/hero-tobacco.jpg')",
                'farmer-bg':   "url('/images/farmer.jpg')",
                'product-bg':  "url('/images/product-bg.jpg')",
            },
            boxShadow: {
                'card-soft': '0 12px 40px -8px rgba(0,0,0,0.35)',
            },
            keyframes: {
                fadeUp: {
                    '0%':   { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-15px)' },
                }
            },
            animation: {
                'fade-up': 'fadeUp 0.8s ease-out both',
                'float': 'float 4s ease-in-out infinite',
            },
        },
    },
    plugins: [forms, typography],
};
