<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Клубный комплекс вилл на Пхукете");
$APPLICATION->SetPageProperty("TITLE", "Клубный комплекс вилл на Пхукете");
$APPLICATION->SetPageProperty("DESCRIPTION", "В общей зоне расположен 27 м общественный бассейн, джакузи с видом на горы, сауна и лаунж зона с бунгало. Также в сердце общественного пространства расположен тропический парк с ручьем.");

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
