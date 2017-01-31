<?php
include_once 'roles.php';
include_once 'index.php';
session_start();
$str = 'Aleksandr Alex24';
foreach ($resultArray as $k => $v) {
    foreach ($v as $kay => $value){
        if($str == $kay){
            $nameRole = $value;
        }
    }
}
if (isset($_SESSION['user_access']) && $_SESSION['user_access'] === true){
        $role = $nameRole;
}
//$page = $_SERVER['PHP_SELF'];
//$page = substr($page, 12, strlen($page) - 16);
//if (!in_array($page, $roles[$role])) {
//    echo '<h1>You have not permission for this page</h1>';
//    header('Refresh: 1; URL = login.php');
//    die('Bye-Bye-Bye');
//}
