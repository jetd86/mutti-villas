<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
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

Loader::includeModule('highloadblock');

$imageService = new ImageService();
foreach ($arResult['ITEMS'] ?: [] as $key => $item) {
    if ($picture = $imageService->getWebpImage($item['PICTURE'])) {
        $arResult['ITEMS'][$key]['PICTURE'] = $picture;
    }

    $arResult['ITEMS'][$key]['PROPERTIES'] = getProperties($item);
    $arResult['ITEMS'][$key]['PRICE'] = getPrice($item);
}

function getProperties(array $item): array
{
    $properties = [];
    if ($value = $item['UF_PROP_BEDROOMS']) {
        $properties['BEDROOMS'] = [
            'TITLE' => Loc::getMessage('PROPERTY_BEDROOMS'),
            'VALUE' => $value,
        ];
    }
    if ($value = $item['UF_PROP_POOL_JACUZZI_SIZE']) {
        $properties['POOL_JACUZZI_SIZE'] = [
            'TITLE' => Loc::getMessage('PROPERTY_POOL_JACUZZI_SIZE'),
            'VALUE' => $value,
        ];
    }
    if ($value = $item['UF_PROP_SQUARE']) {
        $properties['SQUARE'] = [
            'TITLE' => Loc::getMessage('PROPERTY_SQUARE'),
            'VALUE' => $value,
        ];
    }
    if ($value = $item['UF_PROP_PIECE']) {
        $properties['PIECE'] = [
            'TITLE' => Loc::getMessage('PROPERTY_PIECE'),
            'VALUE' => $value,
        ];
    }

    return $properties;
}

function getPrice(array $item): array
{
    $price = [];
    if ($value = $item['UF_PRICE']) {
        list($AMOUNT, $CURRENCY) = explode('|', $value);
        $price = compact('AMOUNT', 'CURRENCY');
    }

    return $price;
}
