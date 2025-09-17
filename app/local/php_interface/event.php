<?

use Bitrix\Main\EventManager;
use Mutti\Event\FileEvent;

$eventManager = EventManager::getInstance();
$eventManager->addEventHandler('main', 'OnAfterFileSave', [FileEvent::class, 'OnAfterFileSave']);
