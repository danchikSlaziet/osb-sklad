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

<?php if ($arResult["ITEMS"]): ?>
    <section id="blog-swiper" class="blog-swiper">
        <div class="container">
            <div class="title-section">
                <h2>Читайте также</h2>
            </div>
            <div class="swiper">
                <div class="swiper-wrapper">

                    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?if($arParams['CUSTOM_ELEMENT_CODE'] === $arItem['CODE']) continue ?>
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
                        <div class="swiper-slide">
                            <? renderBlogElements($arItem, $arSize = array(), false) ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-inner-v2">
                    <div class="swiper-button-prev-dark"></div>
                    <div class="swiper-button-next-dark"></div>
                </div>

            </div>
        </div>
    </section>

<?php endif; ?>


