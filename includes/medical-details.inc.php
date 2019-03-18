<?php

session_start();
if(isset($_POST['msubmit']))
{
    require 'dbh.inc.php';
    $dob = $_POST['dob'];
    $email = $_POST['new-mail'];
    $phone = $_POST['new-phone'];
    $oldmail = $_SESSION['email'];
    $sql = "UPDATE users SET dob ='$dob', email = '$email', phone = '$phone' WHERE email = '$oldmail'";
    mysqli_query($conn, $sql);
    header("location: ../profile.php?update=success");
}

else if(isset($_POST['dmsubmit']))
{
    require 'dbh.inc.php';
    $dob = $_POST['dob'];
    $email = $_POST['new-mail'];
    $phone = $_POST['new-phone'];
    $oldmail = $_SESSION['email'];
    $sql = "UPDATE doctors SET dob ='$dob', email = '$email', phone = '$phone' WHERE email = '$oldmail'";
    mysqli_query($conn, $sql);
    header("location: ../doc-profile.php?update=success");
}

else
{
    header("location: ../index.php");
    exit();
}

?>