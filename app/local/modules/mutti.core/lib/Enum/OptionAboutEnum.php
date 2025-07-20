<?php

namespace Mutti\Enum;

enum OptionAboutEnum: string
{
    /** Заголовок */
    case ABOUT_HERO_TITLE = 'about_hero_title';
    /** Текст под заголовком */
    case ABOUT_HERO_DESCRIPTION = 'about_hero_description';
    /** Текст на кнопке */
    case ABOUT_INFO_DESCRIPTION_BUTTON = 'about_info_description_button';
    /** Выбранный мессенджер */
    case ABOUT_INFO_DESCRIPTION_BUTTON_MESSENGER = 'about_info_description_button_messenger';
    /** Текст для мессенджера */
    case ABOUT_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT = 'about_info_description_button_messenger_text';
    /** Блок свойства */
    case ABOUT_STAT_PROPERTY_1 = 'about_stat_property_1';
    case ABOUT_STAT_PROPERTY_1_VALUE = 'about_stat_property_1_value';
    /** Блок свойства */
    case ABOUT_STAT_PROPERTY_2 = 'about_stat_property_2';
    case ABOUT_STAT_PROPERTY_2_VALUE = 'about_stat_property_2_value';
    /** Блок свойства */
    case ABOUT_STAT_PROPERTY_3 = 'about_stat_property_3';
    case ABOUT_STAT_PROPERTY_3_VALUE = 'about_stat_property_3_value';

}
