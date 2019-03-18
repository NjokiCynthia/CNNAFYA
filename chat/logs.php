<?php

    require "../includes/dbh.inc.php";
    session_start();

    $sessid = $_SESSION['sessid'];
    $sql = "SELECT * FROM chatlogs WHERE sessid = '$sessid' ORDER BY id";
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