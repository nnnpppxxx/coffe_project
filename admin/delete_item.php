<?php
require_once 'config.php';
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$menu = new MenuItem($db);
$item = $menu->getById($id);

if (!$item) {
    $_SESSION['error'] = "Nápoj nebol nájdený!";
    header('Location: menu.php');
    exit;
}
$menu->delete($id);
$_SESSION['success'] = "Nápoj '{$item['name']}' bol úspešne odstránený!";
header('Location: menu.php');
exit;
