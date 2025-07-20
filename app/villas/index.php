<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Наши виллы");
$APPLICATION->SetPageProperty("TITLE", "Наши виллы");
$APPLICATION->SetPageProperty("HEADER_BUTTON", "Прайс-лист");
$APPLICATION->SetPageProperty("HEADER_BUTTON_TEXT", "Здравствуйте, отправьте мне актуальный прайс-лист");
$APPLICATION->SetPageProperty("HEADER_BUTTON_ICON", "arrow-right-short");

use App\Enum\IBlockCode;

$APPLICATION->IncludeComponent('mutti:page.villas', '', [
    'ASIDE_VIEW' => true,
    'CACHE_TYPE' => 'A',
    'IBLOCK_CODE' => IBlockCode::PAGE_VILLAS->value,
    'SUBTITLE_BLOCK_LOCATION' => 'Расположение на генплане',
]);
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
