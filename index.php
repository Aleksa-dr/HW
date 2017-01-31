<?php
include_once 'login.php';
echo "<meta charset=\"UTF-8\">";
$link = mysqli_connect('localhost', 'alex', 'password', 'users');
if (!$link) {
    die('Ошибка соединения с базой данных: ' . mysqli_error($link));
}
//echo 'Успешно соединились'.'<br /><br />';
echo $arr[0], $arr[1];
$name = $arr[0];
$password = $arr[1];

$sqlQuery = "SELECT `name_role`, `name`, `password` FROM `role`, `user`
WHERE `user`.`name` = '$name' AND `user`.`password` = '$password' AND `role`.`id` = `user`.`id_role`";
$result = mysqli_query($link, $sqlQuery);

//$roleArray = array();
$nameRole = '';$name = ''; $password = '';
//$passwordArrayWhithSha1 = array();
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
//    printf("name_role: %s  <br /><br />", $row[0]);
    $nameRole = $row[0];
    $name = $row[1];
    $password = $row[2];
//    $passwordArrayWhithSha1[] = sha1($row[1], true);
}
echo $nameRole, $name, $password;
mysqli_free_result($result);
mysqli_close($link);
