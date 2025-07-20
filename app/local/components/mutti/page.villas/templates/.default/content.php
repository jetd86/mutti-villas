<?php

use Bitrix\Main\Localization\Loc;
use Mutti\Enum\OptionVillasEnum;

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
        <section class="section-item section-item__<?=$sectionCode?>" itemscope itemtype="https://schema.org/SingleFamilyResidence" id="<?=$sectionCode?>">

            <meta itemprop="position" content="<?=$sectionCounter?>" /><?
            $APPLICATION->IncludeComponent('helper:slider', 'villas', [
                'ID' => $sectionCode,
                'NAME' => $section['NAME'],
                'ITEMS' => [$section['PICTURE']] + $section['UF_GALLERY'],
                'SLIDER_ID' => 'swiper-slider-' . $sectionCounter,
                'PROPERTIES' => [
                    'BUTTON' => true,
                    'PAGINATION' => true,
                ],
            ], $component, ['HIDE_ICONS' => 'Y']);?>
            <meta itemprop="position" content="<?=$sectionCounter?>" />
            <h2 class="section-title" itemprop="name"><?=$section['NAME']?></h2>
            <div class="section-description" itemprop="description">
                <?=$section['DESCRIPTION']?>
            </div><?
            if ($properties = $component->getSectionProperties($section)): ?>
                <ul class="section-properties"><?
                if ($bedrooms = $component->getProperty($properties, $component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_1))): ?>
                    <li class="section-properties__item">
                        <span class="section-properties__title"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_1)?></span>
                        <span class="section-properties__value" itemprop="additionalProperty" itemscope itemtype="https://schema.org/PropertyValue">
                            <meta itemprop="name" content="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_1)?>" />
                            <span itemprop="value"><?=$bedrooms?></span>
                        </span>
                    </li><?
                endif;
                if ($poolJacuzziSize = $component->getProperty($properties, $component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_2))): ?>
                    <li class="section-properties__item">
                        <span class="section-properties__title"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_2)?></span>
                        <span class="section-properties__value" itemprop="additionalProperty" itemscope itemtype="https://schema.org/PropertyValue">
                            <meta itemprop="name" content="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_2)?>" />
                            <span itemprop="value"><?=$poolJacuzziSize?></span>
                        </span>
                    </li><?
                endif;
                if ($guestHouseSize = $component->getProperty($properties, $component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_3))): ?>
                    <li class="section-properties__item">
                        <span class="section-properties__title"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_3)?></span>
                        <span class="section-properties__value" itemprop="additionalProperty" itemscope itemtype="https://schema.org/PropertyValue">
                            <meta itemprop="name" content="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_3)?>"/>
                            <span itemprop="value"><?=$guestHouseSize?></span>
                        </span>
                    </li><?
                endif;
                if ($square = $component->getProperty($properties, $component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_4))): ?>
                    <li class="section-properties__item">
                        <span class="section-properties__title"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_4)?></span>
                        <span class="section-properties__value" itemprop="additionalProperty" itemscope itemtype="https://schema.org/PropertyValue">
                            <meta itemprop="name" content="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_4)?>" />
                            <span itemprop="value"><?=$square?></span>
                        </span>
                    </li><?
                endif;
                if ($piece = $component->getProperty($properties, $component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_5))): ?>
                    <li class="section-properties__item">
                    <span class="section-properties__title"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_5)?></span>
                    <span class="section-properties__value" itemprop="additionalProperty" itemscope itemtype="https://schema.org/PropertyValue">
                        <meta itemprop="name" content="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_5)?>" />
                        <span itemprop="value"><?=$piece?></span>
                    </span>
                    </li><?
                endif;
                if ($building = $component->getProperty($properties, $component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_6))): ?>
                    <li class="section-properties__item">
                    <span class="section-properties__title"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_6)?></span>
                    <span class="section-properties__value" itemprop="additionalProperty" itemscope itemtype="https://schema.org/PropertyValue">
                        <meta itemprop="name" content="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_6)?>" />
                        <span itemprop="value"><?=$building?></span>
                    </span>
                    </li><?
                endif; ?>
                </ul><?
            endif; ?>

            <div class="section-footer">
                <div itemprop="offers" itemscope itemtype="https://schema.org/Offer" class="section-footer__price">
                    <meta itemprop="priceCurrency" content="THB" />
                    <meta itemprop="availability" content="https://schema.org/InStock" />
                    <span><?= Loc::getMessage('PRICE_FROM')?> <span itemprop="price"><?= $component->getPrice($section['UF_PRICE']) ?></span> <?=$component->getCurrency($section['UF_PRICE'])?></span>
                </div>

                <div class="section-footer__actions">
                    <a href="javascript:void(0)" class="btn btn-link"
                       data-bs-toggle="modal"
                       data-bs-target="#mainModal"
                       data-title="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_EQUIPMENT_BUTTON)?>"
                       data-content="content-equipment"
                       data-size="xl"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_EQUIPMENT_BUTTON)?></a>
                    <a class="btn btn-link" data-messenger="<?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_COMMUNICATE_BUTTON_MESSENGER)?>"
                          data-text="<?= sprintf(
                              $component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_COMMUNICATE_BUTTON_MESSENGER_TEXT),
                              $section['NAME'],
                              $_SERVER['SERVER_NAME']
                          ) ?>"><?=$component::getModuleOption(OptionVillasEnum::VILLAS_FIELD_COMMUNICATE_BUTTON)?> <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </section><?
        $sectionCounter++;
    } ?>
</main>
