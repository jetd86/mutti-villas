<?php
use Bitrix\Main\Page\Asset;

/**
 * Подключение ресурсов из Vite manifest.json в Bitrix
 *
 * @param string $entryName   Имя точки входа (например, 'main.js')
 * @param array $options      Дополнительные параметры:
 *                            - 'defer' => true
 *                            - 'nomodule' => true
 *                            - 'preload' => true
 */
function loadViteAssets(string $entryName = 'main.js?1', array $options = []): void
{
    static $manifest;

    if ($manifest === null) {
        $manifestPath = $_SERVER['DOCUMENT_ROOT'] . '/local/assets/.vite/manifest.json';
        if (!file_exists($manifestPath)) return;
        $manifest = json_decode(file_get_contents($manifestPath), true);
    }

    if (!isset($manifest[$entryName])) return;

    $publicPath = '/local/assets/';
    $entry = $manifest[$entryName];
    $asset = Asset::getInstance();

    if (!empty($entry['css'])) {
        foreach ($entry['css'] as $cssFile) {
            $filePath = $publicPath . $cssFile;
            $asset->addString('<link rel="preload" href="' . $filePath . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">');
        }
    }

    if (!empty($entry['file'])) {
        $scriptPath = $publicPath . $entry['file'];

        if (!empty($options['preload'])) {
            $asset->addString('<link rel="modulepreload" href="' . $scriptPath . '">');
        }

        $attrs = [];
        $attrs[] = 'src="' . $scriptPath . '"';
        $attrs[] = 'type="module"';
        $attrs[] = 'defer';

        if (!empty($options['nomodule'])) {
            $attrs[] = 'nomodule';
        }

        $asset->addString('<script ' . implode(' ', $attrs) . '></script>');
    }
}
