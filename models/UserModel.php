<?php
require_once 'db.php';

class UserModel {
    private $pdo;

    public function __construct() {
        $this->pdo = getPDO(); // assumes db.php has a getPDO() function
    }

    // CREATE
    public function insertUser($username, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, password, active) VALUES (:username, :password, 1)");
        if ($stmt->execute([':username' => $username, ':password' => $password])) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }

    // READ
    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function updateUser($id, $username, $password) {
        $stmt = $this->pdo->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id");
        return $stmt->execute([':username' => $username, ':password' => $password, ':id' => $id]);
    }

    // DEACTIVATE
    public function deactivateUser($id) {
        $stmt = $this->pdo->prepare("UPDATE users SET active = 0 WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    // AUTHENTICATION
    public function verifyCredentials($username, $password) {
        $stmt = $this->pdo->prepare("SELECT id, password FROM users WHERE username = :username AND active = 1");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user['id'];
        }
        return false;
    }
}