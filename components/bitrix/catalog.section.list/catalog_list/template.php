<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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

?>
<?php
$this->SetViewTarget("catalog_list");
?>
<?php if (!empty($arResult['SECTIONS'])): ?>
        <?php
        $osbCatArrName = [];
        $osbCatArrID = [];
        $osbCatArrURL = [];
        ?>
        <?php //section footer
        function renderSectionCatalog($arSection, $nameSection, $numSection, $urlSection, $className = '')
        { ?>
                
            <div class="catalog__filter-tag filter-tags <?=$className?>">
                <a href="/s1<?= $urlSection ?>" class="filter-tags__item"><?= $nameSection ?></a>
                <? foreach ($arSection as $section): ?>
                    <? if ($section["IBLOCK_SECTION_ID"] === $numSection): ?>
                        <a href="/s1<?= $section["SECTION_PAGE_URL"] ?>" class="filter-tags__item" ><?= $section['NAME'] ?> </a>
                    <? endif; ?>
                <? endforeach; ?>
            </div>
        <? } ?>

        <?php foreach ($arResult['SECTIONS'] as $index => $section): ?>
            <? if ($section["DEPTH_LEVEL"] == 1): ?>
                <? array_push($osbCatArrName, $section['NAME']) ?>
                <? array_push($osbCatArrID, $section['ID']) ?>
                <? array_push($osbCatArrURL, $section['SECTION_PAGE_URL']) ?>
                <? unset($arResult['SECTIONS'][$index]) // убрать разделы 2 уровня?>
            <? endif; ?>
        <?php endforeach; ?>
        <?php
            array_push($osbCatArrName, $arResult['THICKNESS'][0]['NAME']);
            array_push($osbCatArrID, null);
            array_push($osbCatArrURL, $arResult['THICKNESS'][0]['SECTION_PAGE_URL']);
            unset($arResult['THICKNESS'][0]);
        ?>
        <?php
            renderSectionCatalog($arResult['SECTIONS'], $osbCatArrName[0], $osbCatArrID[0], $osbCatArrURL[0]);
            renderSectionCatalog($arResult['SECTIONS'], $osbCatArrName[1], $osbCatArrID[1],$osbCatArrURL[1], 'last');
            renderSectionCatalog($arResult['THICKNESS'], $osbCatArrName[2], $osbCatArrID[2],$osbCatArrURL[2], 'last');
        ?>

<? endif; ?>
<?php
$this->EndViewTarget("catalog_list");
?>
