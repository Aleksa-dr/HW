<?php
include_once 'checker.php';
unset($_SESSION["user_access"]);
echo 'You have cleaned session';
header('Refresh: 1; URL = login.php');
