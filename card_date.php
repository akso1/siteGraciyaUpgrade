<?php

include "db_connect.php";

// Выполнение запроса
$sql = "SELECT * FROM `cards`";
$conn = $mysql->query($sql);

if (!$conn) {
    die("Ошибка выполнения запроса: " . $mysql->error);
}
?>