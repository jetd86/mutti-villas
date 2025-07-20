<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var MuttiPageHomeComponent $component */

$arLocationSection = $arResult['ITEMS']['location'];
foreach ($arLocationSection['ITEMS'] as $key => $arLocationItem) {
    $code = 'home';
    $filename = pathinfo($arLocationItem['PREVIEW_PICTURE']['SRC'], PATHINFO_BASENAME);
    $webpFilename = preg_replace('/\.\w+$/', '.webp', $filename);
    $arLocationItem['PICTURE'] = "/local/assets/assets/images/generated/{$code}/{$webpFilename}?as=src";

    $arResult['ITEMS']['location']['ITEMS'][$key] = $arLocationItem;
}
