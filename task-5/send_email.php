<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Проверяем, не пустые ли поля
    if(empty($email) || empty($message)) {
        echo "Поля email и сообщение не могут быть пустыми.";
        exit();
    }

    // Регулярное выражение для проверки email
    $emailRegex = "/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    if (!preg_match($emailRegex, $email)) {
        echo "Неверный формат email.";
        exit();
    }

    // Очищаем входные данные для предотвращения атак XSS
    $email = strip_tags(htmlspecialchars($email));
    $message = strip_tags(htmlspecialchars($message));

    // Отправка email
    $to = 'your-email@example.com';
    $subject = 'Отправка формы обратной связи';
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)) {
        echo "Email успешно отправлен.";
    } else {
        echo "Не удалось отправить email.";
    }
}