<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<?php

$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'UF_SECTION_THICKNESS' => '1');
$arSort = array(
    "NAME" =>"DESC",
);
$db_list = CIBlockSection::GetList($arSort, $arFilter, false, array('NAME', 'ID', 'SECTION_PAGE_URL', 'IBLOCK_SECTION_ID'));
$arResult['THICKNESS'] = [];
while($ar_result = $db_list->GetNext())
{
    $arResult['THICKNESS'][] = $ar_result;
}
