<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Mutti\Enum\OptionAboutEnum;

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
/** @var MuttiPageAboutComponent $component */
$this->setFrameMode(true);
$arSectionResult = $arResult['ITEMS']['about'];
$arSectionParams = $arParams + $component->getAboutParams(); ?>

<section class="section hero" id="hero">
    <div class="section-container container">
        <img class="section-image img-fluid" src="<?=$arSectionResult['PICTURE']['SRC']?>" alt="<?=$arSectionResult['NAME']?>">
        <ul class="section-stats">
            <li class="section-stats__item">
                <span class="section-stats__block section-stats__value"><?=$component::getModuleOption(OptionAboutEnum::ABOUT_STAT_PROPERTY_1_VALUE) ?></span>
                <span class="section-stats__block section-stats__name"><?= $component::getModuleOption(OptionAboutEnum::ABOUT_STAT_PROPERTY_1) ?></span>
            </li>
            <li class="section-stats__item">
                <span class="section-stats__block section-stats__value"><?=$component::getModuleOption(OptionAboutEnum::ABOUT_STAT_PROPERTY_2_VALUE) ?></span>
                <span class="section-stats__block section-stats__name"><?= $component::getModuleOption(OptionAboutEnum::ABOUT_STAT_PROPERTY_2) ?></span>
            </li>
            <li class="section-stats__item">
                <span class="section-stats__block section-stats__value"><?=$component::getModuleOption(OptionAboutEnum::ABOUT_STAT_PROPERTY_3_VALUE) ?></span>
                <span class="section-stats__block section-stats__name"><?= $component::getModuleOption(OptionAboutEnum::ABOUT_STAT_PROPERTY_3) ?></span>
            </li>
        </ul>
    </div>
</section>
