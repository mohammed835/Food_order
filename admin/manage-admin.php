<head>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<!-- menu section start  -->
    <?php include_once "paretailes/menu.php" ?>
    
<!-- menu section end   -->
    
<!-- content section start -->
<div class="main-content">
    <div class="wrapper">

    <h1>Manage Admin</h1>
    <?php 
    // include connect function
    include_once "../config/connect.php";
    // put contact  function to var 
    $con = connectDB();
    
    if(isset($_SESSION['add'])) {?>
       <div
         style="
            background: #c62c2cd1;
            padding: 10px;
            font-weight: bold;
            width: 20%;
            color: fff;
            margin: 20px;
            border-radius: 15%;
            text-align: center;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #333;
        "> 
        <?php  echo $_SESSION['add']; ?>
    </div>

   <?php 
   unset($_SESSION['add']);
   
}
    if(isset($_SESSION['delete'])) {?>
        <div
         style="
            background: #c62c2cd1;
            padding: 10px;
            font-weight: bold;
            width: 20%;
            color: fff;
            margin: 20px;
            border-radius: 15%;
            text-align: center;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #333;
        "> 
        <?php  echo $_SESSION['delete']; ?>
       </div>

    <?php 
    unset($_SESSION['delete']);

    }
     
    // add session update 
    if(isset($_SESSION['update_admin'])) {?>
        <div
         style="
            background: #c62c2cd1;
            padding: 10px;
            font-weight: bold;
            width: 20%;
            color: fff;
            margin: 20px;
            border-radius: 15%;
            text-align: center;
            color: #fff;
            font-weight: bold;
            padding: 10px;
            border: 1px solid #333;
        "> <?php  echo $_SESSION['update_admin']; ?></div>

    <?php 
    unset($_SESSION['update_admin']);

    }
    
    ?>

    <!-- create button to add admin -->
    <a href="add-admin.php" class =btn-primary>add admin</a>
    <!-- start table  -->
    <!-- id	full_name	username	password -->
        <table class="table" style="margin:20px;">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">full_name</th>
                    <th scope="col">username</th>
                    <th scope="col">actions</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                // get connect function 
                $con = connectDB();

                // get all data from database 
                $sql = "SELECT * FROM tbl_admin";

                // sql query 
                $res = mysqli_query($con,$sql);

                if ($res ==  true){

                    // get all data from database 
                    $count = mysqli_num_rows($res);

                    if($count > 0){
                        while($row = mysqli_fetch_assoc($res)){ 
                            $id = $row['id'];
                            $full_name = $row['full_name'];
                            $username =   $row['username'];
                            ?>

                            <!-- put all data which found database in data index php   -->
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="update-admin.php?id=<?php echo $id;?>" class='btn-pramiry'>update</a>
                                    <a href="delete-admin.php?id=<?php echo$id; ?>" class='btn-danger'>delete</a>
                                </td>


                            </tr>
                      <?php  }

                    }
                    
                }?>
            </tbody>
        </table>
    </div>
</div>

<!-- content section end  -->

<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>
