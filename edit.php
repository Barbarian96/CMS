<?php
require('db.php');
session_start();
if (array_key_exists('logo', $_POST)) {
    header('location:index.php');
}

if (isset($_GET['id'])) {
    require_once('db.php');
    $post_id = mysqli_real_escape_string($con, $_GET['id']);
    $sql = "SELECT * FROM `tbl_post` WHERE id = '$post_id';";
    $excute = mysqli_query($con, $sql);
    $post = mysqli_fetch_assoc($excute);

    if ($post_id != $post['id']) {
        header('location:403.php');
        exit();
    }
} else {
    header('location:index.php');
    exit();
}



if (isset($_POST['update'])  && !empty($_POST['title'] && !empty($_POST['editor']))) {




    $id = $post['id'];
    $date = date("Y-m-d");
    $text = $_POST['editor'];
    $title = $_POST['title'];
    $sql = "UPDATE tbl_post SET title = '$title',description = '$text',update_time = '$date' WHERE id = '$id';";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo '<script type="text/javascript">';
        echo 'alert("Updated...!");';
        echo '</script>';
        $go = 'refresh:0;url=details.php?id=' . $id;
        header($go);
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Sorry...!");';
        echo '</script>';
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
    <title>What 2 Learn</title>
    <style>
        body {
            background-color: #444F5A;
        }

        #toolbar-container {
            margin-top: 2rem;
        }

       
    </style>
</head>

<body>

    <!-- Navber -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top ">
        <div class="container">

            <form method="POST">
                <button type="submit" name="logo" class="btn text-light" id="logo" style="font-weight:bold;font-size: large;">
                    WHAT 2 LEARN
                </button>
            </form>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item " id="name" style="margin-left: 5px;">
                        <form method="post">
                            <div class="dropdown open">
                                <button class="btn amit " type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: orange;">
                                    <?php echo $_SESSION['firstname'] ?> is updating!
                                </button>

                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link amit">
                            My Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link amit">
                            About
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Title and Cover -->
    <br>
    <div class="container">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-4 mt-5 ">
                <label for="title" class="form-label text-light font-weight-bold" style="margin-top: 2rem">Enter post title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title:" value="<?php echo $post['title']; ?>" />
            </div>

            <textarea class="" name="editor" id="editor" >

                <?php echo $post['description']; ?>
            </textarea>


            <button type="submit" name="update" id="update" class="btn btn-success w-100 mt-4 mb-5 " type="button">Update</button>
        </form>
    </div>



    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
        editor.resize( '100%', '350', true );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>