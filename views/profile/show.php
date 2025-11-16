<?php include 'views/partials/header.php'; ?>

<div class="card mt-4">
  <div class="card-body">
    <h5 class="card-title">User Profile</h5>
    <p><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></p>
    <p><strong>Password:</strong> <?= htmlspecialchars($user['password']); ?></p>

    <div class="mt-3">
      <a href="profile.php?id=<?= htmlspecialchars($user['id']); ?>&mode=edit" class="btn btn-primary">Edit Profile</a>
      <a href="profile.php?id=<?= htmlspecialchars($user['id']); ?>&mode=deactivate" class="btn btn-danger">Deactivate</a>
    </div>
  </div>
</div>

<?php include 'views/partials/footer.php'; ?>