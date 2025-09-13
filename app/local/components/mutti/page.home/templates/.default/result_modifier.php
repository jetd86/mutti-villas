<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Mutti\Service\Image\ImageService;
use Mutti\Enum\OptionHomeEnum;

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

include $_SERVER['DOCUMENT_ROOT']. '/local/php_interface/mutti-core.php';
$arResult['MUTTI_CORE'] = $mutti_core;

$this->setFrameMode(true);
$imageService = new ImageService();
$component = new MuttiPageHomeComponent();

$icons = $component->getAdvantagesElements();
$arResult['ITEMS']['ICONS'] = $icons;


foreach($icons as $key => $arIcon) {
    $arResult['ITEMS']['ICONS'][$key]['ICON']['SRC'] = $imageService->getResizedWebpSrc($arIcon['ICON'], ['height' => 48, 'width' => 48]);
    $arResult['ITEMS']['ICONS'][$key]['SRC_48'] = $imageService->getResizedWebpSrc($arIcon['ICON'], ['height' => 48, 'width' => 48]);
    $arResult['ITEMS']['ICONS'][$key]['SRC_96'] = $imageService->getResizedWebpSrc($arIcon['ICON'], ['height' => 96, 'width' => 96]);
    $arResult['ITEMS']['ICONS'][$key]['SRC_180'] = $imageService->getResizedWebpSrc($arIcon['ICON'], ['height' => 180, 'width' => 180]);
    $arResult['ITEMS']['ICONS'][$key]['SRC_300'] = $imageService->getResizedWebpSrc($arIcon['ICON'], ['height' => 300, 'width' => 300]);
}


$arLocationSection = $arResult['ITEMS']['location'];

foreach ($arLocationSection['ITEMS'] as $key => $arLocationItem) {
    $code = 'home';
    $filename = pathinfo($arLocationItem['PREVIEW_PICTURE']['SRC'], PATHINFO_BASENAME);
    $webpFilename = preg_replace('/\.\w+$/', '.webp', $filename);
    $arLocationItem['PICTURE_WEBP'] = $imageService->getResizedWebpSrc($arLocationItem['PREVIEW_PICTURE'], ['height' => 60, 'width' => 60]);;
    $arLocationItem['PREVIEW_PICTURE']['SRC'] = $imageService->getResizedWebpSrc($arLocationItem['PREVIEW_PICTURE'], ['height' => 60, 'width' => 60]);;

    $arResult['ITEMS']['location']['ITEMS'][$key] = $arLocationItem;
}
