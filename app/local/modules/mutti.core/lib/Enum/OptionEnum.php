<?php

namespace Mutti\Enum;

enum OptionEnum: string
{
    // Главная страница
    case MAIN_HERO_TITLE = 'main_hero_title';
    case MAIN_HERO_SUBTITLE = 'main_hero_subtitle';

    case MAIN_INFO_CONTENT = 'main_info_content';
    case MAIN_INFO_POSTER = 'main_info_poster';
    case MAIN_INFO_VIDEO = 'main_info_video';

    case MAIN_ABOUT_CONTENT = '';
}
