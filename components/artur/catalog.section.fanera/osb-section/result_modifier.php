<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?php
if (isset($arParams['SLIDER']) && $arParams['SLIDER'] === 'Y') {

    $IBLOCK_SLIDER = 19;

    $arFilter = Array('IBLOCK_ID'=> $IBLOCK_SLIDER, 'UF_ATT_SECTION_SLIDER_OSB' => $arResult['SECTION_ID_FOR_SLIDER']);
    $arSelect = Array('ID');
    $arSelect = [];
    $db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false, $arSelect);

    $arResult['SLIDER_SECTION_ID'] = 120;

    if($ar_result = $db_list->fetch())
    {
        $arResult['SLIDER_SECTION_ID'] = $ar_result['ID'];
    }

}
?>
<?php

$arFilter = array(
    'IBLOCK_ID' => $arParams['IBLOCK_ID'],
    //'ACTIVE' => 'Y',
    // 'UF_SECTION_THICKNESS' => '1'
);

$arResult['SECTION_ITEMS'] = [];
$arResult['SECTION_THICKNESS'] = [];

$key = 0;

if (isset($arResult['SECTION_ID']) && !empty($arResult['SECTION_ID'])) {
    $arFilter['SECTION_ID'] = $arResult['DEPTH_LEVEL'] === '1' ? $arResult['SECTION_ID'] : $arResult['IBLOCK_SECTION_ID'];
    $res = CIBlockSection::GetByID($arFilter['SECTION_ID']);
    if ($ar_res = $res->GetNext()) {
        $ar_res['ACTIVE_CLASS'] = $ar_res['ID'] === $arResult['SECTION_ID'] ? 'active-section' : '';
//        $ar_res['SECTION_PAGE_URL'] = "/s1/catalog/{$ar_res['CODE']}/";
        $arResult['SECTION_ITEMS'][$arFilter['SECTION_ID']] = $ar_res;
    }
}
$arSelect = array(
    'NAME', 'ID', 'SECTION_PAGE_URL',
    'IBLOCK_SECTION_ID', 'DEPTH_LEVEL',
    'UF_SECTION_THICKNESS'
);

$arSort = array(
    "DEPTH_LEVEL" => "ASC",
    "SORT" => "ASC",
//    'LEFT_MARGIN' => 'ASC',
);
$db_list = CIBlockSection::GetList($arSort, $arFilter, false, $arSelect);

while ($res = $db_list->getnext()) {
//    $res['SECTION_PAGE_URL'] = "/s1/catalog/{$res['CODE']}/";

    $res['ACTIVE_CLASS'] = $res['ID'] === $arResult['SECTION_ID'] ? 'active-section' : '';

    if ($res['UF_SECTION_THICKNESS'] === '1') {
        $arResult['SECTION_THICKNESS'][] = $res;
        continue;
    }

    if ($res['DEPTH_LEVEL'] === '1') {
        $key = $res['ID'];
        $arResult['SECTION_ITEMS'][$key]['NAME'] = $res['NAME'];
//          array_push($osbCatArrName, $res['NAME']);
//          array_push($osbCatArrID, $res['ID']);
//          array_push($osbCatArrURL, $res['SECTION_PAGE_URL']);
    } else {
        $arResult['SECTION_ITEMS'][$res['IBLOCK_SECTION_ID']]['CHILDREN'][] = $res;
    }

}

$this->SetViewTarget("catalog_list");
if(count($arResult['SECTION_ITEMS']) > 1){
    $manufacturers = array_key_last($arResult['SECTION_ITEMS']);
    $scope = array_key_first($arResult['SECTION_ITEMS']);
}
?>
<style>
    .active-section{
        background-color: #ec8b33;
        color: #ffffff;
    }
</style>
<?php if (isset($manufacturers) && isset($scope)): ?>
    <div class="catalog__change">
        <span class="catalog__category active" data-change-category="<?= $manufacturers ?>">Производители</span>
        <label class="switch">
            <input id='catalog__checkbox' data-first="<?= $manufacturers ?>" data-second="<?= $scope ?>" type="checkbox">
            <span class="slider-round"></span>
        </label>
        <span class="catalog__category" data-change-category="<?= $scope ?>">Сфера применения</span>

    </div>
<? endif; ?>

<?php if (!empty($arResult['SECTION_ITEMS'])): ?>
    <div class="catalog__filter-tag filter-tags" <?= $manufacturers ?? 'style="margin-bottom: 40px;"' ?>>
        <?php foreach ($arResult['SECTION_ITEMS'] as $index => $arSection): ?>
<!--                <a href="--><?//= $arSection['SECTION_PAGE_URL'] ?><!--" class="filter-tags__item --><?//= $arSection['ACTIVE_CLASS'] ?><!--">--><?//= $arSection['NAME']?><!--</a>-->
                <? foreach ($arSection['CHILDREN'] as $section): ?>
                        <a href="<?= $section["SECTION_PAGE_URL"] ?>"
                           data-filter="<?= $section['IBLOCK_SECTION_ID']?>"
                           class="filter-tags__item <?= $section['ACTIVE_CLASS'] ?>" ><?= $section['NAME'] ?> </a>
                <? endforeach; ?>

        <?php endforeach; ?>
    </div>

<? endif; ?>
<?php if (!empty($arResult['SECTION_THICKNESS'])): ?>
    <div class="catalog__filter-tag filter-tags last">
        <?php foreach ($arResult['SECTION_THICKNESS'] as $arSection): ?>
            <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="filter-tags__item <?= $arSection['ACTIVE_CLASS'] ?>"><?= $arSection['NAME']?></a>
        <?php endforeach; ?>
    </div>
<? endif; ?>
<?php
$this->EndViewTarget("catalog_list");
?>
