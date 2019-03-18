<?php

    session_start();
    require "includes/dbh.inc.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="css/buildprofile.css">
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="img/logo.jpg">
        </div>
        <div class="menu">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Profile manager</a></li>
                <li><form action="includes/logout.inc.php"> <button class="logout-btn">Log Out</button></form></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="dp">
            <img src="includes/<?php
                echo $_SESSION['dp'];
            ?>" alt="dp">
            <p>Change profile picture</p>
            <form action="includes/upload-dp.inc.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="ddp-submit">Upload</button>
            </form>
            <div class="info">
                <?php
                    $id = $_SESSION['doc_id'];
                    $sql = "SELECT * FROM doctors WHERE doc_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "Name: DR. " . $row['firstname'] . " " . $row['lastname'] . "<br>";
                        echo "DOB: " . $row['dob'] . "<br>";
                        echo "Phone: " . $row['phone'] . "<br>";
                        echo "Email: " . $row['email'] . "<br>";
                        echo "Specialty: " . $row['specialty'] . "<br>";
                        //echo "Gender: " . $row['gender'] . "<br>";
                    }
                ?>
            </div>
        </div>
        <div class="personal-details">
            <h3>PERSONAL DETAILS</h3>
            
            <form action="includes/medical-details.inc.php" method="POST">
                <label>Date of Birth</label>
                <input type="text" name="dob" class="text-input" value="<?php echo $_SESSION['dob']; ?>">
                <label>Change Email</label>
                <input type="text" name="new-mail" class="text-input" value="<?php echo $_SESSION['email']; ?>">
                <label>Change Phone</label>
                <input type="text" name="new-phone" class="text-input" value="<?php echo $_SESSION['phone']; ?>">
                <button type="submit" name="dmsubmit">Submit</button>
            </form>
            <form action="doc-profile.php" method="POST">
                <button type="submit" name="passchange">Change Password</button>
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
                            <button type="submit" name="dchange">Change</button>
                        </form>
                    ';
                }
            ?>
        </div>
        <div class="medical-details">
            <p>Enter your field(s) of specialty (Separate using commas)</p>
            <form action="doc-profile.php" method="POST">
            <input type="text" name="specialty">
            <button type="submit" name="add">Add</button>
            </form>
            <?php
                if(isset($_POST['add']))
                {
                    $specialty = $_POST['specialty'];
                    $id = $_SESSION['doc_id'];
                    $sql = "UPDATE doctors SET specialty = '$specialty' WHERE doc_id = '$id'";
                    mysqli_query($conn, $sql);
                    header("location: doc-profile.php?add=success");
                    exit();
                }
            ?>
        </div>
    </div>
    <div class="footer">
        Copyright &copy 2018 | All Rights Reserved
    </div>
</body>
</html>