<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Расположение");
$APPLICATION->SetPageProperty("TITLE", "Расположение");
$APPLICATION->SetPageProperty("DESCRIPTION", "Mutti Family Villas расположен в экологически чистой и живописной части острова Пхукет, в 10 км от роскошных пляжей Rawai и Nai Harn, в 1,5 км от супермаркета Lotus, 2,5 км от международной школы BCIS и 5 км от статуи Большого Будды.");

use App\Enum\IBlockCode;

$APPLICATION->IncludeComponent('mutti:page.location', '', [
    "CACHE_TYPE" => "A",
    'IBLOCK_CODE' => IBlockCode::PAGE_LOCATION->value,
    'INCLUDE_PAGE_INFO_FILE' => SITE_TEMPLATE_PATH . '/include/location_info.php',
    'OBJECTS_DISTANCE_TITLE' => 'Удаленность от объектов',
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
