import { parsePhoneNumberFromString } from 'libphonenumber-js';

export function initPhoneValidation(selector = '#floatingInputPhone') {
    const phoneInput = document.querySelector(selector);
    if (!phoneInput) return;

    phoneInput.addEventListener('blur', () => {
        const rawValue = phoneInput.value.trim();

        // Предполагаем язык из data-lang
        const lang = phoneInput.dataset.lang || 'ru';
        const defaultCountry = lang === 'en' ? 'US' : 'RU';

        const phoneNumber = parsePhoneNumberFromString(rawValue, defaultCountry);

        // Убираем классы валидации
        phoneInput.classList.remove('is-invalid', 'is-valid');

        if (phoneNumber && phoneNumber.isValid()) {
            phoneInput.value = phoneNumber.formatInternational();
            phoneInput.classList.add('is-valid');
        } else {
            phoneInput.classList.add('is-invalid');
        }
    });
}
