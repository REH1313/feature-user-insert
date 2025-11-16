<?php
require_once 'controllers/UserController.php';

<<<<<<< HEAD
$controller = new UserController();
$controller->register();
=======
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new UserController();
    $id = $controller->createUser($_POST);

    if ($id) {
        // Redirect to profile page with the new user's ID
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
      // Reuse the shared partial for consistency
      $user = []; // empty array so partial doesn't break
      include 'views/profile/partials/form-fields.php'; 
    ?>
    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>

<?php include 'footer.php'; ?>
>>>>>>> 0bc625a (Initial commit of profile update feature files)
