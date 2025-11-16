<div class="card">
  <div class="card-body">
    <h5 class="card-title">User Profile</h5>
    <p><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></p>
    <p><strong>Password:</strong> <?= htmlspecialchars($user['password']); ?></p>
    <a href="profile.php?id=<?= $user['id']; ?>&mode=edit" class="btn btn-primary">Edit Profile</a>
    <a href="profile.php?id=<?= $user['id']; ?>&mode=deactivate" class="btn btn-danger">Deactivate</a>
  </div>
</div>