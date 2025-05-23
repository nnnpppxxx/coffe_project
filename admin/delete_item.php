<?php
require_once 'config.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
$id = $_GET['id'] ?? 0;
$item = $pdo->query("SELECT * FROM menu_items WHERE id = $id")->fetch();
if (!$item) {
    $_SESSION['error'] = "Nápoj nebol nájdený!";
    header('Location: menu.php');
    exit;
}
$pdo->query("DELETE FROM menu_items WHERE id = $id");
$_SESSION['success'] = "Nápoj '{$item['name']}' bol úspešne odstránený!";
header('Location: menu.php');
exit;
?>