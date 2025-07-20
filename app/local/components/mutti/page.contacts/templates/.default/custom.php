<?php

use Bitrix\Main\Config\Option;
use Mutti\Enum\ModuleEnum;
use Mutti\Enum\OptionHomeEnum;

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
$this->setFrameMode(true); ?>

<section class="section block" id="custom">
    <div class="section-container container">
        <?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_DESCRIPTION_CONTENT->value)?>
    </div>
</section>
