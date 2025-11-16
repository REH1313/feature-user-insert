<?php
require_once 'controllers/UserController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();
    $id = $controller->createUser($_POST);

    if ($id) {
        header("Location: profile.php?id=$id");
        exit;
    } else {
        echo "Registration failed. Please try again.";
    }
}

include 'header.php';
?>

<div class="container mt-4">
  <h5>Create New Account</h5>
  <form method="POST" action="register.php" class="card card-body">
    <?php 
      $user = []; // empty array so partial doesn’t break
      include 'views/profile/partials/form-fields.php'; 
    ?>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>

<?php include 'footer.php'; ?>