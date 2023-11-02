<?php include_once "menu.php"?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            <?php
             include_once ("config/connect.php");
             $con = connectDB();

             // get var od id 
             $id = $_GET['id'];
 
             // select all data from database
             $sql = "SELECT * FROM tbl_food where id=$id";
 
            // excuted query 
            $res = mysqli_query($con,$sql);

            if ($res == true){
                // get all element in category 
                // $count = mysqli_num_rows($res);

                $row=mysqli_fetch_assoc($res);
                        
                $title = $row['title'];
                $image_name = $row['image_name'];
                $price = $row['price'];                    
                }

            ?>
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order" method=post enctype="multipart/form-data">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="images/<?php echo $image_name;?>" name='image_name' alt="<?php echo $title;?>" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3 ><?php echo $title;?></h3>
                        <p class="food-price"><?php echo $price;?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                <!-- food	price	quanatity	order_date	customer_name	customer_contact	customer_email	customer_address	total	status	 -->

                <input type="text" name="food" value="<?php echo $title;?>" class="input-responsive"  style = "display:none;">

                <input type="number" name="price_order" value="<?php echo $price;?>" class="input-responsive" style = "display:none;">

                    <div class="order-label">Full Name</div>
                    <input type="text" name="customer_name" placeholder="E.g. mo safwat" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="customer_contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="customer_email" placeholder="E.g. mo@safwat.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="customer_address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    
    <?php

    // set data to database 
    if (isset($_POST['submit'])){

        // get all detalies from form 
        $food = $_POST['food'];
        $qty = $_POST['qty'];
        $price_order = $_POST['price_order'];
        $customer_name = $_POST['customer_name'];
        $order_date = date('y-m-d h-i-s');
        $total = $qty * $price ; 
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];
        
        // set value in  sql 
        $sql = "INSERT INTO `tbl_order` (`id`, `food`, `price`, `quanatity`, `order_date`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `total`, `status`)
         VALUES (NULL, '$food', '$price_order', '$qty', '$order_date ', '$customer_name', '$customer_contact', ' $customer_email ', '$customer_address', '$total', 'yes');
            ";

        // excuted query 
        $res  = mysqli_query($con , $sql);

        if ($res == true){

            $_SESSION['order'] = "order added successfully";

            header("location:".URL."index.php");

        }

    }
    
    
    ?>

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