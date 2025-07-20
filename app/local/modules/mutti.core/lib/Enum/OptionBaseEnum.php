<?php

namespace Mutti\Enum;

enum OptionBaseEnum: string
{
    /** Адрес  */
    case BASE_ADDRESS = 'global_address';
    /** Email */
    case BASE_EMAIL = 'global_email';
    /** Номер телефона (RU) */
    case BASE_PHONE_RU = 'global_phone_ru';
    /** Номер телефона (EN) */
    case BASE_PHONE_EN = 'global_phone_en';
    /** Номер телефона (CRM) */
    case BASE_PHONE_CRM = 'global_phone_crm';
    /** WeChat  */
    case BASE_SOCIAL_WECHAT = 'global_social_wechat';
    /** Telegram */
    case BASE_SOCIAL_TELEGRAM = 'global_social_telegram';
    /** WhatsApp */
    case BASE_SOCIAL_WHATSAPP = 'global_social_whatsapp';
    /** Youtube */
    case BASE_SOCIAL_YOUTUBE = 'global_social_youtube';
    /** Facebook */
    case BASE_SOCIAL_FACEBOOK = 'global_social_facebook';
    /** Instagram */
    case BASE_SOCIAL_INSTAGRAM = 'global_social_instagram';
    /** Line */
    case BASE_SOCIAL_LINE = 'global_social_line';
    /** Google API */
    case BASE_MAP_GOOGLE_API = 'global_map_google_api';
    /** Изображение */
    case BASE_MAP_IMAGE = 'global_map_image';
    case BASE_FIELD_SITE_RU = 'global_field_site_ru';
    case BASE_FIELD_SITE_EN = 'global_field_site_en';
    case BASE_FIELD_SITE_CN = 'global_field_site_cn';
    case BASE_FIELD_TELEGRAM_TOKEN = 'global_field_telegram_token';
    case BASE_FIELD_TELEGRAM_CHAT_ID = 'global_field_telegram_chat_id';
    case BASE_FIELD_TELEGRAM_MESSAGE = 'global_field_telegram_message';
    case BASE_FIELD_TELEGRAM_TOKEN_ADMIN = 'global_field_telegram_token_admin';
    case BASE_FIELD_TELEGRAM_CHAT_ID_ADMIN = 'global_field_telegram_chat_id_admin';
    case BASE_FIELD_TELEGRAM_MESSAGE_ADMIN = 'global_field_telegram_message_admin';
}
