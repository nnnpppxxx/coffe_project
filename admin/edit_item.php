<?php
require_once 'config.php';
require_once '../_inc/MenuItem.php';


$menuItem = new MenuItem($pdo);
$item = $menuItem->getById((int)($_GET['id'] ?? 0));




if (!$item) {
    header('Location: menu.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $price = (float)str_replace(',', '.', $_POST['price']);
    
    $menuItem->update((int)$item['id'], $name, $price);
    $_SESSION['success'] = "Nápoj bol úspešne aktualizovaný!";
    header('Location: menu.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upraviť nápoj</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body class="edit-item-page">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Upraviť nápoj</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Názov nápoja</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($item['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Cena (€)</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?= number_format($item['price'], 2, ',', ' ') ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="menu.php" class="btn btn-secondary"><i class="fas fa-times"></i> Zrušiť</a>
                        <button type="submit" class="btn btn-purple"><i class="fas fa-save"></i> Uložiť zmeny</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Formátovanie ceny
        document.getElementById('price').addEventListener('blur', function(e) {
            let value = parseFloat(e.target.value.replace(',', '.'));
            if (!isNaN(value)) {
                e.target.value = value.toFixed(2).replace('.', ',');
            }
        });
    </script>
</body>
</html>