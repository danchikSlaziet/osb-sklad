<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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
<?php if (!empty($arResult['SECTIONS'])): ?>


    <section id="index-catalog" class="index-catalog">
        <div class="container">

            <? $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                "AREA_FILE_SHOW" => "file",
                "PATH" => $templateFolder . "/include_main-catalog.php",
            ]); ?>

            <div class="index-catalog__content">
                <div class="index-catalog__swiper swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($arResult['SECTIONS'] as $index => $section): ?>
                            <div class="index-catalog__item swiper-slide">

                                <?= ResizeImage($section["PICTURE"], array(), 'news', '350', '180', true) ?>

                                <div class="index-catalog__item-title">Купить <?= $section['NAME'] ?></div>
                                <div class="index-catalog__item-label">от <?= $section['UF_PRICE'] ?? rand(750, 850) ?>
                                    ₽/лист
                                </div>
                                <a href="<?= $section['SECTION_PAGE_URL'] ?>" class="index-catalog__item-link">Смотреть
                                    все цены</a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="swiper-button-inner-v2">
                    <div class="swiper-button-prev-dark"></div>
                    <div class="swiper-button-next-dark"></div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>