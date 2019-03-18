<?php

function show_header(){
    echo "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='UTF-8'>
        <title>nav</title>
        <link rel='stylesheet' href='navstyle.css'>
        </head>
        <body>
        <div class='header'>
            <nav>
                <div class='logo'>
                    <img src='images/LOG1.png' href='localhost/syndria'>
                </div>
                <div class='menu'>
                    <li>
                        <ul><a href='#'>MIMI</a></ul>
                        <ul><a href='#'>MYSELF</a></ul>
                        <ul><a href='#'>ME</a></ul>
                    </li>
                </div>
            </nav>
        </div>
        </body>
        </html>
    ";
}

?>