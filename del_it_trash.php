<?php
session_start();
// header('Content-Type: application/json'); // Устанавливаем заголовок для JSON

// Ваш код для обработки запроса
$idToRemove = filter_var(trim($_POST['id_to_remove']), FILTER_SANITIZE_NUMBER_INT);

if ($idToRemove) {
    if (isset($_SESSION['arrayID'])) {
        $ids = $_SESSION['arrayID'];
        // Удаляем только первое вхождение ID
        $key = array_search($idToRemove, $ids);
        if ($key !== false) {
            unset($ids[$key]);
            $_SESSION['arrayID'] = array_values($ids); // Пересобираем массив
        }
    }
    // Количество оставшихся элементов
    $count = isset($_SESSION['arrayID']) ? count($_SESSION['arrayID']) : 0;

    // Формируем ответ
    $response = [
        'status' => 'success',
        'message' => 'ID removed successfully.',
        'count' => $count
    ];
} else {
    $response = [
        'status' => 'error',
        'message' => 'Invalid ID.'
    ];
}

echo json_encode($response); // Отправляем JSON
?>