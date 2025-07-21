import {sliderHomeVillasInit, sliderHomeConstructionInit} from './components/layout/slider';
import {headerScrollComponent, headerScrollLogoComponent} from "./components/layout/logo";
import {initSectionBannerVideo} from "./components/ui/3d-video";
import { initHomeFeedbackForm } from './components/forms/feedback-form';
import {initPhoneValidation} from "./components/ui/phone";

import './main.scss'
import bgHome1xLq from '@images/bg-home.png?w=10&blur=50&as=src';

import bgHomeMobile1x from '@images/bg-home.png?w=375&format=webp&as=src';
import bgHomeMobile2x from '@images/bg-home.png?w=750&format=webp&as=src';
import bgHomeMobile3x from '@images/bg-home.png?w=1125&format=webp&as=src';
import bgHomeMobile4x from '@images/bg-home.png?w=1500&format=webp&as=src';
import bgHomeTablet1x from '@images/bg-home.png?w=768&format=webp&as=src';
import bgHomeTablet2x from '@images/bg-home.png?w=1536&format=webp&as=src';
import bgHomeTablet3x from '@images/bg-home.png?w=2304&format=webp&as=src';
import bgHomeTablet4x from '@images/bg-home.png?w=3072&format=webp&as=src';
import bgHomeDesktop1x from '@images/bg-home.png?w=1024&format=webp&as=src';
import bgHomeDesktop2x from '@images/bg-home.png?w=2048&format=webp&as=src';
import bgHomeDesktop3x from '@images/bg-home.png?w=3072&format=webp&as=src';
import bgHomeDesktop4x from '@images/bg-home.png?w=4096&format=webp&as=src';
import bgHomeLarge1x from '@images/bg-home.png?w=1920&format=webp&as=src';
import bgHomeLarge2x from '@images/bg-home.png?w=3840&format=webp&as=src';
import bgHomeLarge3x from '@images/bg-home.png?w=5760&format=webp&as=src';
import bgHomeLarge4x from '@images/bg-home.png?w=7680&format=webp&as=src';

import bgImageMobile1x from '@images/bg-homepage-image.png?w=375&format=webp&as=src';
import bgImageMobile2x from '@images/bg-homepage-image.png?w=750&format=webp&as=src';
import bgImageMobile3x from '@images/bg-homepage-image.png?w=1125&format=webp&as=src';
import bgImageMobile4x from '@images/bg-homepage-image.png?w=1500&format=webp&as=src';
import bgImageTablet1x from '@images/bg-homepage-image.png?w=768&format=webp&as=src';
import bgImageTablet2x from '@images/bg-homepage-image.png?w=1536&format=webp&as=src';
import bgImageTablet3x from '@images/bg-homepage-image.png?w=2304&format=webp&as=src';
import bgImageTablet4x from '@images/bg-homepage-image.png?w=3072&format=webp&as=src';
import bgImageDesktop1x from '@images/bg-homepage-image.png?w=1024&format=webp&as=src';
import bgImageDesktop2x from '@images/bg-homepage-image.png?w=2048&format=webp&as=src';
import bgImageDesktop3x from '@images/bg-homepage-image.png?w=3072&format=webp&as=src';
import bgImageDesktop4x from '@images/bg-homepage-image.png?w=4096&format=webp&as=src';
import bgImageLarge1x from '@images/bg-homepage-image.png?w=1920&format=webp&as=src';
import bgImageLarge2x from '@images/bg-homepage-image.png?w=3840&format=webp&as=src';
import bgImageLarge3x from '@images/bg-homepage-image.png?w=5760&format=webp&as=src';
import bgImageLarge4x from '@images/bg-homepage-image.png?w=7680&format=webp&as=src';

import bgLocationMobile1x from '@images/bg-homepage-location.png?w=375&format=webp&as=src';
import bgLocationMobile2x from '@images/bg-homepage-location.png?w=750&format=webp&as=src';
import bgLocationMobile3x from '@images/bg-homepage-location.png?w=1125&format=webp&as=src';
import bgLocationMobile4x from '@images/bg-homepage-location.png?w=1500&format=webp&as=src';
import bgLocationTablet1x from '@images/bg-homepage-location.png?w=768&format=webp&as=src';
import bgLocationTablet2x from '@images/bg-homepage-location.png?w=1536&format=webp&as=src';
import bgLocationTablet3x from '@images/bg-homepage-location.png?w=2304&format=webp&as=src';
import bgLocationTablet4x from '@images/bg-homepage-location.png?w=3072&format=webp&as=src';
import bgLocationDesktop1x from '@images/bg-homepage-location.png?w=1024&format=webp&as=src';
import bgLocationDesktop2x from '@images/bg-homepage-location.png?w=2048&format=webp&as=src';
import bgLocationDesktop3x from '@images/bg-homepage-location.png?w=3072&format=webp&as=src';
import bgLocationDesktop4x from '@images/bg-homepage-location.png?w=4096&format=webp&as=src';
import bgLocationLarge1x from '@images/bg-homepage-location.png?w=1920&format=webp&as=src';
import bgLocationLarge2x from '@images/bg-homepage-location.png?w=3840&format=webp&as=src';
import bgLocationLarge3x from '@images/bg-homepage-location.png?w=5760&format=webp&as=src';
import bgLocationLarge4x from '@images/bg-homepage-location.png?w=7680&format=webp&as=src';

import bgLocationMarker from '@images/bg-homepage-location-marker.svg?w=768&format=webp&as=src';

import bgLocationMdMobile1x from '@images/bg-homepage-location-md.png?w=375&format=webp&as=src';
import bgLocationMdMobile2x from '@images/bg-homepage-location-md.png?w=750&format=webp&as=src';
import bgLocationMdMobile3x from '@images/bg-homepage-location-md.png?w=1125&format=webp&as=src';
import bgLocationMdMobile4x from '@images/bg-homepage-location-md.png?w=1500&format=webp&as=src';
import bgLocationMdTablet1x from '@images/bg-homepage-location-md.png?w=768&format=webp&as=src';
import bgLocationMdTablet2x from '@images/bg-homepage-location-md.png?w=1536&format=webp&as=src';
import bgLocationMdTablet3x from '@images/bg-homepage-location-md.png?w=2304&format=webp&as=src';
import bgLocationMdTablet4x from '@images/bg-homepage-location-md.png?w=3072&format=webp&as=src';
import bgLocationMdDesktop1x from '@images/bg-homepage-location-md.png?w=1024&format=webp&as=src';
import bgLocationMdDesktop2x from '@images/bg-homepage-location-md.png?w=2048&format=webp&as=src';
import bgLocationMdDesktop3x from '@images/bg-homepage-location-md.png?w=3072&format=webp&as=src';
import bgLocationMdDesktop4x from '@images/bg-homepage-location-md.png?w=4096&format=webp&as=src';
import bgLocationMdLarge1x from '@images/bg-homepage-location-md.png?w=1920&format=webp&as=src';
import bgLocationMdLarge2x from '@images/bg-homepage-location-md.png?w=3840&format=webp&as=src';
import bgLocationMdLarge3x from '@images/bg-homepage-location-md.png?w=5760&format=webp&as=src';
import bgLocationMdLarge4x from '@images/bg-homepage-location-md.png?w=7680&format=webp&as=src';

import bgMap from '@images/contract-section-map.svg?as=src';

console.log('DEBUG 1')

document.documentElement.style.setProperty('--bg-hero', `url(${bgHome1xLq})`);
document.documentElement.style.setProperty('--bg-image-mobile-1x', `url(${bgImageMobile1x})`);
document.documentElement.style.setProperty('--bg-image-mobile-2x', `url(${bgImageMobile2x})`);
document.documentElement.style.setProperty('--bg-image-mobile-3x', `url(${bgImageMobile3x})`);
document.documentElement.style.setProperty('--bg-image-mobile-4x', `url(${bgImageMobile4x})`);
document.documentElement.style.setProperty('--bg-image-tablet-1x', `url(${bgImageTablet1x})`);
document.documentElement.style.setProperty('--bg-image-tablet-2x', `url(${bgImageTablet2x})`);
document.documentElement.style.setProperty('--bg-image-tablet-3x', `url(${bgImageTablet3x})`);
document.documentElement.style.setProperty('--bg-image-tablet-4x', `url(${bgImageTablet4x})`);
document.documentElement.style.setProperty('--bg-image-desktop-1x', `url(${bgImageDesktop1x})`);
document.documentElement.style.setProperty('--bg-image-desktop-2x', `url(${bgImageDesktop2x})`);
document.documentElement.style.setProperty('--bg-image-desktop-3x', `url(${bgImageDesktop3x})`);
document.documentElement.style.setProperty('--bg-image-desktop-4x', `url(${bgImageDesktop4x})`);
document.documentElement.style.setProperty('--bg-image-large-1x', `url(${bgImageLarge1x})`);
document.documentElement.style.setProperty('--bg-image-large-2x', `url(${bgImageLarge2x})`);
document.documentElement.style.setProperty('--bg-image-large-3x', `url(${bgImageLarge3x})`);
document.documentElement.style.setProperty('--bg-image-large-4x', `url(${bgImageLarge4x})`);
document.documentElement.style.setProperty('--bg-location-marker', `url(${bgLocationMarker})`);
document.documentElement.style.setProperty('--bg-location-mobile-1x', `url(${bgLocationMobile1x})`);
document.documentElement.style.setProperty('--bg-location-mobile-2x', `url(${bgLocationMobile2x})`);
document.documentElement.style.setProperty('--bg-location-mobile-3x', `url(${bgLocationMobile3x})`);
document.documentElement.style.setProperty('--bg-location-mobile-4x', `url(${bgLocationMobile4x})`);
document.documentElement.style.setProperty('--bg-location-tablet-1x', `url(${bgLocationTablet1x})`);
document.documentElement.style.setProperty('--bg-location-tablet-2x', `url(${bgLocationTablet2x})`);
document.documentElement.style.setProperty('--bg-location-tablet-3x', `url(${bgLocationTablet3x})`);
document.documentElement.style.setProperty('--bg-location-tablet-4x', `url(${bgLocationTablet4x})`);
document.documentElement.style.setProperty('--bg-location-desktop-1x', `url(${bgLocationDesktop1x})`);
document.documentElement.style.setProperty('--bg-location-desktop-2x', `url(${bgLocationDesktop2x})`);
document.documentElement.style.setProperty('--bg-location-desktop-3x', `url(${bgLocationDesktop3x})`);
document.documentElement.style.setProperty('--bg-location-desktop-4x', `url(${bgLocationDesktop4x})`);
document.documentElement.style.setProperty('--bg-location-large-1x', `url(${bgLocationLarge1x})`);
document.documentElement.style.setProperty('--bg-location-large-2x', `url(${bgLocationLarge2x})`);
document.documentElement.style.setProperty('--bg-location-large-3x', `url(${bgLocationLarge3x})`);
document.documentElement.style.setProperty('--bg-location-large-4x', `url(${bgLocationLarge4x})`);
document.documentElement.style.setProperty('--bg-location-md-mobile-1x', `url(${bgLocationMdMobile1x})`);
document.documentElement.style.setProperty('--bg-location-md-mobile-2x', `url(${bgLocationMdMobile2x})`);
document.documentElement.style.setProperty('--bg-location-md-mobile-3x', `url(${bgLocationMdMobile3x})`);
document.documentElement.style.setProperty('--bg-location-md-mobile-4x', `url(${bgLocationMdMobile4x})`);
document.documentElement.style.setProperty('--bg-location-md-tablet-1x', `url(${bgLocationMdTablet1x})`);
document.documentElement.style.setProperty('--bg-location-md-tablet-2x', `url(${bgLocationMdTablet2x})`);
document.documentElement.style.setProperty('--bg-location-md-tablet-3x', `url(${bgLocationMdTablet3x})`);
document.documentElement.style.setProperty('--bg-location-md-tablet-4x', `url(${bgLocationMdTablet4x})`);
document.documentElement.style.setProperty('--bg-location-md-desktop-1x', `url(${bgLocationMdDesktop1x})`);
document.documentElement.style.setProperty('--bg-location-md-desktop-2x', `url(${bgLocationMdDesktop2x})`);
document.documentElement.style.setProperty('--bg-location-md-desktop-3x', `url(${bgLocationMdDesktop3x})`);
document.documentElement.style.setProperty('--bg-location-md-desktop-4x', `url(${bgLocationMdDesktop4x})`);
document.documentElement.style.setProperty('--bg-location-md-large-1x', `url(${bgLocationMdLarge1x})`);
document.documentElement.style.setProperty('--bg-location-md-large-2x', `url(${bgLocationMdLarge2x})`);
document.documentElement.style.setProperty('--bg-location-md-large-3x', `url(${bgLocationMdLarge3x})`);
document.documentElement.style.setProperty('--bg-location-md-large-4x', `url(${bgLocationMdLarge4x})`);

document.addEventListener('DOMContentLoaded', () => {
    headerScrollComponent('navbarMain');
    headerScrollLogoComponent();

    const heroEl = document.querySelector('.hero');
    if (heroEl) {
        const dpr = window.devicePixelRatio;
        const width = window.innerWidth;
        let category;
        if (width < 768) {
            category = 'mobile';
        } else if (width < 1024) {
            category = 'tablet';
        } else if (width < 1920) {
            category = 'desktop';
        } else {
            category = 'large';
        }

        const images = {
            mobile: {
                1: bgHomeMobile1x,
                2: bgHomeMobile2x,
                3: bgHomeMobile3x,
                4: bgHomeMobile4x
            },
            tablet: {
                1: bgHomeTablet1x,
                2: bgHomeTablet2x,
                3: bgHomeTablet3x,
                4: bgHomeTablet4x
            },
            desktop: {
                1: bgHomeDesktop1x,
                2: bgHomeDesktop2x,
                3: bgHomeDesktop3x,
                4: bgHomeDesktop4x
            },
            large: {
                1: bgHomeLarge1x,
                2: bgHomeLarge2x,
                3: bgHomeLarge3x,
                4: bgHomeLarge4x
            }
        };

        let dprKey = 1;
        if (dpr <= 1) {
            dprKey = 1;
        } else if (dpr <= 2) {
            dprKey = 2;
        } else if (dpr <= 3) {
            dprKey = 3;
        } else {
            dprKey = 4;
        }

        const src = images[category][dprKey];
        const img = new Image();
        img.src = src;
        img.onload = () => {
            document.documentElement.style.setProperty('--bg-hero', `url(${img.src})`);
            heroEl.classList.add('hero-loaded');
        };
    }

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
