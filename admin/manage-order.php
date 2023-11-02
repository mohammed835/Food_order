<!-- menu section start  -->
<?php include_once "paretailes/menu.php" ?>
<!-- menu section end  -->
    
<!-- content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1>manage  order</h1>
        <table class="table" style="margin:20px;">
            <thead>
                <tr>
                    <th scope="col">food</th>
                    <th scope="col">price</th>
                    <th scope="col">quanatity</th>
                    <th scope="col">order_date</th>
                    <th scope="col">customer_name</th>
                    <th scope="col">customer_contact</th>
                    <th scope="col">customer_email</th>
                    <th scope="col">customer_address</th>
                    <th scope="col">total</th>
                    <th scope="col">customer_email</th>
                    <th scope="col">status</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                include_once "../config/connect.php";
                $con = connectDB();

                $sql = "SELECT * FROM `tbl_order`";

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
                    
                    // <!-- food	price	quanatity	order_date	customer_name	customer_contact	customer_email	customer_address	total	status	 -->
                    // get all vars from database 
                    $id = $row['id'];
                    $food = $row['food'];
                    $price = $row['price'];
                    $quanatity = $row['quanatity'];
                    $order_date = $row['order_date'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                    $total = $row['total'];
                    $status = $row['status'];
                    
                    ?>                                        
                    <tr>
                    
                        <td><?php echo $food;?></td>
                        <td><?php echo $price;?></td>
                        <td><?php echo $quanatity;?></td>
                        <td><?php echo $order_date;?></td>
                        <td><?php echo $customer_name;?></td>
                        <td><?php echo $customer_contact;?></td>
                        <td><?php echo $customer_email;?></td>
                        <td><?php echo $customer_address;?></td>
                        <td><?php echo $total;?></td>
                        <td><?php echo $status;?></td>
                        <td>
                                <a href="#" class='btn-pramiry'>update</a>
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
