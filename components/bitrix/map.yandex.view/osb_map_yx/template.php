<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$this->addExternalJS('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
?>

<?
$jsParams = [];
$arCoords = [$arResult['POSITION']['yandex_lat'], $arResult['POSITION']['yandex_lon']];

$jsParams[] = [
    'coordPoint' => $arCoords
];
?>

<div id="map" style="width: 100%; height: 100%"></div>

<script type="text/javascript">
    ymaps.ready(init);
    var myMap,
        placemarks = <?=CUtil::PhpToJSObject($jsParams);?>;

    function init() {
        myMap = new ymaps.Map("map", {
            center: [<?=$arResult['POSITION']['yandex_lat']?>, <?=$arResult['POSITION']['yandex_lon']?>],
            zoom: 15
        });

        for (var i in placemarks) {
            if (placemarks.hasOwnProperty(i)) {
                var placemark = new ymaps.Placemark(placemarks[i].coordPoint);
                myMap.geoObjects.add(placemark);
            }
        }
    }
</script>