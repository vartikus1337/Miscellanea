<?php
    function out($msg) {
        echo "<h1> $msg </h1>";
        echo "<h1> Через 5сек вас выкинет на registry.html</h1>";
        header("refresh: 5, url=registry.html");
        exit();
    }

    $name = $_POST['name'];
    $msg = $_POST['msg'];

    $conn = new mysqli("localhost", "root", "", "db");
    if($conn->connect_error){ 
        die("Ошибка: " . $conn->connect_error); 
    }
    echo "Подключение успешно установлено". "<br>";

    $sql = $sql = "INSERT INTO comms ( name, msg ) VALUES ('$name', '$msg');";
    if($conn->query($sql)){
        out('Данные успешно добавлены');
    } else{
        echo "Ошибка: " . $conn->error;
    }

    $conn->close();
?>