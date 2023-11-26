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
$this->setFrameMode(true);

?>

<?php if ($arResult["ITEMS"]): ?>
    <section id="blog" class="blog">
        <div class="container">
            <div class="blog__grid">
                <? $i = 1; ?>
                <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?php
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <?
                    $arItem['ID'] = $this->GetEditAreaId($arItem['ID']);

                    $arItem["DATE_CREATE"] = FormatDateFromDB($arItem["DATE_CREATE"], 'DD MMMM');
                    ?>
                    <? if($i <= 2 && $arResult['NAV_RESULT']->NavPageNomer === 1) {$new = true; $i++;} else {$new = false;} ?>

                    <? renderBlogElements($arItem, $arSize = array(), $new) ?>

                <?php endforeach; ?>
            </div>
            <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
                <?= $arResult["NAV_STRING"] ?>
            <? endif; ?>
        </div>
    </section>

<?php endif; ?>


