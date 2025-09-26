<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("DESCRIPTION", "Клубный дом в Mutti Villas: современная инфраструктура для отдыха. Бассейн, фитнес-зал, зона барбекю и детские площадки. Идеальное место для семейного комфорта в экологичном районе. Узнайте больше о наших удобствах!");
$APPLICATION->SetTitle("Инфраструктура Mutti Family Villas");
$APPLICATION->SetPageProperty("TITLE", "Инфраструктура Mutti Family Villas — комфорт, досуг и безопасность на Пхукете");
use App\Enum\IBlockCode;

$APPLICATION->IncludeComponent('mutti:page.infrastructure', '', [
    'IBLOCK_ID' => 1,
    'ASIDE_VIEW' => true,
    'CACHE_TYPE' => 'A',
    'IBLOCK_CODE' => IBlockCode::PAGE_INFRASTRUCTURE->value,
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>