<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Context;

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
$this->setFrameMode(true);
$culture = Context::getCurrent()->getCulture();
?>

<div class="section section-slider swiper swiper-homepage-construction" id="slider-homepage-construction">
    <div class="section-wrapper swiper-wrapper"><?
        foreach ($arResult['ITEMS'] ?: [] as $element) {?>
        <div class="slider-slide swiper-slide" data-group="<?= $element['GROUP'] ?>">
            <div class="slider-wrapper">
                <a
                    class="slider-link"
                    href="<?= $element['SRC'] ?>"
                    data-glightbox="construction"
                    data-gallery="construction"
                    data-title="<?= $element['GROUP'] ?>">
                    <picture>
                        <source srcset="" data-srcset="<?= $element['SRC_2X'] ?>" media="(min-width: 768px)" type="image/webp">
                        <source srcset="" data-srcset="<?= $element['SRC_1X'] ?>" type="image/webp">
                        <img
                            class="lazyload"
                            data-src="<?= $element['SRC'] ?>"
                            alt="<?= htmlspecialchars($element['GROUP']) ?>"
                            loading="lazy"
                        >
                    </picture>
                </a>
            </div>
            </div><?
        } ?>
    </div>
    <div class="section-navigate">
        <div class="swiper-button-prev">
            <i class="bi bi-arrow-left-short"></i>
        </div>
        <div class="swiper-button-next">
            <i class="bi bi-arrow-right-short"></i>
        </div>
    </div
    <?
    // Пагинация
    if ($arParams['PROPERTIES']['PAGINATION']): ?>
        <div class="slider-pagination swiper-pagination"></div><?
    endif; ?>
</div>
<div class="slider-heading" id="slider-heading" data-lang="<?=$culture->getCode()?>"><?=$arResult['FIRST_GROUP_NAME']?></div>
