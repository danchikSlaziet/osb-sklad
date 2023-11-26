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

//debug($arResult["ITEMS"])
?>
<?php if (!empty($arResult["ITEMS"])): ?>
    <section id="reviews" class="reviews">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="reviews__leave btn-black">
                        Оставить отзыв
                    </div>
                    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?php
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="review" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                            <? renderReviewElements($arItem) ?>
                        </div>
                    <?php endforeach; ?>
                    <!-- ПАГИНАЦИЯ -->
                    <div id='pagination' class="pagination">
                        <div class="pagination__content">
                            <div class="pagination__see-more">
                                <a href="#">Смотреть ещё</a>
                            </div>
                            <div class="pagination__pages">

                                <a href="#" class="pagination__btn">
                                    <div class="pagination__icon-prev"></div>
                                </a>

                                <ul class="pagination__list">
                                    <li class="pagination__page active"><a href="#">1</a></li>
                                    <li class="pagination__page"><a href="#">2</a></li>
                                    <li class="pagination__page"><a href="#">3</a></li>
                                    <li class="pagination__page"><a href="#">4</a></li>
                                </ul>

                                <a href="#" class="pagination__btn">
                                    <div class="pagination__icon-next"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <?php
                    // popover_productCard div для алерта notification_PC.js
                    //форма для страницы reviews
                    include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/form_reviews.php");
                    ?>

                </div>
            </div>
        </div>
    </section>
<? endif; ?>