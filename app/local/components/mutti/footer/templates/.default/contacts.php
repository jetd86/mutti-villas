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
/** @var MuttiFooterComponent $component */
$this->setFrameMode(true);
$APPLICATION->IncludeComponent('mutti:footer.contacts', '', [
    'OFFICE_ADDRESS' => $arParams['OFFICE_ADDRESS'],
    'OFFICE_PHONE_RU' => $arParams['OFFICE_PHONE_RU'],
    'OFFICE_PHONE_EN' => $arParams['OFFICE_PHONE_EN'],
    'OFFICE_EMAIL' => $arParams['OFFICE_EMAIL'],
    'SOCIAL_ICONS' => $arParams['SOCIAL_ICONS'],
    'CACHE_TYPE' => $arParams['CACHE_TYPE'],
    'CACHE_TIME' => $arParams['CACHE_TIME'],
], $component, ['HIDE_ICONS' => 'Y']);
