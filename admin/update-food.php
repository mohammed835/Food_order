<?php

// include page of connect
include_once "../config/connect.php";
// get funcation of connection
$con = connectDB();

// get id of element you want update it 
$id = $_GET['id'];

if(isset($id)){
    $sql = "SELECT * FROM `tbl_food` where id =$id";

    $res = mysqli_query($con,$sql);

    if ($res == true){

        // get the element 
        $count = mysqli_num_rows($res);

        // check if count have one elemnt only title	
        if($count == 1){

            $row = mysqli_fetch_assoc($res);

            // get all vars 
            $title = $row['title'];
            $description = $row['description'];
            $price = $row['price'];
            $image_name = $row['image_name'];
            $category_id = $row['category_id'];
            $feature = $row['feature'];
            $active = $row['active'];
            echo $id;
        }
    }
}
?>

<!-- menu start  $_SESSION['login']  -->
<?php include_once "paretailes/menu.php" ?>

<!-- content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1 style="
                color: #6d06a2;
                text-transform: capitalize;
                text-decoration: underline;
                margin: 5px;"> update food</h1>


<form action="" method=post enctype="multipart/form-data"
        style = "   padding: 20px;
                    margin: 10px;
                    text-align: center;
                    background-color: #fff;">

        <!--title	description	price	image_name	category_id	feature	active   m-->
            <input type="text" name="title"  value="<?php echo $title;?>"
            style = "   margin: 10px;
                        padding: 10px;
                        width: 40%;
                        border-radius: 15%;
                        font-weight: bold;"><br>
            <input type='number' value="<?php echo $price;?>"  style = "
                                                padding: 10px;
                                                width: 40%;
                                                border-radius: 15%;
                                                font-weight: bold;"
                                        name=price ><br>
            <textarea name='description' value="<?php echo $description;?>"
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
                            ?>
                            <option value="<?php echo  $id;?>"><?php echo $title;?></option>
                         <?php }
                    }
                }
                ?>
            </select>

            <label for="">feature  :</label>
            <input type="radio" <?php if($feature =='yes'){echo 'checked';} ?> name="feature" value = 'yes'>yes
            <input type="radio" <?php if($feature =='no'){echo 'checked';} ?> name="feature" value = 'no'>no
            <br>

            <label for="">active     : </label>
            <input type="radio" <?php if($active =='yes'){echo 'checked';} ?> name="active" value = 'yes'>yes
            <input type="radio" <?php if($active =='no'){echo 'checked';} ?> name="active" value = 'no'>no
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

            // get all new vars 
            $id = $_GET['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $image_name = $_POST['image'];
            $category = $_POST['category'];
            $feature = $_POST['feature'];
            $active = $_POST['active'];
            if (isset($_FILES['image']['name'])){

                // to upload file 
                $image_name = $_FILES['image']['name'];
    
                $source_path = $_FILES['image']['tmp_name'];
    
                $destanation_path ="../images"."$image_name";
    
                $upload = move_uploaded_file($source_path,$destanation_path);
    
                if ($upload == false){
    
                    $session_upload = $_SESSION['falied to upload image'];
    
                    // header("location:".URL."admin/manage-category.php");
    
                }
    
            }else {
                $image_name = '';
            }

            // set new value in database
            $sql = "UPDATE tbl_food 
            SET
                         title ='$title', 
                         description ='$description', 
                         price =$price, 
                         image_name ='$image_name', 
                         category_id= $category, 
                         feature ='$feature', 
                         active ='$active' WHERE id =$id;
             ";

            $res = mysqli_query($con,$sql);

             if ($res == true) {
                    $_SESSION['update_food']='updated food successfully';
    
                    header("location:http://localhost/food-order/admin/manage-food.php");
             }
        }
        
        ?>
    </div>
</div>
<!-- content section end  -->

<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>
<!-- footer section end  -->
