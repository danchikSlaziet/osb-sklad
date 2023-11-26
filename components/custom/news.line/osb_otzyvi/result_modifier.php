<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

//$arReviews = [];
foreach ($arResult["ITEMS"] as $key => $arElement){
    if(isset($arElement['PROPERTY_ATT_IMG_VALUE'])){
        $arResult["ITEMS"][$key]['IMAGES'][$arElement['PROPERTY_ATT_IMG_VALUE']] = CFile::GetPath($arElement['PROPERTY_ATT_IMG_VALUE']);
    }
	if(in_array($arElement['ID'], $arResult["ITEMS"][$arElement['ID']])){
		$arResult["ITEMS"][$arElement['ID']]['IMAGES'][$arElement['PROPERTY_ATT_IMG_VALUE']] = CFile::GetPath($arElement['PROPERTY_ATT_IMG_VALUE']);;
	}else{
		$arResult["ITEMS"][$arElement['ID']] = $arResult["ITEMS"][$key];
	}
	unset($arResult["ITEMS"][$key]);
}
//$arResult["ITEMS"] = $arReviews;
//debug($arResult["ITEMS"]);