<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
$APPLICATION->SetPageProperty('title', 'О компании Mutti Family Villas');
$APPLICATION->SetPageProperty('description', 'Mutti Development – девелопер элитных вилл на Пхукете. Строим современные дома и предоставляем услуги управления.');

$APPLICATION->IncludeComponent('mutti:page.about', '', [
    'IBLOCK_ID' => 5,
    'STAT_NUMBERS' => ['15+', '200+', '20+'],
    'STAT_TEXT' => [
        'Лет в строительстве и девелопменте',
        'Сотрудников работает в компании',
        'Проектов реализовано на территории Тайланда'
    ],
    'BANNER_TITLE' => '3D тур по комплексу',
    'BANNER_LINK' => 'javascript:void()',
], false);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>