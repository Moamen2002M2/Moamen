<?php
$conn = mysqli_connect('localhost','root','','project2');
if(!$conn){
    die('Error' .mysqli_connct_error());
}