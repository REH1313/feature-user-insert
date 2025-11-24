<?php
require_once("../config/init.php");
require_once("../controllers/UserController.php");

if (!isAdmin()) {
    header("Location: ../index.php");
    exit();
}

$userController = new UserController();

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $user = $userController->getUserById($userId);
    include("../views.profile/edit.php");
} else {
    $users = $userController->getAllUsers();
    include("../views/profile/index.php");
}
?>