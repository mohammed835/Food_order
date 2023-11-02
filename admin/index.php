<!-- menu start  $_SESSION['login']  -->
<?php include_once "paretailes/menu.php" ?>
<!-- content section start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>

    <?php 
    // include page 
    include_once "../config/connect.php";

    // add session update 
    if(isset($_SESSION['login'])) {?>
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
        ">  
          <?php  echo $_SESSION['login']; ?>
          
        </div>

    <?php 
    unset($_SESSION['login']);

    }?>

    </div>
</div>
<!-- content section end  -->

<!-- footer section start  -->
<?php include_once "paretailes/footer.php" ?>
<!-- footer section end  -->
