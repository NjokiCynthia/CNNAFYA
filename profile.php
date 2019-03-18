<?php

    session_start();
    require "includes/dbh.inc.php";     

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="css/profile.css">
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
    <hr style="margin: 0;">
    <div class="content">
        <div class="dp">
            <img src="includes/<?php
                echo $_SESSION['dp'];
            ?>" alt="dp">
    
            <form action="includes/upload-dp.inc.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="dp-submit">Change</button>
            </form>
            <div>
                <?php
                    $id = $_SESSION['uid'];
                    $sql = "SELECT * FROM users WHERE user_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "Name: " . $row['firstname'] . " " . $row['lastname'] . "<br>";
                        echo "DOB: " . $row['dob'] . "<br>";
                        echo "Phone: " . $row['phone'] . "<br>";
                        echo "Email: " . $row['email'] . "<br>";
                        //echo "Gender: " . $row['gender'] . "<br>";
                    }
                ?>
            </div>
            <form action="profile.php" method="POST">
                <button type="submit" name="passchange" class="link">Change Password</button>
            </form>
            <?php
                if(isset($_POST['passchange']))
                {
                    echo '
                        <form action="includes/change-password.inc.php" method="POST">
                            <label>Enter old password</label>
                            <input type="password" name="oldpass" class="text-input" required>
                            <label>Enter new password</label>
                            <input type="password" name="newpass" class="text-input" required>
                            <label>Confirm new password</label>
                            <input type="password" name="newpass2" class="text-input" required>
                            <button type="submit" name="change" class="signup-btn">Change</button>
                        </form>
                    ';
                }
            ?>
        </div>
        <div class="personal-details">
            <h3>Insurance Details</h3>
            <div class="medical-details">
                <form action="includes/insurance.inc.php" method="POST">
                    <label>Select Insurance Company</label>
                    <select>
                        <option>NHIF</option>
                        <option>APA Insurance</option>
                        <option>Britam Insurance</option>
                        <option>Madison Insurance</option>
                    </select>
                    <label>Insurance Number</label>
                    <input type="text" name="insurance-no" class="text-input">
                    <button type="submit" name="isubmit" class="signup-btn">Submit</button>
                </form>
            </div>
            <div>
                <h3>Other Details</h3>
                <form action="includes/medical-details.inc.php" method="POST">
                    <label>Date of Birth</label>
                    <input type="text" name="dob" class="text-input" value="<?php echo $_SESSION['dob']; ?>">
                    <label>Change Email</label>
                    <input type="text" name="new-mail" class="text-input" value="<?php echo $_SESSION['email']; ?>">
                    <label>Change Phone</label>
                    <input type="text" name="new-phone" class="text-input" value="<?php echo $_SESSION['phone']; ?>">
                    <button type="submit" name="msubmit" class="signup-btn">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <hr style="margin: 0">
    <div class="footer">
        Copyright &copy 2018 | All Rights Reserved
    </div>
</body>
</html>