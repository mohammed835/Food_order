<!-- menu section start  -->
<?php include_once "paretailes/menu.php" ?>
<!-- menu section end  -->

<!-- content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1>manage food</h1>
        <?php
        // include connect function
    include_once "../config/connect.php";
    // put contact  function to var 
    $con = connectDB();
    // start session 
         if(isset($_SESSION['add_food'])) {?>
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
                "> <?php ?>
             <?php  echo $_SESSION['add_food']; ?>
         </div>
      <?php 
      unset($_SESSION['add_food']);
        }

        // end session 
        if(isset($_SESSION['update_food'])) {?>
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
                "> <?php ?>
             <?php  echo $_SESSION['update_food']; ?>
         </div>
      <?php 
      unset($_SESSION['update_food']);
        }

      ?>
        <a href="add-food.php" class =btn-primary>add food</a>
    <!-- start table  -->
    <!-- id	title	description	price	image_name	category_id	feature	active	-->
        <table class="table" style="margin:20px;">
            <thead>
                <tr>
                    <th scope="col">title</th>
                    <th scope="col">description</th>
                    <th scope="col">price</th>
                    <th scope="col">image_name</th>
                    <th scope="col">category_id</th>
                    <th scope="col">feature</th>
                    <th scope="col">active</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
            <?php 

                $sql = "SELECT * FROM `tbl_food`";

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
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $category_id = $row['category_id'];
                    $feature = $row['feature'];
                    $active = $row['active'];?>
                                        
                    <tr>
                    
                        <td><?php echo $title;?></td>
                        <td><?php echo $description;?></td>
                        <td><?php echo $price;?></td>
                        <td><img src="../images/<?php echo $image_name;?>" width=100px height=100px alt="image"></td>
                        <td><?php echo $category_id;?></td>
                        <td><?php echo $feature;?></td>
                        <td><?php echo $active;?></td>
                        <td>
                                <a href="update-food.php?id=<?php echo $id;?>" class='btn-pramiry'>update</a>
                                <a href="delete-food.php?id=<?php echo$id; ?>" class='btn-danger'>delete</a>
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

<!-- footer section end  -->
