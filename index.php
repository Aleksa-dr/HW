<?php
session_start();
$filePath = '/home/aleksandr/Projects/school/FileManager';
$listFiles = array();
$errors = [];
$nameFile = '';
if (isset($_POST['value'])) {
    $filePath = $_POST['value'];
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
                        $_SESSION['list'] = $listFiles;
                    }
                }
            }
            $listFiles = $_SESSION['list'];
            if ($typeButton == "Информация о файле") {
                if (isset ($_POST['list'])) {
                    $pathToFile = $_POST['value'] . '/' . $listFiles[$_POST['list']];
                    $path_info = pathinfo($pathToFile);
                    $nameFile = 'Имя файла: ' . $listFiles[$_POST['list']]
                        . "<br/>" . 'Размер файла: ' . filesize($pathToFile) . ' байт'
                        . "<br/>" . 'Тип файла: ' . filetype($pathToFile)
                        . "<br/>" . 'Расширение файла: ' . $path_info['extension']
                        . "<br/>" . 'Время последнего изменения: '
                        . date("d F Y H:i:s.", filemtime($pathToFile));
                }
            }

            foreach ($listFiles as $key => $value){
                $path = $filePath."/".$value;
                if (filetype($path) == "dir"){
                    $listFiles[$key] = $value."dir";//" <input type=\"submit\" name=\"button\" class=\"newDir\"
//               value=\">>>\"/>";
                }

            }
            $fileTree = $listFiles;
            if ($typeButton == "<<<") {
                $path_parts = pathinfo($filePath);
                $filePath = $path_parts['dirname'];
            }


            closedir($handle);
        }
    } else {
        $errors[] = "Error 404. Directory not found";
        if (isset($_POST['button']) && $_POST['button'] == "Информация о файле"){
            $errors[] = "File not found";
        }
    }
}

//$path_parts = pathinfo('/home/aleksandr/Projects/school');
////var_dump($path_parts);
//echo $path_parts['dirname'],   "<br />";
//echo $path_parts['basename'],  "<br />";
//echo $path_parts['extension'], "<br />";
//echo $path_parts['filename'],  "<br />";
//echo $path_parts['filename'],  "<br />";