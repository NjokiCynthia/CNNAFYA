<?php

    session_start();
    require "../includes/dbh.inc.php";
    $_SESSION['sessid'] = $_POST['sessid'];
    $did = $_POST['did'];
    $uid = $_POST['uid'];
    $session_id = $_POST['sessid'];
    $_SESSION['did'] = $_POST['did'];
    $_SESSION['uid'] = $_POST['uid'];
    $sql = "INSERT INTO session_requests(did, uid, sessid) VALUES('$did', '$uid', '$session_id')";
    mysqli_query($conn, $sql);

?>
<html>
    <head>
        <title>Chat</title>
        <link rel="stylesheet" href="../css/chat.css">
        <script src="../js/jquery-3.3.1.js"></script>
        <script src="../js/chat.js">
        </script>
    </head>
    <body>
        <div class="content">
            <div id="logo">
                <img src="../img/logo.png">
                <form action="../includes/endchat.inc.php" method="POST">
                    <button type="submit">End Session</button>
                </form>
            </div>
                <div id="chatlogs">
                </div>

                <form name="form1">
                    <input type="hidden" value="<?php echo $_SESSION['sessid']; ?>" name="sessid">
                    <input type="hidden" value="<?php $sentBy = 2; echo $sentBy; ?>" name="sentBy">
                    <input type="text" name="msg" placeholder="Type your message">
                    <a href="#" onclick="submitChat()">Send</a><br><br>
                </form>
            </div>
        </div>
    </body>
</html>