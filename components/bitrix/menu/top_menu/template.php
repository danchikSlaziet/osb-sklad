<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>


<? if (!empty($arResult)): ?>
    <nav class="header__nav-list">
        <?foreach ($arResult as $arItem):?>
            <div class="header__nav-item">
                <a href="<?= $arItem["LINK"] ?>" itemprop="url" class="header__nav-link <?=$arItem["SELECTED"] ? 'active' : '' ?>">
                    <?= $arItem["TEXT"] ?>
                </a>
            </div>
        <? endforeach ?>
    </nav>
<? endif ?>



