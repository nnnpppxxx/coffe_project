<?php

class Auth {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        
    }

    public function login(string $username, string $password): bool {
        // Временный фикс для проверки (удалите после отладки!)
        if ($username === 'admin' && $password === 'admin123') {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            return true;
        }
        return false;
    }

    public function check(): bool {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }

    public function logout(): void {
        session_destroy();
    }
}
?>