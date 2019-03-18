<?php

    session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="css/styleh.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.jpg">
        </div>
        <div class="menu">
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><form action="includes/logout.inc.php"> <button class="logout-btn">Log Out</button></form></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="hello">
            Hello there, <strong><?php
                            if(isset($_SESSION['username'])){
                                echo $_SESSION['username'];
                            }
                            ?></strong>
        </div>
        <div class="options"> 
            <div id="build" class="options-cols">
                <div class="links">
                    <img src="" alt="build profile">
                </div>
                <div class="recht">
                <div class="button">
                    <p><strong>Build your profile here. You can add more details here and get other options such as changing your password.</strong></p>
                </div>
                </div>
            </div>
            <div id="accounts" class="options-cols">
                <div class="links">
                    <img src="" alt="accounts">
                </div>
                <div class="recht">
                    <a href="doc-accounts.php" class="signup-btn">Manage Doctor Accounts</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>