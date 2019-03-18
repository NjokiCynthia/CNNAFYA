<?php

if(isset($_POST['login-submit']))
{
    require "dbh.inc.php";

    $mailphone = $_POST['mailphone'];
    $password = $_POST['password']; 
    if(empty($mailphone) || empty($password))
    {
        header("location: ../index.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM users WHERE email = ? OR phone = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../index.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $mailphone, $mailphone);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck == false)
                {
                    header("location: ../index.php?error=wrongpassword");
                    exit();
                }
                else if($passwordCheck == true)
                {
                    session_start();
                    $_SESSION['uid'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['dp'] = $row['dp'];
                    $_SESSION['dob'] = $row['dob'];
                    header("location: ../home.php");
                    exit();
                }
                else
                {
                    header("location: ../index.php?error");
                    exit();
                }
            }
            else
            {
                header("location: ../index.php?error=nouser");
                exit();
            }
        }
    }

}

else
{
    header("location: ../index.php");
    exit();
}

?>