<?php
function validateCalcOperation($PostOperationName, &$errs)
{
    if (isset($_POST[$PostOperationName])) {
        $PostInputValue = trim($_POST[$PostOperationName]);
        if (!preg_match('/^[+\-\*\/]{1}$/', $PostInputValue)) {
            $errs[$PostOperationName] = '<div style = \'color: red;\'> Invalid type of operation ' .
                "$PostOperationName" . ": $PostInputValue";
        }
        return $PostInputValue;
    }
}