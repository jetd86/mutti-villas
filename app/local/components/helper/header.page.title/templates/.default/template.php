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
/** @var HelperPageTitleComponent $component */
$this->setFrameMode(true); ?>

<header class="section title" id="title">
    <div class="container">
        <div class="section-header<?=$component->viewButton() ? ' button' : ''?>">
            <h1 class="section-header__title"><?= htmlspecialchars($arResult['TITLE']) ?></h1><?
            if (!empty($arResult['SUBTITLE'])): ?>
                <p class="section-header__subtitle"><?= htmlspecialchars($arResult['SUBTITLE']) ?></p><?
            endif;
            if ($component->viewButton()):?>
                <a class="section-header__button btn btn-link" data-messenger="whatsapp"<?=($arParams['HEADER_BUTTON_TEXT'] ? ' data-text="' . $arParams['HEADER_BUTTON_TEXT'] . '"' : '')?>>
                    <span class="section-header__button-name"><?= $arParams['HEADER_BUTTON'] ?></span><?
                    if ($arParams['HEADER_BUTTON_ICON']):?>
                        <span class="section-header__button-icon bi bi-<?= ($arParams['HEADER_BUTTON_ICON']) ?>"></span><?
                    endif; ?>
                </a><?
            endif; ?>
        </div>
    </div>
</header>
