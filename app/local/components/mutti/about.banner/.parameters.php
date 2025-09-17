<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
  die();

$arComponentParameters = [
  'GROUPS' => [],
  'PARAMETERS' => [
    'TITLE' => [
      'PARENT' => 'BASE',
      'NAME' => 'Заголовок баннера',
      'TYPE' => 'STRING',
      'DEFAULT' => '3D тур по комплексу',
    ],
    'LINK' => [
      'PARENT' => 'BASE',
      'NAME' => 'Ссылка с баннера',
      'TYPE' => 'STRING',
      'DEFAULT' => 'javascript:void()',
    ],
    'SHOW_BUTTON' => [
      'PARENT' => 'BASE',
      'NAME' => 'Показывать кнопку',
      'TYPE' => 'CHECKBOX',
      'DEFAULT' => 'Y',
    ],
    'CACHE_TIME' => [
      'DEFAULT' => 3600
    ],
  ],
];
