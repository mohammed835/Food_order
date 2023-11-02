<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="login.css" >
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    <div class="login">
        <h1>Login Page</h1>
        <form action="" method="post">
            <input type="text" name="username" id="" placeholder='Enter username'>
            <input type="password" name="password" id="" placeholder='Enter password'>
            <input type="submit" name='submit' class='btn-primary' value="submit">
        </form>
    </div>
    
</body>
</html>

<?php 

if (isset($_POST['submit'])){
    // include connect function
 include_once "../config/connect.php";

 // put contact  function to var 
 $con = connectDB();
    // get vars
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check in database if that person is admin here or not 
    
    $sql = "SELECT * FROM tbl_admin WHERE username= '$username' and `password` ='$password'";

    // query to excuted 
    $res = mysqli_query($con,$sql);

    //count rows to check if user is exists or not 
    $count = mysqli_num_rows($res);

    // check if exists or not 
    if ($count == 1){

        $row = mysqli_fetch_assoc($res);

        if ($row['username'] == $username and $row['password'] == $password){

            $_SESSION['login'] = "login successfully , $username";

            header("location:".URL."admin");
        }

    }
    else {
        echo "you are not admin here";
    }


}

?>