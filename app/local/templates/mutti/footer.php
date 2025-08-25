<?
/** @var CMain $APPLICATION */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset; ?>
        </section>
    </section>
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
    <div id="cookie-notification" class="cookie-notification">
        <div class="cookie-content">
            <p class="cookie-text">
                We use cookies. By continuing to use the website, you agree to the use of <a href="/policy/" title="Политика обработки персональных данных">cookies and the privacy policy.</a>
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
                    const consent = localStorage.getItem('cookiesAccepted');
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
                    localStorage.setItem('cookiesAccepted', 'true');
                    localStorage.setItem('cookieConsentDate', new Date().toISOString());
                    hideCookieNotification();
                }

                acceptButton.addEventListener('click', acceptCookies);
                checkCookieConsent();
            }

            cookieNotificationModal();
        })
    </script>
<?php } else { ?>
    <div id="cookie-notification" class="cookie-notification">
        <div class="cookie-content">
            <p class="cookie-text">
                Мы используем cookie-файлы. Продолжая использование сайта, вы соглашаетесь с <a href="/policy/" title="Политика обработки персональных данных">использованием cookies-файлов и политикой конфиденциальности.</a>
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




<style>
    .cookie-notification {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        width: 631px;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        z-index: 999999;
        box-shadow: 0 0 15px #00000040;
    }

    .cookie-notification.hidden {
        display: none;
    }


    .cookie-content {
        display: flex        ;
        align-items: center;
        justify-content: space-between;
        padding: 15px 20px;
        gap: 20px;
    }

    .cookie-text {
        margin: 0;
        font-size: 14px;
        line-height: 150%;
        color: #1e1e1e;
        flex: 1;
    }
    .cookie-link {
        color: #008798;
        text-decoration: underline;
    }
    .cookie-accept-btn {
        width: 150px;
        height: 40px;
        background-color: #4b0081;
        color: #fff;
        border: none;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        flex-shrink: 0;
    }
</style>




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
