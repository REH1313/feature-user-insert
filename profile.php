<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "USER ID missing.";
    exit;
}

$stmt = $pdo->prepare("SELECT username, password FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    echo "User not found.";
    exit;
}
?>

<h2>User Profile</h2>
<table>
    <tr><th>Username</th><td><?= htmlspecialchars($user['username']) ?></td></tr>
    <tr><th>Password</th><td><?= htmlspecialchars($user['password']) ?></td></tr>
</table>