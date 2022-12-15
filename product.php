
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All product | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <!--Header-->
    
        <div class="container">
        <?php include('partials-front/navbar.php')?>
        <?php include('partials-front/serachbar.php')?>


        
    </div>
    
 
    <div class="small-container">
        <form action="" method="POST">
        <div class="row row2">
            
            <h2 style="color: black;">All Product</h2>
            
            <select name="sortby" id="">
                <option value="id">Default Shorting</option>
                <option value="price">Short by price</option>
                <option value="brand">Short by brand </option>
                <option value="sale">Short by sale</option>
                
            </select>
            <input type="submit" name="sort" class="btn2" value="Sort">
            
        </div>
        </form>
        <?php 
        if(isset($_POST['sort']))
        {
            
        $sort = $_POST['sortby'];
            
        }
        else
        {
            $sort = "id";
        }

        

        ?>
        <div class="row"> <?php 
            
            $sql = "SELECT * FROM product WHERE  active = 'Yes' ORDER BY $sort DESC";
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
                    $stock = $row['stock']
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