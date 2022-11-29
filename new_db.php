<?php

$conn_str = mysqli_connect('localhost', 'root', '');
mysqli_query($conn_str, "CREATE DATABASE IF NOT EXISTS geo CHARACTER SET utf8 COLLATE utf8_general_ci;");

mysqli_close($conn_str);
