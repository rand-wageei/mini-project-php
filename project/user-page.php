<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login-form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>user page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
 
    <div class="content">
      <h3>Hi, <span>user</span></h3>  
      <h1> Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p> This is an user page </p>
      <!-- <a href="login-form.php" class="btn">Log in </a> -->
      <!-- <a href="register-form.php" class="btn">Register </a> -->
      <a href="logout.php" class="btn">Log out </a>
    </div>

    <table>

    </table>

    </div>
</body>
</html>