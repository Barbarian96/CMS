<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="post">
    <br>
    <br>
    <input name="cat" type="text" placeholder="Enter A Category">
    <br>
    <br>
    <input type="submit" value="Save" name="save">
</form>
</body>
</html>

<?php
require('db.php');
if(isset($_POST['save']))
{
    $category = $_POST['cat'];
    $q = "INSERT INTO tbl_cat(name) VALUES 
    ('$category')";
    $db = new database();
    $response = $db->insertdata($q);
    if($response ==true)
    {
        echo "Succesfully Addedd";
    }
    else
    {
        echo "Wrong";
    }
}

?>