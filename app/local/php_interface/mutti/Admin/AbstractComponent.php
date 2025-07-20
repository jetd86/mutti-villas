<?php

namespace App\Admin;

use App\Helper\ComponentHelper;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Data\Cache;
use CBitrixComponent;
use Mutti\Enum\ModuleEnum;

abstract class AbstractComponent extends CBitrixComponent
{
    protected Cache $cache;
    protected int $cacheTime = 3600;

    public function __construct($component = null)
    {
        parent::__construct($component);
        $this->cache = Cache::createInstance();
    }

    public function getComponentName(): string
    {
        return ComponentHelper::getComponentName($this->__name);
    }

    public static function getModuleOption($enum)
    {
        return Option::get(ModuleEnum::MODULE_NAME->value, $enum->value);
    }
}
