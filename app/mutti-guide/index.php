<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Mutti гид");
$APPLICATION->SetPageProperty("TITLE", "Mutti гид");
$APPLICATION->SetPageProperty("DESCRIPTION", "Гид по нашим виллам на Пхукете с обзором в 360");

use App\Enum\IBlockCode;

$APPLICATION->IncludeComponent('mutti:page.guide', '', [
    'ASIDE_VIEW' => true,
    'CACHE_TYPE' => 'A',
    'IBLOCK_CODE' => IBlockCode::PAGE_MUTTI_GUIDE->value,
    'CONTENT_BUTTON' => 'Прайс-лист',
    'CONTENT_BUTTON_LINK' => '/',
    'CONTENT_BUTTON_NAME' => 'Связаться с нами',
    'CONTENT_BUTTON_ICON' => 'arrow-right-short',
]);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
