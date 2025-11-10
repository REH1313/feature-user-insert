<?php
require_once 'db.php';

function create_user($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);
    return $pdo->lastInsertId();
}