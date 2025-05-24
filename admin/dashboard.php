<?php
require_once 'config.php';

$auth = new Auth($pdo);

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
if (isset($_GET['logout'])) {
    $auth->logout();
    header('Location: login.php');
    exit;
}
if (!$auth->check()) {
    header('Location: login.php');
    exit;
}   
$pocetNapoj = $pdo->query("SELECT COUNT(*) FROM menu_items")->fetchColumn();

$posledneNapoje = $pdo->query("SELECT name, price, created_at FROM menu_items ORDER BY created_at DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kaviareň</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body class="admin-panel-styles">
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-coffee"></i> Kaviareň Admin
        </div>
        <div class="sidebar-menu">
            <a href="../index.php" class="active"><i class="fas fa-home"></i> Home</a>
            <a href="menu.php"><i class="fas fa-utensils"></i> Správa menu</a>
            
            <a href="?logout"><i class="fas fa-sign-out-alt"></i> Odhlásiť sa</a>
        </div>
    </div>

    <div class="main-content">
        <h2 class="mb-4">Vitajte, <?php echo $_SESSION['admin_username'] ?>!</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-coffee"></i>
                    <div class="number"><?php echo $pocetNapoj; ?></div>
                    <div class="label">Dostupné nápoje</div>
                </div>

        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-clock"></i> Najnovšie pridané nápoje</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <?php if (!empty($posledneNapoje)): ?>
                        <?php foreach ($posledneNapoje as $napoj): ?>
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="drink-item">
                                        <strong><?php echo htmlspecialchars($napoj['name']) ?></strong>
                                        <span class="drink-price"><?php echo number_format($napoj['price'], 2) ?> €</span>
                                    </div>
                                    <small class="text-muted">
                                        <?php echo date('d.m.Y H:i', strtotime($napoj['created_at'])) ?>
                                    </small>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="list-group-item">
                            Žiadne nápoje na zobrazenie
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>