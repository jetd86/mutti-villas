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
/** @var MuttiPageContactsComponent $component */
$this->setFrameMode(true); ?>

<main class="content-block content-page" id="content-page" role="main" aria-busy="false"><?
    $APPLICATION->IncludeComponent('bitrix:news', '', [
            'ADD_ELEMENT_CHAIN' => 'Y',
            'ADD_SECTIONS_CHAIN' => 'Y',
            'AJAX_MODE' => 'N',
            'AJAX_OPTION_ADDITIONAL' => '',
            'AJAX_OPTION_HISTORY' => 'N',
            'AJAX_OPTION_JUMP' => 'Y',
            'AJAX_OPTION_STYLE' => 'N',
            'BROWSER_TITLE' => '-',
            'CACHE_FILTER' => 'N',
            'CACHE_GROUPS' => 'Y',
            'CACHE_TIME' => '36000000',
            'CACHE_TYPE' => 'A',
            'CHECK_DATES' => 'Y',
            'DETAIL_ACTIVE_DATE_FORMAT' => 'd.m.Y',
            'DETAIL_DISPLAY_BOTTOM_PAGER' => 'Y',
            'DETAIL_DISPLAY_TOP_PAGER' => 'N',
            'DETAIL_FIELD_CODE' => ['', ''],
            'DETAIL_PAGER_SHOW_ALL' => 'Y',
            'DETAIL_PAGER_TEMPLATE' => '',
            'DETAIL_PAGER_TITLE' => 'Страница',
            'DETAIL_PROPERTY_CODE' => ['', ''],
            'DETAIL_SET_CANONICAL_URL' => 'Y',
            'DISPLAY_BOTTOM_PAGER' => 'Y',
            'DISPLAY_DATE' => 'Y',
            'DISPLAY_NAME' => 'Y',
            'DISPLAY_PICTURE' => 'Y',
            'DISPLAY_PREVIEW_TEXT' => 'Y',
            'DISPLAY_TOP_PAGER' => 'N',
            'HIDE_LINK_WHEN_NO_DETAIL' => 'N',
            'IBLOCK_ID' => '4',
            'IBLOCK_TYPE' => 'content',
            'INCLUDE_IBLOCK_INTO_CHAIN' => 'N',
            'LIST_ACTIVE_DATE_FORMAT' => 'd.m.Y',
            'LIST_FIELD_CODE' => ['', ''],
            'LIST_PROPERTY_CODE' => ['', ''],
            'LIST_USE_SHARE' => '',
            'MESSAGE_404' => '',
            'META_DESCRIPTION' => '-',
            'META_KEYWORDS' => '-',
            'NEWS_COUNT' => '10',
            'PAGER_BASE_LINK_ENABLE' => 'N',
            'PAGER_DESC_NUMBERING' => 'N',
            'PAGER_DESC_NUMBERING_CACHE_TIME' => '36000',
            'PAGER_SHOW_ALL' => 'N',
            'PAGER_SHOW_ALWAYS' => 'N',
            'PAGER_TEMPLATE' => '.default',
            'PAGER_TITLE' => 'Новости',
            'PREVIEW_TRUNCATE_LEN' => '',
            'SEF_FOLDER' => '/mutti-guide/',
            'SEF_MODE' => 'Y',
            "SEF_URL_TEMPLATES" => [
                "news" => "",
                "section" => "#SECTION_CODE#/",
                "detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
            ],
            'SET_LAST_MODIFIED' => 'N',
            'SET_STATUS_404' => 'Y',
            'SET_TITLE' => 'Y',
            'SHOW_404' => 'N',
            'SLIDER_PROPERTY' => '',
            'SORT_BY1' => 'ACTIVE_FROM',
            'SORT_BY2' => 'SORT',
            'SORT_ORDER1' => 'DESC',
            'SORT_ORDER2' => 'ASC',
            'STRICT_SECTION_CHECK' => 'N',
            'TEMPLATE_THEME' => 'blue',
            'USE_CATEGORIES' => 'N',
            'USE_FILTER' => 'N',
            'USE_PERMISSIONS' => 'N',
            'USE_RATING' => 'N',
            'USE_REVIEW' => 'N',
            'USE_RSS' => 'N',
            'USE_SEARCH' => 'N',
            'USE_SHARE' => 'N',
        ] + $arParams, false, ['HIDE_ICONS' => 'N']); ?>
</main>
