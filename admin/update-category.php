<?php

// include page of connect
include_once "../config/connect.php";
// get funcation of connection
$con = connectDB();

// get id of element you want update it 
$id = $_GET['id'];

if(isset($id)){
    $sql = "SELECT * FROM `tbl_category` where id =$id";

    $res = mysqli_query($con,$sql);

    if ($res == true){

        // get the element 
        $count = mysqli_num_rows($res);

        // check if count have one elemnt only
        if($count == 1){

            $row = mysqli_fetch_assoc($res);

            // get all vars 
            $title = $row['title'];
            $image_name = $row['image_name'];
            $feature = $row['feature'];
            $active = $row['active'];
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
                margin: 5px;"> update category</h1>


        <form action="" method=post enctype="multipart/form-data"
        style = "   padding: 20px;
                    margin: 10px;
                    text-align: center;
                    background-color: #fff;">

        <!-- id	title	image_name	feature	active     m-->
            <input type="text" name="title" value= <?php echo $title; ?> placeholder= 'Enter title' 
            style = "   margin: 30px;
                        padding: 10px;
                        width: 40%;
                        border-radius: 15%;
                        font-weight: bold;">
            <br>
            <label> image :    </label>
            <input type='file' name ='image'><br>
            <label for="">feature  :</label>
            <input type="radio" name="feature" value = 'yes' <?php if($feature== "yes"){echo "checked";} ?> >yes
            <input type="radio" name="feature" value = 'no'  <?php if($feature== "no"){echo "checked";} ?>>no
            <br>
            <label for="">active     : </label>
            <input type="radio" name="active" value = 'yes'  <?php if($active== "yes"){echo "checked";} ?>>yes
            <input type="radio" name="active" value = 'no' <?php if($active== "no"){echo "checked";} ?>>no
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
            $title = $_POST['title'];
            $image_name = $_POST['image'];
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
            $sql = "UPDATE tbl_category SET
             title ='$title', 
             image_name ='$image_name', 
             feature ='$feature', 
             active ='$active' WHERE id = $id 
             ";

            $res = mysqli_query($con,$sql);

             if ($res == true) {
                    $_SESSION['update_category']='updated category successfully';
    
                    header("location:".URL."admin/manage-category.php");
                
             }
        }
        
        ?>
    </div>
</div>
<!-- content section end  -->

<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>
<!-- footer section end  -->
