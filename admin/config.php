<?php
// Настройки базы данных для XAMPP
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER', 'root');
define('DB_PASS', '');

// Включаем сессии
session_start();

// Проверка подключения
try {
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME, 
        DB_USER, 
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Правильная запись
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    
    // Для проверки (можно удалить после отладки)
    echo "Подключение к БД успешно!";
} catch(PDOException $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}

ini_set('display_errors', 1);
error_reporting(E_ALL);
?>