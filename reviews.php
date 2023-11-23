<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/default-page.css">
    <link rel="stylesheet" href="css/reviews.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Услуги</title>
</head>
<body>
    <header>
        <a href="main.html">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="47" height="47" viewBox="0 0 47 47" fill="none">
                    <path d="M16 31.5H0V17H16V1H30.5V17H46.5V31.5H30.5V46.5H16V31.5Z" fill="#009529" stroke="#009528" />
                    <path
                        d="M21.322 31.5085V41H30.1695V31.5085H40V22.9661H30.1695V13H21.322V22.0169H11V31.5085C11 31.8881 17.8814 31.6667 21.322 31.5085Z"
                        fill="#78BF01" />
                    <path
                        d="M30.661 41H30.1695M30.1695 41H21.322V31.5085C17.8814 31.6667 11 31.8881 11 31.5085C11 31.1288 11 25.0226 11 22.0169H21.322V13H30.1695V22.9661H40V31.5085H30.1695V41Z"
                        stroke="#69BA0A" />
                </svg>
                <h2>Здесь здорово!</h2>
            </div>
        </a>
        <nav>
            <ul>
                <a href="contacts.html">Контакты</a>
                <a href="services.html">Услуги</a>
                <a href="vacancies.html">Вакансии</a>
                <a href="reviews.php">Отзывы</a>
            </ul>
            <a href="login.html">Войти</a>
        </nav>
    </header>
    <div class="path">
        <p>
            <a href="index.html">
                <img src="https://img.icons8.com/material-outlined/24/home--v2.png" alt="" />
                Главная
            </a>
            <img src="https://img.icons8.com/ios-filled/50/forward--v1.png" alt="->" />
            Отзывы
        </p>
    </div>
    <h1>Отзывы</h1>
    <main>
        <h3>
            Уважаемые пациенты! Если Вы столкнулись с проблемой в обслуживании в наших поликлиниках, оставляйте, пожалуйста, свои контактные данные, чтобы мы могли разобраться в ситуации. Мы не можем реагировать на анонимные сообщения. Надеемся на ваше понимание.
        </h3>
        <form action="com.php">
            <input name="name" placeholder="Имя" type="text">
            <textarea name="msg" placeholder="Текст" id="" cols="30" rows="10"></textarea>
            <button type="submit">Отправить</button>
        </form>
    </main>
    <svg id="line" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1726 5" fill="none">
        <path d="M3 2.5L1723 2.5" stroke="#D6DADD" stroke-width="7" stroke-linecap="round" />
    </svg>
    <?php
            $conn = new mysqli("localhost", "root", "", "db");
            if ($conn->connect_error) { 
                die("Ошибка: " . $conn->connect_error); 
            }
            $sql = "SELECT * FROM comms";
            if($result = $conn->query($sql)) {
                foreach($result as $row) {
                    $nick = $row['nick'];
                    $msg = $row['msg'];
                    echo "<div id='comment'><h3>$nick</h3><p>$msg</p></div>";
                }
            }
        ?>
</body>
</html>