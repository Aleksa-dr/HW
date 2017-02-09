<?php include_once 'calcValidator.php' ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="calcStyle.css" type="text/css"/>
    <h1>Калькулятор</h1>
</head>
<body>
<form method="post" action="Calculator.php">
    <p align="center">
        <input type="text" name="value" size="20" class="width"
               value="<?php echo $value ?>"/></p>
    <p class="Ans"><label>Memory = <?php echo $memo ?></label></p>
    <p align="center">
        <input type="submit" class="add" name="button" value="7"/>
        <input type="submit" class="add" name="button" value="8"/>
        <input type="submit" class="add" name="button" value="9"/>
        <input type="submit" class="add" name="button" value="/"/>
        <input type="submit" class="C" name="button" value="C"/>
    </p>
    <p align="center">
        <input type="submit" class="add" name="button" value="4"/>
        <input type="submit" class="add" name="button" value="5"/>
        <input type="submit" class="add" name="button" value="6"/>
        <input type="submit" class="add" name="button" value="*"/>
        <input type="submit" class="add" name="button" value="%"/>
    </p>
    <p align="center">
        <input type="submit" class="add" name="button" value="1"/>
        <input type="submit" class="add" name="button" value="2"/>
        <input type="submit" class="add" name="button" value="3"/>
        <input type="submit" class="add" name="button" value="-"/>
        <input type="submit" class="add" name="button" value="√"/>
    </p>
    <p align="center">
        <input type="submit" class="add" name="button" value="+/-"/>
        <input type="submit" class="add" name="button" value="0"/>
        <input type="submit" class="add" name="button" value="."/>
        <input type="submit" class="add" name="button" value="+"/>
        <input type="submit" class="ravno" name="button" value="="/>
    </p>
</form>
</body>
</html>