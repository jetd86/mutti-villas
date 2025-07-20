<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Mutti\Enum\OptionAboutEnum;
use Mutti\Enum\OptionHomeEnum;

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

<section class="section about" id="about">
    <div class="section-container container">
        <div class="section-row row">
            <div class="section-description col-12 col-lg-5 offset-lg-1">
                <?=$arSectionResult['DESCRIPTION'];?>
                <button type="button" class="btn btn-link">
                    <span class="section-description__title"
                          data-messenger="<?= $component::getModuleOption(OptionAboutEnum::ABOUT_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT)?>"
                          data-text="<?= $component::getModuleOption(OptionAboutEnum::ABOUT_INFO_DESCRIPTION_BUTTON_MESSENGER)?>">
                        <?=$component::getModuleOption(OptionAboutEnum::ABOUT_INFO_DESCRIPTION_BUTTON)?>
                    </span>
                    <i class="bi bi-arrow-right"></i>
                </button>
            </div>
            <div class="section-banner col-12 offset-lg-1 col-lg-4">
                <div class="section-banner__inner">
                    <video class="section-banner__video" autoplay muted loop playsinline preload="auto">
                        <source type="video/mp4" src="<?=$component::getModuleOption(OptionHomeEnum::HOME_INFO_BANNER_VIDEO) ?>" />
                        <?php /* <img alt="3D тур" src="<?=$component::getModuleOption(OptionHomeEnum::HOME_INFO_BANNER_IMAGE) ?>" /> */ ?>
                    </video>
                    <p class="section-banner__text"><?=$component::getModuleOption(OptionHomeEnum::HOME_INFO_BANNER_TEXT) ?></p>
                </div>

                <a class="section-banner__action" href="<?=$component::getModuleOption(OptionHomeEnum::HOME_INFO_BANNER_LINK)?>" target="_blank">
                    <i class="bi bi-arrow-right-short"></i>
                </a>
            </div>
        </div>
    </div>
</section>
