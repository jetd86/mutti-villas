<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/bitrix-manifest-loader.php';

/**
 * Подключение Vite-ресурсов по URI
 */

function routeViteAssets(): void
{
    loadViteAssets('global.js', [
        'preload' => true,
    ]);

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';

    $routes = [
        '/' => 'main.js',
        '/about' => 'about.js',
        '/contacts' => 'contacts.js',
        '/infrastructure' => 'infrastructure.js',
        '/location' => 'location.js',
        '/mutti-guide' => 'guide.js',
        '/villas' => 'villas.js',
    ];

    $matched = false;
    foreach ($routes as $path => $entry) {
        if ($uri === $path || str_starts_with($uri, $path . '/')) {
            $matched = true;
            if ($path === '/contacts') {
                loadViteAssets('main.js', [
                    'preload' => false,
                    'lowPriorityCss' => true,
                ]);
            }

            loadViteAssets($entry, [
                'preload' => true,
                'lowPriorityCss' => true,
            ]);
            break;
        }
    }

    if (!$matched) {
        loadViteAssets('main.js', [
            'preload' => false,
            'lowPriorityCss' => true,
        ]);
    }
}



/*
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
        '/mutti-guide' => 'guide.js',
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
*/
