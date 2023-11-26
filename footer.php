<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

$email = randMail();
//debug($email)
?>
<?

$APPLICATION->IncludeComponent(
    "artur:main.feedback",
    "ContactsPageForm",
    array(
        "EMAIL_TO" => $email,
        "AJAX_MODE" => 'Y',
        "AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
        "EVENT_MESSAGE_ID" => array("7"),
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
        "REQUIRED_FIELDS" => array("PHONE"),
        "USE_CAPTCHA" => "N",
        "COMPONENT_TEMPLATE" => "ContactsPageForm"

    )
); ?>
<?
$APPLICATION->IncludeComponent(
    "artur:main.feedback",
    "ModalContact",
    Array(
        "AJAX_MODE" => "N",
        "EMAIL_TO" => $email,
        "EVENT_MESSAGE_ID" => array("87"),
        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
        "REQUIRED_FIELDS" => array("NAME", "PHONE"),
        "COMPONENT_TEMPLATE" => "ModalContact",
        "USE_CAPTCHA" => "N"
    )
);?>
</main>

<footer id="footer" class="footer">
    <div class="container">
        <div class="footer__content">
            <div class="footer__topbar">
                <div class="footer__topbar-item">
                    <div class="footer__label">Звоните по номеру:</div>
                    <div class="footer__phone">
                        <? foreach ($_SESSION["SOTBIT_REGIONS"]["UF_PHONE"] as $phone): ?>
                            <a href="tel:<?= $phone ?>"><?= $phone ?></a>
                        <? endforeach; ?>
                    </div>
                    <a href="#" class="footer__order-phone">Заказать звонок</a>
                </div>
                <div class="footer__topbar-item">
                    <div class="footer__label">По общим вопросам пишите:</div>
                    <div class="footer__mail">
                        <? foreach ($_SESSION["SOTBIT_REGIONS"]["UF_EMAIL"] as $email): ?>
                            <a href="mailto:<?= $email ?>"><?= $email ?></a>
                        <? endforeach; ?>
                    </div>
                </div>
                <div class="footer__topbar-item">
                    <div class="footer__label">Другие способы связи:</div>
                    <div class="footer__social">
                        <a href="">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/watsup.svg" alt=""></a>
                        <a href="">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/telegram.svg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="footer__main">
                <div class="footer__main-item footer__info">
                    <div class="footer__city">
                        <span>г. #SOTBIT_REGIONS_NAME#</span>
                    </div>
                    <div class="footer__adress"><?= $_SESSION["SOTBIT_REGIONS"]["UF_ADDRESS"] ?></div>
                    <? if(!empty($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"])): ?>
                        <div class="footer__hours">
                            <? foreach($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"] as $time): ?>
                                <div class="footer__hours-item">
                                    <span><?= $time?></span>
                                </div>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>
                </div>


                <? $APPLICATION->IncludeComponent("bitrix:menu", "footer_menu", array(
                    "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                    "DELAY" => "N",    // Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "4",    // Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                    "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "N",    // Учитывать права доступа
                    "MENU_THEME" => "site",
                    "ROOT_MENU_TYPE" => "left2",    // Тип меню для первого уровня
                    "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                    false
                ); ?>

                <? $APPLICATION->IncludeComponent(
                    "bitrix:catalog.section.list",
                    "catalog_footer_list",
                    array(
                        "ADD_SECTIONS_CHAIN" => "N",
                        "CACHE_FILTER" => "N",
                        "CACHE_GROUPS" => "N",
                        "CACHE_TIME" => "36000000",
                        "CACHE_TYPE" => "A",
                        "COUNT_ELEMENTS" => "N",
                        "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
                        "FILTER_NAME" => "sectionsFilter",
                        "HIDE_SECTION_NAME" => "N",
                        "IBLOCK_ID" => "17",
                        "IBLOCK_TYPE" => "catalog",
                        "SECTION_CODE" => "",
                        "SECTION_FIELDS" => array(0 => "ID", 1 => "CODE", 2 => "NAME", 3 => "SORT", 4 => "PICTURE"),
                        "SECTION_ID" => $_REQUEST["SECTION_ID"],
                        "SECTION_URL" => "",
                        "SHOW_PARENT_NAME" => "Y",
                        "TOP_DEPTH" => "2",
                        "VIEW_MODE" => "LIST"
                    )
                ); ?>

            </div>
            <div class="footer__bottom">

                <div class="footer__rights-reserved">
                    OSB плиты, 2022. Все права защищены.
                    <div class="footer__metrika" style="margin-top: 15px">
                        <!-- Yandex.Metrika informer -->
                        <a href="https://metrika.yandex.ru/stat/?id=73920169&from=informer"
                           target="_blank" rel="nofollow"><img
                                    src="https://informer.yandex.ru/informer/73920169/3_0_FFAB53FF_EC8B33FF_0_pageviews"
                                    style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика"
                                    title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)"
                                    class="ym-advanced-informer" data-cid="73920169" data-lang="ru"/></a>
                        <!-- /Yandex.Metrika informer -->

                        <!-- Yandex.Metrika counter -->
<!--                        <script data-skip-moving="true" type="text/javascript">-->
<!--                            var fired = false;-->
<!---->
<!--                            window.addEventListener('scroll', () => {-->
<!--                                if (fired === false) {-->
<!--                                    fired = true;-->
<!---->
<!--                                    setTimeout(() => {-->
<!--                                        (function (m, e, t, r, i, k, a) {-->
<!--                                            m[i] = m[i] || function () {-->
<!--                                                (m[i].a = m[i].a || []).push(arguments)-->
<!--                                            };-->
<!--                                            m[i].l = 1 * new Date();-->
<!--                                            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)-->
<!--                                        })-->
<!--                                        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");-->
<!---->
<!--                                        ym(73920169, "init", {-->
<!--                                            clickmap: true,-->
<!--                                            trackLinks: true,-->
<!--                                            accurateTrackBounce: true,-->
<!--                                            webvisor: true,-->
<!--                                            trackHash: true-->
<!--                                        });-->
<!--                                    }, 1000)-->
<!--                                }-->
<!--                            });-->
<!--                        </script>-->
<!--                        <script>-->
<!--                            (function(w,d,u){-->
<!--                                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);-->
<!--                                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);-->
<!--                            })(window,document,'https://b24.mottex.ru/upload/crm/site_button/loader_9_uej2ts.js');-->
<!--                        </script>-->
                    </div>
                </div>
                <div class="footer__politic">
                    <a target="_blank" href="/polzovatelskoe-soglashenie" class="footer__politic-item">Пользовательское соглашение</a>
                    <a target="_blank" href="/politika-konfidentsialnosti" class="footer__politic-item">Политика конфиденциальности</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>