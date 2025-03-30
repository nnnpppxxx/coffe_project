<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    // validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "Všetky polia sú povinné na vyplnenie. Prosím, vyplňte všetky polia. by Valentyn Prudskyi";
    } else {
        // vivod dannykh
        echo "<h2>Ďakujeme za vašu správu!</h2>";
        echo "<p><strong>Meno:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Number:</strong> $phone</p>";
        echo "<p><strong>SMS:</strong> $message</p>";
    }
} else {
    echo "Údaje neboli odoslané. Prosím, skúste to znova. by Valentyn Prudskyi";
}
?>
