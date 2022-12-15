


  
                   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | K-Tech</title>
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
    ob_end_flush();
}

?>
   
    </div>

    <!-- My Account -->
    <div class="profile">
        <div class="small-container">
            <div class="row3">

        <div class="items">
            <a href="Profile.php" ><div id="item" class="item">Overview</div></a>
            <a href="profilehis.php"><div id="" class="item">Purchese History</div></a>
            <a href="Profiletra.php"><div id="" class="item">Order Tracking </div></a>
            
        </div>
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
                    $_SESSION['image_name'] = $current_image;
                    $_SESSION['first_name'] = $first;
                    $_SESSION['last_name'] = $last;
                    
                    

                    
                    ?>
        
                <div class="row4">
                    <div class="col-7 c">
                        <img src="<?php echo 'images/users/'.trim($current_image);?>" alt="">
                        <h3><?php echo $first.' '.$last?></h3> 
                    </div>
                    
                    <div class="profile">
                        <h3>Personal details</h3>
                        <hr>
                   
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
                        <input type="hidden" name="current_image" value="<?php echo $current_image ?>">

                        <button class="btn2 " name="submit" type="submit" >Update</button>

                        <input type="file"  name="image" class="file btn2"  >
                        <label for="file" class="btn2">Image</label>

                    </form>
                    
                    
                  

        
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