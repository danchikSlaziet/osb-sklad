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

$this->addExternalCss($templateFolder . '/css/lightgallery.min.css');

$this->addExternalJS($templateFolder . '/js/lightgallery.min.js');
$this->addExternalJS($templateFolder . '/js/lg-fullscreen.min.js');
$this->addExternalJS($templateFolder . '/js/lg-thumbnail.min.js');
$this->addExternalJS($templateFolder . '/js/lg-video.min.js');
$this->addExternalJS($templateFolder . '/js/lg-zoom.min.js');
//debug($arResult["ITEMS"]);
$arSize = [
    array("width" => 240, "height" => 340, "media" => '(max-width: 320px)'),
    array("width" => 264, "height" => 374, "media" => '(max-width: 768px)'),
];
?>

<? if (!empty($arResult["ITEMS"])): ?>
    <section id="certificate" class="certificate">
        <div class="container">
            <div class="title-section">
                <h1>Сертификаты</h1>
            </div>

            <div class="swiper swiper-certificate">
                <div class="swiper-wrapper" id="lightgallery">
                    <? foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <a href="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"  class="swiper-slide">
                            <?= ResizeImage($arItem["PREVIEW_PICTURE"], $arSize, 'certificates', 720, 1280, true) ?>
                        </a>

                    <? endforeach; ?>
                </div>
            </div>
            <div class="swiper-button-inner-v3">
                <div class="swiper-button-prev-dark"></div>
                <div class="swiper-button-next-dark"></div>
            </div>

        </div>
    </section>
<? endif ?>