<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login-form.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
 
    <div class="content">
      <h3>Hi, <span>Admin</span></h3>  
      <h1> Welcome <span> <?php echo $_SESSION['admin_name'] ?></span></h1>
      <p> This is an admin page </p>
      <a href="login-form.php" class="btn">Log in </a>
      <a href="register-form.php" class="btn">Register </a>
      <a href="logout.php" class="btn">Log out </a>
    </div>

    </div>
</body>
</html>