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

<div class="footer-container container">
    <div class="footer-row"><?
        $component->IncludeComponentTemplate('logo');
        $component->IncludeComponentTemplate('menu');
        $component->IncludeComponentTemplate('contacts'); ?>
    </div>
</div>
<div class="footer-container container">
    <div class="footer-row"><?
        $component->IncludeComponentTemplate('bottom'); ?>
    </div>
</div>
