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
    if (!empty($_GET)) {
        $select = "select * from addresses where id = '$_GET[id]'";
        $res = mysqli_query($connect, $select);
        if (mysqli_num_rows($res) > 0) {
            while ($addres = mysqli_fetch_assoc($res)) {
                echo "<h2>Рассчет по адресу " . "<span class='undeline_addres'>" . $addres['address'] . "</span> </h2>";
                $my_cord_dol = $addres['cord_y'];
                $my_cord_shi = $addres['cord_x'];
            }
            echo "<div class='container'>
                    <div class='short_dis distance_box'>
                        <div class='distance_title'>Расстояние до 5км</div>
                    </div>
                    <div class='middle_dis distance_box'>
                        <div class='distance_title'>Расстояние от 5км до 30км</div>
                    </div>
                    <div class='long_dis distance_box'>
                        <div class='distance_title'>Расстояние от 30км</div>
                    </div>
                </div>";
            $select_query = "select * from addresses where id != '$_GET[id]'";
            $result = mysqli_query($connect, $select_query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $her_cord_dol = $row['cord_y'];
                    $her_cord_shi = $row['cord_x'];
                    $distance = round((((acos(sin(($my_cord_shi * pi() / 180)) * sin(($her_cord_shi * pi() / 180)) + cos(($my_cord_shi * pi() / 180)) * cos(($her_cord_shi * pi() / 180)) * cos((($my_cord_dol - $her_cord_dol) * pi() / 180)))) * 180 / pi()) * 60 * 1.1515 * 1.609344), 1);
                    if ($distance < 5) {
                        echo "<div class='short'>" . $row['address'] . " " . "(" . $distance . "км)</div>";
                    } elseif ($distance >= 5 and $distance < 30) {
                        echo "<div class='middle'>" . $row['address'] . " " . "(" . $distance . "км)</div>";
                    } elseif ($distance > 30) {
                        echo "<div class='long'>" . $row['address'] . " " . "(" . $distance . "км)</div>";
                    }
                }
            }
        }
    } else {
        header("location: index.php");
    }
    ?>
    <script src="script.js"></script>
</body>

</html>