<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

global $APPLICATION;

//delayed function must return a string
if (empty($arResult)) {
    return "";
}

$strReturn = '';
$strReturn .= '<section class="section breadcrumb" id="breadcrumb">';
$strReturn .= '<div class="container">';
$strReturn .= '<nav class="breadcrumb" aria-label="breadcrumb" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';
$items = count($arResult);
$proto = $_SERVER['SERVER_PORT'] == 443 ? 'https://' : 'http://';
$host = $_SERVER['SERVER_NAME'];
$site = $proto . $host;
for ($index = 0; $index < $items; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);

    if ($arResult[$index]["LINK"] <> "" && $index != $items - 1) {
        $strReturn .= '
			<div class="breadcrumb-item" id="breadcrumb_' . $index . '" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a class="breadcrumb-link" href="' . $site . $arResult[$index]["LINK"] . '" content="' . $site . $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="item">
					<span class="breadcrumb-title" itemprop="name">' . $title . '</span>
				</a>
				<meta itemprop="position" content="' . ($index + 1) . '" />
			</div>';
    } else {
        $strReturn .= '
			<div class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<span class="breadcrumb-link" title="' . $title . '" itemprop="item" content="' . $site . $APPLICATION->GetCurUri() . '">
					<span class="breadcrumb-title active" itemprop="name">' . $title . '</span>
				</span>
				<meta itemprop="position" content="' . ($index + 1) . '" />
			</div>';
    }
}

$strReturn .= '</nav>';
$strReturn .= '</div>';
$strReturn .= '</section>';

return $strReturn;
