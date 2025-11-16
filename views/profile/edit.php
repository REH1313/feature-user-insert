<form method="POST" action="controllers/UserController.php?action=update" class="card card-body">
  <h5>Edit Profile</h5>
  <?php include 'views/profile/partials/form-fields.php'; ?>
  <button type="submit" class="btn btn-success">Save Changes</button>
  <a href="profile.php?id=<?= $user['id']; ?>" class="btn btn-secondary">Cancel</a>
</form>