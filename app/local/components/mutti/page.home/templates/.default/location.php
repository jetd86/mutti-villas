<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

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
$arSectionResult = $arResult['ITEMS'][$component->getTemplatePage()];
?>

<section class="section block" id="location">
    <div class="section-container container">
        <div class="section-row row">
            <div class="section-col col-12 col-lg-6">
                <div class="section-block">
                    <h2 class="section-title"><?= $arSectionResult['NAME'] ?></h2>
                    <div class="section-description">
                        <?= $arSectionResult['DESCRIPTION'] ?>
                        <a class="btn btn-link" href="/location/">
                            <span class="section-button__name"><?= Option::get(ModuleEnum::MODULE_NAME->value, OptionHomeEnum::HOME_LOCATION_CALLBACK_BUTTON->value)?></span>
                            <i class="section-button__icon bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="section-block section-list"><?
                    foreach (array_values($arSectionResult['ITEMS']) as $key => $item) { ?>
                        <div class="section-list__item" data-item="<?=$key?>">
                            <div class="section-list__wrapper">
                                <div class="section-list__item--name"><?= $item['NAME'] ?></div>
                            </div>
                        </div><?
                    } ?>
                </div>
            </div>
            <div class="section-col col-12 col-lg-6 section-map-col">
                <div class="section-block section-map"><?
                    foreach (array_values($arSectionResult['ITEMS']) as $key => $item) { ?>
                        <a class="section-map__link" href="javascript:void(0)" data-item="<?=$key?>">
                            <div class="section-map__wrapper">
                                <span class="section-map__item--icon"
                                      data-icon="<?= $item['PICTURE'] ?>">
                                </span>
                                <span class="section-map__item--name"><?= $item['NAME'] ?></span>
                            </div>
                        </a><?
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
