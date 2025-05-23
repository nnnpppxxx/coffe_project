<?php

class Auth {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
        
    }

    public function login(string $username, string $password): bool {
        $stmt = $this->pdo->prepare("SELECT password FROM admin_users WHERE username = :username"); //sql dotaz
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $hashedPassword = $stmt->fetchColumn(); //получаем пароль

        if ($hashedPassword && password_verify($password, $hashedPassword)) { //checking password
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            return true;
        }
        return false;
    }
    
    public function addAdmin(string $username, string $password): bool {
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->pdo->prepare("INSERT INTO admin_users (username, password) VALUES (:username, :password)"); //add admin
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);

        return $stmt->execute();
    }


    public function check(): bool {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }

    public function logout(): void {
        session_destroy();
    }
}
?>