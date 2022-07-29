<?php
session_start();
require('db.php');

if($_SESSION['logedin']!='yes')
{
    header("location:login.html");
}

if (array_key_exists('logo', $_POST)) {
    header('location:index.php');
}
function logout()
{
    //session_destroy();
    header('location:logout.php');
}
if (array_key_exists('logout', $_POST)) {
    logout();
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
        body::before {
            display: block;
            content: '';
            height: 60px;

        }

        body {
            background-color: #EEEEEE;
        }

        #map {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        @media (min-width: 768px) {
            .news-input {
                width: 50%;
            }
        }

        .onhover:hover {
            background-color: orange;

        }

        .new-button:hover {
            background-color: orange;
            color: black;
        }

        .amit {
            color: gray;
        }

        .amit:hover {
            color: orange;
            font-weight: bold;

        }

        #logo {
            font-weight: bold;
            font-family: 'Squada One', 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 1.3rem;
        }

        #edit:hover {
            background-color: orange;
            color: black;
        }

    </style>
</head>

<body>

    <!-- Navber -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3  fixed-top">
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
                                <button class="btn amit dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: orange;">
                                    Hello <?php echo $_SESSION['firstname'] ?>!
                                </button>
                                <div class="dropdown-menu bg-dark text-light" aria-labelledby="triggerId">
                                    <button type="submit" name="write_a_post" class="dropdown-item text-light onhover">Write a post</button>
                                    <button type="submit" name="logout" class="dropdown-item text-light onhover">Logout</button>
                                </div>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link amit">
                            My Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST">
                            <button type="submit" name="" class="btn amit" id="" style="font-weight:bold;font-size: medium;">
                                About
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <a href="edit.php?id=<?php echo $post['id']?>" class="btn mt-5 shadow btn-secondary pt-2 a-btn-slide-text" style="height: 3rem;width:8rem" id="edit">
            <i class="bi bi-pen"></i>
            <span><strong>Edit Post</strong></span>
            <?php if ($_SESSION['user_id'] != $post['author_id']) { ?>
                <script>
                    document.getElementById("edit").style.display = "none";
                </script>
            <?php } ?>
        </a>
        <div class="row d-flex">

            <!-- Cards -->
            <div class="col-8 card-img-top card p-5  g-5 " style=" text-align: justify;text-justify: inter-word;">

                <h2 class="py-4 text-left text-dark text-uppercase fw-b "><?php echo $post['title'] ?></h2>
                <section><?php echo $post['description'] ?></section>

            </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>