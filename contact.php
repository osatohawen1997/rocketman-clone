<?php
  include 'connect.php';
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=PT+Sans&family=Poppins:wght@100;200;300;400;600&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap link -->
    <link href="asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="Custom-css/contact.css">

    <link rel="icon" type="favicon" href="/image/favicon.png">
    <title>CONTACT</title>
</head>
<body>
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg border-bottom bg-body-light py-4">
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

    <!-- Contact section -->
    <div class="container-fluid">
        <div class="row my-5 py-3">
            <div class="col-md-6 px-5 pb-5 detail-col">
                <h2 class="contact-heading mb-4">Contact Us</h2>
                <p class="fs-4">Need a cleaning crew? Hate refuelling your rocket in the middle of summer? Have too much money to spend?</p>

                <p class="fs-4">Great!</p>
                <span class="fs-4">Reach out to us at:</span>
                <br>
                <span><a href="" class="fs-4 tel">1-800-ROCKETMAN</a></span>
                <br>
                <span><a href="" class="fs-4 email">gary@totallyfakeemail.com</a></span>
                <hr class="mb-4">
                <img src="image/history-in-hd-e5eDHbmHprg-unsplash.2e16d0ba.fill-580x335.jpg" alt="astronaunt" class="img-fluid">
            </div>
            <div class="col-md-6 px-5 my-4 form-col">

              <?php

                if($_SERVER['REQUEST_METHOD']=='POST'){
                  $name = $_POST['full_name'];
                  $company = $_POST['company'];
                  $email = $_POST['email'];
                  $message = $_POST['feedback'];

                  if(empty($_POST['full_name'])){
                    echo"<div class='alert alert-danger'><strong>Error</strong>: Fill in the required field</div>";
                  }elseif(empty($_POST['company'])){
                    echo"<div class='alert alert-danger'><strong>Error</strong>: Fill in the required field</div>";
                  }elseif(empty($_POST['email'])){
                    echo"<div class='alert alert-danger'><strong>Error</strong>: Fill in the required field</div>";
                  }elseif(empty($_POST['feedback'])){
                    echo"<div class='alert alert-danger'><strong>Error</strong>: Fill in the required field</div>";
                  }else{
                    
                    $sql = "INSERT INTO `enquiry` (`full_name`, `company`, `email`, `feedback`) VALUES ('$name', '$company', '$email', '$message')";

                    $result = mysqli_query($connect,$sql);

                    if($result){

                      echo"<div class='alert alert-success'><strong>Success:</strong> Your request has been sent successfully</div>";
                    }
                  }
                                  
                }
              ?>

              <form method="post">
                <label for="" class="label mb-1">Your Name (required)</label>
                <input type="text" name="full_name" class="form-control rounded-0 border-2 input mb-3" placeholder="Your Name" autocomplete="off" >

                <label for="" class="label mb-1">Your Company (required)</label>
                <input type="text" name="company" class="form-control rounded-0 border-2 input" placeholder="Your Company" autocomplete="off" >
                <small class=" pb-5">SpaceX, Blue Origin, NASA, Virgin Galactic, Galactic Empire?</small>

                <label for="" class="label mb-1 mt-2">Your Email (required)</label>
                <input type="email" name="email" class="form-control rounded-0 border-2 input mb-3" placeholder="Your Email" autocomplete="off" >

                <label for="" class="label mb-1">Your Message (required)</label>
                <textarea name="feedback" cols="57" rows="10" placeholder="Your Message" class="form-control rounded-0 border-2 input mb-3" autocomplete="off" ></textarea>

                <input type="submit" name="submit" class="btn submit-btn rounded-0 text-light py-2 fs-5 px-5" value = "SUBMIT">
              </form>
              
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