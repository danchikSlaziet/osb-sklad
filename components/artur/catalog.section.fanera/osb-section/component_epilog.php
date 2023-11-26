<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?php
/**
 * @var CMain $APPLICATION
 * @var array $arResult
 */
?>

<?php


// callback function
$replacer = function ($matches) use ($arResult, $APPLICATION) {
    ob_start();
//    debug($arResult);

    // тут вставляем разменту, вызовы компонентов, в общем все что нужно вывести
    // в метке #INNER_BLOCK_123# мы можем передать в качестве числа например код инфоблока

    // например в вызове компонента списка новостей:
    $APPLICATION->IncludeComponent(
        "custom:news.line",
        "catalog_slider",
        Array(
            "ACTIVE_DATE_FORMAT" => "j F Y",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "360000",
            "CACHE_TYPE" => "Y",
            "DETAIL_URL" => "",
            "FIELD_CODE" => array("NAME","PREVIEW_TEXT","DETAIL_TEXT","DETAIL_PICTURE","PROPERTY_LINK"),
            "IBLOCKS" => "19",
            "IBLOCK_TYPE" => "news",
            "NEWS_COUNT" => "10",
            "SECTION_ID" => $matches[1],
            "SORT_BY1" => "",
            "SORT_BY2" => "SORT",
            "SORT_ORDER1" => "",
            "SORT_ORDER2" => "ASC"
        )
    );

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