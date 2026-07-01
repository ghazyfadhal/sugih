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
                    base: '#F6F4EC',
                    surface: '#EFEBDD',
                    subtle: '#DCD5C2',     // border
                    
                    // Typography
                    primary: '#332A1F',    // text
                    secondary: '#7A7264',  // text muted
                    
                    // Brand
                    green: {
                        DEFAULT: '#8FA06E',
                        hover: '#7C8D5C'
                    },
                    gold: {
                        DEFAULT: '#C79A56',
                        hover: '#B58847'
                    },
                    terracotta: {
                        DEFAULT: '#B5502C',
                        hover: '#9C4322'
                    },
                    
                    // Dark Mode (Fresh Tobacco dark)
                    dark: {
                        DEFAULT: '#2B3524',    // bg utama section gelap
                        surface: '#37432C',    // card di section gelap
                        text: '#F1EEE2',       // text utama di gelap
                        muted: '#B4BBA0',      // text sekunder di gelap
                        border: '#4A5A3B'      // border di gelap
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
