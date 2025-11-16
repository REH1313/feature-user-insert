<?php include 'views/partials/header.php'; ?>

<h2>Register</h2>
<form method="POST" action="register.php" class="card card-body">
    <?php 
        // Ensure $user is defined so partial doesn’t break
        $user = [
            'username' => $username ?? '',
            'password' => $password ?? ''
        ];
        include 'views/profile/partials/form-fields.php'; 
    ?>

    <!-- Error messages -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $field => $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary">Register</button>
</form>

<?php include 'views/partials/footer.php'; ?>