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
/** @var MuttiAboutContentComponent $component */
$this->setFrameMode(true); ?>

<section class="section-offset section-<?= $component->getComponentName() ?>">
  <div class="container">
    <header class="field-header">
      <h2 class="field-title"><?= $arParams['TITLE'] ?></h2>
    </header>
    <div class="row">
      <div class="col-md field-col field-content"><?
        $APPLICATION->IncludeComponent(componentName: 'bitrix:main.include', componentTemplate: '', arParams: [
          'AREA_FILE_SHOW' => 'file',
          'PATH' => SITE_TEMPLATE_PATH . '/include/about_content.php',
        ]); ?></div>
      <div class="col-md field-col field-banner">
        <div id="aboutContentContainer"></div>
      </div>
    </div>
  </div>
</section>
