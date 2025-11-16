<?php
require_once 'controllers/UserController.php';

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $controller->createUser($_POST);
} else {
    // Show the registration form
    $user = []; // empty array so partial doesn’t break
    $errors = [];
    include 'views/profile/create.php';
}