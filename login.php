<?php
require('db.php');
$email = $_POST['email'];
$password = $_POST['password'];

//to prevent from mysqli injection  
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($con, $email);
$password = mysqli_real_escape_string($con, $password);

$sql = "select * from tbl_user where email = '$email' and password = '$password';";

$mydb = new database();
$result = $mydb->fetchdata($sql);
$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) > 0)
{
    session_start();
    $_SESSION['user_id']=$row['id'];
    $_SESSION['logedin']='yes';
    $_SESSION['firstname']=$row['first_name'];
    $_SESSION['lastname']=$row['last_name'];
    $_SESSION['email']=$row['email'];
    header('location:index.php');
}
else
{
    echo '<script type="text/javascript">';
    echo 'alert("Password Wrong..!");';
    echo 'location="login.html";';
    echo '</script>';
}
