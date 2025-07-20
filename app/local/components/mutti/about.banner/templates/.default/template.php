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
/** @var MuttiAboutBannerComponent $component */
$this->setFrameMode(true); ?>

<section class="section-offset section-<?=$component->getComponentName()?>">
  <div class="container">
    <div class="row">
      <div class="col-md field-col field-content"><?
        $APPLICATION->IncludeComponent(componentName: 'bitrix:main.include', componentTemplate: '', arParams: [
          'AREA_FILE_SHOW' => 'file',
          'PATH' => SITE_TEMPLATE_PATH . '/include/about_banner_content.php',
        ]); ?></div>
      <div class="col-md field-col field-banner">
        <div id="aboutBannerContainer">
          <p class="field-text"><?=$arParams['TITLE']?></p>
          <a class="field-action" href="<?=$arParams['LINK']?>" target="_blank">
            <i class="bi bi-arrow-right-short"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
