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
                    // Expert Palette (Earth Tones)
                    primary: '#296330',    // Hijau Tembakau
                    brown: '#5C3D1E',      // Cokelat Tembakau
                    terracotta: '#C87941', // Terakota/Tembaga (CTA)
                    cream: '#F5F0E8',      // Krem/Putih Gading (Text)
                    gold: '#B89A5A',       // Emas/Aksen Mewah
                    black: '#2C2317',      // Hitam Tanah
                    
                    // Base Greens (Legacy, tweaked if needed)
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
            },
            animation: {
                'fade-up': 'fadeUp 0.8s ease-out both',
            },
        },
    },
    plugins: [forms, typography],
};
