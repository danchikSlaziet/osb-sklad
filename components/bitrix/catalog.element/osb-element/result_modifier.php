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
if (defined('BX_COMP_MANAGED_CACHE') && is_object($GLOBALS['CACHE_MANAGER']))
{
    $cp =& $this->__component;
    if (strlen($cp->getCachePath()))
    {
        $GLOBALS['CACHE_MANAGER']->RegisterTag('elem_detail_osb_tag');
    }
}

$_REQUEST['ATT_ELEMENTS'] = $arResult['PROPERTIES']['ATT_ELEMENTS']['VALUE'];

$_REQUEST['ELEM_ID'] = $arResult['ID'];
$_REQUEST['SECTION_ID'] = $arResult['IBLOCK_SECTION_ID'];

if(!empty($arResult['PROPERTIES']['ATT_ELEMENTS']['VALUE'])) {

    $arResult['ITEMS'] = [];

    $arSelect = array(
        "ID",
        "NAME",
        "CODE",
        "PRICE_" . $arResult['ITEM_PRICES'][0]['PRICE_TYPE_ID'],
        "QUANTITY",
        "AVAILABLE",
        "PROPERTY_TOLSHCHINA_MM",
    );

    $arFilter = array(
//        "ID" => $arResult['ID'],
        "IBLOCK_ID" => $arResult['IBLOCK_ID'],
        'PROPERTY_ATT_ELEMENTS' => $arResult['PROPERTIES']['ATT_ELEMENTS']['VALUE'],
        '!ID' => $arResult['ID'],
        "ACTIVE" => "Y",
    );

    $res = CIBlockElement::GetList(array("propertysort_TOLSHCHINA_MM" => "ASC"), $arFilter, false, array(), $arSelect);

    while ($ob = $res->fetch()) {
        $ob['AVAILABLE'] = null;
        if($ob['ID'] == $arResult['ID']) $ob['AVAILABLE'] = "active";
        if ($ob['QUANTITY'] === '0' || (int)$ob["PRICE_" . $arResult['ITEM_PRICES'][0]['PRICE_TYPE_ID']] <= 0) $ob['AVAILABLE'] = 'disabled';
        $arResult['ITEMS'][] = $ob;
    }
}


if (!empty($arResult['PROPERTIES']['ATT_IMAGES']['VALUE'])) {

    $res = CFile::GetList($arOrder = array(), $arFilter = array("@ID" => implode(",", $arResult['PROPERTIES']['ATT_IMAGES']['VALUE'])));

    $i = 0;

    while ($res_arr = $res->GetNext()) {
        $res_arr['SRC'] = "/upload/" . $res_arr["SUBDIR"] . "/" . $res_arr["FILE_NAME"];
        $arResult['PROPERTIES']['ATT_IMAGES']['VALUE'][$i++] = $res_arr;
    }
}

