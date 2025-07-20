<?php

use Bitrix\Main\Localization\Loc;
use Mutti\Enum\OptionAboutEnum;
use Mutti\Enum\OptionBaseEnum;
use Mutti\Enum\OptionGuideEnum;
use Mutti\Enum\OptionHomeEnum;
use Mutti\Enum\ModuleEnum;
use Mutti\Enum\OptionLocationEnum;
use Mutti\Enum\OptionTabEnum;
use Mutti\Enum\OptionVillasEnum;

const MODULE_ID = ModuleEnum::MODULE_NAME->value;
Loc::loadMessages(__FILE__);

return [
    OptionTabEnum::base->name => [
        'TITLE' => Loc::getMessage('BASE_TAB_TITLE'),
        'OPTIONS' => [
            OptionBaseEnum::BASE_ADDRESS->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_ADDRESS'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_ADDRESS_HINT'),
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_EMAIL->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_EMAIL'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_EMAIL_HINT'),
                'REQUIRED' => true,
            ],
            'BASE_HEADER_PHONES' => [
                'HEADER' => Loc::getMessage('BASE_HEADER_PHONES'),
            ],
            OptionBaseEnum::BASE_PHONE_RU->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_PHONE_RU'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_PHONE_RU_HINT'),
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_PHONE_EN->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_PHONE_EN'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_PHONE_EN_HINT'),
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_PHONE_CRM->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_PHONE_CRM'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_PHONE_CRM_HINT'),
                'REQUIRED' => true,
            ],
            'BASE_HEADER_SOCIALS' => [
                'HEADER' => Loc::getMessage('BASE_HEADER_SOCIALS'),
            ],
            OptionBaseEnum::BASE_SOCIAL_TELEGRAM->value => [
                'TITLE' => 'Telegram',
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_SOCIAL_WHATSAPP->value => [
                'TITLE' => 'WhatsApp',
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_SOCIAL_YOUTUBE->value => [
                'TITLE' => 'Youtube',
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_SOCIAL_FACEBOOK->value => [
                'TITLE' => 'Facebook',
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_SOCIAL_INSTAGRAM->value => [
                'TITLE' => 'Instagram',
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_SOCIAL_LINE->value => [
                'TITLE' => 'Line',
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            'BASE_HEADER_MAPS' => [
                'HEADER' => Loc::getMessage('BASE_HEADER_MAPS'),
            ],
            OptionBaseEnum::BASE_MAP_GOOGLE_API->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_GOOGLE_API'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_GOOGLE_API_HINT'),
                'REQUIRED' => false,
            ],
            OptionBaseEnum::BASE_MAP_IMAGE->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_IMAGE_MAP'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_IMAGE_MAP_HINT'),
                'REQUIRED' => false,
            ],
            'BASE_HEADER_SITE' => [
                'HEADER' => Loc::getMessage('BASE_HEADER_SITE'),
            ],
            OptionBaseEnum::BASE_FIELD_SITE_RU->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_SITE_RU'),
                'TYPE' => 'STRING',
                'DEFAULT' => 'https://muttivillas.ru/',
                'REQUIRED' => false,
            ],
            OptionBaseEnum::BASE_FIELD_SITE_EN->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_SITE_EN'),
                'TYPE' => 'STRING',
                'DEFAULT' => 'https://muttivillas.com/',
                'REQUIRED' => false,
            ],
            OptionBaseEnum::BASE_FIELD_SITE_CN->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_SITE_CN'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'BASE_HEADER_TELEGRAM' => [
                'HEADER' => Loc::getMessage('BASE_HEADER_TELEGRAM'),
            ],
            OptionBaseEnum::BASE_FIELD_TELEGRAM_TOKEN->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_TELEGRAM_TOKEN'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_FIELD_TELEGRAM_CHAT_ID->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_TELEGRAM_CHAT_ID'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_FIELD_TELEGRAM_MESSAGE->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_TELEGRAM_MESSAGE'),
                'TYPE' => 'HTML',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            'BASE_HEADER_TELEGRAM_ADMIN' => [
                'HEADER' => Loc::getMessage('BASE_HEADER_TELEGRAM_ADMIN'),
            ],
            OptionBaseEnum::BASE_FIELD_TELEGRAM_TOKEN_ADMIN->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_TELEGRAM_TOKEN_ADMIN'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('BASE_FIELD_TELEGRAM_TOKEN_ADMIN_HINT'),
                'REQUIRED' => false,
            ],
            OptionBaseEnum::BASE_FIELD_TELEGRAM_CHAT_ID_ADMIN->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_TELEGRAM_CHAT_ID_ADMIN'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
            OptionBaseEnum::BASE_FIELD_TELEGRAM_MESSAGE_ADMIN->value => [
                'TITLE' => Loc::getMessage('BASE_FIELD_TELEGRAM_MESSAGE_ADMIN'),
                'TYPE' => 'HTML',
                'DEFAULT' => '',
                'REQUIRED' => true,
            ],
        ],
    ],
    OptionTabEnum::home->name => [
        'TITLE' => Loc::getMessage('HOME_TAB_TITLE'),
        'OPTIONS' => [
            'HOME_HEADER_HERO' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_HERO'),
            ],
            OptionHomeEnum::HOME_HERO_BACKGROUND_IMAGE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_HERO_BACKGROUND_IMAGE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('HOME_FIELD_HERO_BACKGROUND_IMAGE_HINT'),
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_HERO_TITLE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_HERO_TITLE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_HERO_DESCRIPTION->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_HERO_DESCRIPTION'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HOME_HEADER_INFO' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_INFO'),
            ],
            OptionHomeEnum::HOME_INFO_DESCRIPTION->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_DESCRIPTION'),
                'TYPE' => 'HTML',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_DESCRIPTION_BUTTON->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_DESCRIPTION_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_DESCRIPTION_BUTTON_MESSENGER->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_DESCRIPTION_BUTTON_MESSENGER'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_BANNER_IMAGE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_BANNER_IMAGE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('HOME_FIELD_INFO_BANNER_IMAGE_HINT'),
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_BANNER_VIDEO->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_BANNER_VIDEO'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('HOME_FIELD_INFO_BANNER_VIDEO_HINT'),
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_BANNER_LINK->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_BANNER_LINK'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_BANNER_TEXT->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_BANNER_TEXT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HOME_HEADER_INFO_PROPERTY' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_INFO_PROPERTY'),
            ],
            OptionHomeEnum::HOME_INFO_PROPERTY_1->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_PROPERTY_1_VALUE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_PROPERTY_2->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_PROPERTY_2_VALUE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_PROPERTY_3->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_INFO_PROPERTY_3_VALUE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_INFO_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HOME_HEADER_ABOUT' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_ABOUT'),
            ],
            OptionHomeEnum::HOME_ABOUT_TITLE_BUTTON->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_ABOUT_TITLE_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_ABOUT_DESCRIPTION_LEFT->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_ABOUT_DESCRIPTION_LEFT'),
                'TYPE' => 'HTML',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_ABOUT_DESCRIPTION_RIGHT->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_ABOUT_DESCRIPTION_RIGHT'),
                'TYPE' => 'HTML',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_ABOUT_BACKGROUND_IMAGE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_ABOUT_BACKGROUND_IMAGE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'HINT' => Loc::getMessage('HOME_FIELD_ABOUT_BACKGROUND_IMAGE_HINT'),
                'REQUIRED' => false,
            ],
            'HOME_FIELD_VILLAS' => [
                'HEADER' => Loc::getMessage('HOME_FIELD_VILLAS'),
            ],
            OptionHomeEnum::HOME_VILLAS_TITLE_BUTTON->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_VILLAS_TITLE_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HOME_FIELD_PROMO' => [
                'HEADER' => Loc::getMessage('HOME_FIELD_PROMO'),
            ],
            OptionHomeEnum::HOME_PROMO_CALLBACK_TITLE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_PROMO_CALLBACK_TITLE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_NAME->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_PROMO_CALLBACK_INPUT_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_PHONE->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_PROMO_CALLBACK_INPUT_PHONE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_PROMO_CALLBACK_BUTTON->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_PROMO_CALLBACK_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionHomeEnum::HOME_PROMO_CALLBACK_NOTIFICATION->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_PROMO_CALLBACK_NOTIFICATION'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HOME_HEADER_LOCATION' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_LOCATION'),
            ],
            OptionHomeEnum::HOME_LOCATION_CALLBACK_BUTTON->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_LOCATION_DESCRIPTION_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HOME_HEADER_CONSTRUCTION' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_CONSTRUCTION'),
            ],
            OptionHomeEnum::HOME_CONSTRUCTION_DESCRIPTION->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_CONSTRUCTION_DESCRIPTION'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HOME_HEADER_CONTACTS' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_CONTACTS'),
            ],
            'HOME_HEADER_CUSTOM_TEXT' => [
                'HEADER' => Loc::getMessage('HOME_HEADER_CUSTOM_TEXT'),
            ],
            OptionHomeEnum::HOME_DESCRIPTION_CONTENT->value => [
                'TITLE' => Loc::getMessage('HOME_FIELD_CUSTOM_TEXT_DESCRIPTION'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
        ]
    ],
    OptionTabEnum::about->name => [
        'TITLE' => Loc::getMessage('ABOUT_TAB_TITLE'),
        'OPTIONS' => [
            OptionAboutEnum::ABOUT_INFO_DESCRIPTION_BUTTON->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_INFO_DESCRIPTION_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionAboutEnum::ABOUT_INFO_DESCRIPTION_BUTTON_MESSENGER->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_INFO_DESCRIPTION_BUTTON_MESSENGER'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionAboutEnum::ABOUT_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'HEADER_HERO_TITLE' => [
                'HEADER' => Loc::getMessage('ABOUT_HEADER_ABOUT_PROPERTY'),
            ],
            OptionAboutEnum::ABOUT_STAT_PROPERTY_1->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_ABOUT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionAboutEnum::ABOUT_STAT_PROPERTY_1_VALUE->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_ABOUT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionAboutEnum::ABOUT_STAT_PROPERTY_2->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_ABOUT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionAboutEnum::ABOUT_STAT_PROPERTY_2_VALUE->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_ABOUT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionAboutEnum::ABOUT_STAT_PROPERTY_3->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_ABOUT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionAboutEnum::ABOUT_STAT_PROPERTY_3_VALUE->value => [
                'TITLE' => Loc::getMessage('ABOUT_FIELD_ABOUT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
        ]
    ],
    OptionTabEnum::guide->name => [
        'TITLE' => Loc::getMessage('GUIDE_TAB_TITLE'),
        'OPTIONS' => [
            OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON->value => [
                'TITLE' => Loc::getMessage('GUIDE_FIELD_INFO_DESCRIPTION_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER->value => [
                'TITLE' => Loc::getMessage('GUIDE_FIELD_INFO_DESCRIPTION_BUTTON_MESSENGER'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionGuideEnum::GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT->value => [
                'TITLE' => Loc::getMessage('GUIDE_FIELD_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
        ],
    ],
    OptionTabEnum::villas->name => [
        'TITLE' => Loc::getMessage('VILLAS_TAB_TITLE'),
        'OPTIONS' => [
            'VILLAS_HEADER_PRICE_LIST_BUTTON' => [
                'HEADER' => Loc::getMessage('VILLAS_HEADER_PRICE_LIST_BUTTON'),
            ],
            OptionVillasEnum::VILLAS_FIELD_PRICE_LIST_BUTTON->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRICE_LIST_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRICE_LIST_BUTTON_MESSENGER->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRICE_LIST_BUTTON_MESSENGER'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRICE_LIST_BUTTON_MESSENGER_TEXT->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRICE_LIST_BUTTON_MESSENGER_TEXT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'VILLAS_HEADER_COMMUNICATE_BUTTON' => [
                'HEADER' => Loc::getMessage('VILLAS_HEADER_COMMUNICATE_BUTTON'),
            ],
            OptionVillasEnum::VILLAS_FIELD_COMMUNICATE_BUTTON->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_COMMUNICATE_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_COMMUNICATE_BUTTON_MESSENGER->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_COMMUNICATE_BUTTON_MESSENGER'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_COMMUNICATE_BUTTON_MESSENGER_TEXT->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_COMMUNICATE_BUTTON_MESSENGER_TEXT'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
                'HINT' => Loc::getMessage('VILLAS_FIELD_COMMUNICATE_BUTTON_MESSENGER_TEXT_HINT')
            ],
            'VILLAS_HEADER_EQUIPMENT_BUTTON' => [
                'HEADER' => Loc::getMessage('VILLAS_HEADER_EQUIPMENT_BUTTON'),
            ],
            OptionVillasEnum::VILLAS_FIELD_EQUIPMENT_BUTTON->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_EQUIPMENT_BUTTON'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            'VILLAS_HEADER_PRODUCT_PROPERTY' => [
                'HEADER' => Loc::getMessage('VILLAS_HEADER_PRODUCT_PROPERTY'),
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY_1->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE_1->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_1->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_1->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
                'SEPARATOR' => true,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY_2->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE_2->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_2->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_2->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
                'SEPARATOR' => true,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY_3->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE_3->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'N',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_3->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_3->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
                'SEPARATOR' => true,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY_4->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE_4->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_4->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_4->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
                'SEPARATOR' => true,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY_5->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE_5->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_5->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_5->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
                'SEPARATOR' => true,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY_6->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_ACTIVITY'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'Y',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE_6->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_SHOW_MAIN_PAGE'),
                'TYPE' => 'CHECKBOX',
                'DEFAULT' => 'N',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_NAME_6->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_NAME'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
            OptionVillasEnum::VILLAS_FIELD_PRODUCT_PROPERTY_VALUE_6->value => [
                'TITLE' => Loc::getMessage('VILLAS_FIELD_PRODUCT_PROPERTY_VALUE'),
                'TYPE' => 'STRING',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
        ],
    ],
    OptionTabEnum::location->name => [
        'TITLE' => Loc::getMessage('LOCATION_TAB_TITLE'),
        'OPTIONS' => [
            OptionLocationEnum::LOCATION_FIELD_CUSTOM_TEXT_DESCRIPTION->value => [
                'TITLE' => Loc::getMessage('LOCATION_FIELD_CUSTOM_TEXT_DESCRIPTION'),
                'TYPE' => 'HTML',
                'DEFAULT' => '',
                'REQUIRED' => false,
            ],
        ],
    ],
    OptionTabEnum::contacts->name => [
        'TITLE' => Loc::getMessage('CONTACTS_TAB_TITLE'),
    ],
];
