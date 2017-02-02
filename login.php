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
    if (isset($_POST['userName']) && isset($_POST['password'])) {
        if (!empty($_SESSION['userRole'])) {
            $_SESSION['user_access'] = true;
            $userRole = $_SESSION['userRole'];
            $msg = "<h2>You have entered valid use name and password.</h2>
                    <p><h2>You are logged as $userRole </h2></p>";
            header('Refresh: 2; URL = page.php');
        } else {
            $msg = '<h1>Wrong username or password. They have been used already</h1>';
        }
    }
    ?>
</div>
<div class="container">
    <form class="form-signin" role="form" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h4 class="form-signin-heading"><?= $msg; ?></h4>
        <input type="text" class="form-control" name="userName" placeholder="username = Name" required autofocus></br>
        <input type="password" class="form-control" name="password" placeholder="password = Password" required>
        <p>
            <button class="btn btn-lg btn-primary btn-block" style="width:100px;height:30px" type="submit" name="login">
                Login
            </button>
        </p>
    </form>
    Click here to clean <a href="logout.php" tite="Logout">Session.
</div>
</body>
</html>