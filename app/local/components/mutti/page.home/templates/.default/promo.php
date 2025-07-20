<?php

use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;
use Mutti\Enum\OptionHomeEnum;
use Mutti\Enum\ModuleEnum;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var MuttiPageHomeComponent $component */
$this->setFrameMode(true);
$arSectionResult = $arResult['ITEMS'][$component->getTemplatePage()]; ?>

<section class="section block" id="promo">
    <div class="section-container container">
        <div class="section-row grid">
            <div class="section-grid section-grid__title">
                <h2 class="section-title"><?=$arSectionResult['NAME']?></h2><?
                if ($arSectionResult['UF_SUB_TITLE']): ?>
                    <p class="section-subtitle"><?=$arSectionResult['UF_SUB_TITLE']?></p><?
                endif; ?>
            </div><?
            if ($arSectionResult['ITEMS']): ?>
                <div class="section-grid section-grid__promo">
                    <div class="section-promo"><?
                        foreach ($arSectionResult['ITEMS'] as $item): ?>
                            <div class="section-promo__item">
                                <div class="section-promo__item--wrapper">
                                    <div class="section-promo__item--icon">
                                        <i class="bi bi-check2"></i>
                                    </div>
                                    <div class="section-promo__item--name"><?=$item['NAME']?></div>
                                </div>
                            </div><?
                        endforeach; ?>
                    </div>
                </div>
            <?endif;?>
            <div class="section-grid section-grid__feedback">
                <div class="section-feedback">
                    <div class="section-feedback__text"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_TITLE)?></div>


                    <form class="section-feedback__form" method="post" id="home-feedback"
                          data-success-title="<?= Loc::getMessage('SUCCESS_TITLE')?>"
                          data-success-text="<?= Loc::getMessage('SUCCESS_TEXT')?>"
                          data-error-title="<?= Loc::getMessage('ERROR_TITLE')?>"
                          data-error-text="<?= Loc::getMessage('ERROR_TEXT')?>"
                          data-danger-title="<?= Loc::getMessage('DANGER_TITLE')?>"
                          data-danger-text="<?= Loc::getMessage('DANGER_TEXT')?>">
                        <?= bitrix_sessid_post() ?>
                        <div class="section-feedback__form--wrapper">
                            <div class="section-feedback__form--row input">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputName" name="name"
                                           placeholder="<?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_NAME)?>" required>
                                    <label for="floatingInputName"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_NAME)?></label>
                                </div>
                                <div class="form-floating phone-input-container">
                                    <input type="tel" class="form-control" id="floatingInputPhone" name="phone"
                                           data-lang="<?=LANGUAGE_ID?>"
                                           placeholder="<?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_PHONE)?>"
                                           maxlength="20" autocomplete="tel" required>
                                    <label for="floatingInputPhone"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_PHONE)?></label>
                                    <div class="invalid-feedback"></div>
                                    <div class="phone-hint">Введите номер с кодом страны: +7 999 999 99 99</div>
                                    <div class="country-indicator"></div>
                                </div>
                            </div>

                            <div class="section-feedback__form--row button">
                                <button class="btn btn-link" type="submit"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_BUTTON)?></button>
                                <span><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_NOTIFICATION)?></span>
                            </div>
                        </div>
                    </form>



                    <style>
                        .phone-input-container {
                            position: relative;
                        }

                        .phone-hint {
                            font-size: 0.875rem;
                            color: #6c757d;
                            margin-top: 0.25rem;
                            opacity: 0;
                            transition: opacity 0.3s ease;
                        }

                        .phone-input-container:focus-within .phone-hint {
                            opacity: 1;
                        }

                        .country-indicator {
                            position: absolute;
                            right: 10px;
                            top: 50%;
                            transform: translateY(-50%);
                            font-size: 0.75rem;
                            color: #28a745;
                            font-weight: 500;
                            opacity: 0;
                            transition: opacity 0.3s ease;
                        }

                        .country-indicator.show {
                            opacity: 1;
                        }

                        .form-control.phone-valid {
                            border-color: #28a745;
                            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='m2.3 6.73.8-.77-.8-.77-.8.77.8.77zm1.54-4.02L5.3 1.25 4.5.48 2.84 2.14l-.83-.83-.8.77 1.63 1.63z'/%3e%3c/svg%3e");
                            background-repeat: no-repeat;
                            background-position: right calc(0.375em + 0.1875rem) center;
                            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
                        }

                        .form-control.phone-invalid {
                            border-color: #dc3545;
                        }
                    </style>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const phoneInput = document.getElementById('floatingInputPhone');
                            const invalidFeedback = phoneInput.parentElement.querySelector('.invalid-feedback');
                            const phoneHint = phoneInput.parentElement.querySelector('.phone-hint');
                            const countryIndicator = phoneInput.parentElement.querySelector('.country-indicator');

                            // Расширенная база кодов стран для определения региона
                            const countryCodes = {
                                // Северная Америка
                                '1': { name: 'США/Канада', format: '+1 (###) ###-####', length: [10] },

                                // Россия и СНГ
                                '7': { name: 'Россия/Казахстан', format: '+7 (###) ###-##-##', length: [10] },
                                '375': { name: 'Беларусь', format: '+375 ## ###-##-##', length: [9] },
                                '380': { name: 'Украина', format: '+380 ## ###-##-##', length: [9] },
                                '994': { name: 'Азербайджан', format: '+994 ## ###-##-##', length: [9] },
                                '374': { name: 'Армения', format: '+374 ## ###-###', length: [8] },
                                '995': { name: 'Грузия', format: '+995 ### ##-##-##', length: [9] },
                                '996': { name: 'Киргизия', format: '+996 ### ###-###', length: [9] },
                                '373': { name: 'Молдова', format: '+373 #### #-##-##', length: [8] },
                                '992': { name: 'Таджикистан', format: '+992 ## ###-##-##', length: [9] },
                                '993': { name: 'Туркменистан', format: '+993 # ###-##-##', length: [8] },
                                '998': { name: 'Узбекистан', format: '+998 ## ###-##-##', length: [9] },

                                // Западная Европа
                                '33': { name: 'Франция', format: '+33 # ## ## ## ##', length: [9] },
                                '49': { name: 'Германия', format: '+49 #### #######', length: [10, 11] },
                                '44': { name: 'Великобритания', format: '+44 #### ######', length: [10] },
                                '39': { name: 'Италия', format: '+39 ### ### ####', length: [9, 10] },
                                '34': { name: 'Испания', format: '+34 ### ### ###', length: [9] },
                                '31': { name: 'Нидерланды', format: '+31 # #### ####', length: [9] },
                                '32': { name: 'Бельгия', format: '+32 ### ## ## ##', length: [9] },
                                '41': { name: 'Швейцария', format: '+41 ## ### ## ##', length: [9] },
                                '43': { name: 'Австрия', format: '+43 #### ######', length: [10, 11] },
                                '351': { name: 'Португалия', format: '+351 ### ### ###', length: [9] },
                                '353': { name: 'Ирландия', format: '+353 ## ### ####', length: [9] },
                                '352': { name: 'Люксембург', format: '+352 ### ### ###', length: [9] },
                                '377': { name: 'Монако', format: '+377 ## ## ## ##', length: [8] },
                                '376': { name: 'Андорра', format: '+376 ### ###', length: [6] },
                                '378': { name: 'Сан-Марино', format: '+378 #### ######', length: [10] },
                                '379': { name: 'Ватикан', format: '+379 ## ## ## ##', length: [8] },
                                '423': { name: 'Лихтенштейн', format: '+423 ### ## ##', length: [7] },

                                // Северная Европа
                                '46': { name: 'Швеция', format: '+46 ##-### ## ##', length: [9] },
                                '47': { name: 'Норвегия', format: '+47 ### ## ###', length: [8] },
                                '45': { name: 'Дания', format: '+45 ## ## ## ##', length: [8] },
                                '358': { name: 'Финляндия', format: '+358 ## ### ####', length: [9] },
                                '354': { name: 'Исландия', format: '+354 ### ####', length: [7] },
                                '298': { name: 'Фарерские острова', format: '+298 ######', length: [6] },
                                '299': { name: 'Гренландия', format: '+299 ## ## ##', length: [6] },

                                // Восточная Европа
                                '48': { name: 'Польша', format: '+48 ### ### ###', length: [9] },
                                '420': { name: 'Чехия', format: '+420 ### ### ###', length: [9] },
                                '421': { name: 'Словакия', format: '+421 ### ### ###', length: [9] },
                                '36': { name: 'Венгрия', format: '+36 ## ### ####', length: [9] },
                                '40': { name: 'Румыния', format: '+40 ### ### ###', length: [9] },
                                '359': { name: 'Болгария', format: '+359 ## ### ####', length: [9] },
                                '385': { name: 'Хорватия', format: '+385 ## ### ####', length: [9] },
                                '386': { name: 'Словения', format: '+386 ## ### ###', length: [8] },
                                '387': { name: 'Босния и Герцеговина', format: '+387 ## ### ###', length: [8] },
                                '381': { name: 'Сербия', format: '+381 ## ### ####', length: [9] },
                                '382': { name: 'Черногория', format: '+382 ## ### ###', length: [8] },
                                '383': { name: 'Косово', format: '+383 ## ### ###', length: [8] },
                                '389': { name: 'Северная Македония', format: '+389 ## ### ###', length: [8] },
                                '355': { name: 'Албания', format: '+355 ## ### ####', length: [9] },
                                '370': { name: 'Литва', format: '+370 ### ## ###', length: [8] },
                                '371': { name: 'Латвия', format: '+371 ## ### ###', length: [8] },
                                '372': { name: 'Эстония', format: '+372 #### ####', length: [7, 8] },

                                // Азия - Восточная
                                '86': { name: 'Китай', format: '+86 ### #### ####', length: [11] },
                                '81': { name: 'Япония', format: '+81 ##-####-####', length: [10] },
                                '82': { name: 'Южная Корея', format: '+82 ##-####-####', length: [10, 11] },
                                '850': { name: 'Северная Корея', format: '+850 ### ### ####', length: [10] },
                                '886': { name: 'Тайвань', format: '+886 ### ### ###', length: [9] },
                                '852': { name: 'Гонконг', format: '+852 #### ####', length: [8] },
                                '853': { name: 'Макао', format: '+853 #### ####', length: [8] },
                                '976': { name: 'Монголия', format: '+976 ## ## ####', length: [8] },

                                // Азия - Южная
                                '91': { name: 'Индия', format: '+91 ##### #####', length: [10] },
                                '92': { name: 'Пакистан', format: '+92 ### #######', length: [10] },
                                '880': { name: 'Бангладеш', format: '+880 ####-######', length: [10] },
                                '94': { name: 'Шри-Ланка', format: '+94 ## ### ####', length: [9] },
                                '977': { name: 'Непал', format: '+977 ##-###-####', length: [10] },
                                '975': { name: 'Бутан', format: '+975 # ### ###', length: [7] },
                                '960': { name: 'Мальдивы', format: '+960 ###-####', length: [7] },
                                '93': { name: 'Афганистан', format: '+93 ## ### ####', length: [9] },

                                // Азия - Юго-Восточная
                                '66': { name: 'Таиланд', format: '+66 ## ### ####', length: [9] },
                                '84': { name: 'Вьетнам', format: '+84 ## #### ####', length: [9] },
                                '60': { name: 'Малайзия', format: '+60 ##-### ####', length: [9, 10] },
                                '65': { name: 'Сингапур', format: '+65 #### ####', length: [8] },
                                '62': { name: 'Индонезия', format: '+62 ###-###-####', length: [9, 10, 11] },
                                '63': { name: 'Филиппины', format: '+63 ### ### ####', length: [10] },
                                '673': { name: 'Бруней', format: '+673 ### ####', length: [7] },
                                '855': { name: 'Камбоджа', format: '+855 ## ### ###', length: [8] },
                                '856': { name: 'Лаос', format: '+856 ## ### ###', length: [8] },
                                '95': { name: 'Мьянма', format: '+95 # ### ####', length: [8, 9] },
                                '670': { name: 'Восточный Тимор', format: '+670 ### ####', length: [7] },

                                // Ближний Восток
                                '90': { name: 'Турция', format: '+90 ### ### ## ##', length: [10] },
                                '98': { name: 'Иран', format: '+98 ### ### ####', length: [10] },
                                '964': { name: 'Ирак', format: '+964 ### ### ####', length: [10] },
                                '972': { name: 'Израиль', format: '+972 ##-###-####', length: [9] },
                                '970': { name: 'Палестина', format: '+970 ## ### ####', length: [9] },
                                '962': { name: 'Иордания', format: '+962 # #### ####', length: [9] },
                                '961': { name: 'Ливан', format: '+961 ## ### ###', length: [8] },
                                '963': { name: 'Сирия', format: '+963 ## #### ###', length: [9] },
                                '966': { name: 'Саудовская Аравия', format: '+966 ## ### ####', length: [9] },
                                '971': { name: 'ОАЭ', format: '+971 ## ### ####', length: [9] },
                                '965': { name: 'Кувейт', format: '+965 #### ####', length: [8] },
                                '974': { name: 'Катар', format: '+974 #### ####', length: [8] },
                                '973': { name: 'Бахрейн', format: '+973 #### ####', length: [8] },
                                '968': { name: 'Оман', format: '+968 #### ####', length: [8] },
                                '967': { name: 'Йемен', format: '+967 # ### ###', length: [7, 8] },
                                '995': { name: 'Грузия', format: '+995 ### ##-##-##', length: [9] },

                                // Африка - Северная
                                '20': { name: 'Египет', format: '+20 ## #### ####', length: [10] },
                                '218': { name: 'Ливия', format: '+218 ##-#######', length: [9] },
                                '216': { name: 'Тунис', format: '+216 ## ### ###', length: [8] },
                                '213': { name: 'Алжир', format: '+213 ### ## ## ##', length: [9] },
                                '212': { name: 'Марокко', format: '+212 ###-######', length: [9] },
                                '249': { name: 'Судан', format: '+249 ## ### ####', length: [9] },
                                '211': { name: 'Южный Судан', format: '+211 ## ### ####', length: [9] },

                                // Африка - Западная
                                '234': { name: 'Нигерия', format: '+234 ### ### ####', length: [10] },
                                '233': { name: 'Гана', format: '+233 ## ### ####', length: [9] },
                                '225': { name: 'Кот-д\'Ивуар', format: '+225 ## ## ## ##', length: [8] },
                                '221': { name: 'Сенегал', format: '+221 ## ### ## ##', length: [9] },
                                '223': { name: 'Мали', format: '+223 ## ## ## ##', length: [8] },
                                '226': { name: 'Буркина-Фасо', format: '+226 ## ## ## ##', length: [8] },
                                '227': { name: 'Нигер', format: '+227 ## ## ## ##', length: [8] },
                                '228': { name: 'Того', format: '+228 ## ## ## ##', length: [8] },
                                '229': { name: 'Бенин', format: '+229 ## ## ## ##', length: [8] },
                                '220': { name: 'Гамбия', format: '+220 ### ####', length: [7] },
                                '224': { name: 'Гвинея', format: '+224 ## ## ## ##', length: [8] },
                                '245': { name: 'Гвинея-Бисау', format: '+245 # ######', length: [7] },
                                '238': { name: 'Кабо-Верде', format: '+238 ### ## ##', length: [7] },
                                '232': { name: 'Сьерра-Леоне', format: '+232 ## ######', length: [8] },
                                '231': { name: 'Либерия', format: '+231 ## ### ####', length: [8] },
                                '230': { name: 'Маврикий', format: '+230 #### ####', length: [8] },

                                // Африка - Восточная
                                '254': { name: 'Кения', format: '+254 ### ######', length: [9] },
                                '255': { name: 'Танзания', format: '+255 ## ### ####', length: [9] },
                                '256': { name: 'Уганда', format: '+256 ### ######', length: [9] },
                                '250': { name: 'Руанда', format: '+250 ### ### ###', length: [9] },
                                '257': { name: 'Бурунди', format: '+257 ## ## ## ##', length: [8] },
                                '251': { name: 'Эфиопия', format: '+251 ## ### ####', length: [9] },
                                '252': { name: 'Сомали', format: '+252 ## ### ####', length: [8] },
                                '253': { name: 'Джибути', format: '+253 ## ## ## ##', length: [8] },
                                '291': { name: 'Эритрея', format: '+291 # ### ###', length: [7] },
                                '248': { name: 'Сейшелы', format: '+248 # ### ###', length: [7] },
                                '261': { name: 'Мадагаскар', format: '+261 ## ## ### ##', length: [9] },
                                '269': { name: 'Коморы', format: '+269 ### ## ##', length: [7] },
                                '262': { name: 'Реюньон/Майотта', format: '+262 ##### ####', length: [9] },

                                // Африка - Центральная
                                '237': { name: 'Камерун', format: '+237 #### ####', length: [8] },
                                '236': { name: 'ЦАР', format: '+236 ## ## ## ##', length: [8] },
                                '235': { name: 'Чад', format: '+235 ## ## ## ##', length: [8] },
                                '242': { name: 'Республика Конго', format: '+242 ## ### ####', length: [9] },
                                '243': { name: 'ДР Конго', format: '+243 ### ### ###', length: [9] },
                                '240': { name: 'Экваториальная Гвинея', format: '+240 ### ### ###', length: [9] },
                                '241': { name: 'Габон', format: '+241 ## ## ## ##', length: [8] },
                                '239': { name: 'Сан-Томе и Принсипи', format: '+239 ### ####', length: [7] },

                                // Африка - Южная
                                '27': { name: 'ЮАР', format: '+27 ## ### ####', length: [9] },
                                '264': { name: 'Намибия', format: '+264 ## ### ####', length: [9] },
                                '267': { name: 'Ботсвана', format: '+267 ## ### ###', length: [8] },
                                '268': { name: 'Эсватини', format: '+268 ## ## ## ##', length: [8] },
                                '266': { name: 'Лесото', format: '+266 #### ####', length: [8] },
                                '258': { name: 'Мозамбик', format: '+258 ## ### ####', length: [9] },
                                '260': { name: 'Замбия', format: '+260 ## ### ####', length: [9] },
                                '263': { name: 'Зимбабве', format: '+263 # ### ###', length: [7] },
                                '265': { name: 'Малави', format: '+265 # ### ###', length: [7] },
                                '244': { name: 'Ангола', format: '+244 ### ### ###', length: [9] },

                                // Латинская Америка - Южная
                                '55': { name: 'Бразилия', format: '+55 ## #####-####', length: [10, 11] },
                                '54': { name: 'Аргентина', format: '+54 ## ####-####', length: [10] },
                                '56': { name: 'Чили', format: '+56 # #### ####', length: [9] },
                                '57': { name: 'Колумбия', format: '+57 ### ### ####', length: [10] },
                                '58': { name: 'Венесуэла', format: '+58 ###-#######', length: [10] },
                                '51': { name: 'Перу', format: '+51 ### ### ###', length: [9] },
                                '593': { name: 'Эквадор', format: '+593 ## ### ####', length: [9] },
                                '591': { name: 'Боливия', format: '+591 # ### ####', length: [8] },
                                '595': { name: 'Парагвай', format: '+595 ### ######', length: [9] },
                                '598': { name: 'Уругвай', format: '+598 #### ####', length: [8] },
                                '594': { name: 'Французская Гвиана', format: '+594 ##### ####', length: [9] },
                                '597': { name: 'Суринам', format: '+597 ###-####', length: [7] },
                                '592': { name: 'Гайана', format: '+592 ### ####', length: [7] },
                                '500': { name: 'Фолклендские острова', format: '+500 #####', length: [5] },

                                // Латинская Америка - Центральная и Карибы
                                '52': { name: 'Мексика', format: '+52 ## #### ####', length: [10] },
                                '502': { name: 'Гватемала', format: '+502 #### ####', length: [8] },
                                '503': { name: 'Сальвадор', format: '+503 #### ####', length: [8] },
                                '504': { name: 'Гондурас', format: '+504 #### ####', length: [8] },
                                '505': { name: 'Никарагуа', format: '+505 #### ####', length: [8] },
                                '506': { name: 'Коста-Рика', format: '+506 #### ####', length: [8] },
                                '507': { name: 'Панама', format: '+507 ####-####', length: [8] },
                                '501': { name: 'Белиз', format: '+501 ###-####', length: [7] },
                                '53': { name: 'Куба', format: '+53 # ### ####', length: [8] },
                                '509': { name: 'Гаити', format: '+509 ## ## ####', length: [8] },
                                '1809': { name: 'Доминиканская Республика', format: '+1 (809) ###-####', length: [10] },
                                '1876': { name: 'Ямайка', format: '+1 (876) ###-####', length: [10] },
                                '1868': { name: 'Тринидад и Тобаго', format: '+1 (868) ###-####', length: [10] },
                                '1246': { name: 'Барбадос', format: '+1 (246) ###-####', length: [10] },
                                '1784': { name: 'Сент-Винсент и Гренадины', format: '+1 (784) ###-####', length: [10] },
                                '1787': { name: 'Пуэрто-Рико', format: '+1 (787) ###-####', length: [10] },
                                '590': { name: 'Гваделупа', format: '+590 ### ## ## ##', length: [9] },
                                '596': { name: 'Мартиника', format: '+596 ### ## ## ##', length: [9] },
                                '599': { name: 'Нидерландские Антилы', format: '+599 ### ####', length: [7] },

                                // Океания
                                '61': { name: 'Австралия', format: '+61 # #### ####', length: [9] },
                                '64': { name: 'Новая Зеландия', format: '+64 ## ### ####', length: [9] },
                                '679': { name: 'Фиджи', format: '+679 ### ####', length: [7] },
                                '675': { name: 'Папуа-Новая Гвинея', format: '+675 ### ####', length: [7] },
                                '687': { name: 'Новая Каледония', format: '+687 ##.##.##', length: [6] },
                                '689': { name: 'Французская Полинезия', format: '+689 ## ## ## ##', length: [8] },
                                '685': { name: 'Самоа', format: '+685 ## ####', length: [6] },
                                '684': { name: 'Американское Самоа', format: '+684 ###-####', length: [7] },
                                '676': { name: 'Тонга', format: '+676 #####', length: [5] },
                                '677': { name: 'Соломоновы Острова', format: '+677 #####', length: [5] },
                                '678': { name: 'Вануату', format: '+678 #####', length: [5] },
                                '682': { name: 'Острова Кука', format: '+682 ## ###', length: [5] },
                                '683': { name: 'Ниуэ', format: '+683 ####', length: [4] },
                                '686': { name: 'Кирибати', format: '+686 ## ###', length: [5] },
                                '688': { name: 'Тувалу', format: '+688 #####', length: [5] },
                                '691': { name: 'Микронезия', format: '+691 ### ####', length: [7] },
                                '692': { name: 'Маршалловы Острова', format: '+692 ###-####', length: [7] },
                                '680': { name: 'Палау', format: '+680 ### ####', length: [7] },
                                '670': { name: 'Северные Марианские острова', format: '+670 ###-####', length: [7] },
                                '681': { name: 'Уоллис и Футуна', format: '+681 ## ## ##', length: [6] },

                                // Антарктида и отдаленные территории
                                '672': { name: 'Антарктида/Норфолк', format: '+672 ### ###', length: [6] },
                                '290': { name: 'Святой Елены остров', format: '+290 ####', length: [4] },
                                '247': { name: 'Остров Вознесения', format: '+247 ####', length: [4] },
                                '508': { name: 'Сен-Пьер и Микелон', format: '+508 ## ## ##', length: [6] },

                                // Универсальная маска для остальных стран
                                'default': { name: 'Международный', format: '+### ### ### ####', length: [7, 8, 9, 10, 11, 12, 13, 14, 15] }
                            };


                            let isFormatting = false;

                            // Определение страны по коду
                            function detectCountry(digits) {
                                // Проверяем трёхзначные коды
                                for (let i = 3; i >= 1; i--) {
                                    const code = digits.substring(0, i);
                                    if (countryCodes[code]) {
                                        return { code, info: countryCodes[code] };
                                    }
                                }
                                return null;
                            }

                            // Универсальное форматирование
                            function formatPhone(value) {
                                const digits = value.replace(/\D/g, '');

                                if (digits.length === 0) return '+';

                                const country = detectCountry(digits);

                                if (country) {
                                    const remainingDigits = digits.substring(country.code.length);
                                    let formatted = `+${country.code}`;

                                    // Применяем базовое форматирование группами
                                    if (remainingDigits.length > 0) {
                                        const groups = [];
                                        let remaining = remainingDigits;

                                        // Разбиваем на группы по 3-4 цифры
                                        while (remaining.length > 0) {
                                            if (remaining.length <= 4) {
                                                groups.push(remaining);
                                                break;
                                            } else if (remaining.length <= 7) {
                                                groups.push(remaining.substring(0, 3));
                                                remaining = remaining.substring(3);
                                            } else {
                                                groups.push(remaining.substring(0, 3));
                                                remaining = remaining.substring(3);
                                            }
                                        }

                                        formatted += ' ' + groups.join(' ');
                                    }

                                    return formatted;
                                } else {
                                    // Универсальный формат для неизвестных кодов
                                    let formatted = `+${digits.substring(0, 1)}`;
                                    const remaining = digits.substring(1);

                                    if (remaining.length > 0) {
                                        const groups = [];
                                        let temp = remaining;

                                        while (temp.length > 0) {
                                            if (temp.length <= 4) {
                                                groups.push(temp);
                                                break;
                                            } else {
                                                groups.push(temp.substring(0, 3));
                                                temp = temp.substring(3);
                                            }
                                        }

                                        formatted += ' ' + groups.join(' ');
                                    }

                                    return formatted;
                                }
                            }

                            // Валидация номера
                            function validatePhone(value) {
                                const digits = value.replace(/\D/g, '');

                                if (digits.length === 0) {
                                    return { isValid: false, message: '' };
                                }

                                if (digits.length < 7) {
                                    return { isValid: false, message: 'Слишком короткий номер' };
                                }

                                if (digits.length > 15) {
                                    return { isValid: false, message: 'Слишком длинный номер' };
                                }

                                const country = detectCountry(digits);

                                if (country) {
                                    const nationalNumber = digits.substring(country.code.length);
                                    const validLengths = country.info.length;

                                    if (!validLengths.includes(nationalNumber.length)) {
                                        return {
                                            isValid: false,
                                            message: `Неверная длина для ${country.info.name}`
                                        };
                                    }

                                    return {
                                        isValid: true,
                                        message: `Корректный номер ${country.info.name}`,
                                        country: country.info.name
                                    };
                                } else {
                                    // Для неизвестных кодов проверяем общую длину
                                    if (digits.length >= 7 && digits.length <= 15) {
                                        return {
                                            isValid: true,
                                            message: 'Корректный международный номер',
                                            country: 'Международный'
                                        };
                                    } else {
                                        return { isValid: false, message: 'Некорректный номер' };
                                    }
                                }
                            }

                            // Обновление UI
                            function updateUI(validation) {
                                phoneInput.classList.remove('phone-valid', 'phone-invalid');
                                invalidFeedback.textContent = '';
                                countryIndicator.classList.remove('show');

                                if (phoneInput.value.length > 0) {
                                    if (validation.isValid) {
                                        phoneInput.classList.add('phone-valid');
                                        phoneInput.setCustomValidity('');
                                        if (validation.country) {
                                            countryIndicator.textContent = validation.country;
                                            countryIndicator.classList.add('show');
                                        }
                                    } else {
                                        phoneInput.classList.add('phone-invalid');
                                        phoneInput.setCustomValidity(validation.message);
                                        if (validation.message) {
                                            invalidFeedback.textContent = validation.message;
                                        }
                                    }
                                }
                            }

                            // Обработка ввода
                            phoneInput.addEventListener('input', function(e) {
                                if (isFormatting) return;

                                isFormatting = true;

                                let value = e.target.value;

                                // Автоматически добавляем + если его нет и есть цифры
                                if (value.length > 0 && !value.startsWith('+') && /\d/.test(value)) {
                                    value = '+' + value.replace(/\D/g, '');
                                }

                                const cursorPosition = e.target.selectionStart;
                                const oldValue = e.target.value;
                                let digits = value.replace(/\D/g, '');

                                // Ограничение длины (максимум 15 цифр)
                                if (digits.length > 15) {
                                    digits = digits.substring(0, 15);
                                }

                                const newValue = formatPhone(digits);
                                e.target.value = newValue;

                                // Обновление подсказки
                                const country = detectCountry(digits);
                                if (country) {
                                    phoneHint.textContent = `Формат ${country.info.name}: ${country.info.format}`;
                                } else {
                                    phoneHint.textContent = 'Введите номер с кодом страны: +7 999 999 99 99';
                                }

                                // Восстановление позиции курсора
                                let newCursorPosition = cursorPosition;
                                if (newValue.length !== oldValue.length) {
                                    const diff = newValue.length - oldValue.length;
                                    newCursorPosition = Math.max(0, cursorPosition + diff);
                                }

                                setTimeout(() => {
                                    e.target.setSelectionRange(newCursorPosition, newCursorPosition);
                                }, 0);

                                // Валидация
                                const validation = validatePhone(newValue);
                                updateUI(validation);

                                isFormatting = false;
                            });

                            // Обработка нажатий клавиш
                            phoneInput.addEventListener('keypress', function(e) {
                                const char = String.fromCharCode(e.which);

                                // Разрешаем цифры
                                if (/^[0-9]$/.test(char)) {
                                    return;
                                }

                                // Разрешаем + только в начале
                                if (char === '+' && this.selectionStart === 0 && this.value.length === 0) {
                                    return;
                                }

                                // Блокируем все остальное
                                e.preventDefault();
                            });


                            // Обработка вставки
                            phoneInput.addEventListener('paste', function(e) {
                                e.preventDefault();
                                const paste = (e.clipboardData || window.clipboardData).getData('text');
                                let digits = paste.replace(/\D/g, '');

                                if (digits.length > 15) {
                                    digits = digits.substring(0, 15);
                                }

                                if (digits.length > 0) {
                                    this.value = formatPhone(digits);
                                    const validation = validatePhone(this.value);
                                    updateUI(validation);
                                }
                            });

                            // Обработка потери фокуса
                            phoneInput.addEventListener('blur', function() {
                                const validation = validatePhone(this.value);
                                if (this.value.length > 0 && !validation.isValid) {
                                    this.classList.add('is-invalid');
                                }
                            });

                            // Обработка получения фокуса
                            phoneInput.addEventListener('focus', function() {
                                this.classList.remove('is-invalid');
                                if (this.value.length === 0) {
                                    phoneHint.textContent = 'Начните с + и кода страны';
                                }
                            });

                            // Валидация при отправке формы
                            phoneInput.closest('form').addEventListener('submit', function(e) {
                                const validation = validatePhone(phoneInput.value);
                                if (phoneInput.value.length > 0 && !validation.isValid) {
                                    e.preventDefault();
                                    phoneInput.focus();
                                    phoneInput.classList.add('is-invalid');
                                    invalidFeedback.textContent = validation.message;
                                    phoneInput.reportValidity();
                                }
                            });
                        });
                    </script>


                    <?php /*
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const phoneInput = document.getElementById('floatingInputPhone');

                            // Простая маска без библиотек
                            phoneInput.addEventListener('input', function(e) {
                                let value = e.target.value.replace(/\D/g, ''); // Только цифры

                                if (value.length > 0) {
                                    if (value.length <= 11) {
                                        // Российский формат
                                        value = value.replace(/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})/, '+$1 ($2) $3-$4-$5');
                                    } else {
                                        // Международный формат
                                        value = '+' + value.replace(/(\d{1,3})(\d{3})(\d{3})(\d{4})/, '$1 $2 $3 $4');
                                    }
                                }

                                e.target.value = value;
                            });

                            // Валидация
                            phoneInput.addEventListener('blur', function() {
                                const digits = this.value.replace(/\D/g, '');
                                if (digits.length < 10 || digits.length > 15) {
                                    this.setCustomValidity('Номер должен содержать от 10 до 15 цифр');
                                    this.classList.add('is-invalid');
                                } else {
                                    this.setCustomValidity('');
                                    this.classList.remove('is-invalid');
                                }
                            });

                            // Запрет ввода букв
                            phoneInput.addEventListener('keypress', function(e) {
                                if (!/[\d\+\-\(\)\s]/.test(e.key) && !['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight'].includes(e.key)) {
                                    e.preventDefault();
                                }
                            });
                        });
                    </script>
            */ ?>

                    <?php /*

                    <form class="section-feedback__form" method="post" id="home-feedback"
                          data-success-title="<?= Loc::getMessage('SUCCESS_TITLE')?>"
                          data-success-text="<?= Loc::getMessage('SUCCESS_TEXT')?>"
                          data-error-title="<?= Loc::getMessage('ERROR_TITLE')?>"
                          data-error-text="<?= Loc::getMessage('ERROR_TEXT')?>"
                          data-danger-title="<?= Loc::getMessage('DANGER_TITLE')?>"
                          data-danger-text="<?= Loc::getMessage('DANGER_TEXT')?>">
                        <?= bitrix_sessid_post() ?>
                        <div class="section-feedback__form--wrapper">
                            <div class="section-feedback__form--row input">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputName" name="name"
                                           placeholder="<?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_NAME)?>" required>
                                    <label for="floatingInputName"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_NAME)?></label>
                                </div>
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="floatingInputPhone" name="phone"
                                           data-lang="<?=LANGUAGE_ID?>"
                                           placeholder="<?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_PHONE)?>" minlength="10" required>
                                    <label for="floatingInputPhone"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_PHONE)?></label>
                                </div>
                            </div>



                            <input type="tel" id="phoneInput" name="phone" required>

                            <div class="section-feedback__form--row button">
                                <button class="btn btn-link" type="submit"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_BUTTON)?></button>
                                <span><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_NOTIFICATION)?></span>
                            </div>
                        </div>
                    </form>

 */ ?>




<?php /*




                    <form class="section-feedback__form" method="post" id="home-feedback"
                          data-success-title="<?= Loc::getMessage('SUCCESS_TITLE')?>"
                          data-success-text="<?= Loc::getMessage('SUCCESS_TEXT')?>"
                          data-error-title="<?= Loc::getMessage('ERROR_TITLE')?>"
                          data-error-text="<?= Loc::getMessage('ERROR_TEXT')?>"
                          data-danger-title="<?= Loc::getMessage('DANGER_TITLE')?>"
                          data-danger-text="<?= Loc::getMessage('DANGER_TEXT')?>">
                        <?= bitrix_sessid_post() ?>
                        <div class="section-feedback__form--wrapper">
                            <div class="section-feedback__form--row input">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputName" name="name"
                                           placeholder="<?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_NAME)?>" required>
                                    <label for="floatingInputName"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_NAME)?></label>
                                </div>
                                <div class="form-floating">
                                    <input type="tel" class="form-control" id="floatingInputPhone" name="phone"
                                           data-lang="<?=LANGUAGE_ID?>"
                                           placeholder="<?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_PHONE)?>" required>
                                    <label for="floatingInputPhone"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_INPUT_PHONE)?></label>
                                </div>
                            </div>

                            <div class="section-feedback__form--row button">
                                <button class="btn btn-link" type="submit"><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_BUTTON)?></button>
                                <span><?=$component->getModuleOption(OptionHomeEnum::HOME_PROMO_CALLBACK_NOTIFICATION)?></span>
                            </div>
                        </div>
                    </form>



                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const input = document.querySelector('#floatingInputPhone');
                            const iti = window.intlTelInput(input, {
                                initialCountry: "auto",
                                geoIpLookup: function(callback) {
                                    fetch('https://ipinfo.io/json')
                                        .then(resp => resp.json())
                                        .then(resp => callback(resp.country ? resp.country : 'ru'))
                                        .catch(() => callback('ru'));
                                },
                                utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/utils.js",
                                separateDialCode: true,
                                nationalMode: false,
                            });

                            let mask;

                            const phoneMasks = {
                                // СНГ и Восточная Европа
                                ru: '+{7} (000) 000-00-00',
                                ua: '+{380} (00) 000-00-00',
                                by: '+{375} (00) 000-00-00',
                                kz: '+{7} (000) 000-00-00',
                                uz: '+{998} (00) 000-00-00',
                                kg: '+{996} (000) 000-000',
                                az: '+{994} (00) 000-00-00',
                                am: '+{374} (00) 000-000',
                                ge: '+{995} (000) 00-00-00',
                                md: '+{373} (0000) 0-00-00',
                                tj: '+{992} (00) 000-00-00',
                                tm: '+{993} (0) 000-00-00',

                                // Северная Америка
                                us: '+{1} (000) 000-0000',
                                ca: '+{1} (000) 000-0000',

                                // Западная Европа
                                gb: '+{44} 0000 000000',
                                de: '+{49} 0000 0000000',
                                fr: '+{33} 0 00 00 00 00',
                                it: '+{39} 000 000 0000',
                                es: '+{34} 000 00 00 00',
                                pt: '+{351} 000 000 000',
                                nl: '+{31} 0 0000 0000',
                                be: '+{32} 000 00 00 00',
                                ch: '+{41} 00 000 00 00',
                                at: '+{43} 0000 000000',
                                se: '+{46} 00-000 00 00',
                                no: '+{47} 000 00 000',
                                dk: '+{45} 00 00 00 00',
                                fi: '+{358} 00 000 0000',
                                ie: '+{353} 00 000 0000',
                                lu: '+{352} 000 000 000',

                                // Восточная Европа
                                pl: '+{48} 000-000-000',
                                cz: '+{420} 000 000 000',
                                sk: '+{421} 000 000 000',
                                hu: '+{36} 00 000 0000',
                                ro: '+{40} 000 000 000',
                                bg: '+{359} 00 000 0000',
                                hr: '+{385} 00 000 0000',
                                si: '+{386} 00 000 000',
                                rs: '+{381} 00 000 0000',
                                ba: '+{387} 00 000 000',
                                me: '+{382} 00 000 000',
                                mk: '+{389} 00 000 000',
                                al: '+{355} 00 000 0000',

                                // Азия
                                cn: '+{86} 000 0000 0000',
                                jp: '+{81} 00-0000-0000',
                                kr: '+{82} 00-0000-0000',
                                in: '+{91} 00000-00000',
                                pk: '+{92} 000-0000000',
                                bd: '+{880} 0000-000000',
                                lk: '+{94} 00 000 0000',
                                np: '+{977} 00-000-0000',
                                bt: '+{975} 0 000 000',
                                mv: '+{960} 000-0000',

                                // Юго-Восточная Азия
                                th: '+{66} 00 000 0000',
                                vn: '+{84} 00 0000 0000',
                                my: '+{60} 00-000 0000',
                                sg: '+{65} 0000 0000',
                                id: '+{62} 000-000-0000',
                                ph: '+{63} 000 000 0000',
                                kh: '+{855} 00 000 000',
                                la: '+{856} 00 000 000',
                                mm: '+{95} 0 000 0000',
                                bn: '+{673} 000 0000',
                                tl: '+{670} 000 0000',

                                // Ближний Восток
                                tr: '+{90} (000) 000-00-00',
                                ir: '+{98} 000 000 0000',
                                iq: '+{964} 000 000 0000',
                                il: '+{972} 00-000-0000',
                                jo: '+{962} 0 0000 0000',
                                lb: '+{961} 00 000 000',
                                sy: '+{963} 00 0000 000',
                                sa: '+{966} 00 000 0000',
                                ae: '+{971} 00 000 0000',
                                kw: '+{965} 0000 0000',
                                qa: '+{974} 0000 0000',
                                bh: '+{973} 0000 0000',
                                om: '+{968} 0000 0000',
                                ye: '+{967} 0 000 000',

                                // Африка
                                eg: '+{20} 00 0000 0000',
                                za: '+{27} 00 000 0000',
                                ng: '+{234} 000 000 0000',
                                ke: '+{254} 000 000000',
                                et: '+{251} 00 000 0000',
                                tz: '+{255} 00 000 0000',
                                ug: '+{256} 000 000000',
                                rw: '+{250} 000 000 000',
                                gh: '+{233} 00 000 0000',
                                ci: '+{225} 00 00 00 00',
                                sn: '+{221} 00 000 00 00',
                                ml: '+{223} 00 00 00 00',
                                bf: '+{226} 00 00 00 00',
                                ne: '+{227} 00 00 00 00',
                                td: '+{235} 00 00 00 00',
                                cm: '+{237} 0000 0000',
                                cf: '+{236} 00 00 00 00',
                                cg: '+{242} 00 000 0000',
                                cd: '+{243} 000 000 000',
                                ao: '+{244} 000 000 000',
                                zm: '+{260} 00 000 0000',
                                zw: '+{263} 0 000 000',
                                bw: '+{267} 00 000 000',
                                sz: '+{268} 00 00 00 00',
                                ls: '+{266} 0000 0000',
                                mw: '+{265} 0 000 000',
                                mz: '+{258} 00 000 0000',
                                mg: '+{261} 00 00 000 00',
                                mu: '+{230} 0000 0000',
                                sc: '+{248} 0 000 000',
                                re: '+{262} 0000 00000',
                                yt: '+{262} 0000 00000',

                                // Латинская Америка
                                br: '+{55} (00) 00000-0000',
                                ar: '+{54} 9 0000 000000',
                                mx: '+{52} 00 0000 0000',
                                co: '+{57} 000 000 0000',
                                pe: '+{51} 000 000 000',
                                ve: '+{58} 000-0000000',
                                cl: '+{56} 0 0000 0000',
                                ec: '+{593} 00 000 0000',
                                bo: '+{591} 0 000 0000',
                                py: '+{595} 000 000000',
                                uy: '+{598} 0000 0000',
                                gf: '+{594} 0000 00000',
                                sr: '+{597} 000-0000',
                                gy: '+{592} 000 0000',

                                // Карибы и Центральная Америка
                                gt: '+{502} 0000 0000',
                                bz: '+{501} 000-0000',
                                sv: '+{503} 0000 0000',
                                hn: '+{504} 0000 0000',
                                ni: '+{505} 0000 0000',
                                cr: '+{506} 0000 0000',
                                pa: '+{507} 0000-0000',
                                cu: '+{53} 0 000 0000',
                                jm: '+{1876} 000-0000',
                                ht: '+{509} 00 00 0000',
                                do: '+{1809} 000-0000',
                                pr: '+{1787} 000-0000',
                                tt: '+{1868} 000-0000',
                                bb: '+{1246} 000-0000',

                                // Океания
                                au: '+{61} 0 0000 0000',
                                nz: '+{64} 00 000 0000',
                                fj: '+{679} 000 0000',
                                pg: '+{675} 000 0000',
                                nc: '+{687} 00.00.00',
                                pf: '+{689} 00 00 00 00',

                                // Дополнительные страны
                                is: '+{354} 000 0000',
                                fo: '+{298} 000000',
                                gl: '+{299} 00 00 00',
                                ad: '+{376} 000 000',
                                mc: '+{377} 00 00 00 00',
                                sm: '+{378} 0000 000000',
                                va: '+{39} 06 698 0000',
                                mt: '+{356} 0000 0000',
                                cy: '+{357} 00 000000',
                                li: '+{423} 000 00 00',

                                // Универсальная маска для остальных стран
                                default: '+{000} 000 000 0000'
                            };


                            function updateMask() {
                                const countryData = iti.getSelectedCountryData();
                                let maskPattern = phoneMasks[countryData.iso2] || phoneMasks.default;

                                if (mask) mask.destroy();
                                if (maskPattern) {
                                    mask = IMask(input, { mask: maskPattern });
                                }
                            }

                            input.addEventListener('countrychange', updateMask);
                            updateMask();
                        });
                    </script>

                    <style>
                        .iti__country-name,
                        .iti__flag-box {
                            color: #4b0081;
                        }
                    </style>

 */ ?>

                </div>
            </div>
        </div>
    </div>
</section>
