<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_before.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_after.php');

use Bitrix\Main\Config\Option;

$moduleId = 'mutti.core';
$tabControl = new CAdminTabControl("mutti_options", [
    ["DIV" => "main", "TAB" => "Настройки", "TITLE" => "Основные настройки"],
]);

if ($_SERVER["REQUEST_METHOD"] === "POST" && check_bitrix_sessid()) {
    Option::set($moduleId, "email", $_POST["email"]);
    Option::set($moduleId, "enabled", isset($_POST["enabled"]) ? "Y" : "N");
    CAdminMessage::ShowMessage(["MESSAGE" => "Настройки сохранены", "TYPE" => "OK"]);
}

$email = Option::get($moduleId, "email", "");
$enabled = Option::get($moduleId, "enabled", "N") === "Y";
?>

<form method="POST" action="<?= $APPLICATION->GetCurPage() ?>?lang=<?= LANGUAGE_ID ?>">
    <?= bitrix_sessid_post() ?>
    <?php $tabControl->Begin(); ?>
    <?php $tabControl->BeginNextTab(); ?>

    <tr>
        <td width="40%">E-mail для уведомлений:</td>
        <td width="60%"><input type="text" name="email" value="<?= htmlspecialcharsbx($email) ?>" size="40" /></td>
    </tr>
    <tr>
        <td>Включить обработку:</td>
        <td><input type="checkbox" name="enabled" value="Y" <?= $enabled ? 'checked' : '' ?> /></td>
    </tr>

    <?php $tabControl->Buttons(); ?>
    <input type="submit" name="save" value="Сохранить" class="adm-btn-save" />
    <?php $tabControl->End(); ?>
</form>

<?php require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php'); ?>
