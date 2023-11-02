<?php 

include_once "../config/connect.php";
$con =connectDB();
$id = $_GET['id'];
$sql = "DELETE FROM tbl_admin WHERE `tbl_admin`.`id` = $id";

$res  = mysqli_query($con,$sql); 

if ($res == true) {

    // delete element from database ; 
    $_SESSION['delete'] = "deleted successfully";

    header("location:".URL.'admin/manage-admin.php');
}

?>