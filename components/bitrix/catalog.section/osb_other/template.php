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
//debug($arParams["ELEMENT_CODE"]);
$arSize = [
    array("width" => 180, "height" => 180, "media" => '(max-width: 767px)'),
];

?>
<? if (!empty($arResult['ITEMS'])): ?>
    <section id="product-slider" class="product-slider">
        <div class="container">
            <div class="title-section">
                <h2>Другие размеры</h2>
                <div class="swiper-button-product">
                    <div class="swiper-button-prev-dark"></div>
                    <div class="swiper-button-next-dark"></div>
                </div>
            </div>

            <div class="swiper product-swiper">

                <div class="swiper-wrapper">

                    <?
                    foreach ($arResult["ITEMS"] as $arItem):
                        if ($arItem['ID'] === $arParams["SEC_EL_ID"]) continue;
                        ?>
                        <?

                        $arItem['ATT_STATUS'] = $arItem['PROPERTIES']['ATT_STATUS']['VALUE'] !== false ? $arItem['PROPERTIES']['ATT_STATUS']['VALUE'] : null;

                        $arItem["PRICE"] = $arItem['ITEM_PRICES'][0]['BASE_PRICE'];

                        $arItem['QUANTITY'] = $arItem['CATALOG_QUANTITY'];

                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCST_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <? renderElements($arItem, $arSize) ?>
                        </div>
                    <? endforeach; ?>

                </div>
            </div>
    </section>
<? endif; ?>
