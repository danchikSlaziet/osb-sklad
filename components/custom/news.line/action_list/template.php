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
    <section id="action" class="actions">
        <div class="container">
            <div class="actions__content">

                <? foreach ($arResult["ITEMS"] as $key => $arItem): ?>

                    <?
                    $img = !empty($arItem['DETAIL_PICTURE']["SRC"]) ? ResizeImage($arItem['DETAIL_PICTURE'], array(), 'action-section', 'auto', 'auto', false) : '';
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>


                    <a href="/catalog" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

                        <div class="actions__item">
                            <?= $img ?>
                            <div class="actions__title"><?= $arItem['PREVIEW_TEXT'] ?? '' ?></div>
                            <div class="actions__label"><?= $arItem['DETAIL_TEXT'] ?? '' ?></div>
                        </div>
                    </a>

                <? endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
