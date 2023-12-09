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
       setHeaderIcon("<?= SITE_TEMPLATE_PATH ?>/assets/img/svg");
     }
		getPath("<?= SITE_TEMPLATE_PATH ?>/assets/img/svg");
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
    <div class="header-overlay">
        header-overlay
    </div> 
    <div class="overlay-bg-help"></div>
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
						<div class="header-search__mobile-close">Закрыть</div>

        </div>

        <div class="header__nav">

            <div class="header__logo">
                <a href="<?= SITE_DIR ?>"><?= $logo ?></a>
            </div>

            <div class="header__nav-wrapper">
                <div class="header__overlay-search">
                    <input type="text" class="header__overlay-search-input" placeholder="Искать у всех производителей">
                    <img class="header__overlay-search-img" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/danis-button-search.svg" alt="">
                </div>
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
				<div class="header__overlay-results">
				<div class="header__overlay-results-leftBar">
					<img class="header__overlay-results-ellipse" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/danis-ellipse.svg" alt="">
					<p class="header__overlay-results-text">
						Результаты поиска
					</p>
				</div>
				<div class="header__overlay-results-container">
					<div class="header__overlay-results-value-container">
						<img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/danis-ellipse-gray.svg" alt="">
						<p class="header__overlay-results-value">osb</p>
					</div>
					<ul class="header__overlay-results-res-container">
						<li>
							<a href="#" target="_blank">OSB 9мм</a>
						</li>
						<li>
							<a href="#" target="_blank">OSB 9мм</a>
						</li>
						<li>
							<a href="#" target="_blank">OSB 9мм</a>
						</li>
						<li>
							<a href="#" target="_blank">OSB 9мм</a>
						</li>
						<li>
							<a href="#" target="_blank">OSB 9мм</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="header__overlay-brands">
				<div class="header__overlay-brands-leftBar">
					<img class="header__overlay-brands-ellipse" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/danis-ellipse.svg" alt="">
					<p class="header__overlay-brands-text">
						Бренды
					</p>
				</div>
				<div class="header__overlay-brands-container">
					<a class="header__overlay-brand" href="">Egger</a>
					<a class="header__overlay-brand" href="">Kronospan</a>
					<a class="header__overlay-brand" href="">Ultralam</a>
					<a class="header__overlay-brand" href="">Калевала</a>
					<a class="header__overlay-brand" href="">Муром</a>
					<a class="header__overlay-brand" href="">НЛК</a>
				</div>
			</div>
        <div class="header__overlay-popular">
				<div class="header__overlay-popular-leftBar">
					<img class="header__overlay-popular-ellipse" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/danis-ellipse.svg" alt="">
					<p class="header__overlay-popular-text">
						Популярные запросы
					</p>
				</div>
				<div class="header__overlay-popular-recks">
					<a class="header__overlay-popular-reck" href="">ОСП-3</a>
					<a class="header__overlay-popular-reck" href="">ОСП под паркет</a>
					<a class="header__overlay-popular-reck" href="">ОСП-3</a>
					<a class="header__overlay-popular-reck" href="">ОСП для пола</a>
					<a class="header__overlay-popular-reck" href="">ОСП-3</a>
					<a class="header__overlay-popular-reck" href="">ОСП для пола</a>
					<a class="header__overlay-popular-reck" href="">ОСП для пола</a>
					<a class="header__overlay-popular-reck" href="">ОСП для пола</a>
					<a class="header__overlay-popular-reck" href="">ОСП-3</a>
					<a class="header__overlay-popular-reck" href="">ОСП под паркет</a>
					<a class="header__overlay-popular-reck" href="">ОСП-3</a>
				</div>
        </div>
        <div class="header__overlay-presonal">
				<div class="header__overlay-presonal-leftBar">
					<img class="header__overlay-presonal-ellipse" src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/danis-ellipse.svg" alt="">
					<p class="header__overlay-presonal-text">
						Рекомендуем для вас
					</p>
				</div>
				<div class="header__overlay-presonal-swiper">
					<div class="swiper search-swiper">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
							<div class="swiper-slide">
								<div class="product" data-height="6" data-price="575.00">
									<div class="product__content preview__content">
										<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">
											<div class="product__image preview__image">
			
												<picture>
													<source type="image/webp"
														srcset="/local/templates/osb-dev/assets/img/products/34d50c11d8603dd1128e005e0b073350180.webp"
														media="(max-width: 767px)">
													<source type="image/png"
														srcset="/upload/resize_cache/iblock/30e/180_180_1/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png"
														media="(max-width: 767px)">
													<img width="288" height="288" class="swiper-lazy" loading="lazy"
														src="/upload/iblock/30e/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png" alt="" title="">
												</picture>
											</div>
										</a>
			
										<div class="product__title preview__title">
											<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">6мм плита OSB-3 НЛК 2500х1250мм</a>
										</div>
			
			
										<div class="product__price">
											184 <span>₽/м2</span>
										</div>
			
										<div style="display: none" class="preview__price">
											575.00 </div>
			
										<div class="product__basket">
											<div class="product__num">
												<button class="minus"><img src="/local/templates/osb-dev/assets/img/svg/minus.svg" alt="">
												</button>
												<input class="preview__count" type="number" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"
													value="1">
												<button class="plus"><img src="/local/templates/osb-dev/assets/img/svg/plus.svg" alt="">
												</button>
											</div>
											<button class="in-basket butForm" data-prod-id="885">
												<img src="/local/templates/osb-dev/assets/img/svg/basket-light.svg" alt="">
												<span>575.00 ₽/шт</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="product" data-height="6" data-price="575.00">
									<div class="product__content preview__content">
										<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">
											<div class="product__image preview__image">
			
												<picture>
													<source type="image/webp"
														srcset="/local/templates/osb-dev/assets/img/products/34d50c11d8603dd1128e005e0b073350180.webp"
														media="(max-width: 767px)">
													<source type="image/png"
														srcset="/upload/resize_cache/iblock/30e/180_180_1/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png"
														media="(max-width: 767px)">
													<img width="288" height="288" class="swiper-lazy" loading="lazy"
														src="/upload/iblock/30e/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png" alt="" title="">
												</picture>
											</div>
										</a>
			
										<div class="product__title preview__title">
											<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">6мм плита OSB-3 НЛК 2500х1250мм</a>
										</div>
			
			
										<div class="product__price">
											184 <span>₽/м2</span>
										</div>
			
										<div style="display: none" class="preview__price">
											575.00 </div>
			
										<div class="product__basket">
											<div class="product__num">
												<button class="minus"><img src="/local/templates/osb-dev/assets/img/svg/minus.svg" alt="">
												</button>
												<input class="preview__count" type="number" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"
													value="1">
												<button class="plus"><img src="/local/templates/osb-dev/assets/img/svg/plus.svg" alt="">
												</button>
											</div>
											<button class="in-basket butForm" data-prod-id="885">
												<img src="/local/templates/osb-dev/assets/img/svg/basket-light.svg" alt="">
												<span>575.00 ₽/шт</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="product" data-height="6" data-price="575.00">
									<div class="product__content preview__content">
										<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">
											<div class="product__image preview__image">
			
												<picture>
													<source type="image/webp"
														srcset="/local/templates/osb-dev/assets/img/products/34d50c11d8603dd1128e005e0b073350180.webp"
														media="(max-width: 767px)">
													<source type="image/png"
														srcset="/upload/resize_cache/iblock/30e/180_180_1/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png"
														media="(max-width: 767px)">
													<img width="288" height="288" class="swiper-lazy" loading="lazy"
														src="/upload/iblock/30e/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png" alt="" title="">
												</picture>
											</div>
										</a>
			
										<div class="product__title preview__title">
											<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">6мм плита OSB-3 НЛК 2500х1250мм</a>
										</div>
			
			
										<div class="product__price">
											184 <span>₽/м2</span>
										</div>
			
										<div style="display: none" class="preview__price">
											575.00 </div>
			
										<div class="product__basket">
											<div class="product__num">
												<button class="minus"><img src="/local/templates/osb-dev/assets/img/svg/minus.svg" alt="">
												</button>
												<input class="preview__count" type="number" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"
													value="1">
												<button class="plus"><img src="/local/templates/osb-dev/assets/img/svg/plus.svg" alt="">
												</button>
											</div>
											<button class="in-basket butForm" data-prod-id="885">
												<img src="/local/templates/osb-dev/assets/img/svg/basket-light.svg" alt="">
												<span>575.00 ₽/шт</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="product" data-height="6" data-price="575.00">
									<div class="product__content preview__content">
										<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">
											<div class="product__image preview__image">
			
												<picture>
													<source type="image/webp"
														srcset="/local/templates/osb-dev/assets/img/products/34d50c11d8603dd1128e005e0b073350180.webp"
														media="(max-width: 767px)">
													<source type="image/png"
														srcset="/upload/resize_cache/iblock/30e/180_180_1/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png"
														media="(max-width: 767px)">
													<img width="288" height="288" class="swiper-lazy" loading="lazy"
														src="/upload/iblock/30e/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png" alt="" title="">
												</picture>
											</div>
										</a>
			
										<div class="product__title preview__title">
											<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">6мм плита OSB-3 НЛК 2500х1250мм</a>
										</div>
			
			
										<div class="product__price">
											184 <span>₽/м2</span>
										</div>
			
										<div style="display: none" class="preview__price">
											575.00 </div>
			
										<div class="product__basket">
											<div class="product__num">
												<button class="minus"><img src="/local/templates/osb-dev/assets/img/svg/minus.svg" alt="">
												</button>
												<input class="preview__count" type="number" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"
													value="1">
												<button class="plus"><img src="/local/templates/osb-dev/assets/img/svg/plus.svg" alt="">
												</button>
											</div>
											<button class="in-basket butForm" data-prod-id="885">
												<img src="/local/templates/osb-dev/assets/img/svg/basket-light.svg" alt="">
												<span>575.00 ₽/шт</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="product" data-height="6" data-price="575.00">
									<div class="product__content preview__content">
										<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">
											<div class="product__image preview__image">
			
												<picture>
													<source type="image/webp"
														srcset="/local/templates/osb-dev/assets/img/products/34d50c11d8603dd1128e005e0b073350180.webp"
														media="(max-width: 767px)">
													<source type="image/png"
														srcset="/upload/resize_cache/iblock/30e/180_180_1/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png"
														media="(max-width: 767px)">
													<img width="288" height="288" class="swiper-lazy" loading="lazy"
														src="/upload/iblock/30e/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png" alt="" title="">
												</picture>
											</div>
										</a>
			
										<div class="product__title preview__title">
											<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">6мм плита OSB-3 НЛК 2500х1250мм</a>
										</div>
			
			
										<div class="product__price">
											184 <span>₽/м2</span>
										</div>
			
										<div style="display: none" class="preview__price">
											575.00 </div>
			
										<div class="product__basket">
											<div class="product__num">
												<button class="minus"><img src="/local/templates/osb-dev/assets/img/svg/minus.svg" alt="">
												</button>
												<input class="preview__count" type="number" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"
													value="1">
												<button class="plus"><img src="/local/templates/osb-dev/assets/img/svg/plus.svg" alt="">
												</button>
											</div>
											<button class="in-basket butForm" data-prod-id="885">
												<img src="/local/templates/osb-dev/assets/img/svg/basket-light.svg" alt="">
												<span>575.00 ₽/шт</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="swiper-slide">
								<div class="product" data-height="6" data-price="575.00">
									<div class="product__content preview__content">
										<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">
											<div class="product__image preview__image">
			
												<picture>
													<source type="image/webp"
														srcset="/local/templates/osb-dev/assets/img/products/34d50c11d8603dd1128e005e0b073350180.webp"
														media="(max-width: 767px)">
													<source type="image/png"
														srcset="/upload/resize_cache/iblock/30e/180_180_1/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png"
														media="(max-width: 767px)">
													<img width="288" height="288" class="swiper-lazy" loading="lazy"
														src="/upload/iblock/30e/esbkka0cja6hiqmxuf9q41r8xsfo12xf.png" alt="" title="">
												</picture>
											</div>
										</a>
			
										<div class="product__title preview__title">
											<a href="/product/6mm-plita-osb-3-nlk-2500kh1250mm/">6мм плита OSB-3 НЛК 2500х1250мм</a>
										</div>
			
			
										<div class="product__price">
											184 <span>₽/м2</span>
										</div>
			
										<div style="display: none" class="preview__price">
											575.00 </div>
			
										<div class="product__basket">
											<div class="product__num">
												<button class="minus"><img src="/local/templates/osb-dev/assets/img/svg/minus.svg" alt="">
												</button>
												<input class="preview__count" type="number" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"
													value="1">
												<button class="plus"><img src="/local/templates/osb-dev/assets/img/svg/plus.svg" alt="">
												</button>
											</div>
											<button class="in-basket butForm" data-prod-id="885">
												<img src="/local/templates/osb-dev/assets/img/svg/basket-light.svg" alt="">
												<span>575.00 ₽/шт</span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
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


