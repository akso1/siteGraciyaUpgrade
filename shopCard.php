<?php 
// echo json_encode($response);
session_start();
ini_set('display_errors', 0);
error_reporting(0);

// Начинаем буферизацию вывода

if (!isset($_POST['id']) || empty(trim($_POST['id']))) {
    
}else{
    ob_start();

$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
    $response = [];

    if (empty($id)) {
        $response = [
            'status' => 'error',
            'message' => 'ID is empty or invalid.'
        ];
    } else {
        if (!isset($_SESSION['arrayID'])) {
            $_SESSION['arrayID'] = [];
        }

        $_SESSION['arrayID'][] = $id;
    $itemCount = count($_SESSION['arrayID']);

        // Формируем успешный ответ
        $response = [
            'status' => 'success',
            'message' => 'ID added to session array.',
            'id' => $id,
            'item_count' => $itemCount // Отправляем количество элементов
        ];
    }

    // Очищаем буфер перед отправкой JSON
    ob_clean();
    // header('Content-Type: application/json');
    echo json_encode($response);

    // Завершаем буферизацию и отправляем буфер
    ob_end_flush();

    // Дополнительный вывод для отладки (это будет проигнорировано браузером)
    file_put_contents('debug.log', print_r($_SESSION['arrayID'], true), FILE_APPEND);
}
?>