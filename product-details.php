
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
</head>
<body>

    <!--Header-->
    
        <div class="container">
        <?php include('partials-front/navbar.php')?>
        <?php include('partials-front/serachbar.php')?>

    
    </div>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM product WHERE id = $id";
    $res = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res))
    {
        $description= $row['description'];
        $title = $row['title'];
        $warranty =$row['warranty'];
        $brand = $row['brand'];
        $category=$row['category'];
        $price = $row['price'];
        $stock = $row['stock'];
        $desname1 = $row['desname1'];
        $des1 =$row['des1'];
        $desname2 = $row['desname2'];
        $des2 =$row['des2'];
        $desname3 = $row['desname3'];
        $des3 =$row['des3'];
        $desname4 = $row['desname4'];
        $des4 =$row['des4'];
        $desname5 = $row['desname5'];
        $des5 =$row['des5'];
        $desname6 = $row['desname6'];
        $des6 =$row['des6'];
        $desname7 = $row['desname7'];
        $des7 =$row['des7'];
        $desname8 = $row['desname8'];
        $des8 =$row['des8'];
        $desname9 = $row['desname9'];
        $des9 =$row['des9'];
        $desname10 = $row['desname10'];
        $des10 =$row['des10'];
        $image_name1 = $row['image_name1'];
        $image_name2 = $row['image_name2'];
        $image_name3 = $row['image_name3'];
        $image_name4 = $row['image_name4'];
        $image_name5 = $row['image_name5'];
        $image_name6 = $row['image_name6'];
        $image_name7 = $row['image_name7'];

    }
    ?>
    <!--Single product details-->
    <div class="small-container single-product ">
        <div class="row">
            <div class="col-2">
                <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name1?>" alt="" width="100%" id="productimg">
                <div class="smal-img-row">
                    <div class="smal-img-col">
                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name1?>" alt="" width="100%" class="small-img" >
                    </div>
                    <div class="smal-img-col">
                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name2?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="smal-img-col">
                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name3?>" alt="" width="100%" class="small-img">
                    </div>
                    <div class="smal-img-col">
                        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name4?>" alt="" width="100%" class="small-img">
                    </div>
                    
                </div>
                
            </div>
            <div class="col-2">
                <h1><?php echo $title?></h1>
                <p> <?php echo $description?></p>
                    <br>

                    <h3>Rs.<?php echo $price?></h3><br>
                    <?php 
                    if($stock>0)
                    {
                        ?>
                            <h3>Available Stock:<?php echo $stock?></h3><br>
                            <form action="Cart.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id?>">    
                            <input type="hidden" name="price" value="<?php echo $price?>">    
                            <input type="number"  name="qty" min="1" value="1">
                            <button type="submit" class="btn2" width="50px">Add to cart</button>
                            </form>
                        <?php

                    }
                    else
                    {
                        $stock="<h4 class='stock1'>No Available Stock</h4>";
                        ?>
                            <h3><?php echo $stock?></h3><br>
                          
                        <?php
                    }
                    ?>
                    
                    
                    
                    <br>
                    <img src="<?php echo SITEURL; ?>/images/warranty/<?php echo $warranty?>.jpg" alt="" width="60%">
                    
            </div>
        </div>
    </div>


    <div class="small-container">
        <h2 class="title" >Description</h2>
        <div class="description">
        <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name5?>" alt="" width="100%">
        </div>
        <div class="description">
            <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name6?>" alt="" width="100%">
        </div>
        <div class="description">
            <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name7?>" alt="" width="100%">
        </div>
        


        <h2 class="title" >Specification</h2>
        <div class="specification">
            <h4><?php echo $desname1?></h4>
            <p> <?php echo $des1?></p><br>
            <h4><?php echo $desname2?></h4>
            <p> <?php echo $des2?></p><br>
            <h4><?php echo $desname3?></h4>
            <p> <?php echo $des3?></p><br>
            <h4><?php echo $desname4?></h4>
            <p> <?php echo $des4?></p><br>
            <h4><?php echo $desname5?></h4>
            <p> <?php echo $des5?></p><br>
            <h4><?php echo $desname6?></h4>
            <p> <?php echo $des6?></p><br>
            <h4><?php echo $desname7?></h4>
            <p> <?php echo $des7?></p><br>
            <h4><?php echo $desname8?></h4>
            <p> <?php echo $des8?></p><br>
            <h4><?php echo $desname9?></h4>
            <p> <?php echo $des9?></p><br>
            <h4><?php echo $desname10?></h4>
            <p> <?php echo $des10?></p><br>
            
            
            

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

<!-- Js for product  -->
<script>
var productimg= document.getElementById("productimg");
var SmallImg=document.getElementsByClassName("small-img");

SmallImg[0].onclick = function()
{
    productimg.src=SmallImg[0].src;
}
SmallImg[1].onclick = function()
{
    productimg.src=SmallImg[1].src;
}
SmallImg[2].onclick = function()
{
    productimg.src=SmallImg[2].src;
}
SmallImg[3].onclick = function()
{
    productimg.src=SmallImg[3].src;
}
</script>
</body>
</html>