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
$templateFolder = $this->GetFolder();

//var_dump($arResult["ITEMS"])
?>
<style>
    .index-benefits__content img{
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
    }
</style>
<? if (!empty($arResult["ITEMS"])): ?>
    <section id="index-benefits" class="index-benefits">
        <div class="container">
            <div class="index-benefits__content">
                <?
                $arSize = [
                    array("width" => 1000, "height" => 800, "media" => '(max-width: 991px)'),
                ];
                $img = isset($arResult['PICTURE']) ? ResizeImage($arResult['PICTURE'], $arSize, 'fanera_preim', 1920, 430, false) : '';
                ?>
                <?= $img ?>
<!--                <img class="index-benefits__background-image" src="--><?//= $arResult['PICTURE']['SRC'] ?><!--"-->
<!--                     alt="" width="1920"-->
<!--                     height="430" loading="lazy">-->
                <div class="title-section">
                    <h2>Почему выбирают OSB?</h2>
                </div>
                <div class="index-benefits__swiper swiper">
                    <div class="swiper-wrapper">
                        <? foreach ($arResult["ITEMS"] as $arItem): ?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="index-benefits__item swiper-slide">
                                <div class="index-benefits__item-title"><?= $arItem["NAME"] ?></div>
                                <div class="index-benefits__label"><?= $arItem["PREVIEW_TEXT"] ?></div>
                            </div>

                        <? endforeach; ?>
                    </div>

                </div>
                <div class="swiper-button-inner-v2">
                    <div class="swiper-button-prev-dark"></div>
                    <div class="swiper-button-next-dark"></div>
                </div>
                <div class="index-benefits__note">
                    <? $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => $templateFolder . "/include_benefits.php",
                    ]); ?>
                </div>
            </div>
        </div>

    </section>
<? endif; ?>