<?php

require('db.php');
session_start();


if($_SESSION['logedin']!='yes')
{
    header("location:login.html");
}

function logout()
{
    header("location:logout.php");
    //header('location:index.php');
}
if (array_key_exists('logout', $_POST)) {
    logout();
}
if (array_key_exists('write_a_post', $_POST)) {
    header('location:writeapost.php');
}
$id = $_SESSION['user_id'];
$sql = "SELECT * FROM tbl_post as p join tbl_user on p.id=tbl_user.id
join tbl_post as pp join tbl_cat on pp.id=tbl_cat.id;";

$db =new database();

//$result = $mydb->fetchdata($sql);
//$row = mysqli_fetch_assoc($result);
$execute = $db->fetchdata($sql);
$posts = mysqli_num_rows($execute);

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
    <title>Learn CSS</title>
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

        #sbg {
            background: 'videos/bible.mp4';
        }

        #loading {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 100;
            width: 100vw;
            height: 40rem;
            background-color: rgba(192, 192, 192, 0.5);
        }

        #bgvideo {
            position: relative;
            right: 0;
            bottom: 0;
            width: 100%;
            height: auto;
            margin-top: -20rem;
        }

        button.like {
            width: 30px;
            height: 30px;
            margin: 0 auto;
            padding-bottom: 6px;
            border-radius: 50%;
            color: rgba(0, 150, 136, 1);
            background-color: rgba(38, 166, 154, 0.3);
            border-color: rgba(0, 150, 136, 1);
            border-width: 1px;
            font-size: 15px;
        }

        button.dislike {
            width: 30px;
            height: 30px;
            margin: 0 auto;
            padding-bottom: 6px;
            margin-left: 3px;
            border-radius: 50%;
            color: rgba(255, 82, 82, 1);
            background-color: rgba(255, 138, 128, 0.3);
            border-color: rgba(255, 82, 82, 1);
            border-width: 1px;
            font-size: 15px;
        }
    </style>

</head>

<body class="">
    <!-- Navber -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3  fixed-top">
        <div class="container">
            <a href="index.php" class="navbar-brand amit" id="logo">
                WHAT 2 LEARN
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <!-- search -->
                    <div class="nav-item mt-3 mt-lg-0">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form>
                    </div>

                    <li class="nav-item " id="name" style="margin-left: 5px;">
                        <form method="post">
                            <div class="dropdown open">
                                <button class="btn amit dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:lightgray;">
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
                        <a href="mypost.php" class="nav-link amit" style="color: orange;font-weight: bold;">
                            My Posts
                        </a>
                    </li>
                    <li class="nav-item">

                        <a href="about.php" name="about" class="btn amit" id="" style="color: lightgray;font-size: medium;">
                            About
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <!-- Boxes -->
    <section class="">


        <div class="container ">
            <div class="row d-flex">


                <!-- Cards -->
                <div class="col-10  g-5 ">
                    <h3 class="pb-2">My Recent Posts:</h3>
                    <?php
                    if ($posts > 0) {
                        while ($row = mysqli_fetch_assoc($execute)) { ?>

                            <!-- post -->
                            <a href="details.php?id=<?php echo $row['id'] ?>" class="link" style="color: #032A33;text-decoration: none;">
                                <div class="card mb-3 shadow ">
                                    <img src="<?php echo "uploads/" . $row['cover'] ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h3 class="card-title">
                                            <?php echo $row['tittle'] ?>
                                        </h3>


                                        <!-- like dislike -->
                                        <div class="d-flex flex-row  mt-3 mb-2 justify-content-between">
                                            <div class="m-0  p-2">
                                                <form action="" style="margin-left:3rem;">
                                                    <button class="like"><i class="bi bi-hand-thumbs-up-fill"></i></button>
                                                    <button class="dislike"><i class="bi bi-hand-thumbs-down-fill"></i></button>
                                                </form>
                                            </div>

                                            <div class="col-6 d-flex flex-row-reverse  justify-content-end nowrap ">
                                                <p class="col p-0 pt-2 m-0 justify-content-end" style="color:gray;font-weight: bold;"><i class="bi bi-pen"></i> Category: <?php echo $row['name'] ?></p>
                                                <p class="col p-0 pt-2 m-0 justify-content-end" style="color:gray;font-weight: bold;"><i class="bi bi-pen"></i> Author: <?php echo $row['first_name'] ?></p>
                                                <p class="col p-0 pt-2 m-0 justify-content-end" style="color:gray;font-weight: bold;"> Published: <?php echo $row['create_time'] ?> <i class="bi bi-clock-history"></i></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </a>
                            <br>
                    <?php
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </section>






    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2022 Amit Dey</p>
            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle h1 " style="color: lightgray;"></i>
            </a>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>