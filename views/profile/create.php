<form method="POST" action="register.php" class="card card-body">
  <h5>Create Profile</h5>
  <?php 
    $user = []; // empty array so partial doesn’t break
    include 'views/profile/partials/form-fields.php'; 
  ?>
  <button type="submit" class="btn btn-primary">Register</button>
</form>