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
$arTitleOptions = null;

?>
<?php if (!empty($arResult['ID'])): ?>

    <section id="article-content" class="article-content">
        <div class="container">
            <div id="title" class="title">
                <h1><?= $arResult['NAME'] ?? '' ?></h1>
            </div>
            <div class="article__info">
                <div class="article__date"><?= FormatDateFromDB($arResult["DATE_CREATE"], 'DD MMMM');?></div>
                <div class="article__view">
                    <div class="article__view-icon"></div>
                    <span><?= $arResult["SHOW_COUNTER"] ?? ''; ?></span>
                </div>
            </div>
            <div class="article-content__intro">
                <? if($arResult["DETAIL_PICTURE"]["SRC"]):?>
                    <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"] ?>" alt="#">
                <? endif;?>
            </div>
            <div class="row">
                <div class="col-lg-12 content-manager article-content__text">
                    <?= $arResult['DETAIL_TEXT'];  ?>
                </div>
            </div>
        </div>
    </section>

<?php else: ?>

        <p> Новость не найдена</p>

<?php endif; ?>