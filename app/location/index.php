<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Расположение");
$APPLICATION->SetPageProperty("TITLE", "Расположение");

use App\Enum\IBlockCode;

$APPLICATION->IncludeComponent('mutti:page.location', '', [
    "CACHE_TYPE" => "A",
    'IBLOCK_CODE' => IBlockCode::PAGE_LOCATION->value,
    'INCLUDE_PAGE_INFO_FILE' => SITE_TEMPLATE_PATH . '/include/location_info.php',
    'OBJECTS_DISTANCE_TITLE' => 'Удаленность от объектов',
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
