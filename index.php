<?php include_once "menu.php"?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
<?php 

        include_once ("config/connect.php");

        if(isset($_SESSION['order'])) {?>
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
        "> <?php  echo $_SESSION['order']; ?></div>

    <?php 
    unset($_SESSION['order']);

    }
    ?>


            <!-- get data to show it in page  -->
            <?php 
            $con = connectDB();

            // select all data from database
            $sql = "SELECT * FROM tbl_category where active='yes'";

            // excuted query 
            $res = mysqli_query($con,$sql);

            if ($res == true){
                // get all element in category 
                $count = mysqli_num_rows($res);

                if ($count > 0){ 
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                          <a href="category-foods.php?id=<?php echo $id;?>">
                          <div class="box-3 float-container">
                         <img src="images/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                         <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
            </a>

                <?php
                    }
                }
            }


            
            ?>

          

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

             <!-- get data to show it in page  -->
             <?php 

            // select all data from database
            $sql = "SELECT * FROM tbl_food where active='yes' AND feature='yes'";

            // excuted query 
            $res = mysqli_query($con,$sql);

            if ($res == true){
                // get all element in category 
                $count = mysqli_num_rows($res);

                if ($count > 0){ 
                    while($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title = $row['title'];
                        $price = $row['price'];
                        $description = $row['description'];
                        $image_name = $row['image_name'];
                        ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="images/<?php echo $image_name ; ?>" alt="<?php echo $title ; ?>" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title ; ?></h4>
                        <p class="food-price"><?php echo $price ; ?></p>
                        <p class="food-detail">
                            <?php echo $description ; ?>
                        </p>
                        <br>

                        <a href="order.php?id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                    </div>
            </div>

                <?php
                    }
                }
            }


            
            ?>

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->
<?php include_once "footer.php" ?>