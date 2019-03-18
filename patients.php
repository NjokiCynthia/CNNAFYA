<?php
    session_start();
    require "includes/dbh.inc.php";
    $id = $_SESSION['doc_id'];
    $sql = "UPDATE doctors SET online = 1 WHERE doc_id = '$id'";
    mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Consult</title>
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <div class="content">
            <h2>Select Patient<h2>
            <div class="doctors">
                <?php
                    $sql = "SELECT * FROM session_requests WHERE did = '$id'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $uid = $row['uid'];
                        $sessid = $row['sessid'];
                        $sql = "SELECT * FROM users WHERE user_id = '$uid'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $name = $row['firstname'] . " " . $row['lastname'];
                            $dp = $row['dp'];
                            echo "
                            
                                <div id='doc'>
                                    <img src='includes/$dp' alt='dp'>
                                    <div>
                                        Name: $name <br>
                                    </div>
                                    <form action='chat/docindex.php' method='POST'>
                                        <input type='hidden' name='sessid' value='$sessid'>
                                        <button type='submit' class='primary-btn'>Begin Session</button>
                                    </form>
                                </div>
                            
                            ";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>