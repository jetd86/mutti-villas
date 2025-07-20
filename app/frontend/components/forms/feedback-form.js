import { Modal } from 'bootstrap';

export function initHomeFeedbackForm(formId = '#home-feedback') {
    const form = document.querySelector(formId);
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        const successTitle = form.dataset.successTitle || '✅ Успешно';
        const successText = form.dataset.successText || 'Заявка отправлена!';
        const errorTitle = form.dataset.errorTitle || '❌ Ошибка';
        const errorText = form.dataset.errorText || 'Ошибка отправки. Попробуйте позже.';
        const dangerTitle = form.dataset.dangerTitle || '❌ Сбой сети';
        const dangerText = form.dataset.dangerText || 'Проверьте соединение и попробуйте снова.';

        const modal = document.getElementById('mainModal');
        const modalTitle = modal.querySelector('#mainModalTitle');
        const modalBody = modal.querySelector('#mainModalBody');

        try {
            const res = await fetch(location.href, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            modalTitle.textContent = res.ok ? successTitle : errorTitle;
            modalBody.innerHTML = res.ok ? `<p>${successText}</p>` : `<p class="text-danger">${errorText}</p>`;

            new Modal(modal).show();
            if (res.ok) form.reset();

        } catch (err) {
            modalTitle.textContent = dangerTitle;
            modalBody.innerHTML = `<p class="text-danger">${dangerText}</p>`;
            new Modal(modal).show();
        }
    });
}
