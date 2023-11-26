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
//debug($arParams);
//debug($arResult);
?>


<?
$arSize = [
    array("width" => 288, "height" => 288, "media" => ''),
];
?>
<section id="title" class="title">
    <div class="container">
        <h1>Результаты поиска</h1>
        <div class="title__label">
            Найдено <?= count($arResult['ELEMENTS'])?> элем.
        </div>
    </div>
</section>
<div class="search__grid">
    <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>

        <?

        $arItem["PRICE"] = $arItem['ITEM_PRICES'][0]['BASE_PRICE'];

        $arItem['QUANTITY'] = $arItem['CATALOG_QUANTITY'];
        ?>

        <? renderElements($arItem, $arSize) ?>

    <? endforeach ?>
</div>


<?// if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
<!--    --><?//= $arResult["NAV_STRING"] ?>
<?// endif; ?>
