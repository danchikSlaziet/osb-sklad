<div class="reviews__form">
    <div class="reviews__form-topbar">
        <div class="reviews__form-close"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/close.svg" alt=""></div>
    </div>
    <div class="title-section">
        <h2>Поделитесь своим отзывом</h2>
    </div>
    <form id="addReviews" name="contactForm" method="POST" action="<?=$templateFolder?>/add_reviews.php">
        <? if (!empty($arParams['ELEMENT_ID'])): ?>
            <input type="hidden" name="item" value="<?= $arParams['ELEMENT_ID']?>">
        <? endif; ?>
        <div class="default-field">
            <input type="text" class="review__plus" name="name"
                   placeholder="Введи ваше имя">
            <label for="">Имя</label>
        </div>
        <div class="default-field">
            <input type="text" class="review__plus" name="plus"
                   placeholder="Расскажите, что вам понравилось">
            <label for="">Плюсы</label>
        </div>
        <div class="default-field">
            <input type="text" class="review__minus" name="minus"
                   placeholder="Расскажите, что вам не понравилось">
            <label for="">Минусы</label>
        </div>
        <div class="default-field">
		<textarea name="message" class="review__textarea" placeholder="Расскажите, подробнее о покупке"></textarea>
            <label for="">Комментарий</label>
        </div>
        <button type="submit" class="btn-black">Оставить отзыв</button>
    </form>
</div>