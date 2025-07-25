import {sliderHomeVillasInit, sliderHomeConstructionInit} from './components/layout/slider';
import {headerScrollComponent, headerScrollLogoComponent} from "./components/layout/logo";
import {initSectionBannerVideo} from "./components/ui/3d-video";
import { initHomeFeedbackForm } from './components/forms/feedback-form';
import {initPhoneValidation} from "./components/ui/phone";

import './main.scss'
import bgHome1xLq from '@images/bg-home.png?w=10&blur=50&as=src';
import bgImage1xLq from '@images/bg-homepage-image.png?w=10&blur=50&as=src';

import bgHomeMobile1x from '@images/bg-home.png?w=1500&format=webp&as=src';
import bgHomeMobile2x from '@images/bg-home.png?w=1500&format=webp&as=src';
import bgHomeMobile3x from '@images/bg-home.png?w=1500&format=webp&as=src';
import bgHomeMobile4x from '@images/bg-home.png?w=1500&format=webp&as=src';
import bgHomeTablet1x from '@images/bg-home.png?w=1536&format=webp&as=src';
import bgHomeTablet2x from '@images/bg-home.png?w=1536&format=webp&as=src';
import bgHomeTablet3x from '@images/bg-home.png?w=2304&format=webp&as=src';
import bgHomeTablet4x from '@images/bg-home.png?w=3072&format=webp&as=src';
import bgHomeDesktop1x from '@images/bg-home.png?w=2048&format=webp&as=src';
import bgHomeDesktop2x from '@images/bg-home.png?w=2048&format=webp&as=src';
import bgHomeDesktop3x from '@images/bg-home.png?w=3072&format=webp&as=src';
import bgHomeDesktop4x from '@images/bg-home.png?w=4096&format=webp&as=src';
import bgHomeLarge1x from '@images/bg-home.png?w=3840&format=webp&as=src';
import bgHomeLarge2x from '@images/bg-home.png?w=3840&format=webp&as=src';
import bgHomeLarge3x from '@images/bg-home.png?w=5760&format=webp&as=src';
import bgHomeLarge4x from '@images/bg-home.png?w=7680&format=webp&as=src';

import bgHomeNight1xLq from '@images/bg-home-night.png?w=10&blur=50&as=src';

import bgHomeNightMobile1x from '@images/bg-home-night.png?w=1500&format=webp&as=src';
import bgHomeNightMobile2x from '@images/bg-home-night.png?w=1500&format=webp&as=src';
import bgHomeNightMobile3x from '@images/bg-home-night.png?w=1500&format=webp&as=src';
import bgHomeNightMobile4x from '@images/bg-home-night.png?w=1500&format=webp&as=src';
import bgHomeNightTablet1x from '@images/bg-home-night.png?w=1536&format=webp&as=src';
import bgHomeNightTablet2x from '@images/bg-home-night.png?w=1536&format=webp&as=src';
import bgHomeNightTablet3x from '@images/bg-home-night.png?w=2304&format=webp&as=src';
import bgHomeNightTablet4x from '@images/bg-home-night.png?w=3072&format=webp&as=src';
import bgHomeNightDesktop1x from '@images/bg-home-night.png?w=2048&format=webp&as=src';
import bgHomeNightDesktop2x from '@images/bg-home-night.png?w=2048&format=webp&as=src';
import bgHomeNightDesktop3x from '@images/bg-home-night.png?w=3072&format=webp&as=src';
import bgHomeNightDesktop4x from '@images/bg-home-night.png?w=4096&format=webp&as=src';
import bgHomeNightLarge1x from '@images/bg-home-night.png?w=3840&format=webp&as=src';
import bgHomeNightLarge2x from '@images/bg-home-night.png?w=3840&format=webp&as=src';
import bgHomeNightLarge3x from '@images/bg-home-night.png?w=5760&format=webp&as=src';
import bgHomeNightLarge4x from '@images/bg-home-night.png?w=7680&format=webp&as=src';

import bgImageMobile1x from '@images/bg-homepage-image.png?w=1500&format=webp&as=src';
import bgImageMobile2x from '@images/bg-homepage-image.png?w=1500&format=webp&as=src';
import bgImageMobile3x from '@images/bg-homepage-image.png?w=1500&format=webp&as=src';
import bgImageMobile4x from '@images/bg-homepage-image.png?w=1500&format=webp&as=src';
import bgImageTablet1x from '@images/bg-homepage-image.png?w=1536&format=webp&as=src';
import bgImageTablet2x from '@images/bg-homepage-image.png?w=1536&format=webp&as=src';
import bgImageTablet3x from '@images/bg-homepage-image.png?w=2304&format=webp&as=src';
import bgImageTablet4x from '@images/bg-homepage-image.png?w=3072&format=webp&as=src';
import bgImageDesktop1x from '@images/bg-homepage-image.png?w=2048&format=webp&as=src';
import bgImageDesktop2x from '@images/bg-homepage-image.png?w=2048&format=webp&as=src';
import bgImageDesktop3x from '@images/bg-homepage-image.png?w=3072&format=webp&as=src';
import bgImageDesktop4x from '@images/bg-homepage-image.png?w=4096&format=webp&as=src';
import bgImageLarge1x from '@images/bg-homepage-image.png?w=3840&format=webp&as=src';
import bgImageLarge2x from '@images/bg-homepage-image.png?w=3840&format=webp&as=src';
import bgImageLarge3x from '@images/bg-homepage-image.png?w=5760&format=webp&as=src';
import bgImageLarge4x from '@images/bg-homepage-image.png?w=7680&format=webp&as=src';

import bgLocation1x from '@images/bg-homepage-location.png?w=768&format=webp&as=src';
import bgLocation2x from '@images/bg-homepage-location.png?w=1536&format=webp&as=src';
import bgLocationMarker from '@images/bg-homepage-location-marker.svg?w=768&format=webp&as=src';
import bgLocationMd1x from '@images/bg-homepage-location-md.png?w=768&format=webp&as=src';
import bgLocationMd2x from '@images/bg-homepage-location-md.png?w=1536&format=webp&as=src';
import bgMap from '@images/contract-section-map.svg?as=src';

console.log('DEBUG 1')

function getImageCategory(width) {
    if (width >= 1920) return 'large';
    if (width >= 1024) return 'desktop';
    if (width >= 768) return 'tablet';
    return 'mobile';
}

function getOptimalImage(images, category, dpr) {
    return images[category][dpr] || images[category][1];
}
``
function isNightTime() {
    const currentHour = new Date().getHours();
    return currentHour >= 20 || currentHour < 6;
}

function getHomeImages() {
    const isNight = isNightTime();

    if (isNight) {
        return {
            mobile: {1: bgHomeNightMobile1x, 2: bgHomeNightMobile2x, 3: bgHomeNightMobile3x, 4: bgHomeNightMobile4x},
            tablet: {1: bgHomeNightTablet1x, 2: bgHomeNightTablet2x, 3: bgHomeNightTablet3x, 4: bgHomeNightTablet4x},
            desktop: {1: bgHomeNightDesktop1x, 2: bgHomeNightDesktop2x, 3: bgHomeNightDesktop3x, 4: bgHomeNightDesktop4x},
            large: {1: bgHomeNightLarge1x, 2: bgHomeNightLarge2x, 3: bgHomeNightLarge3x, 4: bgHomeNightLarge4x}
        };
    }

    return {
        mobile: {1: bgHomeMobile1x, 2: bgHomeMobile2x, 3: bgHomeMobile3x, 4: bgHomeMobile4x},
        tablet: {1: bgHomeTablet1x, 2: bgHomeTablet2x, 3: bgHomeTablet3x, 4: bgHomeTablet4x},
        desktop: {1: bgHomeDesktop1x, 2: bgHomeDesktop2x, 3: bgHomeDesktop3x, 4: bgHomeDesktop4x},
        large: {1: bgHomeLarge1x, 2: bgHomeLarge2x, 3: bgHomeLarge3x, 4: bgHomeLarge4x}
    };
}

function loadOptimizedImage(selector, images, cssProperty, callback) {
    const element = document.querySelector(selector);
    if (!element) return;

    const dpr = Math.min(Math.ceil(window.devicePixelRatio), 4);
    const width = window.innerWidth;
    const category = getImageCategory(width);
    const src = getOptimalImage(images, category, dpr);

    const img = new Image();
    img.src = src;
    img.onload = () => {
        document.documentElement.style.setProperty(cssProperty, `url(${img.src})`);
        if (callback) callback(element);
    };
}

const initialBgImage = isNightTime() ? bgHomeNight1xLq : bgHome1xLq;
document.documentElement.style.setProperty('--bg-hero', `url(${initialBgImage})`);
document.documentElement.style.setProperty('--bg-image', `url(${bgImage1xLq})`);
document.documentElement.style.setProperty('--bg-location-marker', `url(${bgLocationMarker})`);
document.documentElement.style.setProperty('--bg-location-1x', `url(${bgLocation1x})`);
document.documentElement.style.setProperty('--bg-location-2x', `url(${bgLocation2x})`);
document.documentElement.style.setProperty('--bg-location-md-1x', `url(${bgLocationMd1x})`);
document.documentElement.style.setProperty('--bg-location-md-2x', `url(${bgLocationMd2x})`);

document.addEventListener('DOMContentLoaded', () => {
    headerScrollComponent('navbarMain');
    headerScrollLogoComponent();

    const homeImages = getHomeImages();

    const imageImages = {
        mobile: {1: bgImageMobile1x, 2: bgImageMobile2x, 3: bgImageMobile3x, 4: bgImageMobile4x},
        tablet: {1: bgImageTablet1x, 2: bgImageTablet2x, 3: bgImageTablet3x, 4: bgImageTablet4x},
        desktop: {1: bgImageDesktop1x, 2: bgImageDesktop2x, 3: bgImageDesktop3x, 4: bgImageDesktop4x},
        large: {1: bgImageLarge1x, 2: bgImageLarge2x, 3: bgImageLarge3x, 4: bgImageLarge4x}
    };

    loadOptimizedImage('.hero', homeImages, '--bg-hero', (el) => el.classList.add('hero-loaded'));
    loadOptimizedImage('#image .section-container', imageImages, '--bg-image', (el) => el.classList.add('image-loaded'));

    initSectionBannerVideo();

    const listItems = document.querySelectorAll('.section-list__item');
    const mapLinks = document.querySelectorAll('.section-map__link');
    document.querySelectorAll('[data-icon]').forEach(el => {
        const url = el.dataset.icon
        if (url) el.style.backgroundImage = `url(${url})`
    })
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

    initPhoneValidation();
    initHomeFeedbackForm();
    sliderHomeVillasInit();
    sliderHomeConstructionInit();

    const mapBlock = document.getElementById('map');
    if (mapBlock) {
        const img = document.createElement('img')
        img.src = bgMap
        img.alt = 'Map'
        img.style.width = '100%'
        mapBlock.appendChild(img)
    }
});

function checkTimeAndUpdateBackground() {
    const homeImages = getHomeImages();
    loadOptimizedImage('.hero', homeImages, '--bg-hero');
}

let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        const homeImages = getHomeImages();

        const imageImages = {
            mobile: {1: bgImageMobile1x, 2: bgImageMobile2x, 3: bgImageMobile3x, 4: bgImageMobile4x},
            tablet: {1: bgImageTablet1x, 2: bgImageTablet2x, 3: bgImageTablet3x, 4: bgImageTablet4x},
            desktop: {1: bgImageDesktop1x, 2: bgImageDesktop2x, 3: bgImageDesktop3x, 4: bgImageDesktop4x},
            large: {1: bgImageLarge1x, 2: bgImageLarge2x, 3: bgImageLarge3x, 4: bgImageLarge4x}
        };

        loadOptimizedImage('.hero', homeImages, '--bg-hero');
        loadOptimizedImage('#image .section-container', imageImages, '--bg-image');
    }, 150);
});

setInterval(checkTimeAndUpdateBackground, 10 * 60 * 1000);
