
<?php
require('db.php');
session_start();
if (array_key_exists('logo', $_POST)) {
    header('location:index.php');
}

if (isset($_POST['save'])  && !empty($_POST['title'] && !empty($_POST['editor']))) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "uploads/";
    $img_ex_lc = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allowed_exs = array("jpg", "jpeg", "png");

    if (in_array($img_ex_lc, $allowed_exs)) {
        $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
        $folder = $folder . $new_img_name;

        move_uploaded_file($tempname, $folder);

        $id = $_SESSION['user_id'];
        $date = date("Y-m-d");
        // $name = $_SESSION['firstname'];
        $text = $_POST['editor'];
        $title = $_POST['title'];

        $title=ucwords($title);

        $cat_id=$_POST['category'];
        $sql = "INSERT INTO tbl_post(tittle,description,create_time,update_time,cover,author_id,cat_id) 
        VALUES('$title', '$text','$date','$date' ,'$new_img_name','$id','$cat_id');";
        $mydb = new database();
        $response = $mydb->insertdata($sql);

        if ($response)
        {
            echo '<script type="text/javascript">';
            echo 'alert("Success...!");';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Sorry...!");';
            echo '</script>';
        }
    }
    else
    {
        echo '<script type="text/javascript">';
        echo 'alert("Only Jpg,Jpeg and Png images are allowed.");';
        echo '</script>';
    }
}

?>


