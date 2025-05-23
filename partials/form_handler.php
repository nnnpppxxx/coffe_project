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