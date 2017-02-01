<?php
session_start();
$errors = [];
$memory = '';
if (isset($_POST['value'])) {
    $value = trim($_POST['value']);
    if (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $value)) {
        $errors[] = 'Error value type!!!';
    } else {
        setcookie("Cookie", $value);
        $_SESSION['button'] = $value;

        $action = $_POST['button'];
        switch ($action) {
            case 'C':
                $value = 0;
                break;
            case '%':
                $value /= 100;
                break;
            case '√':
                $value = sqrt($value);
                break;
            case '+':
                $value = $_SESSION['button'] + $value;
                break;
            case '-':
                $value = -$_COOKIE["Cookie"] - $value;
                break;
            case '*':
                $value = $_COOKIE["Cookie"] * $value;
                break;
            case '/':
                $value = $_COOKIE["Cookie"] / $value;
                break;
            case '=':
                $_POST['value'] = $value;
                $value = 0;
                break;
            case '+/-':
                $value = -$value;
                break;
            default:
                $value = $action;
        }
    }
} else {
    $value = '';
}
//echo $_SESSION['button'];

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
    }
}


