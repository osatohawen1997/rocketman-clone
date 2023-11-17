<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'rocketman';

$connect = mysqli_connect($hostname, $username, $password, $database);

if(!$connect){
    die(msqli_error($connect));
}

?>