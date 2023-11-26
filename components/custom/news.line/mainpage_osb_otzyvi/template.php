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


?>

<?php if (!empty($arResult["ITEMS"])): ?>
    <section id="main-reviews" class="main-reviews">

        <div class="container">
            <div class="main-reviews__content">
                <? $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => $templateFolder . "/include_reviews.php",
                ]); ?>
                <div class="swiper-button-inner-v4">
                    <div class="swiper-button-prev-dark"></div>
                    <div class="swiper-button-next-dark"></div>
                </div>
                <div class="swiper main-reviews__swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                            <?php
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="swiper-slide">
                                <div class="review" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                                    <? renderReviewElements($arItem) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
<? endif; ?>