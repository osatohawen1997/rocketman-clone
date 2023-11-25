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

<?php
    $old_error = 0;
    $new_error = 0;
    $c_error = 0;
    $match = 0;
    $error = 0;


    if(isset($_POST['old']) && isset($_POST['new']) && isset($_POST['cpassword'])){

        $old = $_POST['old'];
        $new = $_POST['new'];
        $cpassword = $_POST['cpassword'];

        if(empty($_POST['old'])){
            $old_error = 1;
        }elseif(empty($_POST['new'])){
            $new_error = 1;
        }elseif($new !== $cpassword){
            $c_error = 1;
        }else{

            $old = md5($old);
            $new = md5($new);
            $id = $_SESSION['id'];

            $sql = "SELECT `password` FROM `admin` WHERE (`id`, `password`) = ('$id', '$old')";

            $result = mysqli_query($connect, $sql);

            if(mysqli_num_rows($result) === 1){
                $sql_2 = "UPDATE `admin` SET `password` = '$new' WHERE `id` = '$id'";

                $result_2 = mysqli_query($connect,$sql_2);
                if($result_2){
                    $match = 1;
                }
                
            }else{
                $error = 1;
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&family=PT+Sans&family=Poppins:wght@300;400;600&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <!-- Bootstrap link -->
    <link href="../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/edit.css">

    <title>Admin dashboard</title>
</head>
<body>

    <nav class="navbar bg-dark navbar-expand-lg">
        <div class="container-fluid">
          <button type="button" class="btn d-none"><i class="fa fas fa-ellipsis-v sidebar-btn text-light fs-3"></i></button>

          <a class="navbar-brand m-auto text-light" href="dashboard.php">ADMIN DASHBOARD</a>
          
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

    <div class="wrapper border d-flex">
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
                <div class="row py-5 form-row justify-content-center">
                    <h3 class="text-center">Change Password</h3>
                    <div class="col-md-8">
                        <div class="form-wrapper rounded-3 shadow px-5 py-5 mt-3">
                            <?php
                            if($old_error){
                                echo"<div class='alert alert-danger'><i class='fa fa-times-circle'></i> Old password is required</div>";
                            }
                            ?>

                            <?php
                            if($new_error){
                                echo"<div class='alert alert-danger'><i class='fa fa-times-circle'></i> New password is required</div>";
                            }
                            ?>

                            <?php
                            if($c_error){
                                echo"<div class='alert alert-danger'><i class='fa fa-times-circle'></i> Confirmed password doesn't match</div>";
                            }
                            ?>

                            <?php
                            if($match){
                                echo"<div class='alert alert-success'><i class='fa fa-check-circle'></i> Password has successfully changed</div>";
                            }
                            ?>

                            <?php
                            if($error){
                                echo"<div class='alert alert-danger'><i class='fa fa-times-circle'></i> Incorrect Password</div>";
                            }
                            ?>
                            <form method="post" class="text-center">
                                <input type="password" class="mb-4 form-control rounded" autocomplete="off" name="old" placeholder="Enter Old Password">
                                
                                <input type="password" class="mb-4 form-control rounded" autocomplete="off" name="new" placeholder="Enter New Password">

                                <input type="password" class="mb-4 form-control rounded" autocomplete="off" name="cpassword" placeholder="Confirm New Password">

                                <button type="submit" class="btn submit-btn text-center text-light rounded-0 px-3 py-2">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="dashboard.php" class="text-decoration-none text-dark"><i class="fa fas fa-home"></i> 
                        Back to dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    



    <!-- Bootstrap JS -->
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>