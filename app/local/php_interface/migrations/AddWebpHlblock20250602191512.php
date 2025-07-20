<?php

namespace Sprint\Migration;


class AddWebpHlblock20250602191512 extends Version
{
    protected $description = 'Добавление HL-блока для логирования WebP-файлов';

    public function up(): void
    {
        $helper = $this->getHelperManager();

        $hlblockId = $helper->Hlblock()->saveHlblock([
            'NAME'       => 'WebpConversionLog',
            'TABLE_NAME' => 'webp_conversion_log',
        ]);

        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME'  => 'UF_FILE_ID',
            'USER_TYPE_ID'=> 'integer',
            'XML_ID'      => 'UF_FILE_ID',
            'SORT'        => 100,
            'MANDATORY'   => 'Y',
            'EDIT_FORM_LABEL'   => ['ru' => 'ID оригинала'],
            'LIST_COLUMN_LABEL' => ['ru' => 'ID оригинала'],
        ]);

        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME'  => 'UF_WEBP_ID',
            'USER_TYPE_ID'=> 'integer',
            'XML_ID'      => 'UF_WEBP_ID',
            'SORT'        => 200,
            'MANDATORY'   => 'Y',
            'EDIT_FORM_LABEL'   => ['ru' => 'ID WebP'],
            'LIST_COLUMN_LABEL' => ['ru' => 'ID WebP'],
        ]);

        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME'  => 'UF_CREATE_AT',
            'USER_TYPE_ID'=> 'datetime',
            'XML_ID'      => 'UF_CREATE_AT',
            'SORT'        => 300,
            'MANDATORY'   => 'N',
            'EDIT_FORM_LABEL'   => ['ru' => 'Создано'],
            'LIST_COLUMN_LABEL' => ['ru' => 'Создано'],
        ]);

        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME'  => 'UF_UPDATE_AT',
            'USER_TYPE_ID'=> 'datetime',
            'XML_ID'      => 'UF_UPDATE_AT',
            'SORT'        => 400,
            'MANDATORY'   => 'N',
            'EDIT_FORM_LABEL'   => ['ru' => 'Обновлено'],
            'LIST_COLUMN_LABEL' => ['ru' => 'Обновлено'],
        ]);
    }

    public function down(): void
    {
        $helper = $this->getHelperManager();
        $helper->Hlblock()->deleteHlblock('WebpConversionLog');
    }
}
