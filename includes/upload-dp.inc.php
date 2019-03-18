<?php

session_start();
require "dbh.inc.php";
if(isset($_POST['dp-submit']))
{
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));

    $allow = array('jpg', 'jpeg', 'png');
    if(in_array($fileActExt, $allow))
    {
        if($error === 0)
        {
            if($fileSize < 3000000)
            {
                $fileNewName = uniqid('', true).".".$fileActExt;
                $fileDestination = "uploads/".$fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $mail = $_SESSION['email'];
                $sql = "UPDATE users SET dp = '$fileDestination' WHERE email = '$mail'";
                mysqli_query($conn, $sql);
                $_SESSION['dp'] = $fileDestination;
                header("location: ../profile.php?upload=success");
            }
            else
            {
                echo "File too large.";
            }
        }
        else
        {
            echo "There was an error uploading your file.";
        }
    }
    else
    {
        echo "You cannot upload files of this type!";
    }

}
else if(isset($_POST['ddp-submit']))
{
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));

    $allow = array('jpg', 'jpeg', 'png');
    if(in_array($fileActExt, $allow))
    {
        if($error === 0)
        {
            if($fileSize < 3000000)
            {
                $fileNewName = uniqid('', true).".".$fileActExt;
                $fileDestination = "uploads/".$fileNewName;
                move_uploaded_file($fileTmpName, $fileDestination);
                $mail = $_SESSION['email'];
                $sql = "UPDATE doctors SET dp = '$fileDestination' WHERE email = '$mail'";
                mysqli_query($conn, $sql);
                $_SESSION['dp'] = $fileDestination;
                header("location: ../doc-profile.php?upload=success");
            }
            else
            {
                echo "File too large.";
            }
        }
        else
        {
            echo "There was an error uploading your file.";
        }
    }
    else
    {
        echo "You cannot upload files of this type!";
    }

}
else
{
    header("location: ../index.php");
    exit();
}

?>