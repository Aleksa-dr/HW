<?php
include_once 'checker.php';
?>
<html lang="en">
<head>
    <title>school.local</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="loginPageStyle.css" type="text/css"/>
</head>
<body>
<h2>Enter Username and Password</h2>
<div class="container form-signin">
    <?php
    $msg = '';
    var_dump($resultArray);
    echo "<br/>";
    if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $string = "{$_POST['username']}"." {$_POST['password']}";
        foreach ($resultArray as $k => $v) {
            foreach ($v as $kay => $value){
                if($string == $kay){
                    echo $value;
                    $_SESSION['user_access'] = true;
                    $msg = '<h1>You have entered valid use name and password</h1>';
                    header('Refresh: 5; URL = page.php');
                }
                else {
                    $msg = '<h1>Wrong username or password. They have been used already</h1>';
                }
            }
        }
//    if (in_array($_POST['username'], $nameArray)
//        && in_array(sha1($_POST['password'], true), $passwordArrayWhithSha1)) {
//        && in_array($_POST['password'], $passwordArrayWhithSha1)) {
//        if ($result){
//            $_SESSION['user_access'] = true;
//            $msg = '<h1>You have entered valid use name and password</h1>';
//            header('Refresh: 3; URL = page.php');
//        } else {
//            $msg = '<h1>Wrong username or password. They have been used already</h1>';
//        }
    }
    ?>
</div>
<div class="container">
    <form class="form-signin" role="form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h4 class="form-signin-heading"><?= $msg; ?></h4>
        <input type="text" class="form-control" name="username" placeholder="username = Aleksandr" required autofocus></br>
        <input type="password" class="form-control" name="password" placeholder="password = 12345" required>
        <p>
            <button class="btn btn-lg btn-primary btn-block" style="width:100px;height:30px" type="submit" name="login">Login</button>
        </p>
    </form>
    Click here to clean <a href="logout.php" tite="Logout">Session.
</div>
</body>
</html>
