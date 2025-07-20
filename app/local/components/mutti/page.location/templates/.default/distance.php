<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
  die();

use App\Helper\IOHelper;
use Bitrix\Main\Localization\Loc;

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

<section class="section distance" id="distance">
    <div class="container">
        <h2 class="section-header" itemprop="name"><?= $arParams['OBJECTS_DISTANCE_TITLE'] ?></h2>
        <table class="section-table" itemscope itemtype="http://schema.org/ItemList">
            <thead class="section-table__header">
            <tr>
                <th class="section-table__title" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><?= Loc::getMessage('DISTANCE_OBJECT')?></th>
                <th class="section-table__title" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><?= Loc::getMessage('DISTANCE_SPACING')?></th>
                <th class="section-table__title" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><?= Loc::getMessage('DISTANCE_BY_CAR')?></th>
                <th class="section-table__title" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><?= Loc::getMessage('DISTANCE_ON_FOOT')?></th>
            </tr>
            </thead>
            <tbody><?
            foreach ($arResult['ITEMS'] as $sectionCode => $arSection):
                $elementKey = 0;
                $sectionIcon = $arSection['UF_ICON']['SRC'];
                foreach ($arSection['ITEMS'] as $elementCode => $arElement): ?>
                    <tr itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"
                        class="section-table__wrapper<?=($elementKey === 0 ? ' header' : '')?>">
                        <td class="section-table__column section-table__object<?=($elementKey === 0 ? ' header' : '')?>" itemprop="name">
                            <div class="section-table__object-wrapper">
                                <div class="section-table__object-icon<?=($elementKey === 0 ? ' header' : '')?>">
                                    <?=($elementKey === 0 && IOHelper::existFile($sectionIcon) ? IOHelper::getFileContent($sectionIcon) : '')?>
                                </div>
                                <div class="section-table__object-name">
                                    <?= htmlspecialcharsbx($arElement['NAME']) ?>
                                </div>
                            </div>
                        </td>
                        <td class="section-table__column section-table__distance" itemprop="distance"
                            itemscope itemtype="http://schema.org/Distance">
                            <span itemprop="value"><?= $arElement['PROPERTIES']['DISTANCE'] ?></span>
                            <span itemprop="unitCode" content="KMT"><?=Loc::getMessage('DISTANCE_KM')?></span>
                        </td>
                        <td class="section-table__column section-table__duration section-table__duration-car"
                            content="<?= $component->convertToIsoDuration($arElement['PROPERTIES']['DISTANCE_CAR']) ?>"
                            itemprop="duration" data-label="<?= Loc::getMessage('DISTANCE_BY_CAR')?>">
                            <?= htmlspecialcharsbx($arElement['PROPERTIES']['DISTANCE_CAR']) ?: '—' ?>
                        </td>
                        <td class="section-table__column section-table__duration section-table__duration-afoot"
                            content="<?= $component->convertToIsoDuration($arElement['PROPERTIES']['DISTANCE_AFOOT']) ?>"
                            itemprop="duration"  data-label="<?= Loc::getMessage('DISTANCE_ON_FOOT')?>">
                            <?= htmlspecialcharsbx($arElement['PROPERTIES']['DISTANCE_AFOOT']) ?: '—' ?>
                        </td>
                    </tr><?
                    $elementKey++;
                endforeach;
            endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

