<?php include_once "menu.php"?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

                         <!-- get data to show it in page  -->
                         <?php 
                         include_once ("config/connect.php");
                         $con = connectDB();
             

        // select all data from database
        $sql = "SELECT * FROM tbl_food where active='yes' AND feature='yes'";

        // excuted query 
        $res = mysqli_query($con,$sql);

        if ($res == true){
            // get all element in category 
            $count = mysqli_num_rows($res);

            if ($count > 0){ 
                while($row=mysqli_fetch_assoc($res)){
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

                    <a href="order.php" class="btn btn-primary">Order Now</a>
                </div>
        </div>

    <?php
        }
    }
}



?>

          


            <div class="clearfix"></div>

            

        </div>

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