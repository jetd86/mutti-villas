import {MESSENGERS} from '../../config/messengers.js';
import {Modal} from 'bootstrap';

export function initMessengerLinks(selector = '[data-messenger]') {
    document.querySelectorAll(selector).forEach(el => {
        el.addEventListener('click', e => {
            e.preventDefault();

            const type = el.dataset.messenger;
            const text = encodeURIComponent(el.dataset.text || '');
            let url = null;

            switch (type) {
                case 'whatsapp': {
                    const phone = el.dataset.phone || MESSENGERS.whatsapp?.phone;
                    if (!phone) return console.warn('WhatsApp: номер не указан');
                    url = `https://wa.me/${phone}`;
                    if (text) url += `?text=${text}`;
                    break;
                }

                case 'telegram': {
                    const username = el.dataset.username || MESSENGERS.telegram?.username;
                    if (!username) return console.warn('Telegram: username не указан');
                    url = `https://t.me/${username}`;
                    break;
                }

                case 'line': {
                    const username = el.dataset.username || MESSENGERS.line?.username;
                    if (!username) return console.warn('Line: username не указан');
                    url = `https://line.me/R/ti/p/~${username}`;
                    break;
                }

                case 'youtube': {
                    url = 'https://www.youtube.com/@Mutti-p7z'
                    break;
                }

                case 'facebook': {
                    url = 'https://www.facebook.com/Mutti.Villas'
                    break;
                }

                case 'instagram': {
                    url = 'https://www.instagram.com/mutti.villas'
                    break;
                }

                case 'wechat': {
                    const modal = document.getElementById('mainModal');
                    const modalTitle = modal.querySelector('#mainModalTitle');
                    const modalBody = modal.querySelector('#mainModalBody');
                    const template = document.getElementById('wechat-qr');

                    if (modalTitle) modalTitle.textContent = 'WeChat';
                    modalBody.innerHTML = template ? template.innerHTML : '<p>QR-код не найден</p>';

                    const instance = Modal.getOrCreateInstance(modal);
                    setTimeout(() => instance.show(), 0);
                    return;
                }

                default:
                    console.warn(`Неподдерживаемый мессенджер: ${type}`);
                    return;
            }

            if (url) {
                window.open(url, '_blank');
            }
        });
    });
}
