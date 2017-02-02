<?php
$filePath = '/home/aleksandr/Projects/school/FileManager';
$listFiles = array();
$errors = [];
$nameFile = '';

if (isset($_POST['value'])) {
    $filePath = $_POST['value'];
    echo $filePath."<br/>";
    if ($handle = opendir($filePath)) {
        if (false === ($entry = readdir($handle))) {
            $errors[] = "Not permit";
            exit;
        }
        if (isset($_POST['button'])) {
            $typeButton = $_POST['button'];
            if ($typeButton == "Перейти к директории >>>") {
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {
                        $listFiles[] = $entry;
                    }
                }
                $nameFile = $listFiles[0];
                if (isset ($_POST['list'])) {
                    $path_info = pathinfo($listFiles[$_POST['list']]);
                    $nameFile ='Имя файла: '.$listFiles[$_POST['list']]
                        ."<br/>".'Размер файла: '.filesize($listFiles[$_POST['list']]).' байт'
                        ."<br/>".'Тип файла: '.filetype($listFiles[$_POST['list']])
                        ."<br/>".'Расширение файла: '.$path_info['extension']
                        ."<br/>".'Время последнего изменения: '
                        . date ("d F Y H:i:s.", filemtime($listFiles[$_POST['list']]));
                }
            }
            if ($typeButton == "Информация о файле") {
//                $nameFile = $listFiles[0];
//                if (isset ($_POST['list'])) {
//                    $nameFile = $listFiles[$_POST['list']];
//                }
            }
            closedir($handle);
        }
    }
    else {
        $errors[] = "Error 404. Directory not found";
    }
}