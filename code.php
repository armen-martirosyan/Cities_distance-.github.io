<?php
session_start();
require_once("connect.php");

$query = "SHOW TABLES FROM `geo` like 'addresses'";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) <= 0) {
  $create = "CREATE TABLE addresses (
    id int(12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    address VARCHAR(255) NOT NULL,
    cord_y VARCHAR(255) NOT NULL,
    cord_x VARCHAR(255) NOT NULL
  )";
  if (mysqli_query($connect, $create)) {
    $xml = simplexml_load_file("addresses.xml") or die("Error: Cannot create object");

    foreach ($xml->children() as $row) {
      $address = $row->addresses_street . ' ' . $row->addresses_address;
      // $street = $row->addresses_street;
      $cord_y = trim($row->addresses_cord_y);
      $cord_x = trim($row->addresses_cord_x);

      $insert_query = "insert into addresses(address, cord_y, cord_x) values ('$address', '$cord_y', '$cord_x')";

      $result = mysqli_query($connect, $insert_query);
    }
    $_SESSION['table'] = true;
    $_SESSION['msg'] = "Таблица успешно загружена";
    header("location:index.php");
  } else {
    $_SESSION['msg'] = "Произошла ошибка загрузки";
    header("location:index.php");
  }
} else {
  $_SESSION['msg'] = "Таблица уже сущетвуеет";
  header("location:index.php");
}
