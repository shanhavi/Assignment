<?php ob_start(); ?>
<?php

if (isset($_POST['btnlogout'])) {
    session_destroy();
    header("Location: login.php");
}

include "inc/dbconfig.php";
session_start();
if (isset($_SESSION['userSession']) && $_SESSION['userSession'] != "") {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sign IN | ERP System</title>
    <?php include "inc/head.php"; ?>
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>ERP</b></a>
            <!-- <small>Admin BootStrap Based - Material Design</small> -->
        </div>
        <div class="card">
            <div class="body">
                <?php
                if (isset($_POST['btnlogin'])) {
                    $email = $_POST['email'];
                    $password = md5(mysqli_real_escape_string($con, $_POST['password']) . "Shangavi");
                    $sql = "SELECT * FROM users WHERE email='$email' and password='$password' and active='1' ";
                    $exe = mysqli_query($con, $sql);
                    if (mysqli_num_rows($exe) >= 1) {
                        $row = mysqli_fetch_array($exe);
                        $_SESSION['usertype'] = $row['usertype'];
                        $_SESSION['userSession'] = $row['users_id'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['email'] = $row['email'];
                        header("Location: index.php");
                    } else {
                        echo mysqli_error($con);
                    }
                }
                if (isset($_POST['btnlogout'])) {
                    session_destroy();
                    header("Location: login.php");
                }
                ?>
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required
                                autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <!-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink"> -->
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="col-xs-4">
                            <input class="btn btn-block bg-pink waves-effect" type="submit" name="btnlogin"
                                value="SIGN IN">
                        </div>
                </form>
            </div>
        </div>
    </div>

    <?php include "inc/bottom.php"; ?>
</body>

</html>
<?php ob_end_flush(); ?>