<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Application;
use App\Helper\ComponentHelper;
use Bitrix\Main\Config\Option;
use Mutti\Enum\ModuleEnum;
use Mutti\Enum\OptionBaseEnum;
use Mutti\Enum\OptionHomeEnum;

/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixMenuComponent $component
 */

$navbarId = 'navbarInner';
if (Application::isHomePage()) {
    $navbarId = 'navbarMain';
}
?>

<nav class='navbar navbar-expand-lg px-3 header-<?= ComponentHelper::getComponentName($component->__name)?>' id="<?=$navbarId?>">
    <div class="container p-0">
        <a class="navbar-brand" href="/">
            <img id="navbarLogo" alt="Mutti Villas" src="" loading="eager" fetchpriority="high" decoding="async" aria-label="Mutti Villas"/>
        </a>
        <div class="navbar-action d-lg-none">
            <a class="navbar-link" href="<?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_BANNER_LINK->value)?>" target="_blank">3D</a>
            <div class="navbar-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= strtoupper(LANGUAGE_ID) ?>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_FIELD_SITE_RU->value) . htmlspecialchars($_SERVER['REQUEST_URI']) ?>">RU</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_FIELD_SITE_EN->value) . htmlspecialchars($_SERVER['REQUEST_URI']) ?>">EN</a>
                    </li>
                </ul>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mb-2 mb-lg-0"><?
                if (!empty($arResult)):
                    foreach ($arResult as $arItem) {
                        $target = $arItem['PARAMS']['TARGET'];
                        $isActive = (bool)$arItem["SELECTED"];

                        $type = array_key_exists('TYPE', $arItem['PARAMS']) ? $arItem['PARAMS']['TYPE'] : '';
                        $link = $target
                            ? $arItem["LINK"]
                            : Application::getDomain() . $arItem["LINK"]; ?>
                        <li class="nav-item">
                            <a class="nav-link<?=($isActive ? ' active' : '')?>" <?=($target ? ' target="' . $target . '"' : '')?>
                               href="<?= $link ?>"><?= $arItem["TEXT"] ?></a>
                        </li><?
                    }
                endif ?>
                <li class="nav-item nav-callback">
                    <a class="nav-link" data-messenger="whatsapp"><?=$arParams['CALLBACK_NAME']?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= strtoupper(LANGUAGE_ID) ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_FIELD_SITE_RU->value) . htmlspecialchars($_SERVER['REQUEST_URI']) ?>">RU</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionBaseEnum::BASE_FIELD_SITE_EN->value) . htmlspecialchars($_SERVER['REQUEST_URI']) ?>">EN</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
