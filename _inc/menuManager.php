<?php

class MenuManager{
    private $pdo;
    public $error = null;
    public $success = null;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addItem($name, $price)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO menu_items (name, price) VALUES (?, ?)");
            $stmt->execute([$name, $price]);
            $this->success = "Nápoj bol úspešne pridaný!";
            return true;
        } catch (PDOException $e) {
            $this->error = "Chyba pri pridávaní: " . $e->getMessage();
            return false;
        }
    }

    public function getItems()
    {
        return $this->pdo->query("SELECT * FROM menu_items ORDER BY name")->fetchAll();
    }
}
