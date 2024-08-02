<?php
session_start();
include "db_connect.php";

// Проверяем наличие массива ID в сессии
if (isset($_SESSION['arrayID']) && !empty($_SESSION['arrayID'])) {
    // Получаем массив ID из сессии
    $ids = $_SESSION['arrayID'];

    // Преобразуем массив в строку для SQL-запроса
    $idList = implode(',', array_map('intval', $ids)); // Убедимся, что все значения являются целыми числами
    //   print_r($idList);
    // Подготовка SQL-запроса
    $sql = "SELECT * FROM cards WHERE id IN ($idList)";

    // Выполнение запроса
    if ($result = $mysql->query($sql)) {
      
        // Проверка наличия результатов
        if ($result->num_rows > 0) {
           // Создаем массив для хранения результатов с учетом повторяющихся ID
          $output = [];

          // Вывод результатов
          while ($row = $result->fetch_assoc()) {
              // Получаем количество повторений каждого ID в исходном массиве
              $idCount = array_count_values($ids)[$row['id']];
              for ($i = 0; $i < $idCount; $i++) {
                  $output[] = $row;
              }
          }

          // Выводим все результаты, включая повторяющиеся
          foreach ($output as $item) {
              print('
                  <div class="rt_con">
                      <div class="rtc_img" style="background-image: url(../images/tovar/'.$item['link'].');"></div>
                      <div class="rtc_info">
                          <span>Тип: Волосы</span>
                          <span>Цена: '.$item['sell'].'₽</span>
                          <span>Цвет: '.$item['color'].'</span>
                      </div>
                      <div class="del_items_trash" onclick="delit('.$item['id'].')">x</div>
                  </div>
              ');
              
          }
      } else {
          echo "No records found.";
      }
      // Освобождение результата
      $result->free();
  } else {
      echo "Ошибка запроса: " . htmlspecialchars($mysql->error);
  }
} else {
  echo "Корзина пуста";
}

// Закрытие соединения
$mysql->close();
           
?>