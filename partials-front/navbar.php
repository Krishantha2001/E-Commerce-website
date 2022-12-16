
<?php include('confing/constants.php')?>
<?php
 ob_start();
if(isset($_SESSION['id']))
{
    $userid = $_SESSION['id'];
    $sql9 = "SELECT * FROM cart WHERE userid = $userid";
    $res9 = mysqli_query($conn,$sql9);
    $count9 = mysqli_num_rows($res9);
}
else
{
    $count9 ="0";
}

                
?>                

<div class="navbar">
 
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" width="125px"></a>
                </div>
                
                <div class="searchbar1">
                <form action="product-search.php" method="POST"> 
                <div class="searchbar">
                    <div class="col-1">
                        
                        <input type="search" name="item" id="search" placeholder="Search Your Products">
                    </div>
                    <div class="col-1">
                    <select name='brand' id='' class='postform resizeselect'>
                    <option value='' selected='selected'>All Brands</option>
                            <?php
                                //cre ate php to display category fromdata base
                                //create sql get all active category
                                $sql = "SELECT* FROM brand WHERE active='Yes'";
                                //Execute
                                $res= mysqli_query($conn,$sql);
                                //coun category
                                $count = mysqli_num_rows($res);
                                
                                if($count>0)
                                {
                                    //have category
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                       //get the value
                                       $categoryid = $row['id'];
                                       $title = $row['title'];
                                       ?>
                                            <option value="<?php echo $title?>"><?php echo $title?></option>
                                       <?php 
                                    }
                                }
                                else
                                {
                                    //no category
                                    ?>
                                    <option value="0">No Brand Found</option>
                                    <?php  
                                }

                                //Display on Dropdown

                            ?>
                            
                            
                        </select>
                    </div>
                    <div class="col-1">
                    <select name='category' id='' class='postform resizeselect'>
                    <option value='' selected='selected'>All Categories</option>
                            <?php
                                //cre ate php to display category fromdata base
                                //create sql get all active category
                                $sql1 = "SELECT* FROM category WHERE active='Yes'";
                                //Execute
                                $res1= mysqli_query($conn,$sql1);
                                //coun category
                                $count1 = mysqli_num_rows($res1);
                                
                                if($count1>0)
                                {
                                    //have category
                                    while($row1=mysqli_fetch_assoc($res1))
                                    {
                                       //get the value
                                       $categoryid = $row1['id'];
                                       $title1 = $row1['title'];
                                       ?>
                                            <option value="<?php echo $title1?>"><?php echo $title1?></option>
                                       <?php 
                                    }
                                }
                                else
                                {
                                    //no category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php  
                                }

                                //Display on Dropdown

                            ?>
                            
                            
                        </select>
                    </div>
                    <div class="col-1">
                        <button type="submit" name="search"><img src="images/search-26245.png" width="25px" height="25px"></button>
                        
                    </div>
                </div>
                    </form>
                    
                    <?php 
                    if(isset($_POST['item']))
                    {
                     $_SESSION['item'] = $_POST['item'];
                    $_SESSION['bran'] = $_POST['brand'];
                    $_SESSION['cat'] = $_POST['category'];
                   // header('location:product-search.php');
                    }
                    


                    
                    ?>
                    
                    
                </div>
                
                <nav>
                    <ul id="MenuItem">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="About.php">About</a></li>
                        <li><a href="Account.php">Account</a></li>
                        <li><a href="signout.php">Sign Out</a></li>
                    </ul>
                </nav>
                <a href="Cart.php?id=0"><img src="images/cart.png" width="30px" height="30px"></a>
                <div class="count">
                  
                    <p><?php echo $count9;?></p>
                </div>
                
                <a href="Profile.php"><img src="images/profilr.png" width="30px" height="30px" style="margin-left: 20px;"></a>
                

                <img src="images/menu.png" width="30px" height="30px" class="menu" onclick="menutoggle()">
            </div>
            
            

            