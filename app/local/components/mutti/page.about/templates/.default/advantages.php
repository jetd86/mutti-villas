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

$arSectionResult = $arResult['ITEMS']['advantages'];
$arSectionParams = $arParams;
?>

<section class="section <?= $arSectionResult['CODE'] ?>" id="<?= $arSectionResult['CODE'] ?>">
    <div class="section-container container">
        <h2 class="section-title"><?= $arSectionResult['NAME'] ?></h2>
        <div class="section-list"><?
            foreach (array_values($arSectionResult['ITEMS']) as $key => $advantages) {
                $key++;?>
                <div class="section-list__item" id="<?= $advantages['CODE'] ?>">
                <div class="section-list__row row">
                    <div class="section-list__col col-12 col-lg-1 offset-lg-1">
                        <span class="section-list__item-count">0<?=$key?></span>
                    </div>
                    <div class="section-list__col col-12 col-lg-9">
                        <h3 class="section-list__item-header">
                            <span class="section-list__item-header--name" data-count="0<?=$key?> —"><?= $advantages['NAME'] ?></span>
                        </h3>
                        <div class="section-list__item-description"><?
                            if ($advantages['PREVIEW_TEXT_TYPE'] === $previewTextTypeHtml) { ?>
                                <?= $advantages['PREVIEW_TEXT'] ?><?
                            } else { ?>
                                <p><?= $advantages['PREVIEW_TEXT'] ?></p><?
                            } ?>
                        </div>
                    </div>
                </div>
                </div><?
            } ?>
        </div>
    </div>
</section>

