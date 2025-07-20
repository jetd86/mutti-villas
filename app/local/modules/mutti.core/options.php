<?php

use Mutti\Enum\ModuleEnum;
use Mutti\SettingsFormBuilder;

/** @var CMain $APPLICATION */

$moduleId = ModuleEnum::MODULE_NAME->value;
$groups = include __DIR__ . '/options_description.php';
$form = new SettingsFormBuilder($moduleId, $groups);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && check_bitrix_sessid()) {
    $form->save($_POST);
}

$tabs = [];
foreach ($groups as $key => $group) {
    $tabs[] = [
        'DIV' => $key,
        'TAB' => $group['TITLE'],
        'TITLE' => $group['TITLE']
    ];
}

$tabControl = new CAdminTabControl('mutti_core_options', $tabs);
?>

<form method="POST" action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($moduleId) ?>&lang=<?= LANG ?>">
    <?= bitrix_sessid_post(); ?>
    <?
    $tabControl->Begin();
    foreach ($groups as $key => $group):
        $tabControl->BeginNextTab();
        $form->renderTab($key);
    endforeach;
    $tabControl->Buttons(); ?>

    <input type="submit" name="save" value="Сохранить" class="adm-btn-save"><?
    $tabControl->End(); ?>
</form>
<script>
    BX.ready(function () {
        document.querySelectorAll('textarea[data-html-editor]').forEach(function (el) {
            if (window.BXHtmlEditor) {
                BXHtmlEditor.Show(el.id, false, {
                    content: el.value,
                    inputName: el.name,
                    width: '100%',
                    height: '200'
                });
            }
        });
    });
</script>
