<?php
//наастройки базы данных для XAMPP
define('DB_HOST', 'localhost');
define('DB_NAME', 'admin');
define('DB_USER', 'root');
define('DB_PASS', '');

// Включаем сессии
session_start();

//подключение классов
require_once '../_inc/database.php';
require_once '../_inc/MenuItem.php';
require_once '../_inc/auth.php';
// подключение к базе
$pdo = Database::getInstance()->getConnection();

//включаем ошибки для отладки
ini_set('display_errors', 1);
error_reporting(E_ALL);
