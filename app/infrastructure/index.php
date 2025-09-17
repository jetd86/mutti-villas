<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Инфраструктура");
$APPLICATION->SetPageProperty("TITLE", "Инфраструктура");
$APPLICATION->SetPageProperty("DESCRIPTION", "Клубный дом в Mutti Villas: современная инфраструктура для отдыха. Бассейн, фитнес-зал, зона барбекю и детские площадки. Идеальное место для семейного комфорта в экологичном районе. Узнайте больше о наших удобствах!");

use App\Enum\IBlockCode;

$APPLICATION->IncludeComponent('mutti:page.infrastructure', '', [
    'ASIDE_VIEW' => true,
    'CACHE_TYPE' => 'A',
    'IBLOCK_CODE' => IBlockCode::PAGE_INFRASTRUCTURE->value,
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
