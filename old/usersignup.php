<?php
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en" class="animated fadeIn">
<head>
<meta charset="UTF-8">
<title>Syndria User Registration</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="jquery-ui/jquery-ui.css">
<link rel="stylesheet" href="jquery-ui/jquery-ui.structure.css">
<link rel="stylesheet" href="jquery-ui/jquery-ui.theme.css">
<link rel="stylesheet" href="animate-stylesheet.css">
<script src="jquery-3.3.1.js"></script>
<script src="jquery-ui/jquery-ui.js"></script>
<script src="index.js"></script>
</head>
<body>

<div class="details">
These are my details...
</div>

<div id="text" class="regForm">
<h1>Sign Up</h1>
<form class="formId" action="usersignup.php" method="POST">

<?php
    include('errors.php');
?>

<div id="text" class="text-area">
<input style="width: 47%; display: inline-block; float: left;" 
type="text" name="first_name" placeholder="First Name" value="<?php echo $firstName; ?>"> 

<input style="width: 47%; display: inline-block; float: right;" 
type="text" name="last_name" placeholder="Last Name" value="<?php echo $lastName; ?>">
</div>
<div>
<br><br>
</div>

<div id="text" class="text-area">
<input type="text" name="email_address" placeholder="Email Address" value="<?php echo $email; ?>">
<br><br>
</div>

<div class="text-area">
<input type="text" name="dob" placeholder="Date of Birth" id="datepicker">
<br><br>
</div>

<div id="text" class="text-area">
<input type="password" name="password_1" placeholder="Password">
<br><br>
</div>

<div id="text" class="text-area">
<input type="password" name="password_2" placeholder="Confirm password">
<br><br>
</div>

<div id="btn">
<input type="submit" name="usersubmit">
</div>

<div class="extra">
<p>Already have an account? <button class="sexy-btn"><a href="userlogin.php">Log In</a></button></p>
</div>
</div>

</body>
</html>