<?php
include 'connect.php';

$success = 0;
$error = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $email = $_POST['email'];

  $sql = "SELECT * FROM `newsletter` WHERE (`email`) = ('$email')";
  $result = mysqli_query($connect,$sql);

  if($result){
    $num = mysqli_num_rows($result);

    if($num > 0){
      $error = 1;
    }else{
      $sql = "INSERT INTO `newsletter` (`email`) VALUES ('$email')";
      $result = mysqli_query($connect,$sql);

      if($result){
        $success = 1;
      }else{
        die(mysqli_error($connect));
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=PT+Sans&family=Poppins:wght@100;200;300;400;600&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap link -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="Custom-css/style.css">

    <link rel="icon" type="favicon" href="/image/favicon.png">

    <title>Rocketman clone</title>
</head>
<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg bg-body-light py-4">
        <div class="container-fluid">
          <a class="navbar-brand mx-5" href="index.php"><img src="image/logo.png" alt="Rocketman-logo" class="logo"></a>
          <button class="navbar-toggler mx-5 rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav text-dark ms-auto mx-4">
              <a class="nav-link" href="service.html">SERVICES</a>
              <a class="nav-link" href="contact.php">CONTACT</a>
              <a class="nav-link" href="https://learnwagtail.com/wagtail-for-beginners/">WAGTAIL COURSE</a>
            </div>
          </div>
        </div>
    </nav>

    <!-- Hero section -->
    <div class="hero-bg">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12 hero-col">
                <h1 class="text-light hero-h1 mx-4">Supreme Rocket Maintenance</h1>
                <p class="hero-p mx-4 my-4 text-light fs-3">Your rocket is your $1,000,000,000 baby. We get that.</p>
                <a href="contact.php" class="btn btn-light mx-4 my-4 rounded-0 contact-btn py-3">CONTACT US</a>
            </div>
        </div>
    </div>
    </div>

    <!-- Second section -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 text-center content-col">
          <h2 class="content-h2 fs-3">Your rocket is valuable. Let the professionals work on it.</h2>
        </div>
      </div>

      <div class="row justify-content-center content-row gap-3 my-5 py-5">
        <div class="col-md-5 content-card">
          <div class="card rounded-0">
            <img src="image/toy.jpg" class="card-img-top rounded-0" alt="rocket-toy">
            <div class="card-body my-4 text-center">
              <b class="fs-4">It's not a toy</b>
              <p class="card-text py-4 fs-5 card-p">Or maybe you're Jeff Bezos.. and rockets are your toys!</p>
              <a href="service.html" class="text-decoration-none view"> VIEW SERVICES &ThickSpace;<i class="fa fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-5 content-card">
          <div class="card rounded-0">
            <img src="image/nasa.jpg" class="card-img-top rounded-0" alt="rocket-toy">
            <div class="card-body my-4 text-center">
              <b class="fs-4">Rockets are cool!</b>
              <p class="card-text py-4 fs-5 card-p">Especially when you see photos like this one 🤤</p>
              <a href="contact.php" class="text-decoration-none view"> CONTACT US &ThickSpace; <i class="fa fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Third section -->
    <div class="container-fluid">
      <div class="row third-row mb-5">
        <div class="col-md-12 d-flex img-col">
          <div class="rockets">
            <img src="image/2rocket.jpg" alt="" class="img-fluid">
          </div>

          <div class="img-cap py-3">
            <h2 class="my-4 fw-bold mx-4">Self Landing Rocket</h2>
            <p class="mx-4 fs-4 fw-light third-p">Probably the coolest thing evar!!1 We can program this for you.</p>
            <a href="programming.html" class="btn btn-light more-details rounded-0 px-4 mx-4 my-3">MORE DETAILS</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Fourth section -->
    <div class="container-fluid">
      <div class="row fourth-row">
        <div class="col-md-12 d-flex img-col2">
          <div class="big-rocket">
            <img src="image/3.jpg" alt="" class="img-fluid w-100">
          </div>

          <div class="img-cap2 py-3">
            <h2 class="my-4 fw-bold mx-4">We'll clean your rocket</h2>
            <p class="mx-4 fs-4 fw-light fourth-p">This image has nothing to do with cleaning. But it's kind of neat still.</p>
            <a href="cleaning.html" class="btn btn-light more-details rounded-0 px-4 mx-4 my-3">MORE DETAILS</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Fifth section -->
    <div class="container-fluid">
      <div class="row fifth-row mb-5">
        <div class="col-md-12 d-flex img-col3">
          <div class="rockets">
            <img src="image/fly.jpg" alt="" class="img-fluid">
          </div>

          <div class="img-cap3 py-3">
            <h2 class="my-4 fw-bold mx-4">Rockets are gas guzzlers</h2>
            <p class="mx-4 fs-4 fw-light fourth-p">If you think gas is expensive now.. think about rocket prices! Luckily, we water our gas down to give you more bang for your buck. </p>
            <a href="fueling.html" class="btn btn-light more-details rounded-0 px-4 mx-4 my-3">MORE DETAILS</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Sixth section -->
    <div class="container-fluid">
      <div class="row py-5 sixth-row">
        <div class="col-md-12 text-center">
          <div class="display-6 skynet">We've also partnered with Skynet to maintain humanoid robotics.</div>
          <a href="contact.php" class="btn skynet-btn my-4 px-5 py-3 rounded-0 text-light">CONTACT US</a>
        </div>
      </div>
    </div>

    <!-- Seventh row -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 review-col text-center">
          <p class="review fs-4 w-50 m-auto">Our rockets were so clean they blinded over 1,000 people when they watched our launch. Thanks Rocketman!</p>
          <p class="fs-5 my-2 spacex">— TOTALLY NOT SPACEX 😉</p>
        </div>
      </div>
    </div>

    <!-- Eighth section -->
    <div class="container-fluid">
      <div class="row eighth-row py-5 align-items-center">
        <div class="col-md-6 eighth-col mx-5 text-light">
            <h2 class="fw-bold">We’ll take good care of your rocket.</h2>
            <p class="fs-4 fw-light">We’ll treat your rocket as if it’s our own. Our standards are higher than the ISS's altitude. We also enjoy test driving your rocket before giving it back 😱</p>
        </div>

        <div class="col-md-3 text-center eighth-col2 ms-auto">
          <a href="contact.php" class="btn btn-light eighth-btn rounded-0 py-3 px-5">CONTACT US</a>
        </div>
      </div>
    </div>

    <!-- Footer section -->
    <div class="container-fluid footer">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-sm-11 my-5 text-center">
          <div class="footer-newsletter">
            <h5 class="text-light">For more updates and guidelines on rocket maintenance.</h5>
            <h5 class="text-light mb-3">Subscribe to our NEWSLETTER today</h5>
          </div>
          <form method="post" class="d-flex gap-3 py-3 px-3 form rounded align-items-center">
            <input type="email" name="email" class="email form-control py-2" placeholder="Email Address" autocomplete="off" required>
            <button type="submit" class="btn text-light fw-bold subscribe px-3 py-2">SUBSCRIBE</button>
            <span class="text-light">
              <?php
              if($success){
                echo"<p class='text-success m-auto'>Subscribed</p>";
              }
              ?>

              <?php
              if($error){
                echo"<p class='text-danger'>Already subscribed</p>";
              }
              ?>
            </span>
          </form>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-2 footer-col">
          <ul class="list-unstyled my-5 mx-4 footer-list">
            <li class="text-decoration-none text-secondary fw-bold mb-2 footer-gray">LINKS</a></li>
            <li class="mb-2"><a href="service.html" class="text-decoration-none text-light fs-5 footer-link">Services</a></li>
            <li class="mb-2"><a href="contact.php" class="text-decoration-none text-light fs-5 footer-link">Contact</a></li>
            <li><a href="https://learnwagtail.com/wagtail-for-beginners/" class="text-decoration-none text-light fs-5 footer-link">Wagtail Course</a></li>
          </ul>
        </div>
        <div class="col-md-2 footer-col">
          <ul class="list-unstyled my-5 mx-4 footer-list">
            <li class="text-decoration-none text-secondary fw-bold mb-2 footer-gray">CONTACT US</li>
            <li class="text-light">Contact us anytime at</li>
            <li class="mb-2"><a href="" class="text-decoration-none text-light footer-link">gary@totallyfakeemail.com</a></li>
            <li class="text-light">* All images from unsplash.com</li>
          </ul>
        </div>
        <div class="col-md-2 footer-col">
          <ul class="list-unstyled my-5 mx-4 footer-list">
            <li class="fw-bold mb-2 text-secondary footer-gray">HOURS</li>
            <li class="text-light">Monday - Friday</li>
            <li class="text-light">9am - 5pm</li>
          </ul>
        </div>
        <div class="col-md-2 footer-col text-light">
          <ul class="list-unstyled my-5 mx-4 footer-list">
            <li class="d-flex gap-3 mb-2 footer-icon">
              <a href="" class="text-decoration-none text-light fw-bold">
                <i class="bi bi-twitter fs-5"></i>
              </a>
              <a href="" class="text-decoration-none text-light fw-bold d-flex gap-3">
                <i class="bi bi-youtube fs-5"></i>
              </a>
            </li>
            <li class="text-secondary mb-2 footer-gray">&copy;2023 Rocketman clone</li>
            <li class="oz">DEVELOPED BY OZ DEV</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>