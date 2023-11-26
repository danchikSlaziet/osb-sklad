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

<!--<pre>-->
<!--    --><?//
//    var_dump($arResult["ITEMS"]);
//    die();
//    ?>
<!---->
<!--</pre>-->

<? if($arResult["ITEMS"]):?>
<section class="sectionTwo_delivery">
    <div class="wrapper">
        <div class="secondSection_delivery">
            <h2 class="sectionTitle_index centerTitle">
                Удобная доставка
            </h2>
            <div class="secondSection_deliveryMainContent">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <div class="content1_delivery content_delivery" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="contentBackground_delivery">
                        <img
                                src="<?= !empty($arItem["PREVIEW_PICTURE"]["SRC"]) ? $arItem["PREVIEW_PICTURE"]["SRC"] : SITE_TEMPLATE_PATH.'/assets/img/no_photo.jpg'?>"
                                alt="<?=$arItem["NAME"]?>"
                                title="<?=$arItem["NAME"]?>"
                        >
                    </div>
                    <div class="contentTitle_delivery">
                        <?echo $arItem["NAME"]?>
                    </div>
                    <div class="contentDescription_delivery">
                        <?echo $arItem["PREVIEW_TEXT"]?>
                    </div>
                </div>
            <?endforeach;?>
            </div>
        </div>
    </div>
</section>

<?endif;?>