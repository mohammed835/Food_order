<?php 
// include page of connect
include_once "../config/connect.php";
// get funcation of connection
$con = connectDB();

// get id of element you want deleted it 
$id = $_GET['id'];

// select element from database 
$sql = "DELETE FROM tbl_food WHERE `tbl_food`.`id` = $id";

// excuted query 
$res = mysqli_query($con , $sql);

if ($res == true) {
    
    // create session to know 
    $_SESSION['delete_food'] = "deleted food successfully";

    // 
    header("location:".URL."admin/manage-food.php");
}


?>