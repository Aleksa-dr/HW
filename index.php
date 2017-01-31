<?php
echo "<meta charset=\"UTF-8\">";
$link = mysqli_connect('localhost', 'alex', 'password', 'users');
if (!$link) {
    die('Ошибка соединения с базой данных: ' . mysqli_error($link));
}
//echo 'Успешно соединились'.'<br /><br />';
//$sqlQuery = "SELECT `name_role`, `name`, `password` FROM `role`, `user`
//WHERE `user`.`name` = '$name' AND `user`.`password` = '$password' AND `role`.`id` = `user`.`id_role`";

$sqlQuery = "SELECT `name_role`, `name`, `password` FROM `role`, `user`
WHERE `role`.`id` = `user`.`id_role`";

$result = mysqli_query($link, $sqlQuery);
$resultArray = array();
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $resultArray[] = [
        "$row[1] $row[2]" => "$row[0]"
    ];
//    $passwordArrayWhithSha1[] = sha1($row[1], true);
}
mysqli_free_result($result);
mysqli_close($link);
