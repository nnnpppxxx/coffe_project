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
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Kaviareň</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-coffee"></i> Kaviareň Admin
        </div>
        <div class="sidebar-menu">
            <a href="dashboard.php" class="active"><i class="fas fa-tachometer-alt"></i> Prehľad</a>
            <a href="menu.php"><i class="fas fa-utensils"></i> Správa menu</a>
            <a href="#"><i class="fas fa-receipt"></i> Objednávky</a>
            <a href="#"><i class="fas fa-users"></i> Personál</a>
            <a href="#"><i class="fas fa-chart-bar"></i> Štatistiky</a>
            <a href="#"><i class="fas fa-cog"></i> Nastavenia</a>
            <a href="?logout"><i class="fas fa-sign-out-alt"></i> Odhlásiť sa</a>
        </div>
    </div>

    <div class="main-content">
        <h2 class="mb-4">Vitajte, <?= $_SESSION['admin_username'] ?>!</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-coffee"></i>
                    <div class="number">24</div>
                    <div class="label">Dostupné nápoje</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-receipt"></i>
                    <div class="number">156</div>
                    <div class="label">Dnešné objednávky</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card">
                    <i class="fas fa-euro-sign"></i>
                    <div class="number">1,248.50 €</div>
                    <div class="label">Dnešný príjem</div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="fas fa-bell"></i> Posledné aktivity</h5>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Nový nápoj "Latte Macchiato" bol pridaný</span>
                        <small class="text-muted">Pred 15 minútami</small>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Objednávka #245 bola dokončená</span>
                        <small class="text-muted">Pred 27 minútami</small>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Nový zamestnanec bol pridaný</span>
                        <small class="text-muted">Pred 2 hodinami</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>