<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Application;
use App\Helper\ComponentHelper;

/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixMenuComponent $component
 */
?>
<div class="offcanvas offcanvas-end header-<?= ComponentHelper::getComponentName($component->__name) ?>" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="mobileMenuLabel">
            <a class="offcanvas-brand" href="/">
                <img id="offcanvasLogo" alt="Logo" />
            </a>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav"><?
            if (!empty($arResult)):
                foreach ($arResult as $arItem) {
                    $target = $arItem['PARAMS']['TARGET'];
                    $isActive = (bool)$arItem["SELECTED"];

                    $type = array_key_exists('TYPE', $arItem['PARAMS']) ? $arItem['PARAMS']['TYPE'] : '';
                    $link = $target
                        ? $arItem["LINK"]
                        : Application::getDomain() . $arItem["LINK"];
                    ?>
                    <li class="nav-item">
                        <a class="nav-link<?=($isActive ? ' active' : '')?>" <?=($target ? ' target="' . $target . '"' : '')?>
                           href="<?= $link ?>"><?= $arItem["TEXT"] ?></a>
                    </li><?
                }
            endif ?>
        </ul>
    </div>
    <div class="offcanvas-footer"><?
        if ($socialIcons = $arParams['SOCIAL_ICONS']): ?>
            <div class="offcanvas-wrapper offcanvas-list"><?
                foreach ($socialIcons as $socialIconName): ?>
                    <div class="offcanvas-item offcanvas-item-<?=$socialIconName?>"
                         data-messenger="<?=$socialIconName?>"><i class="bi bi-<?=$socialIconName?>"></i></div>
                <?endforeach; ?>
            </div><?
        endif; ?>
        <div class="offcanvas-wrapper offcanvas-button">
            <button type="button" data-bs-toggle="modal" data-messenger="whatsapp"><?= $arParams['CALLBACK_NAME'] ?></button>
        </div>
    </div>
</div>


