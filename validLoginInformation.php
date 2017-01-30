<?php
include_once 'checker.php';
include_once 'index.php';
include_once 'login.php';
$msg = '';
if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    if (in_array($_POST['username'], $nameArray)
        && in_array(sha1($_POST['password'], true), $passwordArrayWhithSha1)) {
        $_SESSION['user_access'] = true;
        $msg = '<h1>You have entered valid use name and password</h1>';
        header('Refresh: 3; URL = page.php');
    } else {
        $msg = '<h1>Wrong username or password. They have been used already</h1>';
    }
}
?>