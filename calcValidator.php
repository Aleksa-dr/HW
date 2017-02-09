<?php
session_start();
$errors = [];
if (isset($_POST['button'])) {
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
                    $value = -$_COOKIE["Cookie"] - $value;
                    break;
                case '*':
                    setcookie("Action", $action);
                    $value = $_COOKIE["Cookie"] * $value;
                    $_COOKIE["Action"] = '*';
                    break;
                case '/':
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
                    }
//                    $memo = '';
                    break;
                case '+/-':
                    $value = -$value;
                    break;
                default:
                    $value = intval($action);
            }
            echo "value= " . $value . "<br/>";
            $firstVal = $value;
            echo "firstVal= " . $firstVal . "<br/>";
            $_SESSION['button'] = $value;
            echo "SESSION= " . $value . "<br/>";
            $_COOKIE["Action"] = $action;
            echo "COOKIE= " . $action . "<br/>";
            echo "POST['value']= " . $value . "<br/>";
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


