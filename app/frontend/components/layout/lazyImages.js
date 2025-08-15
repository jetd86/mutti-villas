export function lazyImagesInit() {
    const lazyBackgrounds = document.querySelectorAll('[data-bg]');

    const intersectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const div = entry.target;
                div.style.backgroundImage = `url(${div.dataset.bg})`;
                observer.unobserve(div);
            }
        });
    });

    lazyBackgrounds.forEach(div => {
        intersectionObserver.observe(div);
    });
}
