<?php
    function out($msg) {
        echo "<h1> $msg </h1>";
        echo "<h1> Через 5сек вас выкинет на login.html</h1>";
        header("refresh: 5, url=login.html");
        exit();
    }

    $mail = $_POST["mail"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "db");
    if ($conn->connect_error) { 
        die("Ошибка: " . $conn->connect_error); 
    }
    echo "Подключение успешно установлено";

    $sql = "SELECT * FROM users";
    if($result = $conn->query($sql)) {
        foreach ($result as $row) {
            if ($row['mail'] == $mail) {
                if ($row['password'] ==  $password) {
                    out("Вы вошли");
                } else {
                    out("Неправильный пароль");
                }
            }
        }
        out("Нет такого пользователя");
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
?>