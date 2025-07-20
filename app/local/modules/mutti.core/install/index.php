<?php
use Bitrix\Main\ModuleManager;

class mutti_core extends CModule
{
    public $MODULE_ID = "mutti.core";
    public $MODULE_NAME = "Mutti Core";
    public $MODULE_DESCRIPTION = "Настройки и утилиты проекта";
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;

    public function __construct()
    {
        include __DIR__ . '/version.php';
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
    }

    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
    }

    public function DoUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}
