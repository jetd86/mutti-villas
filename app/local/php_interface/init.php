<?php
if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}
if (isset($_SERVER['HTTP_X_FORWARDED_PORT'])) {
    $_SERVER['SERVER_PORT'] = $_SERVER['HTTP_X_FORWARDED_PORT'];
}
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    $_SERVER['HTTPS'] = $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ? 'on' : 'off';
}

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

CJSCore::Init([]);
$asset = Asset::getInstance();

// Убираем лишнее
$asset->disableOptimizeCss(); // если ты сам собираешь CSS
$asset->disableOptimizeJs();  // если ты используешь Vite или Webpack


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

        ob_start();
        $APPLICATION->IncludeComponent('helper:header.page.title', '', $arParams);
        $pageTitle = ob_get_contents();
        ob_end_clean();

        return $pageTitle;
    }
}

if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
    $_SERVER['HTTP_HOST'] = $_SERVER['HTTP_X_FORWARDED_HOST'];
}
if (isset($_SERVER['HTTP_X_FORWARDED_PORT'])) {
    $_SERVER['SERVER_PORT'] = $_SERVER['HTTP_X_FORWARDED_PORT'];
}
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
    $_SERVER['HTTPS'] = $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ? 'on' : 'off';
}
