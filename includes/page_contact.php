<?php

$arSize = [
    array("width" => 350, "height" => 240, "media" => '(max-width: 767px)'),
    array("width" => 500, "height" => 350, "media" => '(max-width: 991px)'),
]
?>
<section class="content-template content-manager mt-5">
    <div class="container">
        <div class="title-section">
            <h2>Наш склад и офис в #SOTBIT_REGIONS_UF_S_GENITIVE#</h2>
        </div>
        <div class="row">
            <? foreach ($_SESSION["SOTBIT_REGIONS"]["UF_SKLAD_IMG"] as $img): ?>
                <div class="col-lg-6">
                    <?= ResizeImage($img, $arSize, 'contact', '630', '425', false) ?>
                </div>
            <? endforeach; ?>
        </div>
    </div>
</section>