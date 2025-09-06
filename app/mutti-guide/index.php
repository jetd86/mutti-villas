<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Mutti гид");
$APPLICATION->SetPageProperty("TITLE", "Mutti Гид");
$APPLICATION->SetPageProperty("DESCRIPTION", "Mutti Гид — ваш проводник по жизни и инвестициям на Пхукете.");

use App\Enum\IBlockCode;


$APPLICATION->IncludeComponent('mutti:page.guide', '', [
    'ASIDE_VIEW' => true,
    'CACHE_TYPE' => 'N',
    'IBLOCK_CODE' => IBlockCode::PAGE_MUTTI_GUIDE->value,
    'CONTENT_BUTTON' => 'Связаться с нами',
    'CONTENT_BUTTON_LINK' => '/',
    'CONTENT_BUTTON_ICON' => 'arrow-right-short',
]);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
