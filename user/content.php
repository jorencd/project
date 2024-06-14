<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/stylesheet.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>

<nav id="navbar">
  <div style="width: 15%; color:white; margin:5px 5px 5px;">
    <?php
    session_start();
    if (isset($_SESSION['first_name']) && isset($_SESSION['email'])) {
        echo '<div class="profile-co" style="display: grid; grid-template-columns: auto auto; gap: 10px;">
                <div><a href=""><ion-icon style="font-size: 30px; margin-top:7px; color:white;" class="person" name="person"></ion-icon></a></div>
                <div style="width: 15%; tex-align:justify; "><p style="font-family: \'Montserrat\'; margin: 5px 0 0;">'. $_SESSION['first_name'] .' '. $_SESSION['last_name'] .'</p>
                <a style="margin: 0; font-family: \'Montserrat\'; font-size: 12px;">'. $_SESSION['email'] .'</a></div>
              </div>';
    } else {
        echo '<p style="color:white; margin:5px;">Guest</p>';
    }
    ?>
  </div>
  <ul class="menu">
    <li><a href="HomePage.php"><ion-icon class="home" name="home-outline"></ion-icon>Home</a></li>
    <li><a href="Upload.php"><ion-icon name="folder-outline"></ion-icon>Upload</a></li>
    <li><a href="about.php"><ion-icon name="information-outline"></ion-icon>About</a></li>
    <li><a href="Policy.php"><ion-icon name="reader-outline"></ion-icon>Policy</a></li>
    <li class="logout"><a href="logout.php"><ion-icon name="log-out-outline"></ion-icon></a></li>
  </ul>
</nav>

<script src="js/HomePage.js"></script>
<script src="js/content.js"></script>
</body>
</html>
