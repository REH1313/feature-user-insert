<?php include 'views/partials/header.php'; ?>

<div class="card card-body mt-4">
  <h5 class="card-title text-danger">Deactivate Account</h5>
  <p>
    Are you sure you want to deactivate 
    <strong><?= htmlspecialchars($user['username']); ?></strong>?
  </p>

  <form method="POST" action="controllers/UserController.php?action=deactivate">
    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
    <button type="submit" class="btn btn-danger">Confirm Deactivation</button>
    <a href="profile.php?id=<?= $user['id']; ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>

<?php include 'views/partials/footer.php'; ?>