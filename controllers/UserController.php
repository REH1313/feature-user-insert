<?php
require_once 'models/UserModel.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function getUser($id) {
        return $this->model->getUserById($id);
    }

    public function createUser($data) {
        $username = htmlspecialchars(trim($data['username']));
        $password = htmlspecialchars(trim($data['password']));
        return $this->model->insertUser($username, $password);
    }

    public function updateUser($data) {
        $id = intval($data['id']);
        $username = htmlspecialchars(trim($data['username']));
        $password = htmlspecialchars(trim($data['password']));

        if ($this->model->updateUser($id, $username, $password)) {
            header("Location: ../profile.php?id=$id");
            exit;
        }
    }

    public function deactivateUser($id) {
        if ($this->model->deactivateUser($id)) {
            header("Location: ../index.php");
            exit;
        }
    }
}

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();
    $action = $_GET['action'] ?? null;

    if ($action === 'update') {
        $controller->updateUser($_POST);
    } elseif ($action === 'deactivate') {
        $controller->deactivateUser($_POST['id']);
    }
}