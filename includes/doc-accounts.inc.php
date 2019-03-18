<?php

if(isset($_POST['docsignup-submit']))
{
    require 'dbh.inc.php';

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_2 = $_POST['password_2'];

    if((empty($firstname) || empty($lastname) || empty($phone) || empty($email) || empty($password) || empty($password_2)))
    {
        header("location: ../doc-accounts.php?error=emptyfields&first_name=".$firstname."&lastname=".$lastname."&phone_number=".$phone."&email=".$email);
        exit();
    }
    else if(!preg_match("/^[0-9]*$/", $phone) && !preg_match("/^[a-zA-Z]*$/", $firstname) && !preg_match("/^[a-zA-Z]*$/", $lastname))
    {
        header("location: ../doc-accounts.php?error=invaliddetails");
        exit();
    }
    else if(!preg_match("/^[0-9]*$/", $phone) && !preg_match("/^[a-zA-Z]*$/", $firstname))
    {
        header("location: ../doc-accounts.php?error=invaliddetails&last_name=".$lastname);
        exit();
    }
    else if(!preg_match("/^[0-9]*$/", $phone) && !preg_match("/^[a-zA-Z]*$/", $lastname))
    {
        header("location: ../doc-accounts.php?error=invaliddetails&first_name=".$firstname);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z]*$/", $firstname) && !preg_match("/^[a-zA-Z]*$/", $lastname))
    {
        header("location: ../doc-accounts.php?error=invaliddetails&phone=".$phone);
        exit();
    }
    else if(!preg_match("/^[0-9]*$/", $phone))
    {
        header("location: ../doc-accounts.php?error=invalidphone&first_name=".$firstname."&lastname=".$lastname."&email=".$email);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z]*$/", $firstname))
    {
        header("location: ../doc-accounts.php?error=invalidphone&lastname=".$lastname."&email=".$email."&phone_number=".$phone);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z]*$/", $lastname))
    {
        header("location: ../doc-accounts.php?error=invalidphone&first_name=".$firstname."&email=".$email."&phone_number=".$phone);
        exit();
    }
    else if($password !== $password_2)
    {
        header("location: ../doc-accounts.php?error=passwordmatch&first_name=".$firstname."&lastname=".$lastname."&email=".$email."&phone_number=".$phone);
        exit();
    }
    else
    {
        $sql = "SELECT phone FROM doctors WHERE phone=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            header("location: ../doc-accounts.php?error=sqlerror&first_name=".$firstname."&lastname=".$lastname."&email=".$email);
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $phone);
            mysqli_stmt_execute();
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0)
            {
                header("location: ../doc-accounts.php?error=phoneexists&firstname=".$firstname."&lastname=".$lastname."&email=".$email);
                exit();
            }
            else
            {
                $sql = "INSERT INTO doctors(firstname, lastname, phone, email, password) VALUES(?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("location: ../doc-accounts.php?error=sqlerror");
                    exit();
                }
                else
                {
                    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $phone, $email, $hashPassword);
                    mysqli_stmt_execute($stmt);
                    header("location: ../doc-accounts.php?add=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close();
    
}
else if(isset($_POST['remove']))
{
    $mailr = $_POST['mailremove'];
    if(empty($mailr))
    {
        header("location: ../doc-accounts.php?error=nomail");
        exit();
    }
    else
    {
        $sql = "DELETE FROM doctors WHERE email = '$mailr'";
        $work = mysqli_query($conn, $sql);
        if($work){
            header("location: ../doc-accounts.php?remove=success");
            exit();
        }
        else{
            header("location: ../doc-accounts.php?remove=error");
            exit();
        }
    }
}
else
{
    header("location: ../doc-accounts.php");
    exit();
}

?>