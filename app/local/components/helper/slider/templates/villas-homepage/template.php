<?php

use Bitrix\Main\Localization\Loc;

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
/** @var HelperSliderComponent $component */
$this->setFrameMode(true); ?>

<div class="section section-slider swiper swiper-homepage-villas" id="slider-homepage-villas">
    <div class="section-wrapper swiper-wrapper"><?
        foreach ($arResult['ITEMS'] ?: [] as $element) { ?>
            <div class="swiper-slide">
                <meta name="format-detection" content="telephone=no">
                <div class="section-container">
                    <div class="section-block section-info">
                        <div class="section-title">
                            <h2><?= $element['NAME'] ?></h2>
                        </div>
                        <div class="section-content">
                            <?= $element['DESCRIPTION'] ?>
                        </div>
                        <div class="section-properties"><?
                            foreach ($element['PROPERTIES'] ?: [] as $property) { ?>
                                <div class="section-properties__item">
                                    <div class="section-properties__title"><?=$property['TITLE']?></div>
                                    <div class="section-properties__value"><?=$property['VALUE']?></div>
                                </div>
                            <? } ?>
                        </div>
                        <div class="section-control">
                            <div class="section-price">
                                <?= sprintf(
                                    Loc::getMessage('PRICE_FROM') . ' %s %s',
                                    number_format($element['PRICE']['AMOUNT'], 0, '', ' '),
                                    $element['PRICE']['CURRENCY']
                                ) ?>
                            </div>
                        </div>
                    </div>
                    <div class="section-block section-image" style="background-image: url(<?=$element['PICTURE']['SRC']?>)">
                        <a href="/villas/#<?= $element['CODE'] ?>" class="section-action">
                            <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                </div>
            </div><?
        }?>
    </div><?
    if ($arParams['PROPERTIES']['BUTTON']): ?>
        <div class="section-navigate">
            <div class="swiper-button-prev">
                <i class="bi bi-arrow-left-short"></i>
            </div>
            <div class="swiper-button-next">
                <i class="bi bi-arrow-right-short"></i>
            </div>
        </div><?
    endif;
    // Пагинация
    if ($arParams['PROPERTIES']['PAGINATION']): ?>
        <div class="swiper-pagination"></div><?
    endif; ?>
</div>
