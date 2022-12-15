<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    
        <div class="container">
        <?php include('partials-front/navbar.php')?>

        </div>
    
    <!-- Checkout page -->
    <div class="checkout">
    <div class="small-container">
        <div class="row2">
            <div class="bill-form">
                <h3>Billing details</h3>
                <hr>
                <?php 
                    $userid = $_SESSION['id'];
                    $sql2="SELECT * FROM user WHERE id = '$userid'";
                    $res2=mysqli_query($conn,$sql2);

                    $row2= mysqli_fetch_assoc($res2);
                    $first = $row2['first_name']; 
                    $last = $row2['last_name'];
                    $current_image = $row2['image_name'];
                    $company_name = $row2['company_name'];
                    $country_name = $row2['country'];
                    $housenum = $row2['house_number'];
                    $apart = $row2['apartment'];
                    $twon_name = $row2['twon'];
                    $post = $row2['postcode'];
                    $phones =$row2['phone'];
                    $email = $row2['email'];
                    $_SESSION['first_name'] = $first;
                    $_SESSION['last_name'] = $last;
                    ?>
                <form id="form1" name="form1" method="post" action="proupdate.php" enctype="multipart/form-data">
                        
                        <div class="name">
                            <div class="first">
                            <h4 >First name</h4><br><input type="text" name="fname" required value="<?php echo $first;?>">
                            </div>
                            <div class="last">
                            <h4>Last name</h4><br><input type="text" name="lname" required value="<?php echo $last?>">
                            </div>
                        </div>
                        <h4>Company name (optional)</h4><br><input type="text" name="company" placeholder="Company Name" value="<?php echo trim($company_name);?>">
                        <h4>Country / Region</h4><br>
                        <input name="country" id="" value="<?php echo $country_name;?>">
                            
                        <h4>Street address</h4><br><input type="text" name="housenumber" placeholder="House number and street name" value="<?php echo trim($housenum);?>">
                        <br>
                        <input type="text" name="apartment" placeholder="Apartment,suite,unit.etc.(optional)" value="<?php echo trim($apart);?>">
                        
                        <h4>Twon/City (optional)</h4><br><input type="text" name="twon" placeholder="City" value="<?php echo $twon_name;?>">
                        <h4>Postcode</h4><br><input type="text" name="postcode" placeholder="" required value="<?php echo trim($post);?>"> 
                        <h4>Phone</h4><br><input type="tel" name="phone" placeholder="" required value="<?php echo trim($phones);?>">
                        <br>
                        

                        

                          
                        <h4>Email</h4><br><input type="email" placeholder="" name="email" required value="<?php echo trim($email);?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image ?>">

                        <button class="btn2 " name="submit" type="submit" >Update</button>
                        <input type="file"  name="image" class="file btn2"  >
                        
                
                
            </form>
            <br><br>
            </div>

        
        <div class="bill-form">
            <div class="order">
            <h3>Your order</h3>
            <hr>
            <form id="form1" name="form1" method="post">
                
                <table>
                    <tr>
                        <th>Product</th>
                        <th>Total</th>
                    </tr>
                    <?php 

$userid = $_SESSION['id'];
$sql = "SELECT * FROM cart WHERE userid = $userid";
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
                            
                            <td><?php echo $title?></td>
                            <td>Rs.<?php echo $subtotal; ?></td>
                        </tr>

                        <?php

                        }
                        
                    }
                }
                ?>
                    
                    
                </table>  
                
                <div class="total-price">
                        <table>
                            <tr>
                                <td>Total</td>
                                <td>Rs.<?php echo $_GET['total'];?>.00</td>
                            </tr>
                            <tr>
                                <td colspan="2"><?php if(isset($_SESSION['order'])){echo $_SESSION['order'];unset ($_SESSION['order']);}?></td>
                            </tr>
                            
                            
                            
                        </table>
                        
                </div>
                <div class="placeorder">
                    <input type="hidden" name="status" value="Ordered">
                    <input type="submit" name="order" class="btn"value="Place Order">
                </div>
                
            </form>
            <?php 
            
            if(isset($_POST['order']))
            {
                
                $userid = $_SESSION['id'];
                $status = $_POST['status'];
$sql4 = "SELECT * FROM cart WHERE userid = $userid";
$res4 = mysqli_query($conn,$sql4);
$count4 = mysqli_num_rows($res4);

if($count4>0)
{
    while($row4=mysqli_fetch_assoc($res4))
    {
        
        $cartid = $row4['id'];
        $productid = $row4['productid'];
        $qty = $row4['qty'];
        $subtotal = $row4['subtotal'];
        $date = date('Y/m/d');
            

        $sql3 = "INSERT INTO order1 SET
                productid = '$productid',
                userid = '$userid',
                qty = '$qty',
                subtotal ='$subtotal',
                date = '$date',
                status = '$status'
                ";
                $res3 = mysqli_query($conn,$sql3);
                
                




         $sql5 = "DELETE FROM cart WHERE id = '$cartid'";
         $res5 = mysqli_query($conn,$sql5);   
         



         $sql4 = "SELECT * FROM product WHERE id = '$productid'";
         $res4 = mysqli_query($conn,$sql4);
         while($row4= mysqli_fetch_assoc($res4))
         {
            $current_stock = $row4['stock'];
            $current_sale = $row4['sale'];
            $stock = $current_stock-$qty;
            $sale = $current_sale+$qty;

            $sql5 = "UPDATE product SET 
            stock = '$stock',
            sale = '$sale'
            WHERE id = '$productid'
            ";
            $res5 = mysqli_query($conn,$sql5);
            if($res5)
            {
                header('location:profilehis.php');
            }
         }
             
                    




                        
                        
                    
                }
            }
        }
            
            ?>
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