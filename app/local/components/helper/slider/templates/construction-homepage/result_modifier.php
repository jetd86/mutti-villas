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

$slider = [];
$imageService = new ImageService();
foreach ($arResult['ITEMS'] ?: [] as $key => $item) {
    if (is_null($slider['GROUP_NAME'])) {
        $slider['GROUP_NAME'] = $item['GROUP'];
    }
    if (is_null($slider['ITEMS'])) {
        $slider['ITEMS'] = [];
    }

    $slider['ITEMS'] = array_merge($slider['ITEMS'], array_map(function ($galleryItem) use ($item, $imageService) {
        $galleryItem['SRC_1X'] = $imageService->getResizedWebpSrc($galleryItem, ['height' => 210, 'width' => 500]);
        $galleryItem['SRC_2X'] = $imageService->getResizedWebpSrc($galleryItem, ['height' => 286, 'width' => 500]);
        $galleryItem['GROUP'] = $item['GROUP'];

        return $galleryItem;
    }, $item['GALLERY']));
}

$arResult = $slider;
