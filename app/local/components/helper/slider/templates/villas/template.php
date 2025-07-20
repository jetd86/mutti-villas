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
/** @var HelperSliderComponent $component */
$this->setFrameMode(true); ?>

<div class="section section-slider swiper <?= $arResult['SLIDER_ID'] ?>" id="slider-<?= $arResult['ID'] ?>">
    <div class="section-wrapper swiper-wrapper"><?
        foreach ($arResult['ITEMS'] ?: [] as $key => $element) { ?>
            <div class="section-slide swiper-slide">
                <picture itemprop="image" itemscope itemtype="https://schema.org/ImageObject" >
                    <source srcset="<?= $element['SRC_2X'] ?>" media="(min-width: 768px)" type="image/webp" class="img-fluid">
                    <source srcset="<?= $element['SRC_1X'] ?>" type="image/webp" class="img-fluid">
                    <img src="<?= $element['SRC'] ?>" alt="Изображение: <?=$arParams['NAME'] . ' ' .  $key + 1 ?>" class="img-fluid">
                </picture>
            </div><?
        } ?>
    </div><?
    // стрелки
    if ($arParams['PROPERTIES']['BUTTON']): ?>
        <div class="section-button section-button__next swiper-button-next">
            <i class="bi bi-chevron-compact-right"></i>
        </div>
        <div class="section-button section-button__prev swiper-button-prev">
            <i class="bi bi-chevron-compact-left"></i>
        </div><?
    endif;
    // Пагинация
    if ($arParams['PROPERTIES']['PAGINATION']): ?>
        <div class="section-pagination swiper-pagination"></div><?
    endif; ?>
</div>
