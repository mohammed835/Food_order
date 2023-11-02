
<!-- menu section start  -->
<?php include_once "paretailes/menu.php" ?>
<head>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<!-- menu section end  -->
    
<!-- content section start -->
<!-- content section start -->
<div class="main-content">
    <div class="wrapper">

    <h1>Manage category</h1>
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
 if(isset($_SESSION['update_category'])) {?>
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
     <?php  echo $_SESSION['update_category']; ?>
 </div>

<?php 
unset($_SESSION['update_category']);

}
 if(isset($_SESSION['delete_category'])) {?>
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
     <?php  echo $_SESSION['delete_category']; ?>
 </div>
 <!-- update_category -->
<?php 
unset($_SESSION['delete_category']);

}
    ?>

    <!-- create button to add admin -->
    <a href="add-category.php" class =btn-primary>add category</a>
    <!-- start table  -->
    <!-- id	title	image_name	feature	active	-->
        <table class="table" style="margin:20px;">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">image_name</th>
                    <th scope="col">feature</th>
                    <th scope="col">active</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                 <?php 

                 $sql = "SELECT * FROM `tbl_category`";

                 // excuted query 
                 $res = mysqli_query($con, $sql);

                 // check of query excuted or not 
                 if ($res == true) {

                    // get count of elements in database
                    $count = mysqli_num_rows($res);

                    // check if there is data in database or not 
                    if($count > 1){

                        // loop from all element of category
                       while($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $image_name = $row['image_name'];
                        $title = $row['title'];
                        $feature = $row['feature'];
                        $active = $row['active'];?>
                        
                        <tr>
                       
                            <td><?php echo $title;?></td>
                            <td><img src="../images/<?php echo $image_name;?>" width=100px height=100px alt="image"></td>
                            <td><?php echo $feature;?></td>
                            <td><?php echo $active;?></td>
                            <td>
                                    <a href="update-category.php?id=<?php echo $id;?>" class='btn-pramiry'>update</a>
                                    <a href="delete-category.php?id=<?php echo$id; ?>" class='btn-danger'>delete</a>
                            </td>

                        </tr>

                        <?php
                    }
                    }
                 }
                
                ?>

            </tbody>
        </table>
    </div>
</div>
<!-- content section end  -->
<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>
