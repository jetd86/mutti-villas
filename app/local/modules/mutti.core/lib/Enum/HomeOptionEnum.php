<?php

namespace Mutti\Enum;

enum HomeOptionEnum: string
{
    /** Файл фона */
    case HOME_HERO_BACKGROUND_IMAGE = 'home_hero_background_image';
    /** Заголовок */
    case HOME_HERO_TITLE = 'home_hero_title';
    /** Текст под заголовком */
    case HOME_HERO_DESCRIPTION = 'home_hero_description';
    /** Описание */
    case HOME_INFO_DESCRIPTION = 'home_info_description';
    /** Текст на кнопке */
    case HOME_INFO_DESCRIPTION_BUTTON = 'home_info_description_button';
    /** Выбранный мессенджер */
    case HOME_INFO_DESCRIPTION_BUTTON_MESSENGER = 'home_info_description_button_messenger';
    /** Текст для мессенджера */
    case HOME_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT = 'home_info_description_button_messenger_text';
    /** Баннер (Постер) */
    case HOME_INFO_BANNER_IMAGE = 'home_info_banner_image';
    /** Баннер (Видео) */
    case HOME_INFO_BANNER_VIDEO = 'home_info_banner_video';
    /** Внешняя ссылка с кнопки */
    case HOME_INFO_BANNER_LINK = 'home_info_banner_link';
    /** Блок свойства */
    case HOME_INFO_PROPERTY_1 = 'home_info_property_1';
    /** Блок свойства */
    case HOME_INFO_PROPERTY_2 = 'home_info_property_2';
    /** Блок свойства */
    case HOME_INFO_PROPERTY_3 = 'home_info_property_3';
    /** Текст на кнопке в заголовке */
    case HOME_ABOUT_TITLE_BUTTON = 'home_about_title_button';
    /** Текст слева */
    case HOME_ABOUT_TITLE_DESCRIPTION_LEFT = 'home_about_title_description_left';
    /** Текст справа */
    case HOME_ABOUT_TITLE_DESCRIPTION_RIGHT = 'home_about_title_description_right';
    /** Файл фона */
    case HOME_ABOUT_BACKGROUND_IMAGE = 'home_about_background_image';
    /** Текст на кнопке */
    case HOME_VILLAS_TITLE_BUTTON = 'home_villas_title_button';
    /** Текст формы обратной связи */
    case HOME_PROMO_CALLBACK_TITLE = 'home_promo_callback_title';
    /** Текст на кнопке */
    case HOME_PROMO_CALLBACK_BUTTON = 'home_promo_callback_button';
    /** Текст на кнопке */
    case HOME_LOCATION_CALLBACK_BUTTON = 'home_location_callback_button';
    /** Текст под заголовком */
    case HOME_CONSTRUCTION_DESCRIPTION = 'home_construction_description';
    /** Контент */
    case HOME_DESCRIPTION_CONTENT = 'home_description_content';
}
