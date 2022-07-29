<?php
require('db.php');
$email = $_POST['email'];
$password = $_POST['password'];

$first_name = $_POST['first_name'];

$first_name=ucwords($first_name);

$last_name = $_POST['last_name'];

$last_name=ucwords($last_name);

//to prevent from mysqli injection  
$email = stripcslashes($email);
$password = stripcslashes($password);
$first_name = stripcslashes($first_name);
$last_name = stripcslashes($email);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);
$first_name = mysqli_real_escape_string($con, $first_name);
$last_name = mysqli_real_escape_string($con, $last_name);

$sql = "INSERT INTO tbl_user(first_name,last_name,password,email) 
VALUES('$first_name','$last_name','$password','$email');";

$mydb = new database();
$response = $mydb->insertdata($sql);

if ($response)
{
    header('location:login.html');
}
else
{
    echo '<script type="text/javascript">';
    echo 'alert("Error..!");';
    echo 'location="login.html";';
    echo '</script>';
}
