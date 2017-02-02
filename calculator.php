<!DOCTYPE html>
<html lang="en"
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="ru">
    <h1 style="color: darkblue">Calculator</h1>
    <link rel="stylesheet" href="CalcStyle.css" type="text/css"/>
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>

<?php
include "Validator.php";
include "ValidatorForOparation.php";
include "ArifmetLogicDevice.php";
$errs = array();
$firstArg = validateCalcValue('FirstCalcArg', $errs);
$secondArg = validateCalcValue('SecondCalcArg', $errs);
$operation = validateCalcOperation('CalcOperation', $errs);
if (isset($_POST['button1'])) {
        $rezalt = ArifmetLogicDevice($errs, $firstArg, $secondArg, $operation);
}
if (isset($_POST['button2'])) {
    $firstArg = '';
    $operation = '';
    $secondArg = '';
}
?>

<form action="calculator.php" method="post">
    <p><input class="<?= isset($errs['FirstCalcArg']) ? 'error' : 'succes'; ?>"
              name="FirstCalcArg" size="15" value="<?php echo $firstArg ?>"/>
        <input class="<?= isset($errs['CalcOperation']) ? 'error' : 'succes'; ?>"
               name="CalcOperation" size="5" value="<?php echo $operation ?>"/>
        <input class="<?= isset($errs['SecondCalcArg']) ? 'error' : 'succes'; ?>"
               name="SecondCalcArg" size="15" value="<?php echo $secondArg ?>"/>
    </p>
    <p class="StyleButon">
        <button type="submit" name="button1" class="btn btn-primary">Calc</button>
        <button type="submit" name="button2" class="btn btn-warning">Reset</button>
    </p>
    <p class="<?= empty($errs) ? 'GoodRezalt' : 'BadRezalt'; ?>"><label>Rezalt = <?php echo $rezalt; ?></label></p>
</form>
</body>
</html>