import logoWhite from '@images/logo-white.svg';
import logoColor from '@images/logo-color.svg';

export function headerScrollComponent(containerId) {
    const navbar = document.getElementById(containerId);

    navbar.classList.add('navbar-transparent');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.remove('navbar-transparent');
        } else {
            navbar.classList.add('navbar-transparent');
        }
    });
}

export function headerScrollLogoComponent(containerId = 'navbarMain', logoId = 'navbarLogo') {
    const navbar = document.getElementById(containerId);
    const logo = document.getElementById(logoId);

    if (!navbar || !logo) return;

    logo.src = logoColor;
}

export function headerLogoComponent(containerId = 'navbarInner', logoId = 'navbarLogo') {
    const navbar = document.getElementById(containerId);
    const logo = document.getElementById(logoId);

    if (!navbar || !logo) return;

    logo.src = logoColor;
}

export function offcanvasLogoComponent(containerId = 'mobileMenu', logoId = 'offcanvasLogo') {
    const offcanvas = document.getElementById(containerId);
    const logo = document.getElementById(logoId);

    if (!offcanvas || !logo) return;

    logo.src = logoWhite;
}

export function footerLogoComponent(logoId = '#footerLogo') {
    const container = document.querySelector('#footer');
    const logo = container.querySelector(logoId);

    if (!container || !logo) return;

    logo.src = logoWhite;
}
