import { MESSENGERS } from '@config/messengers.js';

export function initWhatsappFloatingButton() {
    const { phone, defaultText } = MESSENGERS.whatsapp;

    if (!phone) return;

    const btn = document.createElement('a');
    btn.href = `https://wa.me/${phone}?text=${encodeURIComponent(defaultText)}`;
    btn.className = 'whatsapp-float';
    btn.setAttribute('aria-label', 'Открыть чат в WhatsApp');
    btn.setAttribute('target', '_blank');
    btn.innerHTML = '<i class="bi bi-whatsapp"></i>';

    // Изначально скрыта, появится при скролле
    btn.style.opacity = '0';
    btn.style.transition = 'opacity 0.3s ease';

    document.body.appendChild(btn);

    // Появление после скролла
    window.addEventListener('scroll', () => {
        const showAfter = 100;
        btn.style.opacity = window.scrollY > showAfter ? '1' : '0';
    });

    // Скрытие при открытой модалке (если нужно)
    const modal = document.getElementById('mainModal');
    if (modal) {
        modal.addEventListener('show.bs.modal', () => {
            btn.style.display = 'none';
        });
        modal.addEventListener('hidden.bs.modal', () => {
            btn.style.display = '';
        });
    }
}
