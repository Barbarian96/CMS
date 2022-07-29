<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
    }

    .about-section {
      padding: 50px;
      text-align: center;
      background-color: #474e5d;
      color: white;
    }


    .title {
      color: grey;
    }

    .button {
      border: none;
      outline: 0;
      display: inline-block;
      padding: 8px;
      color: white;
      background-color: #000;
      text-align: center;
      cursor: pointer;
      width: 100%;
    }

    .button:hover {
      background-color: #555;
    }

    @media screen and (max-width: 650px) {
      .column {
        width: 100%;
        display: block;
      }
    }

    .wrapper {
      max-height: 580px;
      border: 1px solid #ddd;
      display: flex;
      overflow-x: auto;
    }

    .wrapper::-webkit-scrollbar {
      width: 0;
    }

    .wrapper .item {
      min-width: 225px;
      height: 580px;
      line-height: 580px;
      text-align: center;
      background-color: #ddd;
      margin: 5px;
    }
  </style>
</head>

<body>

  <div class="about-section">
    <h1>About Us Page</h1>
    <p>Some text about who we are and what we do.</p>
    <p>Resize the browser window to see that this page is responsive by the way.</p>
  </div>

  <h2 style="text-align:center">Our Team</h2>
  <br>

  <div class="wrapper">
    <!-- item -->
    <div class="item ">
      <div class="card">
        <img src="img/Amit.jpg" alt="Jane" style="width:100%">
        <div class="container">
          <h2>Jane Doe</h2>
          <p class="title">CEO & Founder</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>jane@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>


    <!-- item -->
    <div class="item ">
      <div class="card">
        <img src="img/Amit.jpg" alt="Jane" style="width:100%">
        <div class="container">
          <h2>Jane Doe</h2>
          <p class="title">CEO & Founder</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>jane@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>


    <!-- item -->
    <div class="item ">
      <div class="card" style="height: 280px;">
        <img src="img/Amit.jpg" alt="Jane" style="width:100%">
        <div class="container">
          <h2>Jane Doe</h2>
          <p class="title">CEO & Founder</p>
          <p>Some text that describes me lorem ipsum ipsum lorem.</p>
          <p>jane@example.com</p>
          <p><button class="button">Contact</button></p>
        </div>
      </div>
    </div>



  </div>




  <footer class="p-5 bg-dark text-white text-center position-relative">
    <div class="container">
      <p class="lead">Copyright &copy; 2022 Amit Dey</p>
      <a href="#" class="position-absolute bottom-0 end-0 p-5">
        <i class="bi bi-arrow-up-circle h1 " style="color: lightgray;"></i>
      </a>
    </div>
  </footer>


</body>

</html>