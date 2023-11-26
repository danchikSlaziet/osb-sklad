<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 contact__info">
                <div class="contact__info-item">
                    <div class="contact__info-label">Мы в #SOTBIT_REGIONS_UF_S_GENITIVE#:</div>
                    <div class="contact__info-title">#SOTBIT_REGIONS_UF_ADDRESS#</div>
                    <? if (!empty($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"])): ?>
                        <div class="contact__hours">
                            <? foreach ($_SESSION["SOTBIT_REGIONS"]["UF_NEW_TIME"] as $time): ?>
                                <div class="contact__hours-item">
                                    <span class="contact__hour"><?= $time ?></span>
                                </div>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>
                </div>
                <div class="contact__info-item">
                    <div class="contact__info-label">Звоните по номеру:</div>
                    <div class="contact__info-title">#SOTBIT_REGIONS_UF_PHONE#</div>
                    <a href="#feedback__anchor" class="contact__order-call">Заказать звонок</a>
                </div>

                <div class="contact__info-item">
                    <div class="contact__info-label">По общим вопросам пишите:</div>
                    <div class="contact__info-title">#SOTBIT_REGIONS_UF_EMAIL#</div>
                </div>
                <div class="contact__info-item">
                    <div class="contact__info-label">Другие способы связи:</div>
                    <div class="contact__other-link">
                        <a href=""><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/telegram-h.svg" alt=""></a>
                        <a href="#"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/svg/watsup-h.svg" alt=""></a>
                    </div>
                </div>
            </div>


            <? $arProperty = $_SESSION["SOTBIT_REGIONS"]["MAP_YANDEX"][0]; ?>
            <? if (isset($arProperty)): ?>
                <div class="col-lg-8 contact__map">

                    <? $arPos = explode(",", $arProperty['VALUE']); ?>

                    <?
                    //                            debug($arPos);
                    $APPLICATION->IncludeComponent(
                        "bitrix:map.yandex.view",
                        "osb_map_yx",
                        array(
                            "INIT_MAP_TYPE" => "MAP",
                            "MAP_DATA" => serialize(array(
                                'yandex_lat' => $arPos[0],
                                'yandex_lon' => $arPos[1],
                                'yandex_scale' => 13,
                                'PLACEMARKS' => array(
                                    array(
                                        'TEXT' => $_SESSION["SOTBIT_REGIONS"]["UF_ADDRESS"],
                                        'LON' => $arPos[1],
                                        'LAT' => $arPos[0],
                                    ),
                                ),
                            )),
                            "MAP_WIDTH" => "100%",
                            "MAP_HEIGHT" => "100%",
                            "CONTROLS" => array("ZOOM", "MINIMAP", "TYPECONTROL", "SCALELINE"),
                            "OPTIONS" => array("DESABLE_SCROLL_ZOOM", "ENABLE_DBLCLICK_ZOOM", "ENABLE_DRAGGING"),
                            "MAP_ID" => ""
                        ),
                        false
                    ); ?>

                </div>
            <? endif; ?>
        </div>
    </div>
</section>