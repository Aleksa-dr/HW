<?php include_once 'index.php' ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset=utf-8">
    <meta http-equiv="Content-Language" content="ru">
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <!DOCTYPE html>
    <html>
    <head>
        <title>FileMenedger</title>
    </head>
<body>
<form method="post" action="FileManager.php">
    <p align="left">
    <h3>Укажите путь к директории :</h3>
    <input type="text" name="value" class="path"
           value="<?php echo $filePath ?>"/>
    </p>
    <p>
        <input type="submit" name="button" class="btn"
               value="Перейти к директории >>>"/>
    </p>
    <p>
    <h3>Содержимое данной директории :</h3>
    <p>
        <select name="list" class="list">
            <?php
            foreach ($listFiles as $key => $value) {
                echo '<option value=' . $key . '>' . $value . '</option>';
                echo ' ';
            } ?>"/>
        </select>
        <input type="submit" name="button" class="btnInfo"
               value="Информация о файле"/>
    </p>
    <p><?php echo $nameFile ?></p>
    <p><?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<div style = 'color: red;'>$error</div>"."<br />";
            }
        }?></p>
</form>
</body>
</html>