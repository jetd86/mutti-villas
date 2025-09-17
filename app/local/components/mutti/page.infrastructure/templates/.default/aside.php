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
/** @var MuttiPageContactsComponent $component */
$this->setFrameMode(true);

if ($arParams['ASIDE_VIEW']): ?>
    <aside class="aside col-lg-2" id="aside"><?
        $APPLICATION->IncludeComponent("bitrix:menu", "aside.page.menu", [
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => ["SECTION_MENU"],
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "A",
                "MENU_CACHE_USE_GROUPS" => "N",
                "ROOT_MENU_TYPE" => "left",
                "USE_EXT" => "Y",
                'CALLBACK_NAME' => $arParams['CALLBACK_NAME'],
                'IBLOCK_CODE' => $arParams['IBLOCK_CODE'],
            ]
        ); ?>
    </aside><?
endif;?>

