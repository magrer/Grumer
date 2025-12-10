<?php
// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pet = htmlspecialchars(trim($_POST['pet']));
    $service = htmlspecialchars(trim($_POST['service']));
    $message = htmlspecialchars(trim($_POST['message']));
    
    // В реальном приложении здесь была бы отправка email
    // Например, с помощью mail() или библиотеки PHPMailer
    
    // Для демонстрации просто сохраняем данные в файл
    $data = "Новая заявка с сайта:\n";
    $data .= "Имя: " . $name . "\n";
    $data .= "Телефон: " . $phone . "\n";
    $data .= "Email: " . $email . "\n";
    $data .= "Питомец: " . $pet . "\n";
    $data .= "Услуга: " . $service . "\n";
    $data .= "Сообщение: " . $message . "\n";
    $data .= "Дата: " . date("Y-m-d H:i:s") . "\n";
    $data .= "----------------------------\n";
    
    // Сохраняем в файл (в реальном приложении лучше использовать базу данных)
    file_put_contents('requests.txt', $data, FILE_APPEND);
    
    // Возвращаем пользователю сообщение об успехе
    echo json_encode([
        'success' => true,
        'message' => 'Спасибо! Ваша заявка успешно отправлена. Мы свяжемся с вами в ближайшее время.'
    ]);
} else {
    // Если запрос не POST, возвращаем ошибку
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка: неверный метод запроса.'
    ]);
}
?>