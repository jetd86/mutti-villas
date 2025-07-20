<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Config\Option;
use Bitrix\Main\Context;
use Mutti\Enum\ModuleEnum;
use Mutti\Enum\OptionGuideEnum;

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
$culture = Context::getCurrent()->getCulture(); ?>

<meta itemprop="datePublished" content="<?=ConvertDateTime($arResult['ACTIVE_FROM'], $culture->getFormatDatetime(), $culture->getCode())?>">
<meta itemprop="dateModified" content="<?=ConvertDateTime($arResult['TIMESTAMP_X'], $culture->getFormatDatetime(), $culture->getCode())?>"><?
if ($arResult['DETAIL_PICTURE']): ?>
    <div class="article-link">
        <img class="article-image" src="<?=$arResult['DETAIL_PICTURE']['SRC']?>"
             alt="<?=htmlspecialcharsbx($arResult['DETAIL_PICTURE']['ALT'])?>" itemprop="image" />
    </div><?
endif; ?>
<h2 class="article-title" itemprop="headline">
    <span class="title-link" itemprop="url"><?=$arResult['NAME']?></span>
</h2>
<div class="article-meta" itemprop="articleSection">
    <? if ($arResult['IBLOCK_SECTION_NAME']): ?>
        <a class="meta-link" href="<?=$arResult['IBLOCK_SECTION_LINK']?>">
            <span class="meta-section" itemprop="genre"><?=$arResult['IBLOCK_SECTION_NAME']?></span>
        </a>
    <? endif; ?>
    <time class="meta-date<?=($arResult['IBLOCK_SECTION_NAME'] ? ' meta-separator' : '')?>" datetime="<?=ConvertDateTime($arResult['ACTIVE_FROM'], $culture->getFormatDate())?>" itemprop="datePublished">
        <?=FormatDate('j F Y', MakeTimeStamp($arResult['ACTIVE_FROM']))?>
    </time>
</div>
<div class="article-detail" itemprop="description"><?=$arResult['DETAIL_TEXT']?></div>
<button type="button" class="article-button"
        data-messenger="<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER->value) ?>"
        data-text=<?= Option::get(ModuleEnum::MODULE_NAME->value, OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT->value) ?>>
    <?= Option::get(ModuleEnum::MODULE_NAME->value, OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON->value) ?> <i class="bi bi-arrow-right"></i>
</button>
