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


function loadViteAssets(string $entryName = 'main.js', array $options = []): void
{
    static $manifest;

    if ($manifest === null) {
        $manifestPath = $_SERVER['DOCUMENT_ROOT'] . '/local/assets/.vite/manifest.json';
        if (!file_exists($manifestPath)) {
            // Можно кинуть лог или исключение, если нужно
            return;
        }
        $manifest = json_decode(file_get_contents($manifestPath), true);
    }

    if (!isset($manifest[$entryName])) {
        return;
    }

    $publicPath = '/local/assets/';
    $entry = $manifest[$entryName];
    $asset = Asset::getInstance();

    if (!empty($entry['css'])) {
        foreach ($entry['css'] as $cssFile) {
            $href = $publicPath . $cssFile;
            $asset->addString(sprintf(
                '<link rel="stylesheet" href="%s" media="print" onload="this.media=\'all\'">',
                htmlspecialchars($href)
            ));
        }
    }

    // Обработка JS
    if (!empty($entry['file'])) {
        $src = $publicPath . $entry['file'];

        if (!empty($options['preload'])) {
            $asset->addString(sprintf(
                '<link rel="modulepreload" href="%s">',
                htmlspecialchars($src)
            ));
        }

        $attrs = [];
        $attrs[] = 'src="' . htmlspecialchars($src) . '"';

        if (!empty($options['nomodule'])) {
            $attrs[] = 'nomodule';
        } else {
            $attrs[] = 'type="module"';
        }

        if (!isset($options['defer']) || $options['defer']) {
            $attrs[] = 'defer';
        }

        $asset->addString('<script ' . implode(' ', $attrs) . '></script>');
    }
}



/*
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

    // CSS
    if (!empty($entry['css'])) {
        foreach ($entry['css'] as $cssFile) {
            $filePath = $publicPath . $cssFile;
            $asset->addString('<link rel="preload" href="' . $filePath . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">');
            $asset->addCss($filePath);
        }
    }

    // JS
    if (!empty($entry['file'])) {
        $scriptPath = $publicPath . $entry['file'];

        if (!empty($options['preload'])) {
            $asset->addString('<link rel="modulepreload" href="' . $scriptPath . '">');
        }

        $attrs = [];
        $attrs[] = 'src="' . $scriptPath . '"';

        if (!empty($options['type']) && $options['type'] === 'nomodule') {
            $attrs[] = 'nomodule';
        } else {
            $attrs[] = 'type="module"';
        }

//        if (!empty($options['defer'])) {
//            $attrs[] = 'defer';
//        }
        $attrs[] = 'defer';


        $asset->addString('<script ' . implode(' ', $attrs) . '></script>');
    }
}
*/
