<html>
    <head>
        <title>K-Tech | Admin-page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
    <?php include('partials/menu.php') ?>
      <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Brand</h1>
                <br><br>
                <?php 
                if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Dispaly
                        unset($_SESSION['add']);//Remove
                    }
                if(isset($_SESSION['remove']))
                    {
                        echo $_SESSION['remove']; //Dispaly
                        unset($_SESSION['remove']);//Remove
                    } 
                if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; //Dispaly
                        unset($_SESSION['delete']);//Remove
                    }
                    if(isset($_SESSION['no-brand-found']))
                    {
                        echo $_SESSION['no-brand-found']; //Dispaly
                        unset($_SESSION['no-brand-found']);//Remove
                    }  
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; //Dispaly
                        unset($_SESSION['update']);//Remove
                    }  
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload']; //Dispaly
                        unset($_SESSION['upload']);//Remove
                    }           
                ?>
                <br><br> 
                <!-- button to add catagory -->
                <a href="<?php echo SITEURL;?>admin/add-brand.php" class="btn-primary">Add Catagory</a>
                
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>image</th>
                        <th>Featured</th>
                        <th>Avtive</th> 
                        <th>Actions</th>
                    </tr>
                    <?php
                    //Get all brand
                        $sql = "SELECT * FROM brand";
                        //EXECUTE QUERY         
                        $res = mysqli_query($conn,$sql);
                        //Count row
                        $count=mysqli_num_rows($res);
                        //Check data have or not
                        $sn=1;

                        if($count>0)
                        {
                            //have data
                            //Get Data and display
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name=$row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                    <tr>
                                             <td><?php echo $sn++ ?></td>
                                             <td><?php echo $title?></td>
                                             
                                             <td>
                                                <?php
                                                    if($image_name!="")
                                                    {
                                                        
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?>images/brand/<?php echo $image_name?>" width="100px">
                                                        <?php
                                                    } 
                                                    else
                                                    {
                                                        //Display the message
                                                        echo "<dic class='error'>Image not Added.</div>";
                                                    }
                                                ?>
                                             </td>

                                             <td><?php echo $featured?></td>
                                             <td><?php echo $active?></td>
                                             <td>
                                             <a href="<?php echo SITEURL; ?>admin/update-brand.php?id=<?php echo $id; ?>" class="btn-secondary">Update Brand</a>
                                             <a href="<?php echo SITEURL; ?>admin/delete-brand.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Brand</a>
                                        </td>
                                    </tr>
                                <?php

                            }
                        }
                        else
                        {
                            //No Data
                            //Display message
                            ?>

                            <tr>
                                <td colspan="6"><div class="error">No brand Added</div></td>
                            </tr>

                            <?php

                        }
                    ?>
                    
                    
                    </tr>
                </table>
            </div>    
        </div>
        <!-- Main Content Section End -->

        <?php include('partials/footer.php') ?>
    </body>
</html>