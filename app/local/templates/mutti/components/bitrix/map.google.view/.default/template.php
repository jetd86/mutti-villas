<?

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

if (($arParams['BX_EDITOR_RENDER_MODE'] ?? null) == 'Y') {
    echo '<img src="/bitrix/components/bitrix/map.google.view/templates/.default/images/preview.png" border="0" />';
} else {
    $arTransParams = [
        'INIT_MAP_TYPE' => $arParams['INIT_MAP_TYPE'] ?? null,
        'INIT_MAP_LON' => $arResult['POSITION']['google_lon'] ?? null,
        'INIT_MAP_LAT' => $arResult['POSITION']['google_lat'] ?? null,
        'INIT_MAP_SCALE' => $arResult['POSITION']['google_scale'] ?? null,
        'MAP_WIDTH' => $arParams['MAP_WIDTH'] ?? null,
        'MAP_HEIGHT' => $arParams['MAP_HEIGHT'] ?? null,
        'CONTROLS' => $arParams['CONTROLS'] ?? null,
        'OPTIONS' => $arParams['OPTIONS'] ?? null,
        'MAP_ID' => $arParams['MAP_ID'] ?? null,
        'API_KEY' => $arParams['API_KEY'] ?? null,
    ];

    if (($arParams['DEV_MODE'] ?? null) == 'Y') {
        $arTransParams['DEV_MODE'] = 'Y';
        if ($arParams['WAIT_FOR_EVENT'] ?? false) {
            $arTransParams['WAIT_FOR_EVENT'] = $arParams['WAIT_FOR_EVENT'];
        }
    }
    $APPLICATION->IncludeComponent(
        'bitrix:map.google.system',
        '.default',
        $arTransParams,
        false,
        array('HIDE_ICONS' => 'Y')
    );
} ?>
