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
/** @var MuttiFooterLogoComponent $component */
$this->setFrameMode(true); ?>

<div class="col-md field-footer <?= $component->getComponentName() ?>">
    <div class="footer-wrapper">
        <div class="field-logo" id="footerLogoContainer"></div>
        <div class="field-button">
            <button type="button" data-messenger="whatsapp" data-text="Здравствуйте, "><?= $arParams['CALLBACK_NAME'] ?></button>
        </div>
    </div>
</div>
