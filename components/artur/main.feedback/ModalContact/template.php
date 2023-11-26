<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use Bitrix\Main\Localization\Loc;

//    debug($arParams)

?>


<?php if (!empty($arResult["ERROR_MESSAGE"])): ?>
    <?php foreach ($arResult["ERROR_MESSAGE"] as $error): ?>
        <script>openPopup('<?=$error?>', 'danger')</script>
    <?php endforeach; ?>
<?php elseif (!empty($arResult["OK_MESSAGE"])): ?>
    <script>openPopup('Спасибо, ваш запрос отправлен. Скоро с вами свяжутся наши эксперты!', 'success', 6000)</script>
<?php endif; ?>


<!-- Модальное окно по остаткам -->

<section id="remainders" class="remainders overlay">
    <div class="remainders__content">
        <div class="remainders__topbar">
            <div class="remainders__close">×</div>
        </div>
        <form method="post" name="simple_form" class="remainders__form" action="<?= POST_FORM_ACTION_URI ?>">
            <?= bitrix_sessid_post() ?>

            <div class="remainders__title">Уточнить остаток</div>

            <p class="remainders__product-name">Название товара</p>

            <input type="hidden" id="hidden-product-title" name="user_item" value="">
            <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">
            <div class="modern-field">
                <input type="text"
                       required
                       id="remainders__name"
                       placeholder="Ваше ФИО <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>"
                       name="user_name">
                <label for="remainders__name">Ваше ФИО</label>
            </div>
            <div class="modern-field">
                <input id="remainders__email"
                       name='user_email'
                       required type='email'
                       placeholder="E-mail <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>"
                >
                <label for="remainders__name">Ваш E-mail</label>
            </div>
            <div class="modern-field">
                <input type="tel" class="popupField"
                       required
                       id="remainders__phone"
                       placeholder="Номер телефона <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>"
                       name="user_phone"
                >
                <label for="remainders__name">Номер телефона</label>
            </div>

            <button type="submit" name="submit" value="modal">Отправить заявку</button>

        </form>

        <p class="remainders__desc">*Данный материал находится в резерве у наших менеджеров и возможно есть шанс
            её
            оттуда забрать
            специально под Ваш заказ.</p>
    </div>
</section>

<!-- Модальное окно по остаткам -->