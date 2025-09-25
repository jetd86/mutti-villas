<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Iblock\InheritedProperty\SectionValues;
use Mutti\Service\Image\ImageService;

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
/** @var HelperSliderComponent $component */

$imageService = new ImageService();
foreach ($arResult['ITEMS'] ?: [] as $key => $item) {
    $arResult['ITEMS'][$key]['PICTURE']['SRC_1X'] = $imageService->getResizedWebpSrc($item['PICTURE'], ['height' => 240, 'width' => 410]);
    $arResult['ITEMS'][$key]['PICTURE']['SRC_2X'] = $imageService->getResizedWebpSrc($item['PICTURE'], ['height' => 322, 'width' => 1200]);
    $arResult['ITEMS'][$key]['PICTURE']['SRC'] = $imageService->getResizedWebpSrc($item['PICTURE'], ['height' => 1076, 'width' => 389]);
}


foreach($arResult['ITEMS'] as $key => $item){
    $sections= new SectionValues($arParams['IBLOCK_ID'], $item['ID']);
    $arResult['ITEMS'][$key]['SEO'] = $sections->getValues();
}

