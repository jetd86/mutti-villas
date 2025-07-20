import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';
import 'swiper/css/effect-coverflow';
import 'swiper/css/autoplay';

import {Autoplay, EffectCoverflow, EffectFade, Navigation, Pagination} from 'swiper/modules';

Swiper.use([Navigation, Pagination, Autoplay, EffectFade, EffectCoverflow]);

export function sliderHomeVillasInit(containerId = '.swiper-homepage-villas', slidesPerView = 1, spaceBetween = 10) {
    const container = document.querySelector(containerId);
    if (!container) return;

    const slides = container.querySelectorAll('.swiper-slide');
    const slideCount = slides.length;
    const button = {
        next: container.querySelector('.swiper-button-next'),
        prev: container.querySelector('.swiper-button-prev')
    };
    const pagination = container.querySelector('.swiper-pagination');

    const swiper = new Swiper(container, {
        loop: slideCount > 1,
        slidesPerView: slideCount > 1 ? slidesPerView : 1,
        centeredSlides: slideCount > 1,
        spaceBetween: slideCount > 1 ? slidesPerView : 0,

        effect: 'coverflow',
        coverflowEffect: {
            rotate: 30,
            slideShadows: false,
            depth: 100,
            modifier: 1
        },

        navigation: slideCount > 1 ? {
            nextEl: button.next,
            prevEl: button.prev,
        } : false,

        pagination: slideCount > 1 ? {
            el: '.swiper-pagination',
            clickable: true
        } : false,
    });

    if (slideCount < 1) {
        if (button.prev) button.prev.style.display = 'none';
        if (button.next) button.next.style.display = 'none';
        if (pagination) pagination.style.display = 'none';
    }
}

export function sliderHomeConstructionInit(containerId = '.swiper-homepage-construction', slidesPerView = 1, spaceBetween = 10) {
    const container = document.querySelector(containerId);
    const headingEl = document.getElementById('slider-heading');
    if (!container || !headingEl) return;

    const lang = headingEl.dataset.lang;
    const slides = container.querySelectorAll('.swiper-slide');
    const slideCount = slides.length;
    const button = {
        next: container.querySelector('.swiper-button-next'),
        prev: container.querySelector('.swiper-button-prev')
    };
    const pagination = container.querySelector('.swiper-pagination');

    const swiper = new Swiper(container, {
        loop: slideCount > 1,
        slidesPerView: slideCount > 1 ? slidesPerView : 1,
        spaceBetween: slideCount > 1 ? slidesPerView : 0,
        loopFillGroupWithBlank: true,

        effect: 'coverflow',
        coverflowEffect: {
            rotate: 30,
            slideShadows: false,
            depth: 100,
            modifier: 1
        },

        breakpoints: {
            768: { slidesPerView: 3 },
        },

        on: {
            slideChange: function () {
                const activeSlide = this.slides[this.activeIndex];
                const group = activeSlide?.dataset?.group;
                if (group) {
                    headingEl.textContent = getReadableGroup(group, lang);
                }
            }
        },

        navigation: slideCount > 1 ? {
            nextEl: button.next,
            prevEl: button.prev,
        } : false,

        pagination: slideCount > 1 ? {
            el: '.swiper-pagination',
            clickable: true
        } : false,

    });

    if (slideCount < 1) {
        if (button.prev) button.prev.style.display = 'none';
        if (button.next) button.next.style.display = 'none';
        if (pagination) pagination.style.display = 'none';
    }

    // Функция для форматирования групп (напр. 2025-05 → Май 2025)
    function getReadableGroup(groupCode, lang) {
        const [year, month] = groupCode.split('-');

        let monthNames = [];
        if (lang === 'en') {
            monthNames = [
                '', 'January','February','March',' April','May','June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
        } else if (lang === 'ru') {
            monthNames = [
                '', 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
            ];
        }

        return `${monthNames[parseInt(month, 10)]} ${year}`;
    }

    // Первоначальное значение
    const firstGroup = swiper.slides[swiper.activeIndex]?.dataset?.group;
    if (firstGroup) {
        headingEl.textContent = getReadableGroup(firstGroup, lang);
    }
}

export function sliderInit(containerId = '.swiper-homepage-villas', slidesPerView = 1, spaceBetween = 10) {
    const container = document.querySelector(containerId);
    if (!container) return;

    const slides = container.querySelectorAll('.swiper-slide');
    const slideCount = slides.length;
    const button = {
        next: container.querySelector('.swiper-button-next'),
        prev: container.querySelector('.swiper-button-prev')
    };
    const pagination = container.querySelector('.swiper-pagination');

    const swiper = new Swiper(container, {
        loop: slideCount > 1,
        slidesPerView: slideCount > 1 ? slidesPerView : 1,
        centeredSlides: slideCount > 1,
        spaceBetween: slideCount > 1 ? slidesPerView : 0,

        effect: 'coverflow',
        coverflowEffect: {
            rotate: 30,
            slideShadows: false,
            depth: 100,
            modifier: 1
        },

        navigation: slideCount > 1 ? {
            nextEl: button.next,
            prevEl: button.prev,
        } : false,

        pagination: slideCount > 1 ? {
            el: '.swiper-pagination',
            clickable: true
        } : false,
    });

    if (slideCount < 1) {
        if (button.prev) button.prev.style.display = 'none';
        if (button.next) button.next.style.display = 'none';
        if (pagination) pagination.style.display = 'none';
    }
}
