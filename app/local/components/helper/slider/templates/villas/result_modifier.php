<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

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
    $arResult['ITEMS'][$key]['SRC_1X'] = $imageService->getResizedWebpSrc($item, ['height' => 280, 'width' => 410]);
    $arResult['ITEMS'][$key]['SRC_2X'] = $imageService->getResizedWebpSrc($item, ['height' => 390, 'width' => 1200]);
}
