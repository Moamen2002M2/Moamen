<?php
session_start();
include('inc/connections.php');
if(isset($_SESSION['id']) && isset($_SESSION['username']))
{
$id = $_SESSION['id'];
$user = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<a href="logout.php"> تسجيل الخروج</a>


    <h2> برجاء حل هذا الاستبيان عن الطاقة الاحفورية</h2>



</body>
</html>

<?php

}else{
    header('location: index.php');
    exit();
}




?>