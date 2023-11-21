<?php
include '../connect.php';

$success = 0;

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM `newsletter` WHERE id = $id";
    $result = mysqli_query($connect,$sql);
    if($result){
        $success = 1;
        header("location: dashboard.php");
    }else{
        die(mysqli_error($connect));
    }
}

?>