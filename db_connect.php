<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'graciya';

// Создание соединения
$mysql = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($mysql->connect_error) {
    die("Ошибка подключения: " . $mysql->connect_error);
}

// // Выполнение запроса
// $sql = "SELECT * FROM `cards`";
// $conn = $mysql->query($sql);

// if (!$conn) {
//     die("Ошибка выполнения запроса: " . $mysql->error);
// }

// // Вывод результатов
// while ($row = $conn->fetch_assoc()) {
//     echo $row['link'] . "<br>";
// }

// // Закрытие соединения
// $mysql->close();


?>

