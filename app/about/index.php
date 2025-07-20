<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle('О нас');
$APPLICATION->SetPageProperty('title', 'О компании');

$APPLICATION->IncludeComponent('mutti:page.about', '', [
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
