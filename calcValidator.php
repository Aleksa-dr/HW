<?php
session_start();
$errors = [];
if (isset($_POST['button'])) {
    if ($_POST['button'] == 'C') {
        $_POST['value'] = 0;
    }
    if (isset($_POST['value'])) {
        $value = trim($_POST['value']);
        if (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $value)) {
            $errors[] = 'Error value type!!!';
        } else {
            setcookie("Cookie", $value);
            $action = $_POST['button'];
            $memo = $_POST['value'];
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
                    setcookie("Action", $action);
                    $value = $_COOKIE["Cookie"] + $value;
                    $_COOKIE["Action"] = '+';
                    break;
                case '-':
                    setcookie("Action", $action);
                    $value = -$_COOKIE["Cookie"] - $value;
                    break;
                case '*':
                    setcookie("Action", $action);
                    $_COOKIE["Cookie"] += 1;
                    $value = $_COOKIE["Cookie"] * $value;
                    $_COOKIE["Action"] = '*';
                    break;
                case '/':
                    setcookie("Action", $action);
                    $value = $_COOKIE["Cookie"] / $value;
                    break;
                case '=':
                    switch ($_COOKIE["Action"]) {
                        case '+':
                            $value = $_COOKIE["Cookie"] + $value;
                            break;
                        case '*':
                            $value = $_COOKIE["Cookie"] * $value;
                            break;
                        case '-':
                            $value = -$_COOKIE["Cookie"] - $value;
                            break;
                        case '/':
                            $value = -$_COOKIE["Cookie"] / $value;
                            break;
                    }
                    break;
                case '+/-':
                    $value = -$value;
                    break;
                default:
                    $value = intval($action);
            }
        }
    }
} else {
    $value = intval($_POST['button']);
}
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
    }
}


