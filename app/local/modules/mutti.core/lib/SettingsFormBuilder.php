<?php
namespace Mutti;

use Bitrix\Main\Config\Option;

class SettingsFormBuilder
{
    protected string $moduleId;
    protected array $groups;

    public function __construct(string $moduleId, array $groups)
    {
        $this->moduleId = $moduleId;
        $this->groups = $groups;
    }

    public function renderTab($groupKey)
    {
        if (!isset($this->groups[$groupKey])) return;
        $fields = $this->groups[$groupKey]['OPTIONS'] ?? [];

        foreach ($fields as $code => $field) {
            if (isset($field['HEADER'])) {
                echo '<tr class="heading"><td colspan="2">' . htmlspecialcharsbx($field['HEADER']) . '</td></tr>';
                continue;
            }

            $value = Option::get($this->moduleId, $code, $field['DEFAULT'] ?? '');
            $required = isset($field['REQUIRED']) && $field['REQUIRED'] ? 'required' : '';
            $hint = $field['HINT'] ?? '';

            echo '<tr>';
            echo '<td width="40%"><label for="' . $code . '">' . htmlspecialcharsbx($field['TITLE']) . ':</label></td>';
            echo '<td width="60%">';

            switch ($field['TYPE']) {
                case 'HTML':
                    echo '<textarea data-html-editor name="' . $code . '" id="' . $code . '" rows="10" cols="60">' . htmlspecialcharsbx($value) . '</textarea>';
                    break;
                case 'FILE':
                    if ($value) {
                        echo '<p><img src="' . \CFile::GetPath($value) . '" alt="' . htmlspecialcharsbx($value) . '" style="width: 200px" /></p>';
                    }

                    echo '<input type="file" name="' . $code . '" id="' . $code . '" value="' . htmlspecialcharsbx($value) . '" />';
                    break;
                case 'STRING':
                    echo '<input type="text" name="' . $code . '" value="' . htmlspecialcharsbx($value) . '" size="40" ' . $required . ' />';
                    break;
                case 'CHECKBOX':
                    $checked = $value === 'Y' ? 'checked' : '';
                    echo '<input type="checkbox" name="' . $code . '" value="Y" ' . $checked . ' />';
                    break;
                case 'TEXTAREA':
                    echo '<textarea name="' . $code . '" rows="5" cols="40" ' . $required . '>' . htmlspecialcharsbx($value) . '</textarea>';
                    break;
                case 'SELECT':
                    echo '<select name="' . $code . '">';
                    foreach ($field['VALUES'] as $k => $v) {
                        $selected = $value == $k ? 'selected' : '';
                        echo '<option value="' . htmlspecialcharsbx($k) . '" ' . $selected . '>' . htmlspecialcharsbx($v) . '</option>';
                    }
                    echo '</select>';
                    break;
                case 'MULTISELECT':
                    $valueArray = unserialize($value);
                    echo '<select name="' . $code . '[]" multiple>';
                    foreach ($field['VALUES'] as $k => $v) {
                        $selected = in_array($k, $valueArray) ? 'selected' : '';
                        echo '<option value="' . htmlspecialcharsbx($k) . '" ' . $selected . '>' . htmlspecialcharsbx($v) . '</option>';
                    }
                    echo '</select>';
                    break;
                default:
                    echo '<input type="text" name="' . $code . '" value="' . htmlspecialcharsbx($value) . '" size="40" />';
            }

            if ($hint) {
                echo '<div style="color: #888; font-size: 12px; margin-top: 4px;">' . htmlspecialcharsbx($hint) . '</div>';
            }

            echo '</td>';
            echo '</tr>';

            if (array_key_exists('SEPARATOR', $field) && $field['SEPARATOR']) {
                echo '<tr><td colspan="2"><hr style="border-color:#fff" /></td></tr>';
            }
        }
    }

    public function save(array $request)
    {
        foreach ($this->groups as $group) {
            foreach ($group['OPTIONS'] as $code => $field) {
                if (isset($field['HEADER']) && $field['HEADER']) {
                    continue;
                }

                if ($field['TYPE'] === 'CHECKBOX') {
                    $value = isset($request[$code]) ? 'Y' : 'N';
                } elseif ($field['TYPE'] === 'MULTISELECT') {
                    $value = isset($request[$code]) ? serialize((array)$request[$code]) : '';
                } else {
                    $value = $request[$code] ?? '';
                }

                Option::set($this->moduleId, $code, $value);
            }
        }
    }
}
