
<!-- menu start  $_SESSION['login']  -->
<?php include_once "paretailes/menu.php" ?>

<!-- content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>

        <form action="" method=post enctype="multipart/form-data"
        style = "   padding: 20px;
                    margin: 10px;
                    text-align: center;
                    background-color: #fff;">

        <!--title	description	price	image_name	category_id	feature	active   m-->
            <input type="text" name="title" placeholder= 'Enter title'  placeholder='title'
            style = "   margin: 10px;
                        padding: 10px;
                        width: 40%;
                        border-radius: 15%;
                        font-weight: bold;"><br>
            <input type='number' placeholder='price' style = "
                                               
                                                padding: 10px;
                                                width: 40%;
                                                border-radius: 15%;
                                                font-weight: bold;"
                                        name=price ><br>
            <textarea name='description' placeholder='description' 
                                            style = "
                                                margin :5px;
                                                padding: 10px;
                                                width: 40%;
                                                border-radius: 15%;
                                                font-weight: bold;"></textarea>    
            <br>
            <label> image :    </label>
            <input type='file' name ='image'><br>

            <label for="">category  :</label>
            <select name="category">
                <?php 
                // include page of connect
                include_once "../config/connect.php";
                $con = connectDB();

                // get data from database if active='yes' 
                $sql = "SELECT * FROM tbl_category WHERE active='yes'";

                // excuted query 
                $res = mysqli_query($con,$sql);

                if ($res == true){

                    // get all category 
                    $count = mysqli_num_rows($res);
                    if ($count > 0){
                        while($row = mysqli_fetch_assoc($res)){

                            $id = $row['id'];
                            $title = $row['title'];
                            echo $title ;
                            ?>
                            <option value="<?php echo  $id;?>"><?php echo $title;?></option>
                         <?php }
                    }
                }
                ?>
            </select>

            <label for="">feature  :</label>
            <input type="radio" name="feature" value = 'yes'>yes
            <input type="radio" name="feature" value = 'no'>no
            <br>

            <label for="">active     : </label>
            <input type="radio" name="active" value = 'yes'>yes
            <input type="radio" name="active" value = 'no'>no
            <br>
            <input type="submit" value="submit" name="submit" 
            style = "   margin: 30px;
                        padding: 10px;
                        width: 20%;
                        border-radius: 15%;
                        font-weight: bold;" class="btn-primary">
        </form>

    <?php 

    if (isset($_POST['submit'])){

        // get all elements
        $title  = $_POST['title'];
        $price  = $_POST['price'];
        $description  = $_POST['description'];
        $category  = $_POST['category'];

        if ($_FILES['image']['name']){

            $image_name =  $_FILES['image']['name']; 
        }else {
            $image_name ='';
        }
        if (isset($_POST['feature'])){
            $feature = $_POST['feature'];

        }else {
            $feature = '';
        }
        if (isset($_POST['active'])){
            $active = $_POST['active'];

        }else {
            $active = '';
        }

        //  <!-- title,description,price,image_name,category_id,feature,active   m-->
        $sql = "INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `feature`, `active`)
         VALUES (NULL, '$title', '$description', '$price', '$image_name', '$category', '$feature', '$active');
        ";

        // excuted query 
        $res = mysqli_query($con,$sql);

        if ($res == true){

            $_SESSION['add_food']= "food added successfully";

            header("location:".URL."admin/manage-food.php");
           
        }

       

    }
    ?>


    </div>
</div>
<!-- content section end  -->

<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>
<!-- footer section end  -->