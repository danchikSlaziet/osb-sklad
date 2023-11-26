<section id="partners" class="partners">
    <div class="container">
        <div class="partners__content">
            <a href="#">
                <div class="partners__item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/comp1.svg" alt=""></div>
            </a>
            <a href="#">
                <div class="partners__item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/comp2.svg" alt=""></div>
            </a>
            <a href="#">
                <div class="partners__item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/comp3.svg" alt=""></div>
            </a>
            <a href="#">
                <div class="partners__item"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/comp4.svg" alt=""></div>
            </a>
        </div>
    </div>
</section>
<script>
    const arrayOfLogoLinks = [
        '<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/comp1New.svg',
        '<?= SITE_TEMPLATE_PATH ?>/assets/img/image/comp2.png',
        '<?= SITE_TEMPLATE_PATH ?>/assets/img/image/comp3.jpeg',
        '<?= SITE_TEMPLATE_PATH ?>/assets/img/image/comp4.png',
    ]
    hoverOnLogo(arrayOfLogoLinks);
</script>