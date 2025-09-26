<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("DESCRIPTION", "Mutti Villas в Чалонге: элитные виллы с бассейнами и «умным домом». Купить виллу на Пхукете – выгодное вложение.");

$APPLICATION->SetTitle("Mutti Villas – элитные виллы на Пхукете");
$APPLICATION->SetPageProperty("TITLE", "Mutti Villas – элитные виллы на Пхукете");
$APPLICATION->IncludeComponent('mutti:page.home', '', [
    'SUB_HEADER' => '37 вилл с бассейном террасой и садом 3-5+ спален, кабинет, крытый паркинг',
    "SOCIAL_ICONS" => [
        "wechat",
        "telegram",
        "whatsapp",
        "line",
    ],
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>