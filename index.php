<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class='header_top'></div>
    <header>
        <a class="header_link" href="#">Почта</a>
        <a class="header_link" href="#">Картинки</a>
        <div class="app_menu_icon">
            <img src="images/view_app_grid_icon_180904.png" alt="app_icon" title="Приложения Google">
        </div>
        <div class="accaunt" title="Аккаунт Google">
            A
        </div>
    </header>
    <div class="form_container">
        <div class="google_logo">
            <img src="images/Google-Logo.wine.png" alt="Google logo">
        </div>
        <form action="search.php" method="post">
            <input type="text" name="search_address" placeholder="Введите пожалуйста адрес для поиска">
            <input type="submit" hidden>
            <img class="search_icon" src="images/search_icon-icons.com_69921.png">
            <img class="microphon_icon" src="images/google_mic_logo_icon_159335.png">
        </form>
        <?php
        require_once "new_db.php";


        if (!isset($_SESSION['table'])) {
            echo "<p class='create_table_link'><a href='code.php'>Создать и заполнить таблицу</a></p>";
        }

        if (isset($_SESSION['msg'])) {
            echo "<h3>" . $_SESSION['msg'] . "</h3>";
            unset($_SESSION['msg']);
        }
        ?>


    </div>

    <?php

    ?>
</body>

</html>