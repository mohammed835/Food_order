<?php 
session_start();
define("URL",'http://localhost/food-order/');
function connectDB(){
    $localhost = "localhost";
    $username = "root";
    $password = '';
    $dbname ="foodorder";

    $con = mysqli_connect($localhost,$username,$password,$dbname);

    return $con ;
}

?>