<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Application;

/**
 * @var array $arResult
 * @var array $arParams
 * @var CBitrixMenuComponent $component
 */
?>
<div class="footer-block footer-menu"><?
    if (!empty($arResult)): ?>
        <ul class="footer-nav"><?
            foreach ($arResult as $arItem) {
                $isActive = (bool)$arItem["SELECTED"];
                $target = $arItem['PARAMS']['TARGET'];

                $name = array_key_exists('FOOTER_TITLE', $arItem['PARAMS']) ? $arItem['PARAMS']['FOOTER_TITLE'] : $arItem["TEXT"];
                $view = array_key_exists('FOOTER_VIEW', $arItem['PARAMS']) ? $arItem['PARAMS']['FOOTER_VIEW'] : true;
                if (!$view) {
                    continue;
                }
                $link = $target
                    ? $arItem["LINK"]
                    : Application::getDomain() . $arItem["LINK"];
                ?>
                <li class="nav-item">
                    <a class="nav-link"<?=($target ? ' target="' . $target . '"' : '')?> href="<?= $link ?>"><?= $name ?></a>
                </li><?
            }?>
        </ul><?
    endif ?>
</div>
