<?php
require_once 'admin/config_public.php';
require_once '_inc/MenuManager.php';    

setlocale(LC_ALL, 'sk_SK.utf8');

$menu = new MenuManager($pdo);
$menuItems = $menu->getItems();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our menu</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body class="menu-page menu-page-styles">
    <a href="index.php" class="btn btn-secondary back-button">
        <i class="fas fa-arrow-left"></i> Back to Home
    </a>
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="section-title d-inline-block">Our menu</h1>
            <p class="lead text-muted">Choose something tasty for yourself</p>
        </div>

        <div class="row">
            <?php if (!empty($menuItems)): ?>
                <?php foreach ($menuItems as $item): ?>
                    <div class="col-md-4">
                        <div class="card product-card">
                            <div class="card-body text-center">
                                <h5 class="card-title"><?= htmlspecialchars($item['name']) ?></h5>
                                <div class="price-badge my-3">
                                    <?= number_format($item['price'], 2, ',', ' ') ?> €
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        The menu is currently empty. Please check back later.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>