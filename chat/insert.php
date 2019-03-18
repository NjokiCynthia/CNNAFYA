<?php

    require "../includes/dbh.inc.php";
    session_start();

    $sentBy = $_REQUEST['sentBy'];
    $session_id = $_SESSION['sessid'];
    $msg = $_REQUEST['msg'];
    $uid = $_SESSION['uid'];
    $did = $_SESSION['did'];

    $_SESSION['sessid'] = $session_id;
    
    $sql = "INSERT INTO chatlogs(uid, docid, sessid, message, sentBy) VALUES('$uid', '$did', '$session_id', '$msg', '$sentBy')";
    mysqli_query($conn, $sql);

    $sql = "SELECT * FROM chatlogs WHERE sessid = '$session_id' ORDER BY id";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        if($row['sentBy'] == 2){
            echo "<div id='ulogs' style='display: block'>" . $row['message']. "</div><br>";
        }
        else if($row['sentBy'] == 1)
        {
            echo "<div id='doclogs' style='display: block'>" . $row['message']. "</div><br>";
        }
        else
        {
            echo "<p>Loading chat logs, please wait...</p>";
        }
    }
    
?>