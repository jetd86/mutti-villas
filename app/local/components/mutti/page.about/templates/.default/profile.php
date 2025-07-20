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
/** @var MuttiPageAboutComponent $component */
$this->setFrameMode(true);
$previewTextTypeHtml = 'html';
$previewTextTypeText = 'text';

$arSectionResult = $arResult['ITEMS']['profile'];
$arSectionParams = $arParams;
?>

<section class="section <?= $arSectionResult['CODE'] ?>" id="<?= $arSectionResult['CODE'] ?>">
    <div class="section-container container">
        <h2 class="section-title"><?= $arSectionResult['NAME'] ?></h2>
        <div class="section-row row">
            <div class="section-col section-col__description col-12 col-lg-8">
                <?=$arSectionResult['DESCRIPTION'] ?>
            </div>
            <div class="section-col section-col__image col-12 col-lg-4">
                <div class="section-image">
                    <img src="<?=$arSectionResult['PICTURE']['SRC']?>" alt="<?=$arSectionResult['NAME']?>" />
                </div>
            </div>
        </div>
    </div>
</section>

