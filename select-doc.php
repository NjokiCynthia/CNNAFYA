<?php
    session_start();
    require "includes/dbh.inc.php";
    $uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Consult</title>
        <link rel="stylesheet" href="css/home.css">
    </head>
    <body>
        <div class="content">
            <h2>Select Doctor<h2>
            <div class="doctors">
                <?php
                    $sql = "SELECT * FROM doctors WHERE online = 1";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $name = "DR. " . $row['firstname'] . " " . $row['lastname'];
                        $specialty = $row['specialty'];
                        $dp = $row['dp'];
                        $_SESSION['did'] = $row['doc_id'];
                        $did = $row['doc_id'];
                        $session_id = uniqid('', true);
                        echo "
                        
                            <div id='doc'>
                                <img src='includes/$dp' alt='dp'>
                                <div>
                                    Name: $name <br>
                                    Specialty: $specialty <br>
                                </div>
                                <form action='chat/index.php' method='POST'>
                                    <input type='hidden' name='sessid' value='$session_id'> 
                                    <input type='hidden' name='did' value='$did'>
                                    <input type='hidden' name='uid' value='$uid'> 
                                    <button type='submit' class='primary-btn'>Consult</button>
                                </form>
                            </div>
                        
                        ";
                    }
                ?>
            </div>
        </div>
    </body>
</html>