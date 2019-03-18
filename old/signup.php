<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="signstyle.css">
    </head>
    <body>
        <?php show_header(); ?>
        <div class="conte">
            <p>
                Create an account with us to enjoy all our services!
                <br>
            </p>
        </div>
        <div class="content">
            <h1>Create Account</h1>
            <form action="usersignup.php" method="POST">
                <input id="user" type="submit" value="Normal Account">
            </form>
            <br>
            <form action="docsignup.php" method="POST">
                <input id="doc" type="submit" value="Doctor Account">
            </form>
        </div>
    </body>
    </html>