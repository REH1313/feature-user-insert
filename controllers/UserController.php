<?php
require_once 'models/UserModel.php';

class UserController {
    private $model;

    public function getAllUsers() {
        return $this->model->getAllUsers();
    }

    public function deleteUser($id) {
        if ($this->model->deleteUser($id)) {
            header("Location: ../admin/dashboard.php");
            exit;
        }
        return false;
    }

    public function __construct() {
        $this->model = new UserModel();
    }

    // Handle registration (CREATE)
    public function createUser($data) {
        $errors = [];
        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');

        if ($username === '') {
            $errors['username'] = 'Username is required.';
        }
        if ($password === '') {
            $errors['password'] = 'Password is required.';
        }

        if (!empty($errors)) {
            // Pass errors back to the view
            $user = ['username' => $username, 'password' => $password];
            include 'views/profile/create.php';
            return false;
        }

        $userId = $this->model->insertUser($username, $password);
        if ($userId) {
            header("Location: profile.php?id=$userId");
            exit;
        }
        return false;
    }

    // Handle profile updates (UPDATE)
    public function updateUser($data) {
        $id = intval($data['id']);
        $username = trim($data['username'] ?? '');
        $password = trim($data['password'] ?? '');

        if ($this->model->updateUser($id, $username, $password)) {
            header("Location: ../profile.php?id=$id");
            exit;
        }
        return false;
    }

    // Handle deactivation (DEACTIVATE)
    public function deactivateUser($id) {
        if ($this->model->deactivateUser($id)) {
            header("Location: ../index.php");
            exit;
        }
        return false;
    }

    // Retrieve user by ID (READ)
    public function getUser($id) {
        return $this->model->getUserById($id);
    }
}

// Handle POST actions directly
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();
    $action = $_GET['action'] ?? null;

    if ($action === 'create') {
        $controller->createUser($_POST);
    } elseif ($action === 'update') {
        $controller->updateUser($_POST);
    } elseif ($action === 'deactivate') {
        $controller->deactivateUser($_POST['id']);
    }
}