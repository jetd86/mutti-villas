import {sliderHomeVillasInit, sliderHomeConstructionInit} from './components/layout/slider';
import {headerScrollComponent, headerScrollLogoComponent} from "./components/layout/logo";
import {initSectionBannerVideo} from "./components/ui/3d-video";
import { initHomeFeedbackForm } from './components/forms/feedback-form';
import {initPhoneValidation} from "./components/ui/phone";

import './main.scss'
import bgHome1xLq from '@images/bg-home.png?w=10&blur=50&as=src';
import bgHome1xHq from '@images/bg-home.png?w=768&format=webp&as=src';
import bgHome2xHq from '@images/bg-home.png?w=1536&format=webp&as=src';
import bgImage1x from '@images/bg-homepage-image.png?w=768&format=webp&as=src';
import bgImage2x from '@images/bg-homepage-image.png?w=1536&format=webp&as=src';
import bgLocation1x from '@images/bg-homepage-location.png?w=768&format=webp&as=src';
import bgLocation2x from '@images/bg-homepage-location.png?w=1536&format=webp&as=src';
import bgLocationMarker from '@images/bg-homepage-location-marker.svg?w=768&format=webp&as=src';
import bgLocationMd1x from '@images/bg-homepage-location-md.png?w=768&format=webp&as=src';
import bgLocationMd2x from '@images/bg-homepage-location-md.png?w=1536&format=webp&as=src';
import bgMap from '@images/contract-section-map.svg?as=src';

console.log('DEBUG 1')

document.documentElement.style.setProperty('--bg-hero', `url(${bgHome1xLq})`);
document.documentElement.style.setProperty('--bg-image-1x', `url(${bgImage1x})`);
document.documentElement.style.setProperty('--bg-image-2x', `url(${bgImage2x})`);
document.documentElement.style.setProperty('--bg-location-marker', `url(${bgLocationMarker})`);
document.documentElement.style.setProperty('--bg-location-1x', `url(${bgLocation1x})`);
document.documentElement.style.setProperty('--bg-location-2x', `url(${bgLocation2x})`);
document.documentElement.style.setProperty('--bg-location-md-1x', `url(${bgLocationMd1x})`);
document.documentElement.style.setProperty('--bg-location-md-2x', `url(${bgLocationMd2x})`);

// инициализация — можно глобально, или лучше: внутри DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    headerScrollComponent('navbarMain');
    headerScrollLogoComponent();

    // Блок: hero
    const heroEl = document.querySelector('.hero');
    if (heroEl) {
        const img = new Image();
        img.src = window.devicePixelRatio > 1 ? bgHome2xHq : bgHome1xHq;
        img.onload = () => {
            document.documentElement.style.setProperty('--bg-hero', `url(${img.src})`);
            heroEl.classList.add('hero-loaded');
        };
    }

    // Блок: о нас
    initSectionBannerVideo();

    // Блок: Локация, иконки
    const listItems = document.querySelectorAll('.section-list__item');
    const mapLinks = document.querySelectorAll('.section-map__link');
    document.querySelectorAll('[data-icon]').forEach(el => {
        const url = el.dataset.icon
        if (url) el.style.backgroundImage = `url(${url})`
    })
    // Наведение на список — активирует карту
    listItems.forEach(item => {
        const index = item.getAttribute('data-item');

        item.addEventListener('mouseenter', () => {
            const mapLink = document.querySelector(`.section-map__link[data-item="${index}"]`);
            if (mapLink) mapLink.classList.add('active');
        });

        item.addEventListener('mouseleave', () => {
            const mapLink = document.querySelector(`.section-map__link[data-item="${index}"]`);
            if (mapLink) mapLink.classList.remove('active');
        });
    });

    // Наведение на карту — активирует список
    mapLinks.forEach(link => {
        const index = link.getAttribute('data-item');

        link.addEventListener('mouseenter', () => {
            const listItem = document.querySelector(`.section-list__item[data-item="${index}"]`);
            if (listItem) listItem.classList.add('active');
        });

        link.addEventListener('mouseleave', () => {
            const listItem = document.querySelector(`.section-list__item[data-item="${index}"]`);
            if (listItem) listItem.classList.remove('active');
        });
    });

    // const phoneInput = document.querySelector('#floatingInputPhone');
    // if (phoneInput) {
    //     Inputmask({
    //         mask: '+9{1,3} 999 999-9999',
    //         placeholder: '',
    //         showMaskOnHover: false,
    //         showMaskOnFocus: true
    //     }).mask(phoneInput);
    // }
    initPhoneValidation();
    initHomeFeedbackForm();
    sliderHomeVillasInit();
    sliderHomeConstructionInit();

    // Maps
    const mapBlock = document.getElementById('map');
    if (mapBlock) {
        const img = document.createElement('img')
        img.src = bgMap
        img.alt = 'Map'
        img.style.width = '100%'
        mapBlock.appendChild(img)
    }
});
