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
/** @var MuttiPageLocationComponent $component */
$this->setFrameMode(true); ?>

<section class="section master-plan" id="master-plan">
    <h2 class="section-title"><?=\Bitrix\Main\Localization\Loc::getMessage('MASTER_PLAN_TITLE')?></h2>
    <div class="section-wrapper">
        <div class="section-image section-plan">
            <div class="section-image section-plan-banner"></div>
            <div class="section-image section-plan-cert"></div>
        </div>
        <ul class="section-legend">
            <li class="legend-item legend-azure">Azure Villa</li>
            <li class="legend-item legend-breeze">Breeze Villa</li>
            <li class="legend-item legend-coral">Coral Villa</li>
            <li class="legend-item legend-рearl">Рearl Villa</li>
        </ul>
    </div>
</section>
