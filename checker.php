<?php
include_once 'roles.php';
session_start();
$link = mysqli_connect('localhost', 'alex', 'password', 'users');
if (!$link) {
    die('Ошибка соединения с базой данных: ' . mysqli_error($link));
}
if (isset($_POST['userName']) && isset($_POST['password'])) {
    $name = $_POST['userName'];
    $password = $_POST['password'];
    $sqlQuery = "
SELECT `name_role`, `name`, `password`                                    
FROM `role`                                          
  INNER JOIN `user` ON `role`.`id` = `user`.`id_role`
WHERE `name` = '$name' AND `password` = '$password'";

    $result = mysqli_query($link, $sqlQuery);
    $_SESSION['userRole'] = null;
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        $_SESSION['userRole'] = $row[0];
    }
    mysqli_free_result($result);
    mysqli_close($link);
}
if (isset($_SESSION['user_access']) && $_SESSION['user_access'] === true) {
    $role = $_SESSION['userRole'];
    $page = $_SERVER['PHP_SELF'];
    $page = substr($page, 6, strlen($page) - 10);
    if (!in_array($page, $roles[$role])) {
        echo '<h1>You have not permission for this page</h1>';
        header('Refresh: 1; URL = login.php');
        die('Bye-Bye-Bye');
    }
}
