<?php include_once "menu.php"?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2>Foods on Your Search <a href="#" class="text-white">"Momo"</a></h2>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            // get page of connect 
            include_once ("config/connect.php");
            $con = connectDB();

            // get  search element
            $search =  $_POST['search'];

            // sql to get all elements you searched about it 
            $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%'";

            // excuted query 
            $res = mysqli_query($con,$sql);

            if ($res == true)
            {
                // get all element in database to show it 
                $count = mysqli_num_rows($res);

                // check if have more than on element or not 
                if ($count > 0){
                    while ($row = mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $title=  $row['title'];
                        $description=  $row['description'];
                        $image_name=  $row['image_name'];
                        $price=  $row['price'];
                        ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="images/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price"><?php echo $price; ?></p>
                                <p class="food-detail">
                                <?php echo $description; ?>
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

    <!-- social Section Ends Here -->
<?php include_once "footer.php" ?>