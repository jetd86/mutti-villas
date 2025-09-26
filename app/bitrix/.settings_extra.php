<?php
return array(
    'cache' => array(
        'value' => array(
            'type' => array(
                'class_name' => '\Bitrix\Main\Data\CacheEngineRedis',
                'extension' => 'redis',
            ),
            'redis' => array(
                'host' => 'bitrix_redis8.2',  // ИСПРАВЛЕНО: было 'redis'
                'port' => 6379,
                'auth' => false,
                'db' => 0,
                'persistent' => true,
                'serializer' => 'php',
                'sid' => $_SERVER["DOCUMENT_ROOT"] . "#ho",
                'read_timeout' => 60,
                'connect_timeout' => 5,
            ),
        ),
        'readonly' => false,
    ),

    // Настройки сессий через Redis
    'session' => array(
        'value' => array(
            'type' => 'redis',
            'redis' => array(
                'host' => 'bitrix_redis8.2',
                'port' => 6379,
                'db' => 1,
                'persistent' => false,
                'ttl' => 86400,
                'prefix' => 'sess_',
            ),
        ),
        'readonly' => false,
    ),

);
?>
