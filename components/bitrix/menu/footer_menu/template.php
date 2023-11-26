<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>

<? if (!empty($arResult)): ?>
    <div class="footer__main-item footer__menu">
        <div class="acc footer__menu-item">
            <div class="acc-btn footer__menu-title">
                Меню
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/arrow-down.svg" alt="">
            </div>
            <div class="acc-body">
                <ul class="footer__menu-list">
                    <? foreach ($arResult as $arItem): ?>
                        <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                    <? endforeach ?>
                </ul>
            </div>
        </div>
    </div>
<? endif ?>







