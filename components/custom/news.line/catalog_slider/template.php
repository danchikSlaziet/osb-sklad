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
    <div class="catalog__topbar">
        <!-- Slider main container -->
        <div class="swiper catalog__swiper">

                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?
                    $arSize = [
                        array("width" => 347, "height" => 152, "media" => '(max-width: 767px)'),
                        array("width" => 700, "height" => 160, "media" => '(max-width: 991px)'),
                    ]
                    ?>
                    <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>

                        <?
                        $img = !empty($arItem['DETAIL_PICTURE']["SRC"]) ? ResizeImage($arItem['DETAIL_PICTURE'], $arSize, 'catalog-section', 880, 220, true) : '';
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>

                        <div class="swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <a href="#">
                                <div class="catalog__swiper-content">
                                    <?= !empty($arItem['PREVIEW_TEXT']) ? '<h2>' . $arItem['PREVIEW_TEXT'] . '</h2>' : '' ?>
                                    <?= !empty($arItem['DETAIL_TEXT']) ? '<p>' . $arItem['DETAIL_TEXT'] . '</p>' : '' ?>
                                </div>
                                <?= $img ?>
                            </a>
                        </div>
                    <? endforeach; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination-light">
                </div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-inner">
                    <div class="swiper-button-prev-dark"></div>
                    <div class="swiper-button-next-dark"></div>
                </div>

        </div>
    </div>
<?php endif; ?>
