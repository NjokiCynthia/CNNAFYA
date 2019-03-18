<?php

if(isset($_POST['adminlogin-submit']))
{
    require "dbh.inc.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if(empty($username) || empty($password))
    {
        header("location: ../adminlogin.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM admin WHERE username = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../adminlogin.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck == false)
                {
                    header("location: ../adminlogin.php?error=wrongpassword");
                    exit();
                }
                else if($passwordCheck == true)
                {
                    session_start();
                    $_SESSION['id'] = $row['user_id'];
                    $_SESSION['username'] = $row['username'];
                    header("location: ../admin.php");
                    exit();
                }
                else
                {
                    header("location: ../adminlogin.php?error");
                    exit();
                }
            }
            else
            {
                header("location: ../adminlogin.php?error=nouser");
                exit();
            }
        }
    }

}

else
{
    header("location: ../adminlogin.php");
    exit();
}

?>