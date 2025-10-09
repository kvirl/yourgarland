<?php
// Включение ошибок (для разработки)
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/php_errors.log');

// Базовые настройки безопасности
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('X-Content-Type-Options: nosniff');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// Проверка метода запроса
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die(json_encode(['success' => false, 'error' => 'Разрешен только метод POST']));
}

$config = [
    'smtp' => [
        'host' => 'smtp.yandex.com',
        'user' => 'your_email@example.com',
        'pass' => '',
        'secure' => 'ssl',
        'port' => 465,
        'from' => 'your_email@example.com',
        'from_name' => 'Заявка с сайта',
        'to' => 'your_email@example.com'
    ],
    'limits' => [
        'max_requests' => 3,
        'time_frame' => 60
    ]
];

// ========== ЗАЩИТА ОТ ФЛУДА ==========
$rateLimitDir = __DIR__ . '/rate_limits/';
if (!file_exists($rateLimitDir)) {
    mkdir($rateLimitDir, 0755, true);
}

$rateLimitFile = $rateLimitDir . md5($_SERVER['REMOTE_ADDR']) . '.json';

if (file_exists($rateLimitFile)) {
    $data = json_decode(file_get_contents($rateLimitFile), true);
    if (
        time() - $data['time'] < $config['limits']['time_frame'] &&
        $data['count'] >= $config['limits']['max_requests']
    ) {
        http_response_code(429);
        die(json_encode([
            'success' => false,
            'error' => 'Слишком много запросов. Пожалуйста, подождите 1 минуту.'
        ]));
    }
}

file_put_contents($rateLimitFile, json_encode([
    'time' => time(),
    'count' => ($data['count'] ?? 0) + 1
]));

// ========== ОСНОВНАЯ ЛОГИКА ==========
try {
    // Получаем данные
    $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;

    // Валидация данных
    $name = substr(trim($_POST['name'] ?? ''), 0, 100);
    $email = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $tel = preg_replace('/[^0-9+]/', '', $_POST['tel'] ?? '');

    if (empty($name) || !$email || empty($tel)) {
        throw new Exception('Заполните все поля правильно');
    }

    // Подключаем PHPMailer
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);

    // Настройки SMTP
    $mail->isSMTP();
    $mail->Host = $config['smtp']['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $config['smtp']['user'];
    $mail->Password = $config['smtp']['pass'];
    $mail->SMTPSecure = $config['smtp']['secure'];
    $mail->Port = $config['smtp']['port'];
    $mail->Timeout = 10;

    // Настройки письма
    $mail->setFrom($config['smtp']['from'], $config['smtp']['from_name']);
    $mail->addAddress($config['smtp']['to']);
    $mail->addReplyTo($email, $name);

    $mail->Subject = 'Новая заявка: ' . $name;
    $mail->Body = "
        <h3>Новая заявка с сайта</h3>
        <p><strong>Имя:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Телефон:</strong> {$tel}</p>
        <p><em>Отправлено: " . date('d.m.Y H:i:s') . "</em></p>
    ";
    $mail->AltBody = "Имя: {$name}\nEmail: {$email}\nТелефон: {$tel}";

    // Отправка
    $mail->send();

    echo json_encode(['success' => true, 'message' => 'Сообщение отправлено!']);
} catch (Exception $e) {
    error_log('Ошибка отправки: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Ошибка сервера. Пожалуйста, попробуйте позже.'
    ]);
}
