import {sliderInit} from "./components/layout/slider";
import bgPlan1x from '@images/section-villas-plan.jpg?w=768&format=webp&as=src';
import bgPlan2x from '@images/section-villas-plan.jpg?w=1536&format=webp&as=src';
import bgPlanCertificate1x from '@images/section-villas-plan-cert.png?w=768&format=webp&as=src';
import bgPlanCertificate2x from '@images/section-villas-plan-cert.png?w=1536&format=webp&as=src';
import bgPlanBanner1x from '@images/section-villas-plan-banner.png?w=768&format=webp&as=src';
import bgPlanBanner2x from '@images/section-villas-plan-banner.png?w=1536&format=webp&as=src';
import './villas.scss'

// инициализация — можно глобально, или лучше: внутри DOMContentLoaded
document.addEventListener('DOMContentLoaded', () => {
    sliderInit('.swiper-slider-1');
    sliderInit('.swiper-slider-2');
    sliderInit('.swiper-slider-3');
    sliderInit('.swiper-slider-4');
    sliderInit('.swiper-slider-5');
    sliderInit('.swiper-slider-6');
    sliderInit('.swiper-slider-7');
    sliderInit('.swiper-slider-8');
    sliderInit('.swiper-slider-9');

    // Plan
    document.documentElement.style.setProperty('--bg-plan-1x', `url(${bgPlan1x})`);
    document.documentElement.style.setProperty('--bg-plan-2x', `url(${bgPlan2x})`);
    document.documentElement.style.setProperty('--bg-plan-cert-1x', `url(${bgPlanCertificate1x})`);
    document.documentElement.style.setProperty('--bg-plan-cert-2x', `url(${bgPlanCertificate2x})`);
    document.documentElement.style.setProperty('--bg-plan-banner-1x', `url(${bgPlanBanner1x})`);
    document.documentElement.style.setProperty('--bg-plan-banner-2x', `url(${bgPlanBanner2x})`);
});
