<?
/** @var CMain $APPLICATION */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset; ?>
        </div>
    </div>
    <footer class="footer" id="footer"><?
        $APPLICATION->IncludeComponent('mutti:footer', '', [
            "CALLBACK_NAME" => Loc::getMessage('FOOTER_CALLBACK'),
            "OFFICE_ADDRESS" => "Soi Sai Namyen, Chalong, Mueang Phuket District, Phuket 83130, Thailand",
            "OFFICE_PHONE_RU" => "+66 80 43 65597",
            "OFFICE_PHONE_EN" => "+66 9 8860 6410",
            "OFFICE_EMAIL" => "salesmutti@gmail.com",
            "COPYRIGHT" => "Phuket MUTTI Family Villas",
            "SOCIAL_ICONS" => [
                "wechat",
                "telegram",
                "whatsapp",
                "youtube",
                "facebook",
                "instagram",
                "line",
            ],
            "CACHE_TYPE" => "A",
        ]); ?>
    </footer>
</div>



<?php
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parsed_url = parse_url($url);
$host = $parsed_url['host'] ?? '';
if (substr(strtolower($host), -4) === ".com") { ?>
    <div id="cookie-notification" class="cookie-notification hidden">
        <div class="cookie-content">
            <p class="cookie-text">
                We use cookies. By continuing to use this website, you agree to our <a href="/cookies-policy/" title="Cookies Policy">cookies policy</a> and our <a href="/policy/" title="Privacy Policy">privacy policy</a>.
            </p>
            <div class="cookie-actions">
                <button id="accept-cookies" class="cookie-btn cookie-accept">Accept</button>
                <button id="reject-cookies" class="cookie-btn cookie-reject">Reject</button>
                <button id="settings-cookies" class="cookie-btn cookie-settings">Settings</button>
            </div>
        </div>
    </div>

    <div id="cookie-settings-modal" class="cookie-settings-modal hidden">
        <div class="cookie-settings-content">
            <h3>Cookie preferences</h3>
            <label><input type="checkbox" checked disabled> Necessary (always active)</label>
            <label><input type="checkbox" id="analytics-cookies"> Analytics</label>
            <label><input type="checkbox" id="marketing-cookies"> Marketing</label>
            <div class="actions">
                <button id="save-cookies" class="cookie-btn cookie-accept">Save</button>
                <button id="close-settings" class="cookie-btn cookie-reject">Cancel</button>
            </div>
        </div>
    </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
            const bar = document.getElementById('cookie-notification');
            const settingsModal = document.getElementById('cookie-settings-modal');
            const acceptBtn = document.getElementById('accept-cookies');
            const rejectBtn = document.getElementById('reject-cookies');
            const settingsBtn = document.getElementById('settings-cookies');
            const saveBtn = document.getElementById('save-cookies');
            const closeSettings = document.getElementById('close-settings');

            const analyticsCheckbox = document.getElementById('analytics-cookies');
            const marketingCheckbox = document.getElementById('marketing-cookies');

            function showBar() { bar.classList.remove('hidden'); }
            function hideBar() { bar.classList.add('hidden'); }
            function showSettings() { settingsModal.classList.remove('hidden'); }
            function hideSettings() { settingsModal.classList.add('hidden'); }

            function saveConsent(consent) {
            localStorage.setItem('cookieConsent', JSON.stringify(consent));
            localStorage.setItem('cookieConsentDate', new Date().toISOString());
        }

            function loadConsent() {
            return JSON.parse(localStorage.getItem('cookieConsent') || 'null');
        }

            acceptBtn.addEventListener('click', () => {
            saveConsent({ necessary: true, analytics: true, marketing: true });
            hideBar();
        });

            rejectBtn.addEventListener('click', () => {
            saveConsent({ necessary: true, analytics: false, marketing: false });
            hideBar();
        });

            settingsBtn.addEventListener('click', showSettings);
            closeSettings.addEventListener('click', hideSettings);

            saveBtn.addEventListener('click', () => {
            saveConsent({
            necessary: true,
            analytics: analyticsCheckbox.checked,
            marketing: marketingCheckbox.checked
        });
            hideSettings();
            hideBar();
        });

            const existing = loadConsent();
            if (!existing) {
            showBar();
        }
        });
    </script>
<?php } else { ?>
    <div id="cookie-notification" class="cookie-notification">
        <div class="cookie-content">
            <p class="cookie-text">
                Мы используем cookie-файлы. Продолжая использование сайта, вы соглашаетесь с использованием <a href="/cookies-policy/" title="Cookie-политика">cookies-файлов</a> и <a href="/policy/" title="Политика обработки персональных данных">политикой конфиденциальности.</a>
            </p>
            <button id="accept-cookies" class="cookie-accept-btn">Принять</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function cookieNotificationModal() {
                const cookieNotification = document.getElementById('cookie-notification');
                const acceptButton = document.getElementById('accept-cookies');

                function checkCookieConsent() {
                    const consent = localStorage.getItem('cookiesAcceptedEn');
                    if (consent === 'true') {
                        hideCookieNotification();
                    } else {
                        showCookieNotification();
                    }
                }

                function hideCookieNotification() {
                    cookieNotification.classList.add('hidden');
                }

                function showCookieNotification() {
                    cookieNotification.classList.remove('hidden');
                }

                function acceptCookies() {
                    localStorage.setItem('cookiesAcceptedEn', 'true');
                    localStorage.setItem('cookieConsentDate', new Date().toISOString());
                    hideCookieNotification();
                }

                acceptButton.addEventListener('click', acceptCookies);
                checkCookieConsent();
            }

            cookieNotificationModal();
        })
    </script>


<?php } ?>


<?$APPLICATION->IncludeComponent('helper:modal', '')?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const lightbox = GLightbox({
            selector: '[data-glightbox="construction"]'
        });
    });
</script>

<?php routeViteAssets();?>
<?php Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js" defer></script>');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
</body>
</html>
