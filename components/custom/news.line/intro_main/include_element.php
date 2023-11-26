<? if (isset($arParams['PROPERTY_ATT_ITEM_VALUE'])):
    $price = "PRICE_" . getPriceID();
    $arSelect = array("ID", "NAME", $price, 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL');
    $arFilter = array("IBLOCK_ID" => 17, "=ID" => $arParams['PROPERTY_ATT_ITEM_VALUE']);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
    ?>

    <? if ($ar_res = $res->GetNext()): ?>
    <div class="intro__product">
        <a href="<?= $ar_res['DETAIL_PAGE_URL'] ?>" class="intro__product-link"></a>
        <div class="intro__product-image"><img
                src="<?= CFile::GetPath($ar_res['PREVIEW_PICTURE']); ?>" alt=""></div>
        <div class="intro__product-tag">Хит продаж!</div>
        <div class="intro__product-title"><?= $ar_res['NAME'] ?></div>
        <? if (isset($ar_res[$price]) && $ar_res[$price] > 0): ?>
            <div class="intro__product-bottom">
                <div class="intro__product-price"><?= round($ar_res[$price]) ?> ₽/шт</div>
                <a href="<?= $ar_res['DETAIL_PAGE_URL'] ?>"
                   class="intro__product-btn btn-orange white">Купить</a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
<?php endif; ?>