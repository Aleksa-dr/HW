<?php
function validateCalcValue($PostValueName, &$errs)
{
    if (isset($_POST[$PostValueName])) {
        $PostInputValue = trim($_POST[$PostValueName]);
        if ($PostInputValue != '0' ) {
            $PostInputValue = ltrim($_POST[$PostValueName], '0');
        }
        if (!preg_match('/^(\-){0,1}[\d]+(\.){0,1}[\d]*$/', $PostInputValue)) {
            $errs[$PostValueName] = '<div style = \'color: red;\'> Invalid type of argument ' .
                "$PostValueName" . ": $PostInputValue";
        }
        return $PostInputValue;
    }
}