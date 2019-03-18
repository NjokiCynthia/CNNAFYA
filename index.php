<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Log In</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="form">
                <div class="logo">
                    <img src="img/logo.jpg" />
                </div>
                <form action="includes/login.inc.php" method="POST">
                    <div>
                        <label>Email/Phone Number</label>
                        <input type="text" name="mailphone" class="text-input">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <button type="submit" name="login-submit" class="signupl-btn">Log In</button>
                </form>
                <div class="links">
                    <a href="#">Forgot Password</a>
                    <div class="admin">
                        <div class="l">
                            <a href="doclogin.php">Doctor</a>
                        </div>
                        <div class="r">
                            <a href="adminlogin.php">Admin</a>
                        </div>
                    </div>
                </div>
                <div class="or">
                    <hr class="bar">
                    <span>OR</span>
                    <hr class="bar">
                </div>
                <a href="signup.php" class="loginl-btn">Create an Account</a>
            </div>
        </div>
        <div class="right">
            <div class="showcase">
                <div class="showcase-content">
                    <h1>This is the future</h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
