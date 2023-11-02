
<!-- menu start  $_SESSION['login']  -->
<?php include_once "paretailes/menu.php" ?>

<!-- content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1>add category</h1>

        <form action="" method=post enctype="multipart/form-data"
        style = "   padding: 20px;
                    margin: 10px;
                    text-align: center;
                    background-color: #fff;">

        <!-- id	title	image_name	feature	active     m-->
            <input type="text" name="title" placeholder= 'Enter title' 
            style = "   margin: 30px;
                        padding: 10px;
                        width: 40%;
                        border-radius: 15%;
                        font-weight: bold;">
            <br>
            <label> image :    </label>
            <input type='file' name ='image'><br>
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
    // include page of connect
    include_once "../config/connect.php";
    $con = connectDB();

    if (isset($_POST['submit'])){
        // get title
        $title =    $_POST['title'];

        // get feature 
        if (isset($_POST['feature'])){
            $feature = $_POST['feature'];
        }else  {
            $feature = 'no';
        }

        // get active 
        if (isset($_POST['active'])){
            $active = $_POST['active'];
        }else  {
            $active = 'no';
        }

        // check if the image is selected or not
        if (isset($_FILES['image']['name'])){

            // to upload file 
            $image_name = $_FILES['image']['name'];

            $source_path = $_FILES['image']['tmp_name'];

            $destanation_path ="../images"."$image_name";

            $upload = move_uploaded_file($source_path,$destanation_path);

            if ($upload == false){

                $session_upload = $_SESSION['falied to upload image'];

                header("location:".URL."admin/manage-category.php");

            }

        }else {
            $image_name = '';
        }


        echo "$image_name";
        // set values to database 
        $sql = "INSERT INTO tbl_category SET 
        title = '$title',
        image_name = '$image_name',
        feature ='$feature',
        active = '$feature'
        ";


        // excuted query 
        $res = mysqli_query($con,$sql);

        if ($res == true){
            $_SESSION['add'] = "category successfully";

            header("location:".URL."admin/manage-category.php");
        }

        

    }
    else {
        echo "there is problem";
    }
    
    
    
    
    ?>


    </div>
</div>
<!-- content section end  -->

<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>
<!-- footer section end  -->
