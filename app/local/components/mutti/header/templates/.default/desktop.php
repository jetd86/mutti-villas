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
/** @var MuttiHeaderComponent $component */
$this->setFrameMode(true);
$APPLICATION->IncludeComponent("bitrix:menu", "header.menu", [
        "DELAY" => "Y",
        "MAX_LEVEL" => "1",
        "MENU_CACHE_GET_VARS" => ["HEADER_MENU"],
        "MENU_CACHE_TIME" => "3600",
        "MENU_CACHE_TYPE" => "A",
        "MENU_CACHE_USE_GROUPS" => "N",
        "ROOT_MENU_TYPE" => "top",
        "USE_EXT" => "N",
        'CALLBACK_NAME' => $arParams['CALLBACK_NAME'],
    ]
);
