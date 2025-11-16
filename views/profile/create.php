<?php include 'views/partials/header.php'; ?>

<h2>Register</h2>
<form method="POST">
    <label>Username:</label>
    <input type="text" name="username" value="<?= htmlspecialchars($username) ?>">
    <span><?= $errors['username'] ?? '' ?></span>

    <label>Password:</label>
    <input type="password" name="password">
    <span><?= $errors['password'] ?? '' ?></span>

    <button type="submit">Register</button>
</form>

<?php include 'views/partials/footer.php'; ?>