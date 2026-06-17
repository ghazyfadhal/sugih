import './bootstrap';

import Alpine from 'alpinejs';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, EffectCoverflow } from 'swiper/modules';
import AOS from 'aos';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-coverflow';
import 'aos/dist/aos.css';

window.Alpine = Alpine;
Alpine.start();

// Initialize AOS (Animate On Scroll)
window.addEventListener('load', () => {
    AOS.init({
        once: true, // whether animation should happen only once - while scrolling down
        duration: 800, // values from 0 to 3000, with step 50ms
        easing: 'ease-out-cubic', // default easing for AOS animations
        offset: 20, // offset (in px) from the original trigger point
    });
});

/* ---------------- Carousels (Produk & Berita) ---------------- */
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.product-swiper')) {
        new Swiper('.product-swiper', {
            modules: [Navigation, Pagination, Autoplay],
            slidesPerView: 1,
            spaceBetween: 24,
            loop: false,
            autoplay: { delay: 6000, disableOnInteraction: false },
            navigation: {
                nextEl: '.product-swiper-next',
                prevEl: '.product-swiper-prev',
            },
            pagination: { el: '.product-swiper-pagination', clickable: true },
        });
    }

    if (document.querySelector('.article-swiper')) {
        new Swiper('.article-swiper', {
            modules: [Navigation, Pagination, Autoplay],
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            autoplay: { delay: 7000, disableOnInteraction: false },
            navigation: {
                nextEl: '.article-swiper-next',
                prevEl: '.article-swiper-prev',
            },
            pagination: { el: '.article-swiper-pagination', clickable: true },
        });
    }

    /* ---- Product Page Carousel (Aroma-style coverflow) ---- */
    if (document.querySelector('.product-page-swiper')) {
        const productPageSwiper = new Swiper('.product-page-swiper', {
            modules: [Navigation, Pagination, EffectCoverflow],
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            initialSlide: 0,
            loop: false,
            coverflowEffect: {
                rotate: 0,
                stretch: 80,
                depth: 150,
                modifier: 1.5,
                slideShadows: false,
            },
            navigation: {
                nextEl: '.product-page-next',
                prevEl: '.product-page-prev',
            },
            pagination: { el: '.product-page-pagination', clickable: true },
            on: {
                slideChange: function () {
                    const panels = document.querySelectorAll('.product-info-panel');
                    const activeIndex = this.activeIndex;
                    panels.forEach((panel) => {
                        const panelIndex = parseInt(panel.getAttribute('data-panel'));
                        if (panelIndex === activeIndex) {
                            panel.style.display = '';
                            panel.style.opacity = '1';
                        } else {
                            panel.style.display = 'none';
                            panel.style.opacity = '0';
                        }
                    });
                },
            },
        });
    }
});

