
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
    
</head>
<body>
    <!--Header-->
    
        <div class="container">
        <?php include('partials-front/navbar.php')?>
        <?php include('partials-front/serachbar.php')?>

        <?php 

if(!isset($_GET['id']))
{
    if($_POST['id'])
    {
        $pid = $_POST['id'];
        header('location:product-details.php?id='.$pid);
    }
    
}
if(!isset($_SESSION['id']))
{
    header('location:Account.php');
}

?>
   
    </div>


    
    <!--------cart item------->
    <div class="small-container cart-page">
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php 
                if(isset($_SESSION['id']))
                {
                $userid = $_SESSION['id'];


                }
                else
                {
                    $userid = $_GET['id'];
                }
                $sql = "SELECT * FROM cart  WHERE userid = $userid ORDER BY id DESC";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                $total = 0;
                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $cartid = $row['id'];
                        $productid = $row['productid'];
                        $qty = $row['qty'];
                        $subtotal = $row['subtotal'];

                        $total = $total+$subtotal;
                        

                        $sql2 = "SELECT title,price,image_name1 FROM product WHERE id = $productid ";
                        $res2 = mysqli_query($conn,$sql2);
                        while($row2=mysqli_fetch_assoc($res2))
                        {
                            $image_name = $row2['image_name1'];
                            $title = $row2['title'];
                            $price = $row2['price'];
                            ?>
                        <tr>
                            <td>
                                <div class="cart-info">
                                <a href="product-details.php?id=<?php echo $productid?>"><img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name;?>"></a>
                                    
                                    <div class="">
                                    <p><?php echo $title;?></p>
                                        <small>Price: Rs.<?php echo $price;?></small><br>
                                        <a href="delete-cart.php?id=<?php echo $cartid?>">Remove</a>
                                    </div>
                                </div>
                            </td>
                            <td><?php echo $qty?></td>
                            <td>Rs.<?php echo $subtotal; ?></td>
                        </tr>

                        <?php

                        }
                        
                    }
                }
            ?>

            <?php 
            
            if(isset($_POST['id']))
            {
                $id = $_POST['id'];
                $qty = $_POST['qty'];
                $price = $_POST['price'];
                $subtotal = $qty*$price;
                $sql3 = "INSERT INTO cart SET
                productid = '$id',
                userid = '$userid',
                qty = '$qty',
                subtotal ='$subtotal'
                ";
                $res3 = mysqli_query($conn,$sql3);
                
                
                

            }
            ?>
            
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>Total</td>
                    <td>Rs.<?php echo $total;?>.00</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="place-order"><a href="Checkout.php?total=<?php echo $total?>">Place order</a></td>
                </tr>
            </table>
            
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