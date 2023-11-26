<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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

?>



<?php
if (empty($arResult)) {
    return '';
}

$res = '<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs__list">
            ';

$elCount = count($arResult);

foreach ($arResult as $index => $item) {
    $link = (!empty($item['LINK']) && $index < ($elCount - 1)) ? $item['LINK'] : '#';
    $title = $item['TITLE'] ?? '';
    $div = '<div class="breadcrumbs__item">';
    $res .= $div . '<a href="' . $link . '">' . $title . '</a></div>';
}

$res .= ' 
        </div>
    </div>
</section>';

return $res;
?>


