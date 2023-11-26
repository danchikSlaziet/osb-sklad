<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
//$APPLICATION->ShowViewContent("filter")
$cp = $this->__component;
if (is_object($cp)) {
    $cp->SetResultCacheKeys(array('CACHED_TPL')); // запомнить $arResult в кеш
}
ob_start();
//debug($arResult["ITEMS"]);
?>


<section id="title" class="title">
    <div class="container">
        <h1><?= $arResult['SECTION_NAME'] ?? 'Цены на OSB'?></h1>
    </div>
</section>

<section id="catalog" class="catalog">
    <div class="container">
        <? $APPLICATION->ShowViewContent("catalog_list") ?>
        <? if (!empty($arResult["ITEMS"])): ?>
            <div class="catalog__content">
            <!-- Фильтр -->
            <? $APPLICATION->ShowViewContent("filter") ?>
            <!-- Правая часть: слайдер, поиск, сортировка и сетка товаров -->
            <div class="catalog__wrapper">

                #INNER_BLOCK_<?= $arResult['SLIDER_SECTION_ID']?>#

                <div class="catalog__topbar-content">
                    <div class="catalog__btn-filter">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/filter.svg" alt="">
                    </div>
                    <div class="catalog__search">
                            <input form="filterForm" name="NAME_ELEM" type="text" placeholder="Поиск" value="<?= $_GET['NAME_ELEM']?>">
                            <button form="filterForm" class="catalog__btn-search" type="submit">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/search-gray.svg" alt="">
                            </button>
                    </div>

                    <div class="catalog__sort default-field-select">
                        <span>Сортировка: </span>
                        <select name="select-sort" id="catalog__select-sort">
                            <option>Выберите параметр </option>
                            <option value="height">Cортировать по толщине</option>
                            <option value="asc">Цене от низкой к высокой</option>
                            <option value="desc">Цене от высокой к низкой</option>
                        </select>

                    </div>
                </div>
                <? if (!empty($arResult["ITEMS"])): ?>
                <?
                $arSize = [
                    array("width" => 180, "height" => 180, "media" => '(max-width: 767px)'),
                ];
                ?>
                <div class="catalog__grid">
                    <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                        <? $arItem['TOLSHCHINA_MM'] = $arItem['PROPERTIES']['TOLSHCHINA_MM']['VALUE']?>
                        <? $arItem['ATT_STATUS'] = $arItem['PROPERTIES']['ATT_STATUS']['VALUE'] !== false ? $arItem['PROPERTIES']['ATT_STATUS']['VALUE'] : null;?>
                        <? renderElements($arItem, $arSize) ?>
                    <? endforeach; ?>
                </div>
                <? else: ?>
                    <div class="plug__content">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/plug.svg" alt="">
                    </div>
                <? endif ?>
                <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
                    <?= $arResult["NAV_STRING"] ?>
                <? endif; ?>
            </div>
        </div>
        <? else: ?>
            <div class="plug__content">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/plug.svg" alt="">
            </div>
        <? endif ?>
    </div>
</section>


<? if (isset($arParams['DESCRIPTION_SECTION']) && $arParams['DESCRIPTION_SECTION'] === 'Y'):?>
    <section id="article-content" class="article-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 content-manager article-content__text">
                    <?= $arResult['DESCRIPTION_SECTION'] ?>
                </div>
            </div>
        </div>
    </section>
<? endif ?>
<?
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>


