<?php

    session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Administrator Log In</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <div class="form">
                <div class="logo">
                    <img src="img/logo.jpg" />
                </div>
                <form action="includes/admin.inc.php" method="POST">
                    <div> 
                        <label>Username</label>
                        <input type="text" name="username" class="text-input">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <button type="submit" name="adminlogin-submit" class="signupl-btn">Log In</button>
                </form>
                <div class="links">
                    <a href="#">Forgot Password</a>
                </div>
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