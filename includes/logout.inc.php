<?php

    session_start();
    require "dbh.inc.php";
    $id = $_SESSION['doc_id'];
    $sql = "UPDATE doctors SET online = 0 WHERE doc_id = '$id'";
    mysqli_query($conn, $sql);
    session_unset();
    session_destroy();
    header("location: ../index.php");

?>