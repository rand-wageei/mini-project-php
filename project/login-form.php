<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form  WHERE email = '$email'  && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        
        $row = mysqli_fetch_array($result);
        if($row ['user_type'] == 'admin'){
           
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin-page.php');
        }
        elseif ($row ['user_type'] == 'user'){
           
            $_SESSION['user_name'] = $row['name'];
            header('location:user-page.php');
        }
    }
    else{

        $error[] = 'incorrect email or password!';
    }


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        
    <form action="" method="POST">
        <h3> Login</h3>

        <?php
     if(isset($error)){
        foreach($error as $error){
            echo ' <span class=" error-msg"> '.$error. ' </span> ';
        };
     };

        ?>

        <input type="email" name="email" require placeholder="Enter your email">
        <input type="password" name="password" require placeholder="Enter your password">

        <input type="submit"  name="submit" value="Login" class="form-btn">
        <p> Don't have an account? <a href="register-form.php"> Register</a> </p>

    </form>
    </div>
</body>
</html>