<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
/** @var CBitrixComponent $component */?>
<?php
$id = null;
if (!empty($_GET['element-id'])){
    $id = intval(htmlspecialcharsEx($_GET['element-id']));
    if(CSaleBasket::Delete($id)){
        unset($arResult['GRID']['ROWS'][$id]);
    }
}
//var_dump($_GET['element-id']);
//die();
//debug($arResult);


