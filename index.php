<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    
    
    <!--Header-->
    <div class="header">
        <div class="container">
            <?php include('partials-front/navbar.php')?>
            <?php include('partials-front/serachbar.php')?>
            <div class="row">
                <div class="col-2">
                    <h1>The Largest Laptop Store in<br>Sri Lanka!</h1>
                    <p>Success isn't always about greatness. It's about consistent<br>
                        hard work gains success. Greatness will come.</p>
                        <a href="product.php" class="btn">All Product
                        &#10140;</a>
                </div>
                <div class="col-2">
                    
                        <!-- Slideshow container -->
                    <div class="slideshow-container">
                     
                         <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        
                           <img src="images/1.png" style="width:100%">
                    </div>
                       
                    <div class="mySlides fade">
                        
                           <img src="images/4.png" style="width:100%">
                        
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    

    <!--featured categories-->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <?php 
                    $sql = "SELECT * FROM brand WHERE featured = 'Yes' AND active = 'Yes' LIMIT 5";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $image_name = $row['image_name'];
                            $title = $row['title'];
                            ?>
                                <div class="col-3"><a href="brand.php?brand=<?php echo $title?>"><img src="<?php echo SITEURL; ?>images/brand/<?php echo $image_name?>" ><h4><?php echo $title?></h4></a></div>

                            <?php
                        }
                    }
                    else
                    {
                        echo "<div class='col-3'><h1>NO Brand Added</h1></div>";
                    }

                ?>
                
            </div>
        </div>
    
    <!--featured Product-->
    <div class="small-container"><br>
        <h2 class="title" >Featured Product</h2>
        <div class="row">
            <?php 
            
            $sql = "SELECT * FROM product WHERE featured = 'Yes' AND active = 'Yes'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $image_name = $row['image_name1'];
                    $title = $row['title'];
                    $price =$row['price'];
                    $stock = $row['stock'];
                    ?>
                    
                    <div class="col-4">
                        <h4><?php echo $title?></h4>
                        <?php 
                        if($stock==0)
                        {
                            ?>
                                <a href="product-details.php?id=<?php echo $id?>"><img class="stock" src="images/Stock.png"  alt=""></a>
                            <?php
                        }
                        else
                        {
                            ?>
                                <img  class="stock2" src="images/Stock2.png"  alt="">
                            <?php
                        }

                        ?>
                        
                        
                        <a href="product-details.php?id=<?php echo $id?>"><img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name?>"></a>

                        <h2>Rs.<?php echo $price?></h2>
                    </div>
                    <?php
                }
                
            }
            else
            {
                echo "<div class='col-3'><h1>NO Product Added</h1></div>";

            }
            
            ?>
        </div>

    </div>

   
        
    </div>
     

    
    <!------Offer----->
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2"><img src="images/offer-Lenovo-IdeaPad-Slim-3.png" alt=""></div>
                <div class="col-2"><h1>Lenovo IdeaPad Slim 3 – 15ITL6</h1> <br> <small>– Intel Core i5 1135G7 Processor<br>– 8GB DDR4 RAM
                    <br>– 512GB M.2 NVMe SSD
                    <br>– 15.6″ FHD, (1920×1080), IPS Display
                    <br>– 2GB NVIDIA GeForce MX350 Graphics
                    <br>– Integrated 45Wh Battery
                    <br>– Windows 10 Home</small>
                <br><a href="product-details.php?id=131" class="btn">Buy Now</a>
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
<!--Js for slideshow-->
<script>
    let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>
</body>
</html>