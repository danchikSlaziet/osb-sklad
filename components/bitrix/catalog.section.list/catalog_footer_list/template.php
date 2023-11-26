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
    <div class="footer__main-item footer__osb">
        <?php
        $faneraArrName = [];
        $faneraArrID = [];
        ?>
        <?php //section footer
        function renderSectionAccordion($arSection, $nameSection, $numSection, $count = 4)
        { ?>

            <div class="acc footer__osb-item">
                <div class="acc-btn footer__osb-title">
                    <?= $nameSection ?>
                    <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/arrow-down.svg" alt="">
                </div>
                <div class="acc-body">
                    <ul>
                        <? $i = 0; ?>
                        <? while ($count > 0): ?>
                            <? if ($arSection[$i]["IBLOCK_SECTION_ID"] === $numSection): ?>
                                <?= '<li><a href="' . $arSection[$i]["SECTION_PAGE_URL"] . '">' . $arSection[$i]['NAME'] . '</a></li>' ?>
                                <? $count--; ?>
                            <? endif; ?>
                            <? $i++; ?>
                        <? endwhile; ?>
                        <li><a href="/catalog/">Смотреть ещё</a></li>
                    </ul>
                </div>
            </div>
        <? } ?>

        <?php foreach ($arResult['SECTIONS'] as $index => $section): ?>
            <? if ($section["DEPTH_LEVEL"] == 1): ?>
                <? array_push($faneraArrName, $section['NAME']) ?>
                <? array_push($faneraArrID, $section['ID']) ?>
                <? unset($arResult['SECTIONS'][$index]) // убрать разделы 2 уровня?>
            <? endif; ?>
        <?php endforeach; ?>
        <?php
            renderSectionAccordion($arResult['SECTIONS'], $faneraArrName[0], $faneraArrID[0]);
            renderSectionAccordion($arResult['SECTIONS'], $faneraArrName[1], $faneraArrID[1]);
        ?>

    </div>
<? endif; ?>
