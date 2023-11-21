<?php
    function out($msg) {
        echo "<h1> $msg </h1>";
        echo "<h1> Через 5сек вас выкинет на registry.html</h1>";
        header("refresh: 5, url=registry.html");
        exit();
    }

    if ($_POST['password'] != $_POST['password_true']) {
        out('Неправильный пароль!');
    }

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $conn = new mysqli("localhost", "root", "", "db");
    if($conn->connect_error){ 
        die("Ошибка: " . $conn->connect_error); 
    }
    echo "Подключение успешно установлено". "<br>";

    $sql = $sql = "INSERT INTO users ( mail, password ) VALUES ('$mail', '$password');";
    if($conn->query($sql)){
        out('Данные успешно добавлены');
    } else{
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
?>