<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;
use Bitrix\Main\Application;

$session = Application::getInstance()->getSession();
$GLOBALS['PRICE_CODE'] = "PRICE_" . getPriceID();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/svg+xml" href="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/favicon.svg?v=3"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><? $APPLICATION->ShowTitle() ?></title>
    <?php

    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/swiper-bundle.min.css');
    Asset::getInstance()->addCss('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/style.css');

    Asset::getInstance()->addJs("https://www.google.com/recaptcha/api.js?onload=onloadCallbackRecap&render=".RECAP_CLIENT);
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/vendor/jquery.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/vendor/jquery.maskedinput.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/vendor/bootstrap.bundle.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/vendor/jquery-ui.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/vendor/parallax.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/vendor/printThis.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/sliders.js', true);
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/assets/js/main.js', true);

    ?>
    <? $APPLICATION->ShowHead(); ?>
</head>
<script>
     if ($('.header').hasClass('index')) {
       setHeaderIcon("<?= SITE_TEMPLATE_PATH ?>/assets/img/svg")
     }
</script>
<body>

<? if (is_admin_bx()): ?>
    <div class="page-tn">
        <div id="panel"><? $APPLICATION->ShowPanel(); ?>
        </div>
    </div>
<? endif ?>

<? $logo = getLogoImg(SITE_TEMPLATE_PATH); ?>
<!--<div id="preloader" class="preloader">-->
<!--    --><?php //= $logo ?>
<!--    <div id="progress-bar" class="progress-bar">-->
<!--			<span class="bar">-->
<!--				<span class="progress"></span>-->
<!--			</span>-->
<!--    </div>-->
<!--</div>-->
<header id="header" class="header<?= $GLOBALS['index'] ? ' index' : '' ?>">
    <div class="container">
        <div class="header__topbar">

            <!-- Шапка для мобильных устройств -->
            <div class="header__btn-nav">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/btn-nav.svg" alt="">
            </div>

            <div class="header__logo-mobile">
                <a href="<?= SITE_DIR ?>"><?= $logo ?></a>
            </div>
            <a href="/search/">
                <div class="header__search-mobile">
                    <div class="header-search-icon"></div>
                </div>
            </a>
            <div class="header__phone-mobile">
                <a href="tel:<?= $_SESSION["SOTBIT_REGIONS"]["UF_PHONE"][0] ?>"><img
                            src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/phone-mob.svg" alt=""></a>
            </div>
            <!-- Шапка для мобильных устройств -->

            <!-- Выбор города -->
            <? $APPLICATION->IncludeComponent("sotbit:regions.choose", "osb-region", array(
                "FROM_LOCATION" => "Y",    // Данные берутся из местоположений
            ),
                false
            ); ?>
            <!-- Выбор города -->

            <div class="header__info">
                <div class="header__adress">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/adress.svg" alt="">
                    <?= $_SESSION["SOTBIT_REGIONS"]["UF_ADDRESS"] ?>
                </div>

                <? if (!empty($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"])): ?>
                    <div class="header__hours">
                        <? foreach ($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"] as $time): ?>
                            <div class="header__hours-item">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/clock.svg"
                                     alt=""><span><?= $time ?></span>
                            </div>
                        <? endforeach; ?>

                    </div>
                <? endif; ?>
                <? foreach ($_SESSION["SOTBIT_REGIONS"]["UF_PHONE"] as $phone): ?>
                    <a href="tel:<?= $phone ?>">
                        <div class="header__phone"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/phone.svg"
                                                        alt=""><span><?= $phone ?></span>
                        </div>
                    </a>
                <? endforeach; ?>
            </div>

        </div>

        <div class="header__nav">

            <div class="header__logo">
                <a href="<?= SITE_DIR ?>"><?= $logo ?></a>
            </div>

            <div class="header__nav-wrapper">
                <div id="header__nav-block" class="header__nav-block">
                    <div class="header__nav-firstbar">
                        <div class="header__city">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/city.svg" alt="">
                            <span>г. #SOTBIT_REGIONS_NAME#</span>
                        </div>
                        <div class="header__nav-close"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/close.svg"
                                                            alt=""></div>
                    </div>

                    <div class="header__nav-secondbar">
                        <a href="#" class="header__nav-auth">
                            <div id="header__auth-mobile" class="header__auth-mobile"></div><span>Войти</span>
                        </a>
                        <div id="header__basket-mobile" class="header__basket-mobile"></div>

                    </div>


                    <? $APPLICATION->IncludeComponent("bitrix:menu", "top_menu", array(
                        "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "left",    // Тип меню для остальных уровней
                        "DELAY" => "N",    // Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "4",    // Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                        "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "N",    // Учитывать права доступа
                        "MENU_THEME" => "site",
                        "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                        "USE_EXT" => "N",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                    ),
                        false
                    ); ?>

                    <div class="header__nav-thirthbar">

                        <span>Мы в #SOTBIT_REGIONS_UF_S_GENITIVE#:</span>

                        <div class="header__nav-adress"><?= $_SESSION["SOTBIT_REGIONS"]["UF_ADDRESS"] ?></div>
                        <? if(!empty($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"])): ?>
                            <div class="header__nav-hours">
                                <? foreach($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"] as $time): ?>
                                    <div class="header__nav-hours-item">
                                        <span><?= $time?></span>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>
                    </div>

                    <div class="header__nav-footer">
                        <span>Другие способы связи:</span>
                        <div class="header__nav-social">
                            <a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/watsup-h.svg" alt=""></a>
                            <a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/telegram-h.svg"
                                             alt=""></a>
                        </div>
                    </div>

                </div>


                <a href="/search/" class="header__search">
                    <div class="header__search-icon"></div>
                </a>
                <a href="#" id="header__auth" class="header__auth"><img
                            src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/auth.svg" alt=""></a>


                <!-- Корзина -->
                <?php
                $APPLICATION->IncludeComponent(
                    "hamidulin:basket.small.hamidulin",
                    "ajax",
                    array(
                        "COMPONENT_TEMPLATE" => "ajax",
                        "PATH_TO_BASKET" => "/cart",
                        "PATH_TO_ORDER" => "/cart",
                        "SHOW_DELAY" => "N",
                        "SHOW_NOTAVAIL" => "Y",
                        "SHOW_SUBSCRIBE" => "Y"
                    )
                );
                ?>
                <!-- Корзина -->
                <?
                if (!$session->has('test')) {
                    checkBasket();
                }
                if ($_POST['answer'] === 'a1') {
                    $session->set('test', 0);
                    echo "<script>window.location.href = '/cart/'</script>";
                }

                if ($_POST['answer'] === 'a2') {
                    if (CSaleBasket::DeleteAll(CSaleBasket::GetBasketUserID())) {
                        checkBasket();
                        echo "<script>$('.quantityPurchase').text(0)</script>";
                    }
                }
                ?>
                <? if ($session->get('test') === 1 && $_POST['answer'] === null): ?>

                    <div class="question-basket">
                        <span>Вы уже сформировали заказ.<br>Он актуален? или его сбросить? </span>

                        <form class="question-basket__select" action="" method="post">
                            <button type="submit" name="answer" value="a1">Актуален</button>
                            <button type="submit" name="answer" value="a2">СБРОСИТЬ</button>
                        </form>
                    </div>

                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<section id="popup">
    <div class="container" style="position: relative;">
        <div class="popover_productCard"></div>
    </div>
</section>
<main>


    <?php if ($APPLICATION->GetCurPage(false) !== '/'): ?>
        <?php $APPLICATION->IncludeComponent("bitrix:breadcrumb", "bread_osb", array(
            "PATH" => "",           // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
            "SITE_ID" => "s1",      // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
            "START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
            "COMPONENT_TEMPLATE" => ".default"
        ),
            false
        ); ?>
    <? endif; ?>


