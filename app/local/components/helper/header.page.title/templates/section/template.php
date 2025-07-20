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

<section class="section subtitle">
    <div class="container">
        <h2 class="section__subtitle"><?= htmlspecialchars($arResult['TITLE']) ?></h2><?
        if (!empty($arResult['DESCRIPTION'])): ?>
            <p class="section__description"><?= htmlspecialchars($arResult['DESCRIPTION']) ?></p><?
        endif; ?>
    </div>
</section>
