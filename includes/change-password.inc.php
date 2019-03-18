<?php

    if(isset($_POST['change']))
    {
        session_start();
        require "dbh.inc.php";

        $mail = $_SESSION['email'];
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $newpass2 = $_POST['newpass2'];

        if(empty($oldpass) || empty($newpass) || empty($newpass2))
        {
            header("location: ../profile.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM users WHERE email = '$mail'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $passCheck = password_verify($oldpass, $row['password']);
            if($passCheck == false)
            {
                header("location: ../profile.php?error=wrongpassword");
                exit();
            }
            else if($passCheck == true)
            {
                if($newpass != $newpass2)
                {
                    header("location: ../profile.php?error=passwordmatch");
                    exit();
                }
                else
                {
                    $hashPassword = password_hash($newpass, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET password = '$hashPassword' WHERE email = '$mail'";
                    mysqli_query($conn, $sql);
                    header("location: ../profile.php?passchange=success");
                    exit();
                }
            }
            else
            {
                header("location: ../profile.php?error");
                exit();
            }
        }
    }
    else if(isset($_POST['dchange']))
    {
        session_start();
        require "dbh.inc.php";

        $mail = $_SESSION['email'];
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];
        $newpass2 = $_POST['newpass2'];

        if(empty($oldpass) || empty($newpass) || empty($newpass2))
        {
            header("location: ../doc-profile.php?error=emptyfields");
            exit();
        }
        else
        {
            $sql = "SELECT * FROM doctors WHERE email = '$mail'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $passCheck = password_verify($oldpass, $row['password']);
            if($passCheck == false)
            {
                header("location: ../doc-profile.php?error=wrongpassword");
                exit();
            }
            else if($passCheck == true)
            {
                if($newpass != $newpass2)
                {
                    header("location: ../doc-profile.php?error=passwordmatch");
                    exit();
                }
                else
                {
                    $hashPassword = password_hash($newpass, PASSWORD_DEFAULT);
                    $sql = "UPDATE doctors SET password = '$hashPassword' WHERE email = '$mail'";
                    mysqli_query($conn, $sql);
                    header("location: ../doc-profile.php?passchange=success");
                    exit();
                }
            }
            else
            {
                header("location: ../doc-profile.php?error");
                exit();
            }
        }
    }
    else
    {
        header("location: ../index.php");
    }

?>