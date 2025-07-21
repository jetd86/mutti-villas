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

Asset::getInstance()->addJs('https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js');
Asset::getInstance()->addCss('https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css');

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

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
    <meta name="theme-color" content="#ffffff"><?
    $APPLICATION->ShowHead(); ?>

    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
</head>
<body class="page"><?
if ($request->get('debug') === 'Y') { ?>
    <div id="panel"><?
        $APPLICATION->ShowPanel(); ?>
    </div><?
} ?>
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
    <section class="section wrapper" id="wrapper"><?
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
        <section class="section content" id="content">


