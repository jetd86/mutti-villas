<?php

use App\Admin\AbstractComponent;
use App\Enum\HLBlockCode;
use App\Services\HomePage\HomePageService;
use Bitrix\Highloadblock as HL;
use Bitrix\Main\Loader;
use Bitrix\Main\Web\Json;
use Mutti\Enum\OptionBaseEnum;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

class MuttiPageHomeComponent extends AbstractComponent
{
    public function executeComponent(): void
    {
        $this->arResult = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && check_bitrix_sessid(
            ) && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            $this->arResult['success'] = true;

            $name = htmlspecialchars(trim($_POST['name']));
            $phone = htmlspecialchars(trim($_POST['phone']));

            if (!$this->sendToTelegram($name, $phone)) {
                $this->arResult['success'] = false;
            }

            echo Json::encode($this->arResult);
            die();
        }

        $this->arResult['ITEMS'] = [];
        $pageData = HomePageService::getInstance()->getIBlockData();
        if (!$pageData->getErrors()) {
            $this->arResult['ITEMS'] = $pageData->getResult();
        }

        $this->includeComponentTemplate();
    }

    function sendToTelegram(string $name, string $phone): bool
    {
        $message = self::getModuleOption(OptionBaseEnum::BASE_FIELD_TELEGRAM_MESSAGE);
        $message = sprintf($message, $_SERVER['SERVER_NAME'], htmlspecialchars($name), htmlspecialchars($phone));

        $logData = date('Y-m-d H:i:s') . " | Name: $name | Phone: $phone | Message: $message\n";
        file_put_contents(__DIR__ . '/telegram_logs.txt', $logData, FILE_APPEND | LOCK_EX);

        $context = stream_context_create([
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query([
                    'chat_id' => self::getModuleOption(OptionBaseEnum::BASE_FIELD_TELEGRAM_CHAT_ID),
                    'text' => $message,
                    'parse_mode' => 'HTML',
                ]),
                'timeout' => 10
            ]
        ]);

        $result = file_get_contents(
            'https://api.telegram.org/bot' . self::getModuleOption(OptionBaseEnum::BASE_FIELD_TELEGRAM_TOKEN) . '/sendMessage',
            false,
            $context
        );

        return $result !== false;
    }

    public function getAdvantagesElements(): array
    {
        $entity = $this->getHLBlockByCode(HLBlockCode::CollectionAdvantage->value);
        if ($entity) {
            $entity = HL\HighloadBlockTable::compileEntity($entity);
            $entity = $entity->getDataClass();

            $result = $entity::query()
                ->addSelect('UF_NAME', 'NAME')
                ->addSelect('UF_ICON', 'ICON')
                ->addFilter('UF_ACTIVE', 1)
                ->addFilter('UF_SHOW_HOME', 1)
                ->addOrder('UF_SORT')
                ->exec();

            $result->addFetchDataModifier(function ($row) {
                $row['ICON'] = CFile::GetFileArray($row['ICON']);

                return $row;
            });

            return $result->fetchAll();
        }

        return [];
    }

    private function getHLBlockByCode($entityName): ?array
    {
        Loader::includeModule('highloadblock');

        $hlBlock = HL\HighloadBlockTable::getRow([
            'filter' => ['=NAME' => $entityName],
        ]);

        return !is_null($hlBlock) ? $hlBlock : null;
    }

    public function getTagsElements(): array
    {
        $entity = $this->getHLBlockByCode(HLBlockCode::CollectionTags->value);
        if ($entity) {
            $entity = HL\HighloadBlockTable::compileEntity($entity);
            $entity = $entity->getDataClass();

            $result = $entity::query()
                ->addSelect('UF_NAME', 'NAME')
                ->addFilter('UF_ACTIVE', 1)
                ->addFilter('UF_SHOW_HOME', 1)
                ->addOrder('UF_SORT')
                ->exec();

            return $result->fetchAll();
        }

        return [];
    }

    public function getSocialIcons(): ?array
    {
        if (array_key_exists('SOCIAL_ICONS', $this->arParams) && is_array($this->arParams['SOCIAL_ICONS'])) {
            return $this->arParams['SOCIAL_ICONS'];
        }

        return null;
    }
}
