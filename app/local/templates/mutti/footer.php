<?
/** @var CMain $APPLICATION */
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Localization\Loc; ?>
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

<?$APPLICATION->IncludeComponent('helper:modal', '')?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const lightbox = GLightbox({
            selector: '[data-glightbox="construction"]'
        });
    });
</script>

<? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/counters.php', false, ['MODE' => 'html']); ?>
<!-- META -->
</body>
</html>
