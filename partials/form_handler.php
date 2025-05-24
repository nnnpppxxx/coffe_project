<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Обработка данных формы
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

    // Валидация
    if (empty($name) || empty($email) || empty($message)) {
        echo "Všetky polia sú povinné na vyplnenie. Prosím, vyplňte všetky polia. by Valentyn Prudskyi";
    } else {
        // Вывод данных
        echo "<h2>Ďakujeme za vašu správu!</h2>";
        echo "<p><strong>Meno:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Telefón:</strong> $phone</p>";
        echo "<p><strong>Správa:</strong> $message</p>";
    }
} else {
    echo "Údaje neboli odoslané. Prosím, skúste to znova. by Valentyn Prudskyi";
}

?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výsledok odoslania</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <a href="../index.php" class="back-btn">
            <i class="fas fa-arrow-left"></i> Späť
        </a>
    </div>
</body>
</html>