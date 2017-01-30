<?php
include_once 'checker.php';
include_once 'validLoginInformation.php';
?>
<html lang="en">
<head>
    <title>school.local</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="loginPageStyle.css" type="text/css"/>
</head>
<body>
<h2>Enter Username and Password</h2>
<!--<div class="container form-signin"></div>-->
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
