<?php include('partials/menu.php') ?>
<html>
    <head>
        <title>Food Order Website - Home Page</title>
        <link rel="stylesheet" href="css/admin.css">
    </head>

    <body>

     <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>DASHBOAD</h1>
                
                <?php
    if(isset($_SESSION['login']))
    {
        echo $_SESSION['login'];
        
    }
    else
    {
        header('location:login.php');
    }
    
    ?>
                
                <div class="col-4 text-center">
                    <?php
                        $sql = "SELECT * From category";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h1><?php  echo $count?></h1>
                    <br>
                    categories
                </div>
                <div class="col-4 text-center">
                    <?php
                        $sql = "SELECT * From brand";
                        $res = mysqli_query($conn,$sql);
                        $count = mysqli_num_rows($res);
                    ?>
                    <h1><?php  echo $count?></h1>
                    <br>
                    Brands
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql1 = "SELECT * From product";
                        $res1 = mysqli_query($conn,$sql1);
                        $count1 = mysqli_num_rows($res1);
                    ?>
                    <h1><?php  echo $count1?></h1>
                    <br>
                    Products
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql2 = "SELECT * From order1";
                        $res2 = mysqli_query($conn,$sql2);
                        $count2 = mysqli_num_rows($res2);
                        
                    ?>
                    <h1><?php  echo $count2?></h1>
                    <br>
                    Total Order
                </div>
                <div class="col-4 text-center">
                <?php
                        $sql3 = "SELECT SUM(subtotal) AS Total FROM order1 WHERE status ='Delivered' ";
                        $res3 = mysqli_query($conn,$sql3);
                       $row3 = mysqli_fetch_assoc($res3);
                       
                        
                        $total_rev = $row3['Total'];
                       
                        
                    ?>
                    <h1><?php  echo $total_rev?></h1>
                    <br>
                    Revenue Generated
                </div>
                <div class="clearfix"></div>
                
            </div>    
        </div>
        <!-- Menu Content Section End -->

       <?php include('partials/footer.php') ?>
    </body>
</html>