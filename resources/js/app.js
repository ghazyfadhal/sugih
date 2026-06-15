import './bootstrap';

import Alpine from 'alpinejs';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Alpine = Alpine;
Alpine.start();

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
});
