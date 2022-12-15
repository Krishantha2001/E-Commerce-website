

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
    
</head>
<body>
    <!--Header-->
    
        <div class="container">
        <?php include('partials-front/navbar.php')?>
        <?php 

if(!isset($_SESSION['id']))
{
    header('location:Account.php');
    
}

?>
    
    </div>

    <!-- My Account -->
    <div class="profile">
        <div class="small-container">
            <div class="row3">
                
            <div class="items">
            <a href="Profile.php" ><div id="" class="item">Overview</div></a>
            <a href="profilehis.php"><div id="item" class="item">Purchese History</div></a>
            <a href="Profiletra.php"><div id="" class="item">Order Tracking </div></a>
            
        </div>
                    <?php
                    $image= $_SESSION['image_name'];
                    $first = $_SESSION['first_name'] ;
                    $last = $_SESSION['last_name'] ; 
                    
                    ?>
                <div class="row4">
                    <div class="col-7 c">
                        <img src="<?php echo 'images/users/'.trim($image);?>" alt="">
                        <h3><?php echo $first.' '.$last?></h3>
                        
                    </div>
                    <div class="profile">
                        <h3>Purchese History</h3>
                        <hr>
                        
        <!--------cart item------->
        <div class="small-container cart-page">
        <?php 
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM order1 WHERE userid = '$id' ORDER BY id DESC";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);

                if ($count > 0) 
                {
                    ?>
                    <table border="1">
                        <tr>
                            <th>Product</th>
                            <th>Order Date</th>
                            <th>Subtotal</th>
                        </tr>
                        <?php
                        while($row= mysqli_fetch_assoc($res))
                        {
                            $proid = $row['productid'];
                            $date = $row['date'];
                            $subtotal = $row['subtotal'];
                            $sql2 = "SELECT * FROM product WHERE id = '$proid'";
                            $res2 = mysqli_query($conn,$sql2);
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                $image = $row2['image_name1'];
                                $title = $row2['title'];
                                $price = $row2['price'];
                                ?>
                                 <tr>
                                    <td>
                                        <div class="cart-info">
                                        <a href="product-details.php?id=<?php echo $proid?>"><img src="<?php echo SITEURL; ?>images/product/<?php echo $image?>"></a>
        
                                            <div class="">
                                                <p><?php echo $title;?></p>
                                                <small>Price: Rs.<?php echo $price;?></small>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo $date?></td>
                                    <td>Rs.<?php echo $subtotal?></td>
                                </tr>
        
        
                                <?php
                            }
                        }
                        
                        ?>
                    </table>
                    <?php

                } else 
                {
                    echo "<div class='col-3'><h1 Style=text-align:center>NO Purchase History</h1></div>";
                }

                ?>
                

            
        </div>
                    </div>


                
            </div>
        </div>
    </div>

    

       
</div>   
    <!----------Footer--------->
    <?php include('partials-front/footer.php')?>

    


<!--js for menu toggle-->
<script>
    var MenuItem = document.getElementById("MenuItem");
    MenuItem.style.maxHeight="0px";

    function menutoggle(){
        if(MenuItem.style.maxHeight=="0px"){
            MenuItem.style.maxHeight="200px";
        }
        else{
            MenuItem.style.maxHeight="0px";
        }
    }

</script>
</body>
</html>