<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Инфраструктура");
$APPLICATION->SetPageProperty("TITLE", "Инфраструктура");

use App\Enum\IBlockCode;

$APPLICATION->IncludeComponent('mutti:page.infrastructure', '', [
    'ASIDE_VIEW' => true,
    'CACHE_TYPE' => 'A',
    'IBLOCK_CODE' => IBlockCode::PAGE_INFRASTRUCTURE->value,
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
