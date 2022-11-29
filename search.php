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
    <div class="home">
        <a href="index.php"><img src="images/Home512_22179.png" alt="home" title="Home"></a>
    </div>
    <div class="arrow_up">
        <a href="#">
            <div class="anime_wave">
                <img src="images/up-arrow_icon-icons.com_73351.png">
            </div>
        </a>
    </div>
    <?php
    require_once("connect.php");
    $query = "SHOW TABLES FROM `geo` like 'addresses'";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        if (!empty($_POST['search_address']) and $_POST['search_address'] != 0) {
            $search = $_POST['search_address'];
            $select_query = "select * from addresses where address like '%$search%'";
            $res = mysqli_query($connect, $select_query);
            if (mysqli_num_rows($res) <= 0) {
                $_SESSION['msg'] = "По заданным параметрам ничего не найдено";
                header("location:index.php");
            } else {
                echo "<h2>По заданным параметрам подходят следующие адреса</h2>
            <div class='search_list'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<div class='search_reult'>
            $row[address] <a class='table_link' href='table.php?id=$row[id]'>Расстояния</a>
            </div>";
                }
                echo "</div>";
            }
        } else {
            $_SESSION['msg'] = "Введите пожалуйста коректный адрес";
            header("location:index.php");
        }
    } else {
        $_SESSION['msg'] = "Сначала создайте и заполните таблицу в базе данных";
        header("location:index.php");
    }
    ?>
    <script src="script.js"></script>
</body>

</html>