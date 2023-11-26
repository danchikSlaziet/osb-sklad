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
//var_dump($arResult["ITEMS"])
?>

<? if (!empty($arResult["ITEMS"])): ?>
<!-- Доставка - прайс -->
<section id="delivery-price" class="delivery-price">
    <div class="container">
        <div class="delivery-price__grid">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>

                <? if ($arItem["PROPERTY_REGIONS_VALUE"] === $_SESSION['SOTBIT_REGIONS']['ID']): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>

                    <div class="delivery-price__item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <div class="delivery-price__item-topbar">
                            <div class="delivery-price__price">от <? echo $arItem["NAME"] ?>₽</div>
                            <div class="delivery-price__weight"><?= $arItem["PROPERTY_ATT_SIZE_VALUE"] ? "до {$arItem['PROPERTY_ATT_SIZE_VALUE']}" : '' ?></div>
                        </div>
                        <div class="delivery-price__info">
                            <?= $arItem["PREVIEW_TEXT"] ?>
                        </div>
                    </div>

                <? endif; ?>
            <? endforeach; ?>

        </div>
        <div class="delivery-price__label">
            Точные сроки и стоимость доставки будут известны при оформлении заказа
        </div>
    </div>
</section>
<? endif; ?>