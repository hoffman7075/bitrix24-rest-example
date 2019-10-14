<?
// использование
include "bitrix24.php";

if (class_exists('Bitrix24')) {
    if (!Bitrix24::createLead($_REQUEST)) {
        echo ("Ошибка при сохранении лида");
    }
}
?>
