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
$this->setFrameMode(true);

$component->includeComponentTemplate('hero');
$component->includeComponentTemplate('info');
$component->includeComponentTemplate('about');
$component->includeComponentTemplate('image');
$component->includeComponentTemplate('villas');
$component->includeComponentTemplate('promo');
$component->includeComponentTemplate('location');
$component->includeComponentTemplate('construction');
$component->includeComponentTemplate('contacts');
$component->includeComponentTemplate('custom');
$component->includeComponentTemplate('maps');
