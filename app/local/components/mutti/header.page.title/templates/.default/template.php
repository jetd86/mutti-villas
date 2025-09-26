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
/** @var MuttiHeaderPageTitleComponent $component */
$this->setFrameMode(true);
$viewButton = $arParams['HEADER_BUTTON'] && $arParams['HEADER_BUTTON_LINK']; ?>

<section class="section-offset section-<?= $component->getComponentName() ?>">
    <div class="container">
        <div class="section-header<?=$viewButton ? ' section-header-button' : ''?>">
            <h1 class="header-page-title"><?= $arParams['HEADER_TITLE'] ?: $APPLICATION->GetPageProperty("title") ?></h1><?
            if ($viewButton): ?>
                <a class="btn btn-link header-page-button" href="<?=$arParams['HEADER_BUTTON_LINK']?>">
                <span class="link-title"><?=$arParams['HEADER_BUTTON']?></span>
                <span class="link icon bi bi-<?=($arParams['HEADER_BUTTON_ICON'])?>"></span>
                </a><?
            endif;?>
        </div>
    </div>
</section>
