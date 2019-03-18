<?php
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en" class="animated fadeIn">
<head>
<meta charset="UTF-8">
<title>ArtWorld Log In</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="animate-stylesheet.css">
<link rel="stylesheet" href="css\fontawesome.min.css">
</head>
<body>

<div class="details">
These are my details...
<ul>
    <li><i class="fab fa-accessible-icon"></i></li>
</div>

<div id="text" class="regForm">
<h1>Log In</h1>

<?php
    include('errors.php');
?>

<form class="formId" action="doclogin.php" method="POST">

<div id="text" class="text-area">
<input type="text" name="email_address" placeholder="Email Address">
<br><br>
</div>

<div id="text" class="text-area">
<input type="password" name="password" placeholder="Password">
<br><br>
</div>

<div id="btn">
<input type="submit" name="doclogin" value="Log In">
</div>

<div class="extra">
<p>Don't have an account? <button class="sexy-btn"><a href="docsignup.php">Sign Up</a></button></p>
</div>
</div>

<?php