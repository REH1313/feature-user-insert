<?php
// views/profile/index.php
// Expects $users array passed in from UserController

require_once("../../config/init.php");

// Restrict access to admins only
if (!isAdmin()) {
    header("Location: ../../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h1 class="mb-4">User Management Dashboard</h1>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td><?= $user['active'] ? "Active" : "Inactive" ?></td>
                        <td>
                            <a href="../../admin/dashboard.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="delete-verify.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                            <a href="../../deactivate.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Deactivate</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>