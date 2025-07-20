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
/** @var MuttiPageContactsComponent $component */
$this->setFrameMode(true); ?>

<main class="content-page <?=($arParams['ASIDE_VIEW'] ? 'col-lg-10' : 'col-lg') ?>" id="content-page" itemscope itemtype="http://schema.org/ItemList"><?
    $sectionCounter = 1;
    foreach ($arResult['ITEMS'] as $sectionCode => $section) { ?>
        <section class="section section-<?=$sectionCode?>" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" id="<?=$sectionCode?>">
            <meta itemprop="position" content="<?=$sectionCounter?>" />
            <h2 class="section-title" itemprop="name"><?=$section['NAME']?></h2>
            <div class="section-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <picture itemprop="image" itemscope itemtype="https://schema.org/ImageObject" >
                    <source srcset="<?= $section['PICTURE']['SRC_2X'] ?>" media="(min-width: 768px)" type="image/webp" class="img-fluid">
                    <source srcset="<?= $section['PICTURE']['SRC_1X'] ?>" type="image/webp" class="img-fluid">
                    <img src="<?=$section['PICTURE']['SRC']?>" alt="<?=$section['NAME']?>" itemprop="contentUrl" class="img-fluid">
                </picture>
                <meta itemprop="width" content="<?=$section['PICTURE']['WIDTH']?>" />
                <meta itemprop="height" content="<?=$section['PICTURE']['HEIGHT']?>" />
            </div>
            <div class="section-list" itemscope itemtype="http://schema.org/ItemList"><?
                $elementCounter = 1;
                foreach ($section['ITEMS'] as $elementCode => $element) {?>
                <article class="section-item section-item-<?=$elementCode?>" id="<?=$elementCode?>" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <meta itemprop="position" content="<?=$elementCounter?>" />
                    <h3 class="section-item__title" itemprop="name"><?=$element['NAME']?></h3>
                    <div class="section-item__description" itemprop="description"><?=$element['PREVIEW_TEXT']?></div>
                    </article><?
                    $elementCounter++;
                } ?>
            </div>
        </section><?
        $sectionCounter++;
    } ?>
</main>
