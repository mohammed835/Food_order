<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<!-- menu section start  -->
    <?php 
    include_once "paretailes/menu.php"; 

    // include connect function
    include_once "../config/connect.php";
    // put contact  function to var 
    $con = connectDB();
    
    ?>
    
<!-- menu section end   -->
    
<!-- content section start -->
<div class="main-content">
    <div class="wrapper">
    <form class='add_admin' action="" method=post>
        <h1>update Admin</h1>
        <div style="background:#f00;">
            <?php
                // add update data to database 
                if(isset($_POST['submit'])){

                    // get all var to update it 
                    $id = $_GET['id'];
                    $fullname = $_POST['full_name'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // sql to update data 
                    $sql = "UPDATE `tbl_admin` SET `full_name` = '$fullname', 
                    `username` = '$username', `password` = '$password' WHERE `tbl_admin`.`id` = $id;
                    ";

                    // query to excute 
                    $res = mysqli_query($con,$sql);

                    // check if excute finished successfully or not 
                    if ($res == true){

                       // create session to show user data is added successfully 
                       $_SESSION['update_admin'] = "updated successfully";

                       header("location:".URL."admin/manage-admin.php");
                    }
                    
                }else {
                    echo "there is problem here";
                }

            ?>

        </div>

        <!-- full_name	username	password -->
        <?php 

        

        $id = $_GET['id'];

        // get all data which id = id you are clicked it 
        $sql = "SELECT * FROM `tbl_admin` WHERE id = $id";

        // sql query 
        $res = mysqli_query($con, $sql);

        // 
        if($res == true){
            $count = mysqli_num_rows($res);

            if($count == 1){
                $row = mysqli_fetch_assoc($res);
                $id = $row['id'];
                $full_name = $row['full_name'];
                $username = $row['username'];
                $password = $row['password'];
               
            }
            
        }

        
        ?>
            <input type="text" name=id  value =<?php echo $id; ?> style="display:none;" >
            <input type="text" name="full_name" value =<?php echo $full_name; ?> placeholder= 'Enter full name'>
            <input type="text" name="username" value =<?php echo $username; ?> placeholder='Enter username'>
            <input type="password" name="password" value =<?php echo $password; ?> placeholder='Enter password'>
            <input type="submit" class="btn-primary" value="submit" name="submit">
    </form>
    </div>
</div>

<!-- content section end  -->


<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>