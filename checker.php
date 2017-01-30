<?php
include_once 'roles.php';
include_once 'index.php';
session_start();
if (isset($_SESSION['user_access']) && $_SESSION['user_access'] === true
    && in_array(1, $roleArray)
) {
    echo "admin";
    $role = 'admin';
} elseif (isset($_SESSION['user_access']) && $_SESSION['user_access'] === true
    && in_array(2, $roleArray)
) {
    $role = 'viewer';
    echo "viewer";
} else {
    $role = 'guest';
    echo "guest";
}
$page = $_SERVER['PHP_SELF'];
$page = substr($page, 12, strlen($page) - 16);
if (!in_array($page, $roles[$role])) {
    echo '<h1>You have not permission for this page</h1>';
    header('Refresh: 1; URL = login.php');
    die('Bye-Bye-Bye');
}
