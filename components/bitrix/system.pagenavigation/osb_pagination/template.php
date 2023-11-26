<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}
if($arParams['NAV_TITLE'] === 'Search'){
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
}
?>
<section id='pagination' class="pagination">

        <div class="pagination__content">
            <div class="pagination__pages">
                <? if ($arResult["NavPageNomer"] > 1) { ?>
                    <a class="pagination__btn" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">
                        <div class="pagination__icon-prev">
                        </div>
                    </a>
                <? } else { // Если страница первая?>
                        <div class="pagination__icon-prev dark">
                        </div>
                <? } ?>
                <? $page = $arResult["nStartPage"] ?>

                <ul class="pagination__list">
                    <? while ($page <= $arResult["nEndPage"]) { ?>
                        <? if ($page == $arResult["NavPageNomer"]) { ?>
                            <li class="pagination__page active">
                                <a href="#"><?= $page ?></a>
                            </li>
                        <? } else { ?>
                            <li class="pagination__page">
                                <a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $page ?>">
                                    <?= $page ?>
                                </a>
                            </li>
                        <? } ?>
                        <? $page++ ?>
                    <? } ?>
                </ul>
                <? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) { ?>

                    <a class="pagination__btn" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>">
                        <div class="pagination__icon-next">
                        </div>
                    </a>
                <? } else { // Если страница последняя ?>
                        <div class="pagination__icon-next dark">
                        </div>
                <? } ?>
            </div>

    </div>
</section>

