<?php
require_once 'db.php';

class UserModel {
    private $pdo;

    public function __construct() {
        $this->pdo = getPDO();
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertUser($username, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, active) VALUES (?, ?, 1)");
        if ($stmt->execute([$username, $password])) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }

    public function updateUser($id, $username, $password) {
        $stmt = $this->pdo->prepare("UPDATE users SET username = ?, password = ? WHERE id = ?");
        return $stmt->execute([$username, $password, $id]);
    }

    public function deactivateUser($id) {
        $stmt = $this->pdo->prepare("UPDATE users SET active = 0 WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
