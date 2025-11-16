<?php include 'views/partials/header.php'; ?>

<form method="POST" action="controllers/UserController.php?action=update" class="card card-body mt-4">
  <h5 class="card-title">Edit Profile</h5>
  
  <?php 
    // Reuse the shared partial for username/password fields
    include 'views/profile/partials/form-fields.php'; 
  ?>

  <div class="mt-3">
    <button type="submit" class="btn btn-success">Save Changes</button>
    <a href="profile.php?id=<?= htmlspecialchars($user['id']); ?>" class="btn btn-secondary">Cancel</a>
  </div>
</form>

<?php include 'views/partials/footer.php'; ?>