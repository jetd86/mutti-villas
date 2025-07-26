<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("Наши виллы");
$APPLICATION->SetPageProperty("TITLE", "Наши виллы");
$APPLICATION->SetPageProperty("description", "Виллы Mutti Family Villas в Пхукете: от 2 до 5 спален, частные бассейны и сады. Современный дизайн в экологичном районе Чалонг, с инфраструктурой для семей. Выберите свой дом мечты — цены от 12 млн бат!");
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
