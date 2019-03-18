<?php

    session_start();
    require "includes/dbh.inc.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>Accounts</title>
<link rel="stylesheet" href="css/dcc.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.jpg">
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile Manager</a></li>
                <li><a href="#">Accounts Manager</a></li>
                <li><form action="includes/logout.inc.php"> <button class="logout-btn">Log Out</button></form></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="left">
            <div class="add">
                <h2>Add Doctor</h2>
                <form action="includes/doc-accounts.inc.php" method="POST">
                    <div>
                    <p><label>First Name</label></p>
                    <input type="text" name="first_name" class="text-input">
                    </div>
                    <div>
                    <p><label>Last Name</label></p>
                    <input type="text" name="last_name" class="text-input">
                    </div>
        
                    <div>
                    <p><label>Phone Number</label></p>
                    <input type="text" name="phone_number" class="text-input">
                    </div>
                    <div>
                    <p><label>Email</label></p>
                    <input type="email" name="email" class="text-input">
                    </div>
                
                    <div>
                    <p><label>Password</label></p>
                    <input type="password" name="password" class="text-input">
                    </div>
                    <div>
                    <p><label>Confirm Password</label></p>
                    <input type="password" name="password_2" class="text-input">
                    </div>
                </div>
                    <button type="submit" name="docsignup-submit" class="signup-btn">Add</button>
                </form>
                <h2>Remove Doctor</h2>
                <form action = "includes/doc-accounts.inc.php" method="POST">
                    <p><label>Enter email to remove</label></p>
                    <input type="email" name="mailremove" class="text-input" required>
                    <button type="submit" name="remove" class="signup-btn">Remove</button>
                </form>
            </div>
        </div>
        <div class="right">
            <?php
            
                $sql = "SELECT * FROM doctors";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    echo "<p>Name: Dr. " .$row['firstname']. " " .$row['lastname']. "<br>";
                    echo "Specialty: " .$row['specialty']. "<br>";
                    echo "Email: " .$row['email']. "<br>";
                    echo "Phone: " .$row['phone']. "</p>";
                }
            
            ?>
        </div>
    </div>
    <div class="footer">
        Copyright &copy 2018 | All Rights Reserved
    </div>
</body>
</html>