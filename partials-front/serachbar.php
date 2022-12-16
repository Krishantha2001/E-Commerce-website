

<div class="row">
                <div class="searchbar2">
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
                                            <option value="<?php echo $title?>"><?php echo $title1?></option>
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
                </div>
                
            
            

            