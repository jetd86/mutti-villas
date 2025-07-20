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

<section class="section block" id="info">
    <div class="section-container container">
        <div class="section-row row">
            <div class="section-col col-12 col-lg-6 offset-lg-1">
                <div class="section-description">
                    <?= Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_DESCRIPTION->value)?>
                    <button class="btn btn-link">
                        <span class="section-button__name"
                              data-messenger="<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_DESCRIPTION_BUTTON_MESSENGER->value)?>"
                              data-text="<?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT->value)?>">
                            <?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_DESCRIPTION_BUTTON->value)?>
                        </span>
                        <i class="section-button__icon bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
            <div class="section-col col-12 col-lg-4 offset-lg-1">
                <div class="section-banner">
                    <div class="section-banner__inner">
                        <video class="section-banner__video" autoplay muted loop playsinline preload="auto">
                            <source type="video/mp4" src="<?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_BANNER_VIDEO->value)?>" />
                            <?php /* <img alt="3D тур" src="<?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_BANNER_IMAGE->value)?>" /> */ ?>
                        </video>
                        <p class="section-banner__text"><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_BANNER_TEXT->value)?></p>
                    </div>

                    <a class="section-banner__action" href="<?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_BANNER_LINK->value)?>" target="_blank">
                        <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-container container">
        <div class="section-row grid">
            <div class="section-col section-grid">
                <span class="section-grid__value"><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_PROPERTY_1->value)?></span>
                <span class="section-grid__name"><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_PROPERTY_1_VALUE->value)?></span>
            </div>
            <div class="section-col section-grid">
                <span class="section-grid__value"><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_PROPERTY_2->value)?></span>
                <span class="section-grid__name"><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_PROPERTY_2_VALUE->value)?></span>
            </div>
            <div class="section-col section-grid">
                <span class="section-grid__value"><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_PROPERTY_3->value)?></span>
                <span class="section-grid__name"><?=Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_INFO_PROPERTY_3_VALUE->value)?></span>
            </div>
        </div>
    </div>
</section>
