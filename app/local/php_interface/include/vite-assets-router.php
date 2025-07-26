<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/bitrix-manifest-loader.php';

/**
 * Подключение Vite-ресурсов по URI
 */
function routeViteAssets(): void
{
    // Подключаем глобальные ресурсы в любом случае
    loadViteAssets('global.js', [
        'defer' => true,
        'preload' => true,
    ]);

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Подключение page-specific entry
    $routes = [
        '/' => 'main.js',
        '/about' => 'about.js',
        '/contacts' => 'contacts.js',
        '/infrastructure' => 'infrastructure.js',
        '/location' => 'location.js',
        '/mutti-guide' => 'main.js',
        '/villas' => 'villas.js',
    ];

    foreach ($routes as $path => $entry) {
        if ($uri === $path || str_starts_with($uri, $path . '/')) {
            loadViteAssets($entry, [
                'defer' => true,
                'preload' => true,
            ]);
            return;
        }
    }

    // Fallback
    loadViteAssets('main.js', [
        'defer' => true,
        'preload' => true,
    ]);
}
