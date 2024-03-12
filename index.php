<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> تسجيل الدخول</title>
    <link rel='stylesheet' href="css/main.css">
</head>
<body>
<div class="main">

<h2> تسجيل الدخول</h2>

<form action="login.php" method="POST">
<?php if(isset($user_error)){
    echo $user_error;
} ?>
<input type="text" name ="username" id="username" placeholder="username"><br>
<?php if(isset($password_error)){
    echo $password_error;
} ?>
<input type="password" name=" password" id="password" placeholder=" password"><br>
    
<input type="submit" name="submit" id="submit" value=" تسجيل الدخول"><br>
</form>

<h3> or</h3><br>

<a id="login" href="register.php ">انشاء حساب</a>















</div>
</body>
</html>