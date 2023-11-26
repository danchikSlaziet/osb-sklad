<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$this->setFrameMode(true);
?>

<!--<pre>-->
<?// var_dump($arResult["ITEMS"][0]["OFFERS"]); ?>
<!--</pre>-->

<section id="calculator" class="calculator">
    <a href="" class="anchor" id="calculator-anchor"></a>
    <div class="container">
        <div class="title-section">
            <h2>Расчёт стоимости
                и количества плит</h2>
        </div>
        <div class="calculator__list" id="parent">
            <div class="calculator__item" id="template">
                <form action="" class="calculator__form form">
                    <div class="default-field">
                        <input type="number"
                               class='calculator__data length_field lengthField_index calcField_index'
                               name="length_field" required placeholder="Длина плоскости в мм*">
                        <label for="">Длина плоскости</label>
                    </div>
                    <div class="default-field">
                        <input type="number" class="calculator__data heightField_index calcField_index"
                               name="height_filed" required placeholder="Высота плоскости в мм*">
                        <label for="">Высота плоскости</label>
                    </div>
                    <div class="default-field-select">
                        <select aria-placeholder="Размер плиты*"
                                class="calculator__data listGeometri_index format_list" id="format_list"
                                name="format">
                            <option value="null" selected disabled>Выберите размер плиты в мм</option>
                        </select>
                        <label for="">Размер плоскости</label>
                    </div>
                    <div class="default-field-select">
                        <select aria-placeholder="Толщины*"
                                class="calculator__data thicknessField_index height_list" id="height_list"
                                name="height">
                            <option value="null" selected disabled>Выберите толщину в мм</option>
                        </select>
                        <label for="">Толщина плоскости</label>
                    </div>

                </form>


                <div class="calculator__result preview__content">
                    <div>
                        <div class="calculator__result-info">
                            <div class="calculator__square">
                                <div class="calculator__square-label">Площадь плоск.</div>
                                <div class="calculator__square-result">0.00 м2</div>
                            </div>
                            <div class="calculator__count">
                                <div class="calculator__count-label">Необ. кол-во плит</div>
                                <div class="calculator__count-result">0 шт</div>
                            </div>
                        </div>

                        <button class="calculator__btn btn-orange" id="calculator__btn" type="button">
                            Рассчитать стоимость</button>
                    </div>

                </div>
                <div class="calculator__close">
                    <button type="button" class="calculator__btn-close" style="display: none"
                            aria-label="Close">Удалить<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/svg/close.svg" alt=""></button>
                </div>
            </div>


            <div id="result_template" style="display: none"
                 class="result_template calculator__result preview__content">

                <div class="calculator__result-info">
                    <div class="calculator__title preview__title panel_name" style="display: none"></div>
                    <div class="calculator__square">
                        <div class="calculator__square-label">Площадь плоск.</div>
                        <div class="calculator__square-result"><span
                                    class="requiredNumbersValueBlock_index"><span
                                        class="requiredNumbersValue_index square"></span> м<sup>2</sup></span>
                        </div>
                    </div>
                    <div class="calculator__count">
                        <div class="calculator__count-label">Необ. кол-во плит</div>
                        <div class="calculator__count-result"><span
                                    class="requiredNumbersValueBlock_index product__num"><span
                                        class="requiredNumbersValue_index panel_count preview__count"></span> Шт</span>
                        </div>
                    </div>
                </div>


                <form action="<?=POST_FORM_ACTION_URI?>" method="post" data-prod-id="6831" id="pCForm" class="productCardForm"
                      enctype="multipart/form-data">

                    <input type="hidden" name="action" value="ADD2BASKET">
                    <input id="basketId" type="hidden" name="id" value="683">
                    <input id="basketQuantity" type="hidden" name="QUANTITY" value="11">
                    <input id="productId" type="hidden" name="ITEM_ID_VARIABLE" value="683">
                    <input id="prName" type="hidden" name="ITEM_NAME" value="test">
                    <input id="prPrice" type="hidden" name="ITEM_PRICE" value="test">
                    <input id="prImage" type="hidden" name="ITEM_IMAGE" value="test">
                    <button id="butForm" data-prod-id="683" type="button" class="butForm orderBtn_index calculator__btn btn-orange">
						<span class=""><span class="panel_count total_price preview__price">Рассчитать стоимость</span> руб.
                    </button>
                    <div onclick="reset__item(this.value)" value="template"
                         class="calculator__reset-item btn-default">
                        Сбросить</div>
                </form>
            </div>

        </div>
        <div class="calculator__bottom"><button type="button" class="calculator__addNew">Добавить плоскость <img
                        src="<?=SITE_TEMPLATE_PATH?>/assets/img/svg/plus-circle.svg" alt=""></button>
            <div class="calculator__reset btn-default">Сбросить расчёт</div>
        </div>

    </div>
</section>

<? if (!empty($arResult['ITEMS'])): ?>
    <?php $arrCalc = []; ?>
    <?php
//        debug($arResult['ITEMS'][0])
    ?>

    <? foreach ($arResult["ITEMS"] as $cell => $arElement): ?>
        <?
//        debug($arElement["ITEM_PRICES"][0]["BASE_PRICE"]);

        ?>



                                <? if ($arElement["ITEM_PRICES"][0]["BASE_PRICE"] > 0 && $arElement["CAN_BUY"] === true && $arElement["PRODUCT"]["QUANTITY"] > 0): ?>
<!--                                --><?// if ($arElement["ITEM_PRICES"][0]["BASE_PRICE"] > 0): ?>

                                    <?php
//            debug($arElement["ITEM_PRICES"][0]["BASE_PRICE"]);
//            debug($arElement["CAN_BUY"]);
//            debug($arElement["PRODUCT"]["QUANTITY"]);
                                        $arrCalc[] = [
                                                'id' => $arElement["ID"],
                                                'name' => $arElement["NAME"],
                                                'length' => (int)$arElement["PROPERTIES"]["ATT_DLINA"]["VALUE"],
                                                'width' => (int)$arElement["PROPERTIES"]["ATT_SHIRINA"]["VALUE"],
                                                'height' => (int)$arElement["PROPERTIES"]["TOLSHCHINA_MM"]["VALUE"],
                                                'price' => $arElement["ITEM_PRICES"][0]["BASE_PRICE"],
                                                'quantity' => $arElement["PRODUCT"]["QUANTITY"],
                                                'product_id' => $arElement['PROPERTIES']['ATT_ITEM_'.$arResult['CITY']]['VALUE'],
                                                'picture' => $arElement['PREVIEW_PICTURE']['SRC'],

                                        ];

                                    ?>

                                <? endif;?>


    <? endforeach; ?>
    <?php
    //  var_dump($arrCalc);
    $strJson = \Bitrix\Main\Web\Json::encode($arrCalc);
    ?>
    <script>


        let panels = <?=$strJson?>;
        calculator(panels)
    </script>

<? endif; ?>










