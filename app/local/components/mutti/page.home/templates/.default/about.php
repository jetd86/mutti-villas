<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Mutti\Enum\OptionHomeEnum;

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
/** @var MuttiPageHomeComponent $component */
$this->setFrameMode(true);
$arSectionResult = $arResult['ITEMS']['about'];
include $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/mutti-core.php';
?>


<section class="section block" id="about">
    <div class="section-container container">
        <div class="section-row grid">
            <div class="section-grid section-grid__title">
                <h2 class="section-title"><?=$arSectionResult['NAME']?></h2>
            </div>
            <div class="section-grid section-grid__description">
                <div class="section-row grid description">
                    <div class="section-grid section-grid__description--left">
                        <div class="section-description">
                            <?= $component::getModuleOption(OptionHomeEnum::HOME_ABOUT_DESCRIPTION_LEFT) ?>
                        </div>
                    </div>
                    <div class="section-grid section-grid__description--right">
                        <div class="section-description">
                            <?= $component::getModuleOption(OptionHomeEnum::HOME_ABOUT_DESCRIPTION_RIGHT) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-grid section-grid__button">
                <div class="section-button">
                    <a class="btn btn-link" href="/infrastructure/">
                        <span class="section-button__name"><?= $component::getModuleOption(OptionHomeEnum::HOME_ABOUT_TITLE_BUTTON) ?></span>
                        <i class="section-button__icon bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="section-grid section-grid__tags">
                <div class="section-tags">
                    <ul class="section-tags__list">
                        <?php
                            for ($i= 1; $i <=10; $i++){ ?>
                                <?php if(empty($mutti_core['global_field_mainpage_links_' . $i . '_field']['VALUE'])) continue; ?>
                                <li class="section-tags__item"><a target="_blank" href='<?php echo $mutti_core['global_field_mainpage_links_' . $i . '_field']['VALUE'];?>'><?php echo $mutti_core['global_field_mainpage_link_' . $i . '_field_text']['VALUE'];?></a></li>
                          <?php  }?>
                    </ul>
                </div>
            </div>
            <div class="section-grid section-grid__advantages">
                <div class="section-advantages offset-lg-2">
                    <ul class="section-advantages__list"><?php
                        foreach ($arResult['ITEMS']['ICONS'] as $icon) { ?>
                            <li class="section-advantages__item">
                              <a href="<?php echo $icon['ICON']['LINK']; ?>" target="_blank" style="text-decoration: none;"> <div class="section-advantages__item--wrapper">
                                    <div class="section-advantages__item--icon">
                                        <img src="<?=$icon['SRC_48']?>"
                                             alt="<?= 'Mutti Villas ' . $icon['NAME']?>"
                                             class="img-fluid">
                                    </div>
                                    <div class="section-advantages__item--name"><?=$icon['NAME']?></div>
                                </div></a>
                            </li><?php
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
