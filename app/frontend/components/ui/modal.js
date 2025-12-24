export function initDynamicModal({
                                     modalSelector = '#mainModal',
                                     titleSelector = '#mainModalTitle',
                                     bodySelector = '#mainModalBody'
                                 } = {}) {
    const modal = document.querySelector(modalSelector);
    if (!modal) return;

    const modalTitle = modal.querySelector(titleSelector);
    const modalBody = modal.querySelector(bodySelector);
    const modalDialog = modal.querySelector('.modal-dialog');

    modal.addEventListener('show.bs.modal', event => {
        const trigger = event.relatedTarget;
        if (!trigger) return;

        const title = trigger.dataset.title;
        const contentId = trigger.dataset.content;
        const ajaxUrl = trigger.dataset.url;
        const size = trigger.dataset.size; // sm | lg | xl

        // Заголовок
        if (modalTitle) modalTitle.textContent = title || '';

        // Размер
        if (modalDialog) {
            modalDialog.classList.remove('modal-sm', 'modal-lg', 'modal-xl');
            if (['sm', 'lg', 'xl'].includes(size)) {
                modalDialog.classList.add(`modal-${size}`);
            }
        }

        // Контент из шаблона
        if (contentId) {
            const template = document.getElementById(contentId);
            modalBody.innerHTML = template ? template.innerHTML : '<p class="text-danger">Контент не найден</p>';
        }

        // AJAX-загрузка
        if (ajaxUrl) {
            modalBody.innerHTML = '<p>Загрузка...</p>';
            fetch(ajaxUrl)
                .then(r => r.text())
                .then(html => {
                    modalBody.innerHTML = html;
                })
                .catch(() => {
                    modalBody.innerHTML = '<p class="text-danger">Ошибка загрузки</p>';
                });
        }
    });
}
