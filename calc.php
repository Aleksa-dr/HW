<?php
echo "<h1 align = 'center' style = 'color: darkblue'>Калькулятор</h1>";

$errors = [];
if (isset($_POST['firstval']))
{
    $firstval = $_POST['firstval'];
    if (!preg_match('/^[\d\.]+$/', $firstval))
    {
        $errors[] = 'Error firstval value type!!!';
    }
}
else
{
    $firstval = '';
}





$form = <<<FORM
<form action="calc.php" method="post">
    <p align = "center"><input type = "text" name = "firstval" 
    size = "10" value = "$firstval" />    
    <input type = "text" name = "operand" size = "5" value="$operand" />  
    <input type = "text" name = "secondval" size = "10" value="$secondval" /></p>
    <p align = "center"> <input type = "submit" name = "Посчитать" value = "Посчитать" />
    </p>
</form>
FORM;
echo $form;

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div style = 'color: red;'>$error</div>";
        //echo "<div style = 'color: red;'>$_POST['firstval']</div>";
    }
}
//echo "<a href='calc.php'>Back</a>";
/*
1) Вывести дату своего рождения в 3х форматах;
2) Написать калькулятор используя формы (использовать проверки 
   для неверно заданных значений и возвращать ошибки на исправление). 
   Интерфейс построить с использованием бутстрап библиотеки;
3) Грамотно поместить все в гит пулреквестом;*/
