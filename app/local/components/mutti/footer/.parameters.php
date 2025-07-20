<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @var array $arCurrentValues */
$arComponentParameters = [
    'GROUPS' => [
        'DESIGN_COL_LOGO_SETTING' => [
            'NAME' => 'Настройки колонки с логотипом',
            'SORT' => '100',
        ],
        'DESIGN_COL_CONTACTS_SETTING' => [
            'NAME' => 'Настройки контактов',
            'SORT' => '200',
        ],
        'DESIGN_COL_SOCIALS_SETTING' => [
            'NAME' => 'Настройки социальных сетей',
            'SORT' => '300',
        ],
        'DESIGN_COPYRIGHT_SETTING' => [
            'NAME' => 'Настройки подписи',
            'SORT' => '300',
        ],
    ],
    "PARAMETERS" => [
        'CALLBACK_NAME' => [
            'NAME' => 'Название кнопки модального окна',
            'TYPE' => 'STRING',
            'DEFAULT' => 'Связаться',
            'PARENT' => 'DESIGN_COL_LOGO_SETTING',
        ],
        'OFFICE_ADDRESS' => [
            'NAME' => 'Адрес компании',
            'TYPE' => 'STRING',
            'DEFAULT' => 'Soi Sai Namyen, Chalong, Mueang Phuket District, Phuket 83130, Thailand',
            'PARENT' => 'DESIGN_COL_CONTACTS_SETTING',
        ],
        'OFFICE_PHONE_RU' => [
            'NAME' => 'Телефон офиса (RU)',
            'TYPE' => 'STRING',
            'DEFAULT' => '+66 80 43 65597',
            'PARENT' => 'DESIGN_COL_CONTACTS_SETTING',
        ],
        'OFFICE_PHONE_EN' => [
            'NAME' => 'Телефон офиса (EN)',
            'TYPE' => 'STRING',
            'DEFAULT' => '+66 9 8860 6410',
            'PARENT' => 'DESIGN_COL_CONTACTS_SETTING',
        ],
        'OFFICE_EMAIL' => [
            'NAME' => 'Email офиса',
            'TYPE' => 'STRING',
            'DEFAULT' => 'salesmutti@gmail.com',
            'PARENT' => 'DESIGN_COL_CONTACTS_SETTING',
        ],
        'COPYRIGHT' => [
            'NAME' => 'Copyright',
            'TYPE' => 'STRING',
            'DEFAULT' => 'Phuket MUTTI Family Villas',
            'PARENT' => 'DESIGN_COPYRIGHT_SETTING',
        ],
        'SOCIAL_ICONS' => [
            'NAME' => 'Показать иконки',
            'TYPE' => 'LIST',
            'VALUES' => [
                'wechat' => 'WeChat',
                'telegram' => 'Telegram',
                'whatsapp' => 'WhatsApp',
                'youtube' => 'YouTube',
                'facebook' => 'Facebook',
                'instagram' => 'Instagram',
                'line' => 'Line',
            ],
            'MULTIPLE' => 'Y',
            'PARENT' => 'DESIGN_COL_SOCIALS_SETTING',
        ],
        "CACHE_TIME" => [],
    ],
];
