<?php
include '../connect.php';
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=PT+Sans&family=Poppins:wght@300;400;600&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap link -->
    <link href="../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/admin.css">
    <title>ADMIN PANEL</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-8 col-sm-10 column">
                <div class="form-wrapper py-4 rounded-3 px-4">
                    <div class="img-wrapper w-50 mb-5 m-auto">
                        <a href="../index.php"><img src="../image/logo.png" alt="logo" class="img-fluid"></a>
                    </div>
                    <form method="post">
                        <label class="ms-1 fs-5 fw-bold mb-1">Username</label>
                        <input type="text" class="form-control mb-4 py-2" name="username" autocomplete="off">
                        <label class="ms-1 fs-5 fw-bold mb-1">Password</label>
                        <input type="password" class="form-control py-2 mb-4" name="password" autocomplete="off">
                        <button type="submit" class="text-light btn w-100">LOG IN</button>
                    </form>

                    <?php

                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $username = $_POST['username'];
                            $password = $_POST['password'];

                            $sql = "SELECT * FROM `admin` WHERE (`username`, `password`) = ('$username', '$password')";

                            $result = mysqli_query($connect, $sql);

                            if($result){
                                $num = mysqli_num_rows($result);
                                if($num > 0){
                                    echo"<div class='alert alert-success mt-3'><strong>Success</strong>: Log in successful</div>";
                                    header("location: dashboard.php");
                                }else{
                                    echo"<div class='alert alert-danger mt-3'><strong>Error</strong>: Invalid credentials</div>";
                                }
                            }else{
                                die(mysqli_error($connect));
                            }
                                
                        }

                    ?>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap JS -->
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>