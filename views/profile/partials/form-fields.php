<div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input type="text" class="form-control" id="username" name="username"
         value="<?= htmlspecialchars($user['username'] ?? ''); ?>" required>
</div>

<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input type="text" class="form-control" id="password" name="password"
         value="<?= htmlspecialchars($user['password'] ?? ''); ?>" required>
</div>

<input type="hidden" name="id" value="<?= htmlspecialchars($user['id'] ?? ''); ?>">