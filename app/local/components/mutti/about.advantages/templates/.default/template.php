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
/** @var MuttiAboutAdvantagesComponent $component */
$this->setFrameMode(true);

s($arResult);

if (count($arResult['ITEMS']) > 0) { ?>
<section class="section-offset section-<?= $component->getComponentName() ?>">
  <div class="container">
    <header class="field-header">
      <h2 class="field-title"><?= $arParams['TITLE'] ?></h2>
    </header>
    <ul class="field-list"><?
      foreach ($arResult['ITEMS'] ?: [] as $key => $item) { ?>
        <li class="field-list-item field-item">
          <p class="field-item-title">
            <span class="field-title-count">0<?= $key + 1 ?> <i class="bi bi-dash"></i></span>
            <span class="field-title-name"><?= $item['NAME'] ?></span>
          </p>
          <p class="field-item-content"><?=$item['PREVIEW_TEXT']?></p>
        </li><?
      } ?>
    </ul>
  </div>
  </section><?
} ?>
