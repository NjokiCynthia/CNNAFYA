<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.jpg">
        </div>
        <div class="menu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="profile.php">Profile Manager</a></li>
                <li><form action="includes/logout.inc.php"> <button class="logout-btn">Log Out</button></form></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="hello">
            Hello there, <strong><?php
                            if(isset($_SESSION['dfirstname'])){
                                echo $_SESSION['dfirstname'];
                            }
                            ?></strong>.
        </div>
        <div class="options">
            <div id="build" class="options-cols">
                <div class="image">
                    <img src="img/flt.png" alt="build profile">
                </div>
                <div class="cont">
                    <p>Build your profile here. Be sure to add a friendly profile picture for patients to see.</p>
                </div>
                <div class="btn">
                    <a href="doc-profile.php" class="primary-btn">Edit Profile</a>
                </div>
            </div>
            <div id="consult" class="options-cols">
                <div class="image">
                    <img src="img/fchat.png" alt="consultation">
                </div>
                <div class="cont">
                    <p>Click here to view patients who have requested a session with you and attend to them.</p>
                </div>
                <div class="btn">
                    <a href="patients.php" class="primary-btn">Consult</a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="footer">
        <span style="color: white;">Copyright &copy 2018 |</span> All Rights Reserved
    </div>
</body>
</html>