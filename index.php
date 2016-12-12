<?php
$errors = [];
if (isset($_POST['firstval'])){// || ($_POST['secondval']) || ($_POST['operand'])){
    $firstval = trim($_POST['firstval']);
    //$secondval = trim($_POST['secondval']);
    //$operand = trim($_POST['operand']);
    if (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $firstval)){
        $errors[] = 'Error firstval value type!!!';
    }
    /*elseif (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $secondval)){
        $errors[] = 'Error secondval value type!!!';
    }
    elseif (!preg_match('/^[+\-\*\/]{1}$/', $operand)){
        $errors[] = 'Error operand value type!!!';
    }*/
}
else{
    $firstval = ''; //$secondval = ''; $operand = '';
}
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
        //echo "<div style = 'color: red;'>$_POST['firstval']</div>";
    }
}