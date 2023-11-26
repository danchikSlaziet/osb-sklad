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
//debug($arResult);

$GLOBALS['arrFilter'] = $_GET['FILTER'] ?? [];
$GLOBALS['FORM_ACTION'] = $arResult["FORM_ACTION"];
//debug($arResult['ITEMS'])
?>
<?php
$this->SetViewTarget("filter");
$arPrice = null;
?>
<div class="catalog__filter filter">
    <div class="filter__topbar">
        <div class="filter__close">
            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/close.svg" alt="">
        </div>
        <div class="filter__title">
            Фильтр
        </div>
    </div>
    <form id="filterForm" action="<?= $arResult["FORM_ACTION"] ?>" method="get" class="form">
        <div class="filter__content">
            <? foreach ($arResult['ITEMS'] as $arItems): ?>
                <?
                if(
                    empty($arItems["VALUES"]) || count($arItems['VALUES']) < 2
                    || isset($arItems["PRICE"])
                )
                    continue;
                ?>
                <div class="acc filter__item show">
                    <div class="acc-btn filter__item-title">
                        <?= $arItems['NAME'] ?>
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/arrow-down-dark.svg" alt="">
                    </div>
                    <div class="acc-body">
                        <? foreach ($arItems['VALUES'] as $key => $arItem): ?>
                            <label class="filter__check  check">
                                <input name="FILTER[<?= $arItems['CODE'] ?>][]"
                                       class="check__input visually-hidden"
                                       type="checkbox"
                                       value="<?= $arItem['VALUE'] ?>"
                                    <?= isset($_GET['FILTER'][$arItems['CODE']]) &&
                                    array_search($arItem['VALUE'], $_GET['FILTER'][$arItems['CODE']]) !== false ? 'checked' : '' ?>
                                >
                                <span class="check__box"></span>
                                <span class="check__text"><?= $arItem['VALUE'] ?></span>
                            </label>
                        <? endforeach; ?>
                    </div>
                </div>
            <? endforeach; ?>
            <div class="filter__bottom">
                <button class="filter__show" type="submit">Применить!</button>
                <a href="" class="filter__reset">Сбросить</a>
            </div>
        </div>
    </form>
</div>
    <script>
        $('#filterForm').on("submit", function (e) {
            var $form = $(this);
            let valueSelect = $('#catalog__select-sort').children("option:selected").val()
            $.get(
                BX.util.htmlspecialcharsback($form.attr('action').split('?')[0] + '?' + $form.serialize()),
                function (data) {
                    let $pg = $('.catalog__grid');
                    let $pc = $('.plug__content');
                    if ($pg.length > 0) {
                        $pg.html($(data).find('.catalog__grid').html());
                    }else if($pc.length > 0 && $(data).find('.catalog__grid').length > 0){
                        $pc.replaceWith($(data).find('.catalog__grid'))
                    }
                    if ($(data).find('.plug__content').length > 0){
                        $pg.replaceWith($(data).find('.plug__content'));
                    }
                    if ($('.catalog__filter.filter.show').length > 0) {
                        $('.filter').toggleClass('show');
                    }
                    SortProd(valueSelect)
                }
            );

            e.preventDefault();

        });

    </script>
<?php
$this->EndViewTarget("filter");
?>

