<?php

use Sprint\Options\Builder\Builder;
use Sprint\Options\Custom\CheckboxOption;
use Sprint\Options\Custom\FileOption;
use Sprint\Options\Custom\StringOption;
use Sprint\Options\Custom\TextareaOption;

return (new Builder())
    ->setTitle('Настройки проекта')
    ->setSort(100)
    ->addPage('Основные настройки')
    ->addTab('Контакты')
    ->addCustomOption(
        (new StringOption('EMAIL'))
            ->setTitle('Email компании')
            ->setDefault('salesmutti@gmail.com')
            ->setWidth('150')
    )
    ->addCustomOption(
        (new StringOption('PHONE_RU'))
            ->setTitle('Номер телефона для RU-версии')
            ->setDefault('+66 80 43 65597')
            ->setWidth('150')
    )
    ->addCustomOption(
        (new StringOption('PHONE_EN'))
            ->setTitle('Номер телефона для EN-версии')
            ->setDefault('+66 9 8860 6410')
            ->setWidth('150')
    )
    ->addCustomOption(
        (new TextareaOption('OFFICE'))
            ->setTitle('Адрес офиса')
            ->setDefault('Адрес офиса')
            ->setWidth('400')
            ->setHeight('100')
            ->setDefault('Soi Sai Namyen, Chalong, Mueang Phuket District, Phuket 83130, Thailand')
    )
    ->addTab('Прочее')
    ->addCustomOption(
        (new StringOption('COPYRIGHT'))
            ->setTitle('Copyright')
            ->setDefault('Phuket MUTTI Family Villas')
            ->setWidth('300')
    )
    ->addPage('Социальные сети')
    ->addTab('Контроль показа')
    ->addCustomOption(
        (new CheckboxOption('SOCIAL_WECHAT'))
            ->setTitle('Показывать WeChat')
    )
    ->addCustomOption(
        (new CheckboxOption('SOCIAL_TELEGRAM'))
            ->setTitle('Показывать Telegram')
    )
    ->addCustomOption(
        (new CheckboxOption('SOCIAL_WHATSAPP'))
            ->setTitle('Показывать WhatsApp')
    )
    ->addCustomOption(
        (new CheckboxOption('SOCIAL_YOUTUBE'))
            ->setTitle('Показывать YouTube')
    )
    ->addCustomOption(
        (new CheckboxOption('SOCIAL_INSTAGRAM'))
            ->setTitle('Показывать Instagram')
    )
    ->addCustomOption(
        (new CheckboxOption('SOCIAL_LINE'))
            ->setTitle('Показывать Line')
    )

    ->addTab('WeChat')
    ->addCustomOption(
        (new StringOption('SOCIAL_WECHAT_LINK'))
            ->setTitle('Ссылка')
            ->setDefault('/')
            ->setWidth('300')
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_WECHAT_ICON_LIGHT'))
            ->setTitle('Светлая иконка')
            ->setAllowImages(1)
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_WECHAT_ICON_DARK'))
            ->setTitle('Темная иконка')
            ->setAllowImages(1)
    )

    ->addTab('Telegram')
    ->addCustomOption(
        (new StringOption('SOCIAL_TELEGRAM_LINK'))
            ->setTitle('Ссылка')
            ->setDefault('/')
            ->setWidth('300')
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_TELEGRAM_LIGHT'))
            ->setTitle('Светлая иконка')
            ->setAllowImages(1)
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_TELEGRAM_DARK'))
            ->setTitle('Темная иконка')
            ->setAllowImages(1)
    )

    ->addTab('WhatsApp')
    ->addCustomOption(
        (new StringOption('SOCIAL_WHATSAPP_LINK'))
            ->setTitle('Ссылка')
            ->setDefault('/')
            ->setWidth('300')
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_WHATSAPP_LIGHT'))
            ->setTitle('Светлая иконка')
            ->setAllowImages(1)
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_WHATSAPP_DARK'))
            ->setTitle('Темная иконка')
            ->setAllowImages(1)
    )

    ->addTab('YouTube')
    ->addCustomOption(
        (new StringOption('SOCIAL_YOUTUBE_LINK'))
            ->setTitle('Ссылка')
            ->setDefault('/')
            ->setWidth('300')
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_YOUTUBE_LIGHT'))
            ->setTitle('Светлая иконка')
            ->setAllowImages(1)
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_YOUTUBE_DARK'))
            ->setTitle('Темная иконка')
            ->setAllowImages(1)
    )

    ->addTab('Instagram')
    ->addCustomOption(
        (new StringOption('SOCIAL_INSTAGRAM_LINK'))
            ->setTitle('Ссылка')
            ->setDefault('/')
            ->setWidth('300')
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_INSTAGRAM_LIGHT'))
            ->setTitle('Светлая иконка')
            ->setAllowImages(1)
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_INSTAGRAM_DARK'))
            ->setTitle('Темная иконка')
            ->setAllowImages(1)
    )

    ->addTab('Line')
    ->addCustomOption(
        (new StringOption('SOCIAL_LINE_LINK'))
            ->setTitle('Ссылка')
            ->setDefault('/')
            ->setWidth('300')
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_LINE_LIGHT'))
            ->setTitle('Светлая иконка')
            ->setAllowImages(1)
    )
    ->addCustomOption(
        (new FileOption('SOCIAL_LINE_DARK'))
            ->setTitle('Темная иконка')
            ->setAllowImages(1)
    );
