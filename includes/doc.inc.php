<?php

if(isset($_POST['doclogin-submit']))
{
    require "dbh.inc.php";

    $mail = $_POST['mail'];
    $password = $_POST['password'];
    if(empty($mail) || empty($password))
    {
        header("location: ../doclogin.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM doctors WHERE email = ? OR phone = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../doclogin.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $mail, $mail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
                $passwordCheck = password_verify($password, $row['password']);
                if($passwordCheck == false)
                {
                    header("location: ../doclogin.php?error=wrongpassword");
                    exit();
                }
                else if($passwordCheck == true)
                {
                    session_start();
                    $_SESSION['doc_id'] = $row['doc_id'];
                    $_SESSION['dfirstname'] = $row['firstname'];
                    $_SESSION['dp'] = $row['dp'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['phone'] = $row['phone'];
                    $_SESSION['dob'] = $row['dob'];
                    header("location: ../doc.php");
                    exit();
                }
                else
                {
                    header("location: ../doclogin.php?error");
                    exit();
                }
            }
            else
            {
                header("location: ../doclogin.php?error=nouser");
                exit();
            }
        }
    }

}

else
{
    header("location: ../doclogin.php");
    exit();
}

?>