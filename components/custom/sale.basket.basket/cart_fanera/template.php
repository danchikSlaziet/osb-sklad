<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;


/**
 * @var array $arParams
 * @var array $arResult
 * @var string $templateFolder
 * @var string $templateName
 * @var CMain $APPLICATION
 * @var CBitrixBasketComponent $component
 * @var CBitrixComponentTemplate $this
 * @var array $giftParameters
 */

//debug($arResult);
$normalCount = count($arResult["ITEMS"]["AnDelCanBuy"]);
//debug($arResult);
?>
<section id="title" class="title">
    <div class="container">
        <h1>Корзина</h1>
    </div>
</section>


<section id="cart" class="cart">
    <div class="container">
        <? if (!empty($arResult['GRID']['ROWS']) && $normalCount > 0): ?>
            <table class="cart__table">
                <tr class="cart__table-row head">
                    <th class="cart__number">Номер</th>
                    <th class="cart__name">Наименование</th>
                    <th class="cart__price">Цена</th>
                    <th class="cart__basket">Кол-во</th>
                    <th class="cart__sum">Сумма</th>
                    <th class="cart__delete"></th>
                </tr>
                <? $countItem = 1; ?>
                <? foreach ($arResult['GRID']['ROWS'] as $arItem): ?>
                    <tr class="cart__table-row preview__content">
                        <td class="cart__number">№ <?= $countItem++ ?></td>
                        <td class="cart__name">
                            <div class="cart__name-content">
                                <a class="cart__image" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                    <img src="<?= !empty($arItem['PREVIEW_PICTURE_SRC']) ? $arItem['PREVIEW_PICTURE_SRC']
                                        : SITE_TEMPLATE_PATH . '/assets/img/no_photo.jpg' ?>"
                                         alt="<?= $arItem['NAME'] ?>"></a>
                                <a class="cart__product-title"
                                   href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><span><?= $arItem['NAME'] ?></span></a>
                            </div>
                        </td>
                        <td class="cart__price-cell">
                            <span class="cart__label-mob">Цена за шт.</span>
                            <span class="cart__price"><?= "{$arItem['BASE_PRICE']}" ?></span> ₽/шт
                        </td>
                        <td class="cart__basket product__basket">
                            <div class="product__num" data-prod-id="<?= $arItem['ID'] ?>">

                                <button class="minus"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/minus.svg"
                                                           alt="минус">
                                </button>
                                <input value="<?= $arItem['QUANTITY'] ?>"
                                       min="1"
                                       type="number"
                                       class="preview__count cart-input"
                                       onkeyup="this.value = this.value.replace(/[^\d]/g,'');"
                                       placeholder="1">
                                <button class="plus"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/plus.svg"
                                                          alt="плюс"></button>
                            </div>
                        </td>
                        <td class="cart__sum"><?= "{$arItem['SUM_FULL_PRICE']} ₽" ?></td>
                        <td class="cart__delete" data-prod-id="<?= $arItem['PRODUCT_ID'] ?>"
                            data-cart-id="<?= $arItem['ID'] ?>">
                            <a href="#">
                                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/delete.svg" alt="">
                            </a>
                        </td>
                    </tr>
                <? endforeach; ?>
            </table>
            <div class="cart__bottom">
                <div class="cart__result">Итого:<span><?= "{$arResult['allSum']} ₽" ?></span></div>
                <a href="order/" class="cart__btn-next btn-black">Перейти к оформлению заказа</a>
            </div>
        <? else: ?>

            <div class="plug__content">
                <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/plug.svg" alt="">
            </div>
        <? endif; ?>
    </div>
</section>






