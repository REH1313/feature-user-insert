<?php
require_once 'controllers/UserController.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "USER ID missing.";
    exit;
}

$controller = new UserController();
$user = $controller->getUser($id);

if (!$user) {
    echo "User not found.";
    exit;
}

$mode = $_GET['mode'] ?? 'show'; // default to read-only

include 'views/partials/header.php';
?>

<div class="container mt-4">
  <?php if ($mode === 'edit'): ?>
    <?php include 'views/profile/edit.php'; ?>
  <?php elseif ($mode === 'deactivate'): ?>
    <?php include 'views/profile/deactivate.php'; ?>
  <?php else: ?>
    <?php include 'views/profile/show.php'; ?>
  <?php endif; ?>
</div>

<?php include 'views/partials/footer.php'; ?>