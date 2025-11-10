ini_set('display_errors', 1);
error_reporting(E_ALL);

<?php
require_once 'controllers/UserController.php';

$controller = new UserController();
$controller->register();