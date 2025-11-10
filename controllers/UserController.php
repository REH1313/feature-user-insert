<?php
require_once 'models/UserModel.php';

class UserController {
    public function register() {
        $errors = [];
        $username = '';
        $password= '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if ($username === '') {
                $errors['username'] = 'Username is required.';
            }

            if ($password === '') {
                $errors['password'] = 'Password is required.';
            }

            if (empty($errors)) {
                $userId = create_user($username, $password);
                header("Location: profile.php?id=$userId");
                exit;
            }
        }
        include 'views/profile/create.php';
    }
}