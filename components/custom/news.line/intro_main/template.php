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

$cp = $this->__component;
if (is_object($cp)) {
    $cp->arResult['PATH_FOLDER'] = $templateFolder;
    $cp->SetResultCacheKeys(array('CACHED_TPL', 'PATH_FOLDER')); // запомнить $arResult в кеш
}
ob_start();
//$arSize = [
//    array("width" => 1000, "height" => 800, "media" => '(max-width: 991px)'),
//];
$img = isset($arResult["ITEMS"][0]['DETAIL_PICTURE']) ? ResizeImage($arResult["ITEMS"][0]['DETAIL_PICTURE'], array(), 'fanera_intro', 'auto', 'auto', false) : '';
?>


<?php if ($arResult["ITEMS"]): ?>
    <section id="intro" class="intro">
        <div class="intro__background">
            <!--            <img src="--><? //= $arResult["ITEMS"][0]['DETAIL_PICTURE']["SRC"]?><!--" alt="">-->
            <?= $img ?>
        </div>
        <div class="intro__content">
            <div class="container">
                <div class="intro__grid">
                    <div class="intro__info">
                        <div id="title" class="title">
                            <h1><?= $arResult["ITEMS"][0]['PREVIEW_TEXT'] ?></h1>
                        </div>
                        <div class="intro__label"><?= $arResult["ITEMS"][0]['DETAIL_TEXT'] ?></div>
                        <? $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => $templateFolder . "/include_intro.php",
                        ]); ?>
                    </div>
                    #INNER_BLOCK_<?=$arResult["ITEMS"][0]['PROPERTY_ATT_ITEM_VALUE']?>#
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?
$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
ob_get_clean();
?>
