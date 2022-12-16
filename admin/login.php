<?php include('../confing/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<div class="login">
    <h1 class="text-center">Login</h1><br>
    <?php
    ?><br><br>
    <form action="" method="POST" class="text-center">
        Username:<br>
        <input type="text" name="username" placeholder="Enter Username"><br><br>
        Password:<br>
        <input type="password" name="password" placeholder="Enter Password"><br><br>
        <input type="submit" name="submit" value="Login" class="btn-primary"><br>
    </form><br>
    <p class="text-center">Created By - B.M.K.B Somarathna</p>

</div>

    
</body>
</html>
<?php

if(isset($_POST['submit']))
{
    echo $user = $_POST['username'];
    echo $pass = md5(md5($_POST['password']));

    $sql = "SELECT * FROM admin WHERE username='$user' AND password = '$pass'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);
    if($count==1)
    {
        $_SESSION['login'] = "<div class='success text-center'>LOGIN SUCCESSFUL</div>";
        header('location:'.SITEURL.'admin/');

    }
    else
    {
        $_SESSION['login'] = "<div class='error text-center'>LOGIN FAILED!</div>";
        header('location:'.SITEURL.'admin/login.php');


    }

}

?>