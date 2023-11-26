<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main\Application;
CModule::IncludeModule("iblock");
?>

<?php
$el = new CIBlockElement;
$arResult = array(
    'hasError' => true,
    'msg' => "Ошибка отправки",
);

$request = Application::getInstance()->getContext()->getRequest();

if (!$request->isPost()) {
    echo json_encode($arResult);
    die();
}

$name = htmlspecialcharsEx($request->getPost('name'));
$message = htmlspecialcharsEx($request->getPost('message'));
//$section = htmlspecialcharsEx($request->getPost('section'));
$minus = htmlspecialcharsEx($request->getPost('minus'));
$plus = htmlspecialcharsEx($request->getPost('plus'));

$item = intval(htmlspecialcharsEx($request->getPost('item')));

if(!empty($name) &&  !empty($plus) || !empty($message) || !empty($minus)) {
    $types = ['image/jpeg', 'image/png', 'image/gif'];


    $arMorePhoto = [];


    if (!empty($_FILES['file']['name'][0])) {
        for ($i = 0; $i < count($_FILES["file"]["name"]); $i++) {
            if (!in_array($_FILES["file"]["type"][$i], $types)) {
                echo json_encode('Доупстимые форматы файла: jpg, png, jpeg');
                die();
            }
            $arMorePhoto['n' . $i] = array(
                "name" => $_FILES["file"]["name"][$i],
                "size" => $_FILES["file"]["size"][$i],
                "tmp_name" => $_FILES["file"]["tmp_name"][$i],
                "type" => $_FILES["file"]["type"][$i],
            );
        }
    }

    $PROP["ATT_IMAGES"] = $arMorePhoto;

//var_dump($PROP["ATT_IMAGES"]);

    $arLoadProductArray = array(
        "IBLOCK_ID" => 5,
        "IBLOCK_SECTION_ID" => !empty($section) ? (int) $section : 16,
        "ACTIVE" => "N",
        "NAME" => $name,
        "PREVIEW_TEXT" => $message,
        "PROPERTY_VALUES" => [
            "PLUSE" => !empty($plus) ? $plus : '',
            "MINUS" => !empty($minus) ? $minus : '',
            "ATT_ELEMENT" => !empty($item) ? $item : '',
            "ATT_IMG" => $PROP["ATT_IMAGES"]
        ],
    );
//
    if ($el->Add($arLoadProductArray)) {
        echo json_encode('OK');
        die();
    } else {
        echo json_encode($el->LAST_ERROR);
        die();
    }
}else{
    echo json_encode("Введите имя и сообщение");
    die();
}
?>
