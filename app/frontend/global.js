import {footerLogoComponent, headerLogoComponent, offcanvasLogoComponent} from './components/layout/logo';
import {initWhatsappFloatingButton} from "./components/ui/whatsapp-float";
import {initMessengerLinks} from "./components/utils/messager-links";
import {initDynamicModal} from "./components/ui/modal";
import * as bootstrap from 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-icons/font/bootstrap-icons.css';
import './global.scss';

window.bootstrap = bootstrap;

// Lazy load картинок
document.querySelectorAll('img:not([loading])')
    .forEach(img => img.setAttribute('loading', 'lazy'));


// Navigation dropdown
document.querySelectorAll('[data-bs-toggle="dropdown"]')
    .forEach(el => new bootstrap.Dropdown(el));

// После загрузки страницы
document.addEventListener('DOMContentLoaded', () => {

    // Подстановка логотипов
    offcanvasLogoComponent();
    headerLogoComponent();
    footerLogoComponent();

    // Динамическое модальное окно
    initDynamicModal();

    initWhatsappFloatingButton();
    initMessengerLinks();
});
