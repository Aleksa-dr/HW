<?php
$errors = [];
if (isset($_POST['value'])){
    $value = trim($_POST['value']);
    if (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $value)){
        $errors[] = 'Error value type!!!';
    }
    else {
        $action = $_POST['button'];
        switch ($action) {
            case 'C':
                $value = 0;
                break;
            case '%':
                $value /= 100;
                break;
            /*case '/':
                $value = $value / $_POST['value'];
                $_POST['value'] /= 100;
                break;*/
            case '7':
                $value = 7;
                break;
            case '8':
                $value = 8;
                break;
            case '9':
                $value = 9;
                break;
        }
    }
}
else{
    $value = '';
}


if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
    }
}

/*if (isset($_POST['firstval']) || ($_POST['secondval']) || ($_POST['operand'])){
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
}*/

//<p style = "text-indent: 250px">

?>

<!DOCTYPE html>
<html>
<head>
    <h1 align = 'center' style = 'color: darkblue'>Калькулятор</h1>
</head>

<style type = "text/CSS">
    .b1 {
        background: navy; /* Синий цвет фона */
        color: white;
        font-size: 9pt;
    }
    .width {
        width: 270px;
        height: 40px;
        text-align: end;
        font-size: larger;
    }
    .add {
        width: 50px;
        height: 50px;
        background-color: gainsboro;
        font-size: larger;
    }
    .C {
        width: 50px;
        height: 50px;
        background-color: orangered;
        font-size: larger;
    }
    .ravno {
        width: 50px;
        height: 50px;
        background-color: lightsteelblue;
        font-size: larger;
    }
    .Ans {
        text-align: center;
    }
</style>

<body>
<form method = "post" action = "calc1.php">
    <p align = "center">
        <input type = "text" name = "value" size = "20" class = "width"
               value = "<?php echo $value ?>" /></p>
    <p class="Ans"><label>Ans = <?php echo $value ?></label></p>
    <p align="center">
        <input type = "submit"  class = "add" name = "button" value = "7" />
        <input type = "submit"  class = "add" name = "button" value = "8" />
        <input type = "submit"  class = "add" name = "button" value = "9" />
        <input type = "submit"  class = "add" name = "button" value = "/" />
        <input type = "submit"  class = "C" name = "button" value = "C" />
    </p>
    <p align="center">
        <input type = "submit"  class = "add" name = "button" value = "4" />
        <input type = "submit"  class = "add" name = "button" value = "5" />
        <input type = "submit"  class = "add" name = "button" value = "6" />
        <input type = "submit"  class = "add" name = "button" value = "*" />
        <input type = "submit"  class = "add" name = "button" value = "%" />
    </p>
    <p align="center">
        <input type = "submit"  class = "add" name = "button" value = "1" />
        <input type = "submit"  class = "add" name = "button" value = "2" />
        <input type = "submit"  class = "add" name = "button" value = "3" />
        <input type = "submit"  class = "add" name = "button" value = "-" />
        <input type = "submit"  class = "add" name = "button" value = "√" />

    </p>
    <p align="center">
        <input type = "submit"  class = "add" name = "button" value = "+/-" />
        <input type = "submit"  class = "add" name = "button" value = "0" />
        <input type = "submit"  class = "add" name = "button" value = "." />
        <input type = "submit"  class = "add" name = "button" value = "+" />
        <input type = "submit"  class = "ravno" name = "button" value = "=" />
    </p>
</form>
</body>
</html>
