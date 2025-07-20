<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */

s($arResult);
if ($arResult["CURRENT_PAGE"] > 1): ?>
    <a href="<?=$arResult["URL"]?>&PAGEN_<?=$arResult["NAV_NUM"]?>=1" class="pager-nav">&lt;</a>
<?php endif;

foreach ($arResult["PAGES"] as $page):
    if ($page["TYPE"] === "PAGE" && $page["PAGE"] <= 5): ?>
        <a href="<?=$page["LINK"]?>" class="<?=($page["SELECTED"] ? 'active' : '')?>"><?=$page["PAGE"]?></a>
    <?php elseif ($page["TYPE"] === "DOTS" && $page["PAGE"] > 5): ?>
        <span class="pager-dots">...</span>
    <?php elseif ($page["PAGE"] > $arResult["PAGE_COUNT"] - 3): ?>
        <a href="<?=$page["LINK"]?>" class="<?=($page["SELECTED"] ? 'active' : '')?>"><?=$page["PAGE"]?></a>
    <?php endif;
endforeach;

if ($arResult["CURRENT_PAGE"] < $arResult["PAGE_COUNT"]): ?>
    <a href="<?=$arResult["URL"]?>&PAGEN_<?=$arResult["NAV_NUM"]?>=<?=$arResult["PAGE_COUNT"]?>" class="pager-nav">&gt;</a>
<?php endif; ?>
