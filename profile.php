<?php
require_once 'controllers/UserController.php';

$id = $_GET['id'] ?? null;
$controller = new UserController();
$user = $controller->getUser($id);

$mode = $_GET['mode'] ?? 'show'; // default to read-only

include 'header.php';
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

<?php include 'footer.php'; ?>