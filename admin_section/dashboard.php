<?php
include '../connect.php';

session_start();
// $_SESSION['username'] = $user;
$username = 0;
$user_error = 0;

if(isset($_SESSION['username'])){
    $username = 1;
    
}else{
    $user_error = 1;
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

    <nav class="navbar bg-dark navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" class="btn"><i class="fa fas fa-ellipsis-v sidebar-btn text-light fs-3 d-none"></i></button>

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
            <div class="position-fixed user-wrapper px-2">
                <div class="user-container m-auto px-2 py-2 mt-3 shadow rounded-2 d-flex align-items-center justify-content-between">
                    <div class="admin-name d-flex align-items-center gap-3">
                        <i class="fa far fa-user-circle fs-2"></i>
                        <small>Welcome,
                        <?php 
                           if($username){
                            echo $_SESSION['username'];
                           }
                        ?>
    
                        <?php 
                           if($user_error){
                            header("location:index.php");
                           }
                        ?>
                        </small>
                    </div>
                    <div class="">
                        <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fas fa-ellipsis-v text-end fs-4"></i></button>
    
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="edit.php"><i class="fa far fa-edit"></i> Edit profile</a></li>
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fas fa-power-off"></i> Log out</button>
                            </li>
                        </ul>
    
                    </div>
                </div>
    
                <div class="listing px-1">
                    <ul class="list-unstyled mt-4">
                        <li class=""><a href="" class="text-decoration-none text-dark">Feedbacks</a></li>
                        <hr>
                        <li><a href="#newsletter" class="text-decoration-none text-dark ">Newsletter Subscribers</a></li>
                        <hr>
                        <li><a href="" class="text-decoration-none text-dark "></a></li>
                    </ul>
                </div>
    
            </div>
        </div>
        <div class="mainbar">
            <div class="container-fluid">
                <div class="row py-5 analystic justify-content-center gap-5">
                    <div class="col-lg-3 col-sm-3 icon text-center rounded-3 shadow px-3 py-1">   
                        <i class="fa fas fa-comments mt-3"></i>
                        <p class="mt-3 fs-5 fw-bold">Feedbacks</p>

                        <?php
                        $sql = "SELECT Count(*) as user_count FROM `enquiry`";
                         
                        $result = mysqli_query($connect, $sql);
                        
                        if($result){
                            $row = mysqli_fetch_assoc($result);
                            $user_count = $row['user_count'];

                            echo"<p class='fs-3 fw-bold'>$user_count</p>";
                        }
                        ?>
                    </div>
                    <div class="col-lg-3 col-sm-3 icon text-center rounded-3 shadow px-3 py-1">
                        <i class="fa fas fa-users mt-3"></i>
                        <p class="mt-3 fs-5 fw-bold">Subscribers</p>

                        <?php
                        $sql = "SELECT Count(*) as subscriber_list FROM `newsletter`";
                        $result = mysqli_query($connect, $sql);

                        if($result){
                            $row = mysqli_fetch_assoc($result);

                            $subscriber = $row['subscriber_list'];

                            echo"<p class='fs-3 fw-bold'>$subscriber</p>";
                        }
                        ?>
                    </div>
                    <div class="col-lg-3 col-sm-3 icon text-center rounded-3 shadow px-3 py-1">
                        <i class="fa fas fa-sync-alt mt-3"></i>
                        <p class="mt-3 fs-5 fw-bold">Numbers of reviews</p>
                    </div>
                </div>

                <div class="row justify-content-center table-row mt-5">
                    <div class="col-lg-11 col-sm-12">
                    <div class="table-wrapper">
                        <h5 class="fw-bold">Users feedback(s)</h5>
                        <table class="table table-striped">
                            <thead class="border">
                                <tr>
                                <th scope="col" class="border">Full Name</th>
                                <th scope="col" class="border">Company</th>
                                <th scope="col" class="border">Email</th>
                                <th scope="col" class="border">Message(s)</th>
                                <th scope="col" class="border">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php               
                                $sql = "SELECT * FROM `enquiry`";

                                $result = mysqli_query($connect, $sql);
                                if($result){
                                    while($row = mysqli_fetch_assoc($result)){
                                        $name = $row['full_name'];
                                        $company = $row['company'];
                                        $email = $row['email'];
                                        $message = $row['feedback'];
                                        
                                        echo'<tr>
                                            <td class="border">'.$name.'</td>
                                            <td class="border">'.$company.'</td>
                                            <td class="border">'.$email.'</td>
                                            <td class="border">'.$message.'</td>
                                            <td class="border">
                                            <a href="" class="btn btn-dark"><i class="fa fas fa-reply"></i>
                                            </a>
                                            </td>
                                        </tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div id="newsletter" class="row justify-content-center mt-4">
                        <div class="col-lg-11 col-sm-12">
                            <h5 class="fw-bold">Newsletter Subscriber(s)</h5>
                            <?php

                                include 'delete.php';
                                
                                if($success){
                                    echo"<p class = 'alert alert-success'>Deleted successfully</p>";
                                }
                                
                                
                                
                            ?>
                         <table class="table table-striped">
                            <thead>
                                <tr class= "border">
                                <th scope="col" class="d-none">Id</th>
                                <th scope="col">Subscriber's Email</th>
                                <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `newsletter`";
                                    $result = mysqli_query($connect,$sql);

                                    if($result){
                                        while($row = mysqli_fetch_assoc($result)){
                                            $id = $row['id'];
                                            $email = $row['email'];

                                            echo'<tr>
                                            <td class="d-none">'.$id.'</td>
                                            <td>'.$email.'</td>
                                            <td class="d-flex gap-2 justify-content-center">
                                            <button class="btn btn-dark"><i class="fa far fa-edit"></i>
                                            </button>
                                            <a href="delete.php?deleteid='.$id.'" class="btn btn-danger"><i class="fa fas fa-trash"></i>
                                            </a>
                                            </td>
                                            </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                         </table>
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