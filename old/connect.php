<?php
@session_start();

$host = "localhost";
$password = "";
$username = "root";
$database = "syndriachatdb";
$errors = array();
$firstName = "";
$lastName = "";
$email = "";
$db = mysqli_connect($host, $username, $password, $database) or die("could not connect");

if(isset($_POST['docsubmit']))
{
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email_address'];
    $dob = $_POST['dob'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //check for blanks
    if(empty($firstName))
    {
        array_push($errors, "First name is required");
    }
    if(empty($lastName))
    {
        array_push($errors, "Last name is required");
    }
    if(empty($email))
    {
        array_push($errors, "Email address is required");
    }
    if(empty($password_1))
    {
        array_push($errors, "Please enter a password");
    }
    if($password_1 != $password_2)
    {
        array_push($errors, "Passwords do not match");
    }

    //continue if there are no errors
    if(count($errors) == 0)
    {
        $password = md5($password_1);
        $query = "INSERT INTO doctor(first_name, last_name, dob, email_address, password)" 
                            . "VALUES('$firstName', '$lastName', '$dob', '$email', '$password');";
        mysqli_query($db, $query) or die("could not query".mysqli_error($db));
        //login after registration
        $_SESSION['firstName'] = $firstName;
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['doclogged'] = "Doc in";
        header('location: index.php');
    }
}

else if(isset($_POST['usersubmit']))
{
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email_address'];
    $dob = $_POST['dob'];
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];

    //check for blanks
    if(empty($firstName))
    {
        array_push($errors, "First name is required");
    }
    if(empty($lastName))
    {
        array_push($errors, "Last name is required");
    }
    if(empty($email))
    {
        array_push($errors, "Email address is required");
    }
    if(empty($password_1))
    {
        array_push($errors, "Please enter a password");
    }
    if($password_1 != $password_2)
    {
        array_push($errors, "Passwords do not match");
    }

    //continue if there are no errors
    if(count($errors) == 0)
    {
        $password = md5($password_1);
        $query = "INSERT INTO user(first_name, last_name, dob, email, password)"
                              . "VALUES('$firstName', '$lastName', '$dob', '$email', '$password');";
        mysqli_query($db, $query) or die("could not query".mysqli_error($db));
        //login after registration
        $_SESSION['firstName'] = $firstName;
        $_SESSION['dob'] = $dob;
        $_SESSION['success'] = "You are now logged in";
        $_SESSION['userlogged'] = "User in";
        header('location: index.php');
    }
}


//login from login page
if(isset($_POST['doclogin']))
{
    $emailName = $_POST['email_address'];
    $password = $_POST['password'];

    if(empty($emailName))
    {
        array_push($errors, "Email address is required");
    }
    if(empty($password))
    {
        array_push($errors, "Please enter password");
    }
    if(count($errors) == 0)
    {
        $password = md5($password);
        $query = "SELECT * FROM doctor WHERE email_address = '$emailName' AND password = '$password';";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['firstName'] = $row['first_name'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
            
        }
        else
        {
            array_push($errors, "Invalid username or password");
        }
    }
}
if(isset($_POST['userlogin']))
{
    $emailName = $_POST['email_address'];
    $password = $_POST['password'];

    if(empty($emailName))
    {
        array_push($errors, "Email address is required");
    }
    if(empty($password))
    {
        array_push($errors, "Please enter password");
    }
    if(count($errors) == 0)
    {
        $password = md5($password);
        $query = "SELECT * FROM user WHERE email = '$emailName' AND password = '$password';";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result) == 1)
        {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['firstName'] = $row['first_name'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');
            
        }
        else
        {
            array_push($errors, "Invalid username or password");
        }
    }
    
}
//logout
if(isset($_GET['logout']))
{
    if(isset($_SESSION['doclogged']))
    {
        session_destroy();
        unset($_SESSION['firstName']);
        header('location: doclogin.php');
    }
    else if(isset($_SESSION['userlogged']))
    {
        session_destroy();
        unset($_SESSION['firstName']);
        header('location: userlogin.php');
    }
}
?>