<?php

    session_start();
    require "dbh.inc.php";
    $sessid = $_SESSION['sessid'];
    $sql = "DELETE FROM chatlogs WHERE sessid = '$sessid'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM session_requests WHERE sessid = '$sessid'";
    mysqli_query($conn, $sql);
    unset($session_id);
    header("location: ../home.php");

?>