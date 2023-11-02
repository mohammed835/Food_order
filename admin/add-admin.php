<!-- start menu  -->
<?php include_once "paretailes/menu.php" ?>

<!-- start main contant  -->
<div class="main-content">
    <div class="wrapper">
        <form class='add_admin' action="" method=post>
        <!-- full_name	username	password -->
            <input type="text" name="full_name" placeholder= 'Enter full name'>
            <input type="text" name="username" placeholder='Enter username'>
            <input type="password" name="password" placeholder='Enter password'>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
</div>

<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>


<?php 
// connect with database 
include_once "../config/connect.php";
$con = connectDB();

// check the submit button is clicked or not 
if (isset( $_POST['submit'])) {
    // define the var
    $fullname = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //added data to mysql 
    $sql = "INSERT INTO `tbl_admin` (`full_name`, `username`, `password`) 
    VALUES ('$fullname', '$username ', '$password');
    ";

    // add data to database 
    $res = mysqli_query($con,$sql) or die(mysqli_error());
   
    if($res == true) {
        $_SESSION['add'] = "Data is added successfully";

        header("location:".URL.'admin/manage-admin.php');

    }else {
        $_SESSION['add'] = "Data is added failed";

        header("location:".URL.'admin/add-admin.php');
    }
    
}else {
    echo "you are not clicked";
}