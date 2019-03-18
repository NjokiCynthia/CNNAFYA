<?php

session_start();
if(isset($_POST['isubmit']))
{
    require 'dbh.inc.php';
    $ins_company = $_POST['ins-company'];
    $uid = $_SESSION['uid'];
    $ins_no = $_POST['insurance-no'];
    
    $sql = "INSERT INTO insurance(insurance_no, user_id, insurance_company) VALUES('$ins_no', '$uid', '$ins_company')";
    mysqli_query($conn, $sql);
    header("location: ../profile.php?update=success");
}

else
{
    header("location: ../index.php");
    exit();
}

?>