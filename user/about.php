<?php
include("content.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/styleshet.css">

  <style>
    .bg-primary {
      background-color: #EF820D !important;
    }
  </style>

</head>

<body style="width: 85%; position:absolute; right:0;">
  <header class="bg-primary text-white text-center py-5">
    <div class="container">
      <h1>About Us</h1>
      <p class="lead">Learn more about our company, our team, and our mission</p>
    </div>
  </header>

  <section class="py-5" style="background-color: #DEDEDE;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2>Who We Are</h2>
          <p style="text-align: justify;">We are a dedicated team of experts with a passion for video quality and intellectual property protection. Our mission is to provide comprehensive testing services that guarantee your videos are free from defects and fully compliant with copyright laws. With a keen eye for detail and a commitment to excellence, we ensure that your content not only captivates your audience but also respects the rights of creators.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <h2 class="text-center">Our Mission</h2>
      <p class="text-center">Our mission is to deliver exceptional services and solutions that enhance the lives of our customers. We strive to achieve excellence through innovation, integrity, and a customer-centric approach.</p>
    </div>
  </section>

  <section class="bg-light py-5">
    <div class="contactPage">
      <div class="div1">
        <h1>CONTACT</h1>
        <p class="sendUs">SEND US A MESSAGE</p>
        <input type="text" placeholder="Name">
        <input type="email" placeholder="Email">
        <p>message</p>
        <textarea class="description-input" placeholder="Type message here.."></textarea>
        <button>Submit</button>
      </div>
      <div class="div2">
        <h2>Get In <span>Touch</span></h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua. </p>
        <div class="address"><a href=""><ion-icon name="location"></ion-icon> San Jose, San Pablo City</a></div>
        <div class="callUs"><a href=""><ion-icon name="call"></ion-icon> +63 9157970296</a></div>
        <div class="mailUs"><a href=""><ion-icon name="mail"></ion-icon> jorencemendoza2@gmail.com</a></div>

        <div class="Logos">
          <ul>
            <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-github"></ion-icon></a></li>
            <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
          </ul>
        </div>
      </div>

    </div>
  </section>

  <footer class="bg-primary text-white text-center py-3">
    <div class="container">
      <p>&copy; 2024 QualiMax. All rights reserved.</p>
    </div>
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>