<?php
//наастройки базы данных для XAMPP
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER', 'root');
define('DB_PASS', '');

// Включаем сессии
session_start();

//подключение классов
require_once __DIR__ . '/_inc/Database.php';
require_once __DIR__ . '/_inc/MenuItem.php';
require_once __DIR__ . '/_inc/auth.php';
// подключение к базе
$db = Database::getInstance()->getConnection();

//включаем ошибки для отладки
ini_set('display_errors', 1);
error_reporting(E_ALL);
