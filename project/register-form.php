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

        <input type="text" name="fname" require placeholder="Enter your first name">
        <input type="text" name="mname" require placeholder="Enter your middle name">
        <input type="text" name="familyname" require placeholder="Enter your family name">
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








<?php

// require("config.php");

// if($_SERVER["REQUEST_METHOD"]=="POST"){

//     $data=json_decode(file_get_contents("php://input"),true)

//     $fname = $data['fname'];
//     $mname = $data['mname'];
//     $familyname = $data['familyname'];
//     $email = $data['email'];
//     $pnumber = $data['pnumber'];
//     $birthday = $data['birthday'];
//     $password = $data['password'];
//     $cpassword = $data['cpassword'];
//     $user_type = $data['user_type'];

//     $data=array();

//     $stmt ="INSERT INTO 'user_form' ('fname' , 'mname' , 'familyname' , 'email' , 'pnumber' , 'birthday' , 'password' , 'cpassword' , 'user_type' )
//     VALUES ('$fname' , '$mname' , '$familyname' , ' $email' , '$pnumber' , '$birthday' , '$password' , '$cpassword' , '$user_type' )";

//     // $select = " SELECT * FROM user_form  WHERE email = '$email'  && password = '$pass' ";

//     // $result = mysqli_query($conn, $select);

//     // if(mysqli_num_rows($result) > 0){
//     //     $error[] = 'user already axist! ';
//     // }
//     // else{
//     //     if($pass != $cpass){
//     //         $error[] = 'password not matched ';

//     //     }
//     //     else{
//     //         $insert = "INSERT INTO user_form(name , email , password , user_type) 
//     //         VALUES('$name' , '$email' ,  '$pass' , '$user_type' )";
//     //         mysqli_query($conn , $insert);
//     //         header('location:login-form.php');
//     //     }
//     // }

//     if ($conn->query($stmt)==true) {
        
//         $data['message']="success registration";
//         echo json_encode($data);
//     } else {
//         echo "Error: " . $stmt->error;
//         $data['message']="error registration";
//         echo json_encode($data);
//     }

// }

// $conn->close();

// ?>


<!-- 
// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>register form</title>
//     <link rel="stylesheet" href="style.css">
// </head>
// <body>
//     <div class="form-container">
        
//     <form  id="registrationform" action="" method="POST">
//         <h3> Register</h3>

//         <?php
//     //  if(isset($error)){
//     //     foreach($error as $error){
//     //         echo ' <span class=" error-msg"> '.$error. ' </span> ';
//     //     };
//     //  };

//         ?>

//         <input type="text" name="fname" require placeholder="Enter your first name" id="fname">
//         <input type="text" name="mname" require placeholder="Enter your middle name" id="mname">
//         <input type="text" name="familyname" require placeholder="Enter your family name"id="familyname">
//         <input type="email" name="email" require placeholder="Enter your email"id="email">
//         <input type="phonNumber" name="pnumber" require placeholder="Enter your phon number"id="pnumber">
//         <input type="Date" name="birthday" require placeholder="Enter your birthday"id="birthday">
//         <input type="password" name="password" require placeholder="Enter your password"id="password">
//         <input type="password" name="cpassword" require placeholder="confirm your password"id="cpassword">

//         <select>
//             <option value="User">User</option>
//             <option value="Admin">Admin</option>
//         </select>
        
//         <input type="submit"  name="submit" value="Register" class="form-btn">
//         <p> already have an account? <a href="login-form.php"> Log in</a> </p>

//     </form>
//     </div>
//     <script src="register.js"></script>
// </body>
// </html> -->