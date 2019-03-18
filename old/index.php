<?php
    include('connect.php');
?>
<!DOCTYPE html>
<head lang="en">
<meta charset="UTF-8">
<title>Home</title>
<link rel="stylesheet" href="homestyle.css">
</head>
<body>

<div class="content">
<h1>Home</h1>

<?php
    if(isset($_SESSION['success'])):?>
        <p><?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
        ?></p>
<?php endif ?>
<?php
    if(isset($_SESSION['firstName'])):?>
        <p>Hey there, <?php echo $_SESSION['firstName'] ?>. Welcome to ArtWorld!</p>
        <p>Nigga, we know you were born on <?php echo $_SESSION['dob'] ?>.</p>
<?php endif ?>

<p><button class="sexy-btn"><a href="index.php?logout='1'">Logout</a></button>
</div>

</body>
</html>