<?php
    $name = $_POST['name'];
    $text = $_POST['text'];
    if (mail("danya.tyuvayev@bk.ru", "Сообщение от $name", $text)) {
        echo "mail send";
    } else {
        echo "error";
    }
?>