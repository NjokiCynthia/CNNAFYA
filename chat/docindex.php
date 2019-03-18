<?php

    session_start();

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
                <form action="../includes/endsess.inc.php" method="POST">
                    <button type="submit">End Session</button>
                </form>
            </div>
                <div id="chatlogs">
                </div>

                <form name="form1">
                    <input type="hidden" value="<?php echo $_POST['sessid']; ?>" name="sessid">
                    <input type="hidden" value="<?php $sentBy = 1; echo $sentBy; ?>" name="sentBy">
                    <input type="text" name="msg" placeholder="Type your message">
                    <a href="#" onclick="submitChat()">Send</a><br><br>
                </form>
            </div>
        </div>
    </body>
</html>