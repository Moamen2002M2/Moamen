<?php
include('inc/connections.php');
if(isset($_POST['submit'])){
    $username =   stripcslashes(strtolower($_POST['username']));
    $email =      stripcslashes($_POST['email']);
    $password =   stripcslashes($_POST['password']);
    if(isset($_POST['birthday_year']) && isset($_POST['birthday_month']) && isset($_POST['birthday_day'])){
        $birthday_year= (int)$_POST['birthday_year'];
        $birthday_day= (int)$_POST['birthday_day'];
        $birthday_month= (int)$_POST['birthday_month'];
        $birthday = htmlentities(mysqli_real_escape_string($conn,$birthday_year.'-'.$birthday_month.'-'.$birthday_day));
    }

    $username = htmlentities(mysqli_real_escape_string($conn,$_POST['username']));
    $email =    htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
    $password = htmlentities(mysqli_real_escape_string($conn,$_POST['password']));
    $md5_pass = md5($password);


if(isset($_POST['gender'])){
    $gender =($_POST['gender']);
    $gender = htmlentities(mysqli_real_escape_string($conn,$_POST['gender']));
    if(!in_array($gender,['male','famale'])){
     $gender_error = '<p id="error">Please select gender !<p><br>';
    $err_s =1 ;
     }
     }

     $check_user ="SELECT * FROM `users` WHERE username='$username'";
     $check_result = mysqli_query($conn,$check_user);
     $num_rows = mysqli_num_rows($check_result);
     if($num_rows != 0){
         $user_error = '<p id="error" > sorry username already <p>';
         $err_s =1 ;
     }


if(empty($username)) {
        $user_error ='<p id="error" >Please enter your username<p>';
        $err_s =1 ;
}elseif(strlen($username) < 6 ){
    $user_error = '<p id="error" >Your username must be 6 characters long<p>';
    $err_s =1 ;
}elseif(filter_var($username,FILTER_VALIDATE_INT)){
    $user_error = '<p id="error" >Please enter the correct username <p>';
    $err_s =1 ;
}

if(empty($email)){
    $email_error ='<p id="error" > Please enter your email <p>';
    $err_s =1 ;
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_error ='<p id="error" > Please enter the correct email <p>';
    $err_s =1 ;
}

if(empty($gender)){
    $gender_error ='<p id="error" >Please select gender<p>';
    $err_s =1 ;
}

if(empty($birthday)){
    $birthday_error = '<p id="error" > Please enter date of birth <p>';
    $err_s =1 ;
}

if(empty($password)){
    $password_error = '<p id="error" >Please enter the correct password<p>';
    $err_s =1 ;
    include('register.php');
}


elseif(strlen($password) < 6){
    $password_error = '<p id="error"> Your password must be at least 6 characters long <p>';
    $err_s =1 ;
    include('register.php');
   }
else{
    if(($err_s == 0) && ($num_rows == 0)){
    $sql ="INSERT INTO users(username,email,password,birthday,gender,md5_pass)
    VALUES ('$username','$email','$password','$birthday','$gender','$md5_pass')";
    mysqli_query($conn,$sql);
    header('location:index.php');
}else{
    include('register.php');
}
}


}

