<?php
require_once '../config/init.php';
require_once 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $username;

        // Optional persistent login
        if (!empty($_POST['remember'])) {
            setcookie("user_id", $user['id'], time() + 86400, "/");
        }

        header("Location: ../admin/dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!-- HTML form -->
<form method="POST">
    <input type="text" name="username" placeholder="Username" required value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
    <input type="password" name="password" placeholder="Password" required>
    <label><input type="checkbox" name="remember"> Remember me</label>
    <button type="submit">Login</button>
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
</form>
