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

<section class="section slider swiper" id="slider-<?=$arParams['ID']?>">
    <div class="section-wrapper swiper-wrapper"><?
        foreach (array_values($arParams['SLIDER']) as $key => $item): ?>
            <div class="section-slide swiper-slide">
                <img src="<?= $item['SRC'] ?>" class="img-fluid" alt="Изображение: <?=$arParams['NAME'] . ' ' .  $key + 1 ?>"
                     itemprop="image" itemscope itemtype="https://schema.org/ImageObject" />
            </div><?
        endforeach; ?>
    </div><?
    // стрелки
    if ($arParams['PROPERTIES']['BUTTON']): ?>
        <div class="section-button section-button__next swiper-button-next"></div>
        <div class="section-button section-prev swiper-button-prev"></div><?
    endif;

    // пагинация
    if ($arParams['PROPERTIES']['PAGINATION']): ?>
        <div class="section-pagination swiper-pagination"></div><?
    endif; ?>
</section>
