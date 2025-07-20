<?
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/config');
$dotenv->load();

// Пример доступа к переменным
define('APP_ENV', $_ENV['APP_ENV'] ?? 'local');
define('APP_DEBUG', ($_ENV['APP_DEBUG'] ?? 'true') === 'true');
