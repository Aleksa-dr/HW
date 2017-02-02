<?php
function ArifmetLogicDevice(&$errs, $firstArg, $secondArg, $operation)
{
    if (empty($errs)) {
        switch ($operation) {
            case '+':
                $rezalt = $firstArg + $secondArg;
                break;
            case '-':
                $rezalt = $firstArg - $secondArg;
                break;
            case '*':
                $rezalt = $firstArg * $secondArg;
                break;
            case '/':
                if ($secondArg != 0) {
                    $rezalt = $firstArg / $secondArg;
                    break;
                }
                $errs['CalcOperation'] = '<div style = \'color: red;\'>';
                echo "<div style = 'color: red;'>" . "Invalid type of CalcOperation: deley on 0";
            default:
                break;
        }
        return $rezalt;
    } else {
        foreach ($errs as $error) {
            echo "<div style = 'color: red;'>$error</div>" . "<br />";
        }
    }
}