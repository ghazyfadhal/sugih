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
                    // Light Mode
                    base: '#FFFDF8',
                    surface: '#F4EFE6',
                    subtle: '#E5DCC8',     // border
                    
                    // Typography
                    primary: '#2C2317',    // text
                    secondary: '#6B6356',  // text muted
                    
                    // Brand
                    mustard: {
                        DEFAULT: '#B89A5A',
                        hover: '#9C8149'
                    },
                    green: {
                        DEFAULT: '#1B4320',
                        hover: '#143318'
                    },
                    terracotta: {
                        DEFAULT: '#C65D3B',
                        hover: '#B15031'
                    },
                    
                    // Dark Mode
                    dark: {
                        DEFAULT: '#1E281A',    // bg utama section gelap
                        surface: '#2C3A26',    // card di section gelap
                        text: '#F8F6F0',       // text utama di gelap
                        muted: '#A5A39B',      // text sekunder di gelap
                        border: '#3F5738'      // border di gelap
                    }
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
