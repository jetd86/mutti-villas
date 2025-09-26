<?php
define("STOP_STATISTICS", true);
define("NO_KEEP_STATISTIC", "Y");
define("NOT_CHECK_PERMISSIONS", true);
define("BX_SECURITY_SHOW_MESSAGE", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

// Установка статуса HTTP 404
http_response_code(404);
if (defined("ERROR_404"))
{
    define("ERROR_404", "Y");
}
else
{
    @define("ERROR_404", "Y");
}

$APPLICATION->SetTitle("Страница не найдена");


?>
<div style="text-align:center; margin: 50px 0;">
    <h1>Ошибка 404 - Страница не найдена</h1>
    <p>К сожалению, запрашиваемая вами страница не существует.</p>
    <p><a href="/">Вернуться на главную</a></p>
</div>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
