<?php

namespace Mutti\Enum;

enum GlobalOptionEnum: string
{
    /** Адрес  */
    case GLOBAL_ADDRESS = 'global_address';
    /** Email */
    case GLOBAL_EMAIL = 'global_email';
    /** Номер телефона (RU) */
    case GLOBAL_PHONE_RU = 'global_phone_ru';
    /** Номер телефона (EN) */
    case GLOBAL_PHONE_EN = 'global_phone_en';
    /** Номер телефона (CRM) */
    case GLOBAL_PHONE_CRM = 'global_phone_crm';
    /** WeChat  */
    case GLOBAL_SOCIAL_WECHAT = 'global_social_wechat';
    /** Telegram */
    case GLOBAL_SOCIAL_TELEGRAM = 'global_social_telegram';
    /** WhatsApp */
    case GLOBAL_SOCIAL_WHATSAPP = 'global_social_whatsapp';
    /** Youtube */
    case GLOBAL_SOCIAL_YOUTUBE = 'global_social_youtube';
    /** Facebook */
    case GLOBAL_SOCIAL_FACEBOOK = 'global_social_facebook';
    /** Instagram */
    case GLOBAL_SOCIAL_INSTAGRAM = 'global_social_instagram';
    /** Line */
    case GLOBAL_SOCIAL_LINE = 'global_social_line';
    /** Google API */
    case GLOBAL_MAP_GOOGLE_API = 'global_map_google_api';
    /** Изображение */
    case GLOBAL_MAP_IMAGE = 'global_map_image';
}
