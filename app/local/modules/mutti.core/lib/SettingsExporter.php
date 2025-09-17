<?php
namespace Mutti;

use Bitrix\Main\Config\Option;
use Bitrix\Main\IO\File;

class SettingsExporter
{
    public static function export(string $moduleId, array $fields): string
    {
        $data = [];
        foreach ($fields as $group) {
            foreach ($group['OPTIONS'] as $code => $field) {
                $data[$code] = Option::get($moduleId, $code, $field['DEFAULT'] ?? '');
            }
        }
        return yaml_emit($data, YAML_UTF8_ENCODING);
    }

    public static function import(string $moduleId, string $yamlContent, array $fields)
    {
        $data = yaml_parse($yamlContent);
        if (!is_array($data)) {
            throw new \Exception("YAML import error: content is not valid");
        }

        $log = [];
        $validCodes = [];

        foreach ($fields as $group) {
            foreach ($group['OPTIONS'] as $code => $field) {
                $validCodes[] = $code;
            }
        }

        foreach ($data as $code => $value) {
            if (!in_array($code, $validCodes)) {
                continue; // skip unknown
            }

            $old = Option::get($moduleId, $code);
            if ($old !== $value) {
                $log[] = date('Y-m-d H:i:s') . " [$moduleId] $code: '$old' → '$value'";
                Option::set($moduleId, $code, $value);
            }
        }

        if (!empty($log)) {
            $logFile = $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/' . $moduleId . '/import.log';
            File::putFileContents($logFile, implode("\n", $log) . "\n", File::APPEND);
        }
    }
}
