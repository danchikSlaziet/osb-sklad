<?php if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use Bitrix\Main\Localization\Loc;
?>

<section id="feedback" class="feedback">
    <div class="container">
        <div class="feedback__content">
            <div class="feedback__label">Нужна OSB? Оставьте свой номер,
                и мы оперативно перезвоним:)</div>
                <?php if (!empty($arResult["ERROR_MESSAGE"])): ?>
                    <?php foreach ($arResult["ERROR_MESSAGE"] as $error): ?>
                    <script>openPopup('<?=$error?>', 'danger')</script>
                <?php endforeach; ?>
                <?php elseif (!empty($arResult["OK_MESSAGE"])): ?>
                    <script>
                        openPopup('Наши грузчики уже сдувают пылинки с ОСБ, чтобы отправить её вам в лучшем виде!', 'success', 6000)
                      //  gtag('event','Отправил', { 'event_category': 'Телефон' })
                    </script>
                <?php endif; ?>
            <form name="simple_form_2" method="post" id="feedback__anchor" action="<?= POST_FORM_ACTION_URI ?>">
                <?=bitrix_sessid_post()?>
                <input type="text" id='feedback_input-phone'
                       placeholder="Укажите номер для связи <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>"
                       name="user_phone">
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <button value="<?=GetMessage("MFT_SUBMIT")?>" name="submit" type="submit"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/feedback.svg" alt=""></button>
            </form>
            <div class="feedback__politic"><? renderPoliticElement() ?> </div>

        </div>
    </div>
</section>

