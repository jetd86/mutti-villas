<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty("TITLE", "Контакты");
$APPLICATION->SetPageProperty("DESCRIPTION", "Наши контакты и интерактивная карта адреса");

$APPLICATION->IncludeComponent('mutti:page.contacts', '', [
    "OFFICE_ADDRESS" => "Soi Sai Namyen, Chalong, Mueang Phuket District, Phuket 83130, Thailand",
    "OFFICE_PHONE_RU" => "+66 80 43 65597",
    "OFFICE_PHONE_EN" => "+66 9 8860 6410",
    "OFFICE_EMAIL" => "salesmutti@gmail.com",
    "SOCIAL_ICONS" => [
        "wechat",
        "telegram",
        "whatsapp",
        "line",
    ],
    "CACHE_TYPE" => "A",
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
