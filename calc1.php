<!DOCTYPE html>
<html>
<head>
    <h1 align = 'center' style = 'color: darkblue'>Калькулятор</h1>
    <link rel = "stylesheet" href = "form.css" />
</head>

<style type = "text/CSS">
    .b1 {
        background: navy; /* Синий цвет фона */
        color: white; /* Белые буквы */
        font-size: 9pt; /* Размер шрифта в пунктах */
    }
</style>

<body>
<form method = "post" action="calc1.php">
    <p align = "center">
        <input type = "text" name = "firstval" size = "10"
               value="<?php if (isset($_POST["firstval"])) echo $_POST["firstval"] ?>" />
        <input type = "text" class = "form" name = "operand" size = "5"
               value="<?php if (isset($_POST["operand"])) echo $_POST["operand"] ?>" />
        <input type = "text" name = "secondval" size = "10"
               value="<?php if (isset($_POST["secondval"])) echo $_POST["secondval"] ?>" /></p>
    <p align = "center"> <input type = "submit" name = "Посчитать" value = "Посчитать" />
    </p>
</form>
</body>
</html>


<?php
$errors = [];
if (isset($_POST['firstval']) || ($_POST['secondval']) || ($_POST['operand'])){
    $firstval = trim($_POST['firstval']);
    $secondval = trim($_POST['secondval']);
    $operand = trim($_POST['operand']);
    if (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $firstval)){
        $errors[] = 'Error firstval value type!!!';
    }
    elseif (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $secondval)){
        $errors[] = 'Error secondval value type!!!';
    }
    elseif (!preg_match('/^[+\-\*\/]{1}$/', $operand)){
        $errors[] = 'Error operand value type!!!';
    }
}
else{
    $firstval = ''; $secondval = ''; $operand = '';
}


if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
        //echo '<input type = "submit" name = "Посчитать" class="b1" value="Посчитать">';

    }
}
$operandarray = array('+', '-');  //можно и через массив
switch ($operand){
    case $operandarray[0]:
        if (empty($errors)){
            $rezalt = $firstval + $secondval;
            echo "<h3 align = 'center'>Результат = $rezalt</h3>";
            break;
        }
    case $operandarray[1]:
        if (empty($errors)) {
            $rezalt = $firstval - $secondval;
            echo "<h3 align = 'center'>Результат = $rezalt</h3>";
            break;
        }
    case '*':
        if (empty($errors)){
            $rezalt = $firstval * $secondval;
            echo "<h3 align = 'center'>Результат = $rezalt</h3>";
            break;
        }
    case '/':
        if (empty($errors)){
            if ($secondval != 0){
                $rezalt = $firstval / $secondval;
                echo "<h3 align = 'center'>Rezult = $rezalt</h3>";
                break;
            }
            else{
                echo 'Error secondval value type! Don\'t divide by zero!!!';
            }
        }
}

?>



