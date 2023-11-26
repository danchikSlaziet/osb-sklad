<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
/**
 * @var CMain $APPLICATION
 * @var array $arResult
 */
?>
<?php
//d($arResult);
//var_dump($arResult);
$APPLICATION->SetPageProperty("keywords", "osb, sklad, осб, осп, склад, магазин, плита, купить, цена, #SOTBIT_REGIONS_NAME#, лист," . $arResult["GET_TT"] . "  мм, размер, толщина");
$APPLICATION->SetPageProperty("description", "Купить " . $arResult["NAME"] . " в #SOTBIT_REGIONS_NAME#. Официальный сайт. Доставка в любой регион.");
$APPLICATION->SetPageProperty("title", $arResult["NAME"] . " купить  по низкой цене в #SOTBIT_REGIONS_UF_S_GENITIVE#");
$APPLICATION->SetTitle($arResult["NAME"] . " купить  по низкой цене в #SOTBIT_REGIONS_UF_S_GENITIVE#");
?>
<?php

$arResult['REVIEWS'] = getReviewsForElement($arResult['ID']);
// callback function
$replacer = function ($matches) use ($arResult, $APPLICATION) {
    ob_start();
//    debug($arResult);
    // тут вставляем разменту, вызовы компонентов, в общем все что нужно вывести
    // в метке #INNER_BLOCK_123# мы можем передать в качестве числа например код инфоблока
    // и использовать его так :
    ?>
    <?php if (!empty($arResult['REVIEWS'])): ?>
        <div id='swiper-review' class="">
            <div class="tab__reviews reviews swiper-wrapper">
                <?php foreach ($arResult['REVIEWS'] as $arItem): ?>
                    <?php
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <div class="review swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                        <? renderReviewElements($arItem, array(), true) ?>
                    </div>
                <?php endforeach; ?>

                <div class="swiper-button-reviews">
                    <div class="swiper-button-prev-dark"></div>
                    <div class="swiper-button-next-dark"></div>
                </div>
            </div>
        </div>
    <? endif; ?>
    <div class="tab__reviews-buttons">
        <a href="<?=$arResult['LIST_PAGE_URL']?>-<?=$arResult['ID']?>/" class="tab__reviews-btn dark">Оставить отзыв</a>
        <?php if (!empty($arResult['REVIEWS'])): ?>
            <a href="<?=$arResult['LIST_PAGE_URL']?>-<?=$arResult['ID']?>/" class="tab__reviews-btn light">Читать все отзывы</a>
        <? endif; ?>
    </div>
    <?php
    return ob_get_clean();
};

// находим метку и заменяем ее на результат работы нашей функции
echo preg_replace_callback(
    "/#INNER_BLOCK_([\\d]+)#/is" . BX_UTF_PCRE_MODIFIER,
    $replacer,
    $arResult["CACHED_TPL"]
);

?>
    <!---->
<?php
//$this->initComponentTemplate();
//$this->SetViewTarget('osb-reviews');
//

//
//$this->EndViewTarget(); ?>