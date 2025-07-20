<?php

use App\Enum\IBlockCode;

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
/** @var MuttiPageHomeComponent $component */
$this->setFrameMode(true);
$arSectionResult = $arResult['ITEMS'][$component->getTemplatePage()]; ?>

<section class="section block" id="construction">
    <div class="section-container container">
        <div class="section-row grid">
            <div class="section-grid section-grid__title">
                <div class="grid-wrapper">
                    <h2 class="section-title"><?=$arSectionResult['NAME']?></h2><?
                    if ($arSectionResult['UF_SUB_TITLE']): ?>
                        <p class="section-subtitle"><?=$arSectionResult['UF_SUB_TITLE']?></p><?
                    endif; ?>
                </div>
                <div class="grid-wrapper">

                </div>
            </div>
            <div class="section-grid section-grid__slider"><?
                $APPLICATION->IncludeComponent('helper:slider', 'construction-homepage', [
                    'ID' => IBlockCode::STORAGE_CONSTRUCTION->value,
                    'PROPERTIES' => [
                        'BUTTON' => true,
                        'PAGINATION' => false,
                    ],
                ], $component, ['HIDE_ICONS' => 'Y']);?>
            </div>
        </div>
    </div>
</section>
