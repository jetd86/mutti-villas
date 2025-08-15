<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

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
/** @var MuttiPageHomeComponent $component */
$this->setFrameMode(true);
$arSectionResult = $arResult['ITEMS']['about']; ?>


<section class="section block" id="about">
    <div class="section-container container">
        <div class="section-row grid">
            <div class="section-grid section-grid__title">
                <h2 class="section-title"><?=$arSectionResult['NAME']?></h2>
            </div>
            <div class="section-grid section-grid__description">
                <div class="section-row grid description">
                    <div class="section-grid section-grid__description--left">
                        <div class="section-description">
                            <p><?= $component::getModuleOption(OptionHomeEnum::HOME_ABOUT_DESCRIPTION_LEFT) ?></p>
                        </div>
                    </div>
                    <div class="section-grid section-grid__description--right">
                        <div class="section-description">
                            <p><?= $component::getModuleOption(OptionHomeEnum::HOME_ABOUT_DESCRIPTION_RIGHT) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-grid section-grid__button">
                <div class="section-button">
                    <a class="btn btn-link" href="/infrastructure/">
                        <span class="section-button__name"><?= $component::getModuleOption(OptionHomeEnum::HOME_ABOUT_TITLE_BUTTON) ?></span>
                        <i class="section-button__icon bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="section-grid section-grid__tags">
                <div class="section-tags">
                    <ul class="section-tags__list"><?php
                        foreach ($component->getTagsElements() ?: [] as $tag) { ?>
                            <li class="section-tags__item"><?= $tag['NAME'] ?></li><?php
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="section-grid section-grid__advantages">
                <div class="section-advantages offset-lg-2">
                    <ul class="section-advantages__list"><?php
                        foreach ($arResult['ITEMS']['ICONS'] as $icon) { ?>
                            <li class="section-advantages__item">
                                <div class="section-advantages__item--wrapper">
                                    <div class="section-advantages__item--icon">
                                        <img src="<?=$icon['SRC_48']?>"
                                             alt=""
                                             class="img-fluid" />
                                    </div>
                                    <div class="section-advantages__item--name"><?=$icon['NAME']?></div>
                                </div>
                            </li><?php
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
