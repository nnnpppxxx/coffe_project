<?php
require_once 'config.php';
require_once '../_inc/MenuManager.php';


// на словацкий язык
setlocale(LC_ALL, 'sk_SK.utf8');

$auth = new Auth($pdo);

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
$menu = new MenuManager($pdo);

// обработка формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['item_name']);
    $price = (float)str_replace(',', '.', $_POST['price']);

    if ($menu->addItem($name, $price)) {
        $_SESSION['success'] = $menu->success;
        header('Location: menu.php');
        exit;
    } else {
        $error = $menu->error;
    }
}

// зискание актуального меню
$menuItems = $menu->getItems();
?>




<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrácia menu</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body class="menu-page">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Administrácia menu</h4>
                <a href="dashboard.php" class="btn btn-light"><i class="fas fa-arrow-left"></i> Späť</a>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                <?php endif; ?>
                
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                
                <form method="POST" class="row g-3 mb-4">
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="item_name" placeholder="Názov nápoja" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="price" placeholder="Cena (€)" required>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-purple"><i class="fas fa-plus"></i> Pridať nápoj</button>
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Názov</th>
                                <th>Cena</th>
                                <th>Akcie</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($menuItems as $item): ?>
                            <tr>
                                <td><?= htmlspecialchars($item['name']) ?></td>
                                <td class="price-col"><?= number_format($item['price'], 2, ',', ' ') ?> €</td>
                                <td class="action-btns">
                                    <a href="edit_item.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i> Upraviť
                                    </a>
                                    <a href="delete_item.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Naozaj chcete odstrániť tento nápoj?')">
                                        <i class="fas fa-trash-alt"></i> Odstrániť
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // форматирование цены при вводе
        document.querySelector('input[name="price"]').addEventListener('blur', function(e) {
            let value = parseFloat(e.target.value.replace(',', '.'));
            if (!isNaN(value)) {
                e.target.value = value.toFixed(2).replace('.', ',');
            }
        });
    </script>
</body>
</html>