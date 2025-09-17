<?php

namespace App\Helper;

class ComponentHelper
{
    const componentNamespaceDefault = 'mutti';
    const componentNamespaceBitrix = 'bitrix';

    public static function getComponentName($componentName): string
    {
        $componentName = str_replace([self::componentNamespaceDefault . ':', self::componentNamespaceBitrix . ':'], '', $componentName);
        return str_replace('.', '-', $componentName);
    }
}
