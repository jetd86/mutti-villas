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

$arSectionResult = $arResult['ITEMS']['philosophy'];
$arSectionParams = $arParams;
?>

<section class="section <?= $arSectionResult['CODE'] ?>" id="<?= $arSectionResult['CODE'] ?>">
    <div class="section-container container">
        <h2 class="section-title"><?= $arSectionResult['NAME'] ?></h2>
        <div class="section-row row"><?
            foreach (array_values($arSectionResult['ITEMS']) as $key => $philosophy) { ?>
                <div class="section-col col-12 col-lg-6">
                    <div class="section-description"><?
                        if ($philosophy['PREVIEW_TEXT_TYPE'] === $previewTextTypeHtml) { ?>
                            <?= $philosophy['PREVIEW_TEXT'] ?><?
                        } else { ?>
                            <p><?= $philosophy['PREVIEW_TEXT'] ?></p><?
                        } ?>
                    </div>
                </div><?
            } ?>
        </div>
        <div class="section-row section-row__image row">
            <div class="section-col section-col__image col">
                <div class="section-image">
                    <img src="<?=$arSectionResult['PICTURE']['SRC']?>" alt="<?=$arSectionResult['NAME']?>" />
                </div>
            </div>
        </div>
    </div>
</section>

