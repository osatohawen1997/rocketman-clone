<?php


session_start();
if(isset($_SESSION['username'])){

    $username = $_SESSION['username'];
    // header('location: index.php');
}

session_destroy();
session_start();
$_SESSION['username'] = $username;
ob_start();


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
    <link rel="stylesheet" href="css/dashboard.css">

    <title>Admin dashboard</title>
</head>
<body>

    <style>
        .log{
        
            width: 20% !important;
        }
    
        .mainbar .container-fluid .form-row .icon{
            background: white;
        }

        input:focus{
            border: 2px solid rgba(134, 88, 189, .6) !important;
            outline: 4px solid rgba(134, 88, 189, .3) !important;
            box-shadow: none !important;
            caret-color: rgba(134, 88, 189, .4) !important;

        }

        .submit-btn{
            background: rgb(134, 88, 189);
        }

        .submit-btn:hover{
            background: #6E3DA9 !important;
        }

        .submit-btn:focus{
            outline: 3px solid rgba(134, 88, 189, .3) !important;
        }


    </style>


    <nav class="navbar bg-dark navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" class="btn"><i class="fa fas fa-ellipsis-v sidebar-btn text-light fs-3"></i></button>

          <a class="navbar-brand m-auto text-light" href="#">ADMIN DASHBOARD</a>
          
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-5">
                    <p class="text-center fs-4 mb-4">Are you sure?</p>
                
                    <div class="button-wrapper mt-5 d-flex justify-content-center gap-5">

                        <button type="button" class="btn btn-secondary px-3 py-2 rounded-0" data-bs-dismiss="modal" aria-label="Close">Cancel</button>

                        <a href="logout.php" type="button" class="btn btn-danger px-3 py-2 rounded-0 logout">Log out</a>
                    </div>
                </div>
                </div>  
            </div>
        </div>
    </div>

    <div class="wrapper d-flex">
        <div class="sidebar border px-3 position-relative">
            <div class="user-wrapper btn-light px-2 py-2 mt-3 shadow rounded-2 d-flex align-items-center justify-content-between">
                <div class="icon"><i class="fa far fa-user-circle fs-2"></i></div>
                <div class="admin-name mt-2">
                    <p>Welcome,
                    <?php 
                       echo ($_SESSION['username']);
                    ?>
                    </p>
                </div>
                <div class="">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fas fa-ellipsis-v text-end fs-4"></i></button>

                    <ul class="dropdown-menu text-center">
                        <li><a class="dropdown-item" href="#">Edit profile</a></li>
                    </ul>

                </div>
            </div>

            <div class="listing">
                <ul class="list-unstyled mt-4">
                    <li class=""><a href="" class="text-decoration-none text-dark">Feedbacks</a></li>
                    <hr>
                    <li><a href="" class="text-decoration-none text-dark ">Newsletter Subscribers</a></li>
                    <hr>
                    <li><a href="" class="text-decoration-none text-dark "></a></li>
                </ul>
            </div>

            <button type="button" class="btn btn-dark start-0 mb-3 rounded-0 log me-2 position-fixed bottom-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fas fa-power-off"></i> Log out</button>
        </div>
        <div class="mainbar">
            <div class="container-fluid">
                <?php

                $correct = 0;
                $error = 0;

                if($_SERVER['REQUEST'] == 'POST'){
                    
                }

                $sql = ""
                ?>
                <div class="row py-5 form-row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-wrapper rounded-3 shadow px-5 py-5">
                            <?php
                            if($error){
                                echo "<div class='alert alert-danger'><i class='fa fas fa-times-circle fs-5'></i> </div>";
                            }
                            ?>

                            <?php
                            if($correct){
                                echo "<div class='alert alert-success'><i class='fa fas fa-check-circle fs-5'></i> </div>";
                            }
                            ?>
                            <form method="post">
                                <input type="password" class="mb-4 form-control rounded" autocomplete="off" name="old" placeholder="Input Current Password">
                                
                                <input type="password" class="mb-4 form-control rounded" autocomplete="off" name="new" placeholder="Input New Password">

                                <input type="password" class="mb-4 form-control rounded" autocomplete="off" name="cpassword" placeholder="Confirm Password">

                                <button type="submit" class="btn submit-btn text-center text-light rounded-0 px-3 py-2">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    



    <!-- Bootstrap JS -->
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>