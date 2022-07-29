
<?php
session_start();

if($_SESSION['logedin']!='yes')
{
    header("location:login.html");
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

        #editor {
            background-color: #FFFCEA;
            height: 100vh;
            margin-top: 0;

        }
    </style>
</head>

<body>

    <!-- Navber -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top ">
        <div class="container">

            <form method="POST" action="./writepostaction.php">
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
                                    <?php echo $_SESSION['firstname'] ?> is writing!
                                </button>

                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="mypost.php" class="nav-link amit">
                            My Posts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link amit">
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
        <form method="POST" action="./writepostaction.php" enctype="multipart/form-data">
            <div class="mb-2 mt-5">
                <label for="title" class="form-label text-light font-weight-bold" style="margin-top: 2rem">Enter post title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title:" i>
            </div>
<br>
            <div>

                <select name="category" id="">
                    <option select disable>Select Category</option>
                    <?php
                    require('db.php');
                    $db = new database();
                    $q = "SELECT * FROM tbl_cat";
                    $result = $db->fetchdata($q);
                    while($cat = mysqli_fetch_assoc($result))
                    {
                        ?>
                        <option value="<?php echo $cat['id'] ?>"><?php echo
                            $cat['name'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
<br>
            <div class="mb-4">
                <label for="uploadfile" class="text-light form-label font-weight-bold">Cover Image</label>
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>


            <textarea class="" name="editor" id="editor">
                Hello.
            </textarea>


            <button type="submit" name="save" id="save" class="btn btn-success w-100 mt-4 mb-5 " type="button">Save</button>
        </form>
    </div>



    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor')
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>

