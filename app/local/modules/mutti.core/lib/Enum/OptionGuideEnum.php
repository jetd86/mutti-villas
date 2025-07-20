<?php

namespace Mutti\Enum;

enum OptionGuideEnum: string
{
    /** Заголовок */
    case GUIDE_HERO_TITLE = 'guide_hero_title';
    /** Текст под заголовком */
    case GUIDE_HERO_DESCRIPTION = 'guide_hero_description';
    /** Текст на кнопке */
    case GUIDE_INFO_DESCRIPTION_BUTTON = 'guide_info_description_button';
    /** Выбранный мессенджер */
    case GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER = 'guide_info_description_button_messenger';
    /** Текст для мессенджера */
    case GUIDE_INFO_DESCRIPTION_BUTTON_MESSENGER_TEXT = 'guide_info_description_button_messenger_text';
}
