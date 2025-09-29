<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use App\Application;
use App\Enum\PageEnum;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;

define("NOT_CHECK_PERMISSIONS", true);
define("PUBLIC_AJAX_MODE", true);
define("STOP_STATISTICS", true);
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_STATISTIC", true);
define("DisableEventsCheck", true);
define("BX_SECURITY_SHOW_MESSAGE", true);
define("BX_COMPRESSION_DISABLED", true);
define("BX_PUBLIC_MODE", true);
define("BX_COMP_MANAGED_CACHE", true);

/** @var CMain $APPLICATION */
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/vite-assets-router.php';
$request = Bitrix\Main\Context::getCurrent()->getRequest();
routeViteAssets();


/*
 * OLD 2025.07.27
Asset::getInstance()->addJs('https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js');
Asset::getInstance()->addCss('https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css');
*/


$host = $_SERVER['HTTP_HOST'] ?? '';

$host = strtolower($host);
$host = preg_replace('/:\d+$/', '', $host);

$tld = '';
if (preg_match('/\.([^.]+)$/', $host, $matches)) {
    $tld = $matches[1];
}

?>
<!DOCTYPE html>
<?php
if ($tld === 'com' || true) { ?>
<html lang="en">
<?php } else { ?>
<html lang="ru">
<?php } ?>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><? $APPLICATION->ShowTitle(); ?></title>
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon-180x180.png">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon-192x192.png">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon-144x144.png">
    <meta name="msapplication-config" content="/browserconfig.xml">
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#ffffff">
    <?php $APPLICATION->ShowHead(); ?>

    <?php /*
    Asset::getInstance()->addJs('https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', true);
    Asset::getInstance()->addCss('<link rel="preload" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">');
    Asset::getInstance()->addCss('https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css');
 */
    ?>
    <?php
    Asset::getInstance()->addString('<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js" defer></script>');
    Asset::getInstance()->addString('
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"
          as="style"
          onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"></noscript>
    ');
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>


    <style>
        .section-feedback__agreement {
            color: #fff;
            font-family: Montserrat, sans-serif;
            font-weight: 400;
            font-size: 12px;
            vertical-align: middle;
            line-height: 1;
            opacity: .8;
        }

        .section-feedback__agreement a {
            color: #ffffff;
        }
        .section-feedback__agreement label.is-invalid {
            border: 1px solid #dc3545;
            padding: 5px;
            border-radius: 4px;
            display: inline-block;
        }

        .section-feedback__agreement label.is-invalid::after {
            content: "Нужно согласиться";
            color: #dc3545;
            font-size: 0.9em;
            margin-left: 8px;
        }


        .phone-input-container {
            position: relative;
        }

        .phone-hint {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 0.25rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .phone-input-container:focus-within .phone-hint {
            opacity: 1;
        }

        .country-indicator {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.75rem;
            color: #28a745;
            font-weight: 500;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .country-indicator.show {
            opacity: 1;
        }

        .form-control.phone-valid {
            border-color: #28a745;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='m2.3 6.73.8-.77-.8-.77-.8.77.8.77zm1.54-4.02L5.3 1.25 4.5.48 2.84 2.14l-.83-.83-.8.77 1.63 1.63z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .form-control.phone-invalid {
            border-color: #dc3545;
        }
    </style>





    <style>
        .cookie-notification {
            position: fixed;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            width: 640px;
            background: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 0 15px #0003;
            z-index: 99999;
        }
        .cookie-notification.hidden { display: none; }
        .cookie-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 20px;
            gap: 20px;
        }
        .cookie-text { font-size: 14px; flex: 1; margin: 0; }
        .cookie-link { color: #0077cc; text-decoration: underline; }
        .cookie-actions { display: flex; gap: 10px; }
        .cookie-btn {
            min-width: 100px; height: 36px; border: none;
            cursor: pointer; font-size: 13px; font-weight: 500;
        }
        .cookie-accept { background: #4b0081; color: #fff; }
        .cookie-reject { background: #ddd; color: #333; }
        .cookie-settings { background: #eee; color: #333; }

        .cookie-settings-modal {
            position: fixed; top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,.5);
            display: flex; align-items: center; justify-content: center;
            z-index: 100000;
        }
        .cookie-settings-modal.hidden { display: none; }
        .cookie-settings-content {
            background: #fff; padding: 20px; border-radius: 6px;
            width: 400px; max-width: 90%;
            display: flex; flex-direction: column; gap: 15px;
        }
        .cookie-settings-content h3 {
            margin: 0; font-size: 18px;
        }
        .cookie-settings-content label {
            font-size: 14px; display: flex; gap: 8px; align-items: center;
        }
        .cookie-settings-content .actions {
            display: flex; justify-content: flex-end; gap: 10px; margin-top: 10px;
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

        @media (max-width: 700px){
            .cookie-notification{ width:95%; }
            .cookie-content{ flex-direction:column; align-items:flex-start; }
            .cookie-actions{ width:100%; justify-content:flex-end; flex-wrap:wrap; }
        }
    </style>


</head>
<body class="page">
<?
        $APPLICATION->ShowPanel(); ?>
<div id="app" class="<?=(Application::isHomePage() ? PageEnum::PAGE_HOME->value : Application::getPageName() . '-page') ?>">
    <header class="header sticky-top<?=(!Application::isHomePage() ? ' header-inner shadow-sm' : ' header-main')?>"
            id="<?= Application::isHomePage() ? 'mainHeader' : 'innerHeader' ?>"><?
        $APPLICATION->IncludeComponent('mutti:header', '', [
            "CALLBACK_NAME" => Loc::getMessage('HEADER_CALLBACK'),
            "SOCIAL_ICONS" => [
                "wechat",
                "telegram",
                "whatsapp",
                "youtube",
                "facebook",
                "instagram",
                "line",
            ],
        ]);?>
    </header>
    <div class="section wrapper" id="wrapper"><?
        // breadcrumb
        if (!Application::isHomePage()):
            $APPLICATION->IncludeComponent("bitrix:breadcrumb", "", [
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0"
            ]);
            // pageTitle
            $APPLICATION->AddBufferContent('getPageTitle');
        endif; ?>
        <div class="section content" id="content">


