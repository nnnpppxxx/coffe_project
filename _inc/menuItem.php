<?php

class MenuItem {
    
    private $pdo;
    public $error = null;
    public $success = null;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function addItem($name, $price){
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

    public function getItems(){
        return $this->pdo->query("SELECT * FROM menu_items ORDER BY name")->fetchAll();
    }


    public function getById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM menu_items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public function update(int $id, string $name, float $price): bool {
        $stmt = $this->pdo->prepare("UPDATE menu_items SET name = ?, price = ? WHERE id = ?");
        return $stmt->execute([$name, $price, $id]);
    }
    
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM menu_items WHERE id = ?");
        return $stmt->execute([$id]);
    }

}
?>