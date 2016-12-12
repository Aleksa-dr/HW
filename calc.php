<?php
echo "<h1 align = 'center' style = 'color: darkblue'>Калькулятор</h1>";

$errors = [];
if (isset($_POST['firstval']) || ($_POST['secondval']) || ($_POST['operand']))
{
    $firstval = trim($_POST['firstval']);
    $secondval = trim($_POST['secondval']);
    $operand = trim($_POST['operand']);
    if (!preg_match('/^[\d]+(\.){0,1}[\d]*$/', $firstval))
    {
        $errors[] = 'Error firstval value type!!!';
    }
    elseif (!preg_match('/^^[\d]+(\.){0,1}[\d]*$/', $secondval))
    {
        $errors[] = 'Error secondval value type!!!';
    }
    elseif (!preg_match('/^[+\-\*\/]{1}$/', $operand))
    {
        $errors[] = 'Error operand value type!!!';
    }
}
else
{
    $firstval = ''; $secondval = ''; $operand = '';
}
/*
if (isset($_POST['operand']))
{
    $operand = trim($_POST['operand']);
    if (!preg_match('/^[+\-\*\/]+$/', $operand))
    {
        $errors[] = 'Error operand value type!!!';
    }
}
else
{
    $operand = '';
}*/

$form = <<<FORM
<form action="calc.php" method="post">
    <p align = "center"><input type = "text" name = "firstval" 
    size = "10" value = "$firstval" />    
    <input type = "text" class = "form" name = "operand" size = "5" value="$operand" />  
    <input type = "text" name = "secondval" size = "10" value="$secondval" /></p>
    <p align = "center"> <input type = "submit" name = "Посчитать" value = "Посчитать" />
    </p>
</form>
FORM;
echo $form;

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>" . "<br />";
        //echo "<div style = 'color: red;'>$_POST['firstval']</div>";
    }
}

//switch ()


/*
1) Вывести дату своего рождения в 3х форматах;
2) Написать калькулятор используя формы (использовать проверки
   для неверно заданных значений и возвращать ошибки на исправление).
   Интерфейс построить с использованием бутстрап библиотеки;
3) Грамотно поместить все в гит пулреквестом;*/




