export function initSectionBannerVideo() {
    const video = document.querySelector('.section-banner__video');
    if (!video) return;

    video.poster = bgBanner2x;
    video.setAttribute('preload', 'none');

    const source = video.querySelector('source');
    if (source) {
        source.removeAttribute('src');
        source.setAttribute('data-src', '/public/3d-tour.mp4?1748257641');
    }
    const fallbackImg = video.querySelector('img');
    if (fallbackImg) {
        fallbackImg.src = bgBanner1x;
        fallbackImg.setAttribute('srcset', `${bgBanner1x} 1x, ${bgBanner2x} 2x`);
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (source && source.dataset.src) {
                    source.src = source.dataset.src;
                    video.load();
                }
                observer.unobserve(video);
            }
        });
    }, { threshold: 0.25 });
    observer.observe(video);

    video.addEventListener('loadeddata', () => {
        const wrapper = video.closest('.section-banner');
        wrapper?.classList.add('video-loaded');
    });
}


/*
import bgBanner1x from '@images/bg-about-banner.png?w=768&format=webp&as=src';
import bgBanner2x from '@images/bg-about-banner.png?w=1536&format=webp&as=src';

export function initSectionBannerVideo() {
    const video = document.querySelector('.section-banner__video');
    if (!video) return;

    // Установка poster через атрибут
    video.poster = bgBanner2x;

    const source = video.querySelector('source');
    if (source) {
        source.src = '/public/3d-tour.mp4?1748257640';
        video.load();
        setTimeout(() => {
            video.play().catch(() => {});
        }, 100);
    }

    // Найдём fallback <img> и установим src
    const fallbackImg = video.querySelector('img');
    if (fallbackImg) {
        fallbackImg.src = bgBanner1x;
        fallbackImg.setAttribute('srcset', `${bgBanner1x} 1x, ${bgBanner2x} 2x`);
    }

    // Скрытие placeholder после загрузки видео
    video.addEventListener('loadeddata', () => {
        const wrapper = video.closest('.section-banner');
        wrapper?.classList.add('video-loaded');
    });
}
*/
