<?

use Bitrix\Main\Config\Option;
use Mutti\Enum\ModuleEnum;
use Mutti\Enum\OptionGuideEnum;

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
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

foreach ($arResult["ITEMS"] as $arItem):
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]); ?>
    <article class="page-article" role="article" aria-posinset="<?=$arItem['ID']?>" aria-setsize="<?=count($arResult['ITEMS'])?>" itemscope itemtype="http://schema.org/Article">
        <meta itemprop="datePublished" content="<?=ConvertDateTime($arItem['ACTIVE_FROM'], 'YYYY-MM-DDTHH:MI:SS', 'ru')?>">
        <meta itemprop="dateModified" content="<?=ConvertDateTime($arItem['TIMESTAMP_X'], 'YYYY-MM-DDTHH:MI:SS', 'ru')?>"><?
        if ($arItem['PREVIEW_PICTURE']): ?>
        <a class="article-link" href="<?=$arItem['DETAIL_PAGE_URL']?>">
            <img class="article-image" src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
                 alt="<?=htmlspecialcharsbx($arItem['PREVIEW_PICTURE']['ALT'])?>" itemprop="image" />
            </a><?
        endif; ?>
        <h2 class="article-title" itemprop="headline">
            <a class="title-link" href="<?=$arItem['DETAIL_PAGE_URL']?>" itemprop="url"><?=$arItem['NAME']?></a>
        </h2>
        <div class="article-meta" itemprop="articleSection">
            <? if ($arItem['IBLOCK_SECTION_NAME']): ?>
                <a class="meta-link" href="<?=$arItem['IBLOCK_SECTION_LINK']?>">
                    <span class="meta-section" itemprop="genre"><?=$arItem['IBLOCK_SECTION_NAME']?></span>
                </a>
            <? endif; ?>
            <time class="meta-date<?=($arItem['IBLOCK_SECTION_NAME'] ? ' meta-separator' : '')?>" datetime="<?=ConvertDateTime($arItem['ACTIVE_FROM'], 'YYYY-MM-DD')?>" itemprop="datePublished">
                <?=FormatDate('j F Y', MakeTimeStamp($arItem['ACTIVE_FROM']))?>
            </time>
        </div>
        <div class="article-preview" itemprop="description"><?=$arItem['PREVIEW_TEXT']?></div>
        <button type="button" class="article-button"
                data-messenger="<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER->value) ?>"
                data-text=<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT->value) ?>>
            <?= Option::get(ModuleEnum::MODULE_NAME->value, OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON->value) ?> <i class="bi bi-arrow-right"></i>
        </button>
    </article>
<?
endforeach;
if ($arParams["DISPLAY_BOTTOM_PAGER"] && (count($arResult["ITEMS"]) > $arParams['NEWS_COUNT'])): ?>
    <div class="article-pagination">
    <?= $arResult["NAV_STRING"] ?>
    </div><?
endif; ?>
