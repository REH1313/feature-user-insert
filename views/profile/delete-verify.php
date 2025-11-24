<?php
// views/profile/delete-verify.php
require_once("../../config/init.php");

// Only admins can delete
if (!isAdmin()) {
    header("Location: ../../index.php");
    exit();
}

// Get the user ID from the query string
$userId = intval($_GET['id'] ?? 0);

if ($userId <= 0) {
    header("Location: ../../admin/dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="text-danger mb-4">Confirm User Deletion</h1>

    <p>Are you sure you want to permanently delete this user (ID: <?= htmlspecialchars($userId) ?>)?</p>
    <p class="fw-bold text-danger">This action cannot be undone.</p>

    <form method="post" action="../../delete.php">
        <input type="hidden" name="id" value="<?= $userId ?>">
        <button type="submit" class="btn btn-danger">Yes, Delete User</button>
        <a href="../../admin/dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>