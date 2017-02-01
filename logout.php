<?php
include_once 'checker.php';
unset($_SESSION["user_access"]);
unset($_SESSION['userRole']);
echo 'You have cleaned session';
session_destroy();
header('Refresh: 1; URL = login.php');
