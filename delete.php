<?php
// delete.php
require_once("config/init.php");
require_once("controllers/UserController.php");

// Only admins can delete
if (!isAdmin()) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id'] ?? 0);

    if ($id > 0) {
        $controller = new UserController();
        $controller->deleteUser($id);  // calls the controller method
    } else {
        // Invalid ID, redirect back
        header("Location: admin/dashboard.php");
        exit();
    }
} else {
    // If accessed directly without POST, redirect
    header("Location: admin/dashboard.php");
    exit();
}
?>