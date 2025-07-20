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
/** @var MuttiFooterComponent $component */
$this->setFrameMode(true); ?>

<div class="footer-block footer-logo">
    <a class="footer-brand" href="/">
        <img id="footerLogo" alt="Mutti Villas"/>
    </a>
    <button class="footer-action" type="button" data-messenger="whatsapp"><?= $arParams['CALLBACK_NAME'] ?></button>
</div>
