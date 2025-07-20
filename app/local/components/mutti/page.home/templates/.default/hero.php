<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Config\Option;
use Mutti\Enum\OptionHomeEnum;
use Mutti\Enum\ModuleEnum;

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
$this->setFrameMode(true); ?>

<section class="section hero" id="hero">
    <div class="section-image"></div>
    <div class="section-container container">
        <div class="section-wrapper">
            <div class="section-title">
                <h1><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_HERO_TITLE->value)?></h1>
                <p><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_HERO_DESCRIPTION->value)?></p>
            </div>
        </div>
    </div>
</section>
