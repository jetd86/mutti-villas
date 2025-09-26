<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use App\Enum\IBlockCode;
use Bitrix\Main\Config\Option;
use Mutti\Enum\OptionHomeEnum;
use Mutti\Enum\ModuleEnum;

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

<section class="section block" id="villas">
    <div class="section-container container">
        <div class="section-row grid">
            <div class="section-grid section-grid__title">
                <h2 class="section-title"><?=$arSectionResult['NAME']?></h2>
            </div>
            <div class="section-grid section-grid__button">
                <div class="section-button">
                    <a class="btn btn-link" href="/villas/">
                        <span class="section-button__name"><?= Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_VILLAS_TITLE_BUTTON->value)?></span>
                        <i class="section-button__icon bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="section-grid section-grid__slider"><?
                $APPLICATION->IncludeComponent('helper:slider', 'villas-homepage', [
                    'ID' => IBlockCode::PAGE_VILLAS->value,
                    'PROPERTIES' => [
                        'BUTTON' => true,
                        'PAGINATION' => false,
                    ],
                ], $component, ['HIDE_ICONS' => 'Y']);?>
            </div>
        </div>
    </div>
</section>
