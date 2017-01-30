<?php
echo "<meta charset=\"UTF-8\">";
$link = mysqli_connect('localhost', 'alex', 'password', 'users');
if (!$link) {
    die('Ошибка соединения с базой данных: ' . mysqli_error($link));
}
//echo 'Успешно соединились'.'<br /><br />';
$sqlQuery = "SELECT `name`, `password`, `id_role` FROM `user`";
$result = mysqli_query($link, $sqlQuery);
$nameArray = array();
$roleArray = array();
$passwordArrayWhithSha1 = array();
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    $nameArray[] = $row[0];
    $passwordArrayWhithSha1[] = sha1($row[1], true);
    $roleArray[] = $row[2];
}
mysqli_free_result($result);
mysqli_close($link);
