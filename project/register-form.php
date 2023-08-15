<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user_form  WHERE email = '$email'  && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user already axist! ';
    }
    else{
        if($pass != $cpass){
            $error[] = 'password not matched ';

        }
        else{
            $insert = "INSERT INTO user_form(name , email , password , user_type) 
            VALUES('$name' , '$email' ,  '$pass' , '$user_type' )";
            mysqli_query($conn , $insert);
            header('location:login-form.php');
        }
    }


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        
    <form action="" method="POST">
        <h3> Register</h3>

        <?php
     if(isset($error)){
        foreach($error as $error){
            echo ' <span class=" error-msg"> '.$error. ' </span> ';
        };
     };

        ?>

        <input type="text" name="name" require placeholder="Enter your full name">
        <input type="email" name="email" require placeholder="Enter your email">
        <input type="phonNumber" name="pnumber" require placeholder="Enter your phon number">
        <input type="Date" name="birthday" require placeholder="Enter your birthday">
        <input type="password" name="password" require placeholder="Enter your password">
        <input type="password" name="cpassword" require placeholder="confirm your password">

        <select>
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select>
        
        <input type="submit"  name="submit" value="Register" class="form-btn">
        <p> already have an account? <a href="login-form.php"> Log in</a> </p>

    </form>
    </div>
</body>
</html>