<?php include 'views/partials/header.php'; ?>
<input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">


<form method="POST" action="controllers/UserController.php?action=update" class="card card-body mt-4">
  <h5 class="card-title">Edit Profile</h5>
  
    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">

    <?php include 'views/profile/partials/form-fields.php'; ?>

    <div class="mt-3">
      <button type="submit" class="btn btn-success">Save Changes</button>
      <a href="profile.php?id=<?= htmlspecialchars($user['id']); ?>" class="btn btn-secondary">Cancel</a>
    </div>
</form>

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

<?php if (!empty($error)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
<?php endif; ?>
