<?php
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;


Loader::includeModule('mutti.core');

if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
}
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/bootstrap.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/bootstrap.php';
}
if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/event.php')) {
    require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/event.php';
}

include __DIR__ . '/mutti-core.php';



if($_GET['mutti-core'] == 'show'){
    echo '<pre>';
    print_r($mutti_core);
    echo '</pre>';
}

global $mutti_core;

CJSCore::Init([]);
$asset = Asset::getInstance();

// Убираем лишнее
$asset->disableOptimizeCss();
$asset->disableOptimizeJs();


// Установка заголовка
function getPageTitle()
{
    global $APPLICATION;
    if ($APPLICATION->GetProperty('TITLE')) {
        $arParams = [
            'TITLE' => $APPLICATION->GetProperty('TITLE'),
            'SUBTITLE' => $APPLICATION->GetProperty('SUBTITLE'),
            'HEADER_BUTTON_TEXT' => $APPLICATION->GetProperty('HEADER_BUTTON_TEXT'),
            'HEADER_BUTTON' => $APPLICATION->GetProperty('HEADER_BUTTON'),
            'HEADER_BUTTON_ICON' => $APPLICATION->GetProperty('HEADER_BUTTON_ICON'),
        ];


        if (!ob_get_level()) {
            ob_start();
        }

        $APPLICATION->IncludeComponent('helper:header.page.title', '', $arParams);
        $pageTitle = ob_get_contents();
        ob_end_clean();

        return $pageTitle;
    }
}



