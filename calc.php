<?php
//for new branch
echo "<h1 align = 'center' style = 'color: darkblue'>Калькулятор</h1>";
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

$form = <<<FORM
<!DOCTYPE html>
<form action="calc.php" method="post">
    <p align = "center"><input type = "text" name = "firstval" 
                        size = "10" value = "$firstval" />    
    <input type = "text" class = "form" name = "operand" size = "5" value="$operand" />  
    <input type = "text" name = "secondval" size = "10" value="$secondval" /></p>
    <p align = "center"> <input type = "submit" name = "button1" value = "Посчитать" />
                         <input type = "reset" onclick = "calc2.php" name = "button2" value = "Сбросить" />
    </p>
</form>
FORM;
echo $form;
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
    }
}

if (isset($_POST['button1'])){
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
                    echo "<h3 align = 'center'>Результат = $rezalt</h3>";
                    break;
                }
                else{
                    echo 'Error secondval value type! Don\'t divide by zero!!!';
                }
            }
    }
}
if (isset($_POST['button2'])){
    $rezalt = 0;
    //$_POST['firstval'] = '';
    //$firstval = 0; $secondval = ' '; $operand = ' ';
    //echo'<META HTTP-EQUIV=button Content="0;URL=calc2.php">';
    echo "<h3 align = 'center'>Результат = $rezalt</h3>";
}


echo "<br />" . "<a href = 'calc1.php'>Next version of calculator >>></a>";

echo "<br />"."<br />"."<br />"."<br />";
echo "<br />" . "<h4 style = 'color: darkblue'>Дата рождения создателя калькулятора: </h4>";
echo date("j F, Y", mktime(0, 0, 0, 11, 25, 1992)) . "<br />";
echo date("M-d-Y", mktime(0, 0, 0, 11, 25, 1992)) . "<br />";
echo date("d.m.Y и это был l", mktime(0, 0, 0, 11, 25, 1992)) . "<br />";
/*
1) Вывести дату своего рождения в 3х форматах;
2) Написать калькулятор используя формы (использовать проверки
   для неверно заданных значений и возвращать ошибки на исправление).
   Интерфейс построить с использованием бутстрап библиотеки;
3) Грамотно поместить все в гит пулреквестом;*/




