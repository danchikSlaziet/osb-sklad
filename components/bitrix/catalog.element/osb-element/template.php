<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$cp = $this->__component;
if (is_object($cp)) {
    $cp->SetResultCacheKeys(array('CACHED_TPL')); // запомнить $arResult в кеш
}
ob_start();
$arResult['LIST_PAGE_URL_PRODUCT'] = "/product/";
$arResult['LIST_PAGE_URL'] = "/product/{$arResult['CODE']}/reviews";
//debug($arResult);

?>


    <section id="product-card" class="product-card preview__content">
        <div class="container">
            <div class="product-card__grid">
                <div class="product-card__sliders">
                    <div class="product-card__product-title-mob"></div>
                    <div class="product-card__slider-images">
                        <div class="swiper swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider__image preview__image">
                                        <?= ResizeImage($arResult['DETAIL_PICTURE'], array(), 'element-detail', 'auto', 'auto', true) ?>
                                    </div>
                                </div>
                                <? if (!empty($arResult['PROPERTIES']['ATT_IMAGES']['VALUE'])): ?>
                                    <? foreach ($arResult['PROPERTIES']['ATT_IMAGES']['VALUE'] as $arImage): ?>
                                        <div class="swiper-slide">
                                            <div class="slider__image">
                                                <?= ResizeImage($arImage, array(), 'element', 'auto', 'auto', true); ?>
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                <? endif ?>
                            </div>
                            <div class="swiper-button-product-card">
                                <div class="swiper-button-prev-dark"></div>
                                <div class="swiper-button-next-dark"></div>
                            </div>
                        </div>
                    </div>
                    <div class="product-card__slider-thumbs">
                        <div class=" swiper swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="slider__image">
                                        <?= ResizeImage($arResult['DETAIL_PICTURE'], array(), 'element-detail', '100', '50', true) ?>
                                    </div>
                                </div>
                                <? if (!empty($arResult['PROPERTIES']['ATT_IMAGES']['VALUE'])): ?>
                                    <? foreach ($arResult['PROPERTIES']['ATT_IMAGES']['VALUE'] as $arImage): ?>
                                        <div class="swiper-slide">
                                            <div class="slider__image">
                                                <?= ResizeImage($arImage, array(), 'element', '100', '50', true); ?>
                                            </div>
                                        </div>
                                    <? endforeach; ?>
                                <? endif ?>
                            </div>
                        </div>
                    </div>

                        <?
                        $square = $arResult["PROPERTIES"]["ATT_DLINA"]["VALUE"] * $arResult["PROPERTIES"]["ATT_SHIRINA"]["VALUE"] / 1000000;
                        $weight = !empty($arResult["CATALOG_WEIGHT"]) ? round($arResult["CATALOG_WEIGHT"] / 1000) : 0.0;
                        $density = round($weight / ($square * ($arResult['PROPERTIES']['TOLSHCHINA_MM']['VALUE'] / 1000)));
                        ?>
                    <? if (!empty($arResult['DETAIL_TEXT']) || !empty($arResult['PROPERTIES']['ATT_ATTRIBUTES']['VALUE'])): ?>
                        <div id="tab" class="tab">
                            <div class="container">
                                <a class="anchor" id="detail"></a>
                                <!-- Tab links -->
                                <div class="tab__tabs">
                                    <button class="tab__links" onclick="openTab(event, 'product-desc')"
                                            id="defaultOpen">Описание
                                    </button>
                                    <button class="tab__links"
                                            onclick="openTab(event, 'product-parametr')">Характеристики
                                    </button>
                                    <button class="tab__links"
                                            onclick="openTab(event, 'product-review')">Отзывы
                                    </button>
                                </div>

                                <div id="product-desc" class="tab__content">
                                    <div class="tab__desc content-manager collapsible" data-collapsed="true">
                                        <div class="title-section">
                                            <h2>Описание</h2>
                                        </div>
                                        <?= $arResult['~DETAIL_TEXT'] ?>
                                    </div>
                                    <button class="toggle-button only-mobile">Развернуть</button>
                                </div>

                                <div id="product-parametr" class="tab__content">

                                    <div class="title-section">
                                        <h2>Характеристики</h2>
                                    </div>
                                    <div class="tab__table">
                                        <div class="tab__row">
                                            <div class="tab__left">Страна производства</div>
                                            <div class="tab__right"><?= !empty($arResult["PROPERTIES"]["ATT_COUNTRY"]["VALUE"])
                                                    ? $arResult["PROPERTIES"]["ATT_COUNTRY"]["VALUE"] :
                                                    "Нет данных" ?></div>
                                        </div>
                                        <div class="tab__row">
                                            <div class="tab__left">Марка</div>
                                            <div class="tab__right"><?= !empty($arResult["PROPERTIES"]["ATT_MARK"]["VALUE"])
                                                    ? $arResult["PROPERTIES"]["ATT_MARK"]["VALUE"] :
                                                    "Нет данных" ?></div>
                                        </div>
                                        <div class="tab__row">
                                            <div class="tab__left">Длина, мм</div>
                                            <div class="tab__right"><?= !empty($arResult["PROPERTIES"]["ATT_DLINA"]["VALUE"])
                                                    ? $arResult["PROPERTIES"]["ATT_DLINA"]["VALUE"] :
                                                    "Нет данных" ?></div>
                                        </div>
                                        <div class="tab__row">
                                            <div class="tab__left">Ширина, мм</div>
                                            <div class="tab__right"><?= !empty($arResult["PROPERTIES"]["ATT_SHIRINA"]["VALUE"])
                                                    ? $arResult["PROPERTIES"]["ATT_SHIRINA"]["VALUE"] :
                                                    "Нет данных" ?></div>
                                        </div>
                                        <div class="tab__row">
                                            <div class="tab__left">Толщина, мм</div>
                                            <div class="tab__right"><?= !empty($arResult['PROPERTIES']['TOLSHCHINA_MM']['VALUE'])
                                                    ? $arResult['PROPERTIES']['TOLSHCHINA_MM']['VALUE'] :
                                                    "Нет данных" ?></div>
                                        </div>
                                        <div class="tab__row">
                                            <div class="tab__left">Класс формальдегида</div>
                                            <div class="tab__right"><?= !empty($arResult["PROPERTIES"]["ATT_FORMALDEHYDE"]["VALUE"])
                                                    ? $arResult["PROPERTIES"]["ATT_FORMALDEHYDE"]["VALUE"] : 'E 0,5' ?></div>
                                        </div>
                                        <div class="tab__row">
                                            <div class="tab__left">Плотность, кг/м3</div>
                                            <div class="tab__right"><?= !empty($density)
                                                    ? $density : 'Нет данных' ?></div>
                                        </div>
                                        <div class="tab__row">
                                            <div class="tab__left">Вес, кг</div>
                                            <div class="tab__right"><?= $weight > 0
                                                    ? $weight : 'Нет данных' ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="product-review" class="tab__content">

                                    <div class="title-section">
                                        <h2>Отзывы</h2>
                                    </div>
                                    #INNER_BLOCK_<?= $arResult['ID'] ?>#
                                </div>

                            </div>
                        </div>
                    <? endif ?>
                </div>
                <div class="product-card__info" itemscope itemtype="http://schema.org/Product">
                    <div class="product-card__info-content">
                        <? if ($arResult['PROPERTIES']['ATT_STATUS']['VALUE'] !== false): ?>
                            <div class="product-card__action-list">
                                <?
                                $arStyleStatus = ['hit' => 'Хит продаж', 'sale' => 'Скидка', 'new' => 'Новинка']
                                ?>
                                <? foreach ($arResult['PROPERTIES']['ATT_STATUS']['VALUE'] as $arItem): ?>
                                    <?
                                    $keyStatus = array_search($arItem, $arStyleStatus);
                                    ?>
                                    <div class="product-card__action <?= $keyStatus ?>">
                                        <?= $arItem ?>
                                    </div>
                                <? endforeach; ?>

                            </div>
                        <? endif ?>

                        <div class="product-card__product-title preview__title title"
                             data-width="<?= $arResult["PROPERTIES"]["ATT_SHIRINA"]["VALUE"] ?>"
                             data-length="<?= $arResult["PROPERTIES"]["ATT_DLINA"]["VALUE"] ?>">
                                <h1 id="product__title" itemprop="name"><?= $arResult['NAME'] ?></h1>
                                <div class="product-card__title-label">Производитель <?= !empty($arResult["PROPERTIES"]["ATT_MARK"]["VALUE"]) ? $arResult["PROPERTIES"]["ATT_MARK"]["VALUE"] : '' ?></div>
                        </div>

                        <div class="product-card__thickness">
                            <span>Другие толщины, мм:</span>
                            <ul>
                                <li><a class="active">
                                        <?= $arResult['PROPERTIES']['TOLSHCHINA_MM']['VALUE'] ?></a></li>
                                <? if (!empty($arResult['ITEMS'])): ?>
                                    <? foreach ($arResult['ITEMS'] as $arItem): ?>
                                        <li>
                                            <a <?= isset($arItem['AVAILABLE']) ? "class='{$arItem['AVAILABLE']}'" : '' ?>
                                                    href="<?= $arResult['LIST_PAGE_URL_PRODUCT'] . $arItem['CODE'] ?>">
                                                <?= $arItem['PROPERTY_TOLSHCHINA_MM_VALUE'] ?></a>
                                        </li>
                                    <? endforeach; ?>
                                <? endif ?>
                            </ul>
                        </div>

                        <meta itemprop="description"
                              content="Купить <?= $arResult["NAME"] ?> в #SOTBIT_REGIONS_UF_S_GENITIVE# по лучшей цене у официального диллера OSB SKLAD">
                        <? if ($arResult['ITEM_PRICES'][0]['PRICE'] > 0 && $arResult['CATALOG_QUANTITY'] > 0): ?>
                            <div class="product-card__price-info" itemprop="offers" itemscope
                                 itemtype="http://schema.org/Offer">
                                <div class="product-card__price preview__price"><?= $arResult['ITEM_PRICES'][0]['PRICE'] ?>
                                    ₽/шт
                                </div>
                                <meta itemprop="price" content="<?= $arResult['ITEM_PRICES'][0]['PRICE'] ?>">
                                <meta itemprop="priceCurrency" content="RUB">
                                <link itemprop="availability" href="http://schema.org/InStock">
                                <div class="product-card__price-label"><?= round($arResult['ITEM_PRICES'][0]['PRICE'] / $square) ?> ₽/м2</div>
                            </div>
                            <div class="product-card__stock">
                                <img src="" alt="">
                                <span>В наличии</span>
                                <div class="product-card__stock-count"><?= $arResult['CATALOG_QUANTITY'] ?> шт</div>
                            </div>
                            <div class="product__basket product-card__basket">
                                <div class="product__num">
                                    <button class="minus"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/minus.svg"
                                                               alt=""></button>
                                    <input class="preview__count product-card__calc-number" type="number"
                                           onkeyup="this.value = this.value.replace(/[^\d]/g,'');" value="1">
                                    <button class="plus"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/plus.svg"
                                                              alt=""></button>
                                </div>
                                <button class="in-basket butForm calcItem" data-prod-id="<?= $arResult['ID'] ?>">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/basket-light.svg" alt="">
                                    <span>В корзину</span>
                                </button>

                            </div>
                        <? else: ?>
                            <div class="product__refine-btn product-card__in-basket">
                                <button class="refine-btn"><span>Уточнить остаток</span></button>
                            </div>
                        <? endif; ?>
                        <? if ($arResult['ITEM_PRICES'][0]['PRICE'] > 0 && $arResult['CATALOG_QUANTITY'] > 0): ?>
                            <div class="acc">
                                <div class="acc-btn product-card__title-calc">
                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/product-card-calc.svg" alt="">Рассчитать
                                    кол-во OSB
                                </div>

                                <div class="acc-body product-card__calc">

                                    <div class="product-card__field">
                                        <label for="product-card__width">Длина плоскости</label>
                                        <input type="number" class="product-card__input-calc" name="Ширина"
                                               id="product-card__width"
                                               onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>
                                    <div class="product-card__field">
                                        <label for="product-card__height">Высота плоскости</label>
                                        <input type="number" class="product-card__input-calc" name="Высота"
                                               id="product-card__height"
                                               onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))">
                                    </div>

                                    <div class="product-card__need">Вам потребуется: <a href="#"
                                                                                        class="product-card__result"><span
                                                    class="product-card__count"></span>
                                            <span class="product-card__word"></span></a></div>


                                </div>
                            </div>

                            <!-- Блок с информацией по доставке и самовывозу -->
                            <div class="product-card__footer">
                                <div class="product-card__footer-item">

                                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/product-card-warehouse.svg"
                                         alt="">
                                    <div class="product-card__footer-info">
                                        <div class="product-card__footer-adress">
                                            <div class="product-card__footer-title">Самовывоз из склада по адресу</div>
                                            <div class="product-card__footer-label">#SOTBIT_REGIONS_NAME#,
                                                #SOTBIT_REGIONS_UF_ADDRESS#
                                            </div>
                                        </div>
                                        <? if(!empty($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"])): ?>
                                            <div class="product-card__footer-hours">
                                                <? foreach($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"] as $time): ?>
                                                    <div class="product-card__footer-hours-item">
                                                        <div class="product-card__footer-hour"><?= $time?></div>
                                                    </div>
                                                <? endforeach; ?>
                                            </div>
                                        <? endif; ?>
                                        
                                    </div>


                                </div>
                            </div>
                            <div class="product-card__footer-item">

                                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/product-card-delivery.svg" alt="">
                                <div class="product-card__footer-info">
                                    <div class="product-card__footer-delivery">
                                        <div class="product-card__footer-title">Доставка на объект</div>
                                        <div class="product-card__footer-label"><?= 'с ' . date('d.m', strtotime('+1 day')) ?></div>
                                    </div>
                                </div>

                            </div>

                            <div id="tab-mob"></div>

                        <? endif; ?>

            </div>
        </div>
    </section>


<?
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>