<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
/**
 * @var CMain $APPLICATION
 * @var array $arResult
 */
$templateFolder = $arResult['PATH_FOLDER'];
?>

<?php

// callback function
$replacer = function ($matches) use ($arResult, $APPLICATION, $templateFolder) {
    ob_start();


    $APPLICATION->IncludeComponent("bitrix:main.include", "", [
        "AREA_FILE_SHOW" => "file",
        "PATH" => $templateFolder . "/include_element.php",
        'PROPERTY_ATT_ITEM_VALUE' => $matches[1]
    ]);

    return ob_get_clean();
};

// находим метку и заменяем ее на результат работы нашей функции
echo preg_replace_callback(
    "/#INNER_BLOCK_([\\d]+)#/is" . BX_UTF_PCRE_MODIFIER,
    $replacer,
    $arResult["CACHED_TPL"]
);

?>
    <!---->
<?php
//$this->initComponentTemplate();
//$this->SetViewTarget('osb-reviews');
//

//
//$this->EndViewTarget(); ?>