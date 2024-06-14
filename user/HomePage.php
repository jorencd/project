<?php
include("connect.php");
include("content.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Carousel Template · Bootstrap v5.2</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Dots&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/about.css">
  <link rel="stylesheet" href="css/HomePage.css">
  <style>
    .bg-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('css/pictures/web3.png');
      background-size: cover;
      background-position: center;
    }

    .team_name {
      font-family: "Zen Dots";
      font-weight: 400;
      font-style: normal;
      font-size: x-large;
      padding: 5px 0 5px;
    }

    header {
      font-family: 'Zen+Dots';
      color: whitesmoke;
      width: 85%;
      right: 0;
      position: fixed;
      background-color: #EF820D;
      z-index: 20;
    }
  </style>

</head>

<a style=" z-index:1000;" class="mail-outline" href="#" onclick="toggleNotifications()"><ion-icon style="color: whitesmoke; position:absolute; right:0;" name="mail-outline"></ion-icon></a>

<div style="z-index: 1000;" class="notif">
  <div class="h1-container">
    <h1>Notifications</h1>
  </div>
</div>

<body style="padding-top:0;">
  <header>
    <h1 class="team_name text-center">QUALIMAX</h1>
  </header>
  <main style="padding-top: 47px;">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="bg-image"></div>
          <div class="container">
            <div class="carousel-caption text-end">
              <h1>SecureView.</h1>
              <p>Your Trusted Partner for Verifying Video Copyright and Sensitivity Compliance.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container marketing">

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">Age-Appropriate Content Filtering. <span class="text-muted"></span></h2>
          <p class="lead">Designed to safeguard children from inappropriate content by strictly enforcing age-appropriate guidelines.</p>
        </div>
        <div class="col-md-5">
          <svg xmlns="http://www.w3.org/2000/svg" width="500" height="500">
            <image href="css/pictures/filtering.png" width="100%" height="100%" />
            <text x="50%" y="50%" fill="#aaa" dy=".3em" text-anchor="middle"></text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading fw-normal lh-1">Legal Compliance and Copyright Protection. <span class="text-muted"></span></h2>
          <p class="lead">Focuses on maintaining the integrity of video content by preventing copyright infringement and ensuring legal compliance.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="500" height="500">
            <image href="css/pictures/copyright.jpg" width="100%" height="100%" />
            <text x="50%" y="50%" fill="#aaa" dy=".3em" text-anchor="middle"></text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading fw-normal lh-1">Content Quality Assurance. <span class="text-muted"></span></h2>
          <p class="lead">Ensures high production standards for video content, enhancing profitability and viewer engagement.</p>
        </div>
        <div class="col-md-5">
          <svg xmlns="http://www.w3.org/2000/svg" width="500" height="500">
            <image href="css/pictures/quality-assurance-importance.jpg" width="100%" height="100%" />
            <text x="50%" y="50%" fill="#aaa" dy=".3em" text-anchor="middle"></text>
          </svg>

        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
      <p class="float-end"><a href="#">Back to top</a></p>
      <p>© 2022–2023 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
  </main>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/HomePage.js"></script>

</body>

</html>