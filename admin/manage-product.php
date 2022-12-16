<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
         <h1>Manage-Product</h1>
         <br>
                <!-- button to add product -->
                <a href="<?php echo SITEURL;?>admin/add-product.php" class="btn-primary">Add product</a>
                <!--  -->
                <br><br><br>
                <?php
                if(isset($_SESSION['add']))
                {
                    echo$_SESSION['add'];
                    unset($_SESSION['add']);
                }
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
                    if(isset($_SESSION['no-Category-found']))
                    {
                        echo $_SESSION['no-Category-found']; //Dispaly
                        unset($_SESSION['no-Category-found']);//Remove
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

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        
                        <th>Price</th>
                        <th>Image Name</th>
                        <th>Stock</th>
                        
                        <th>Featured</th>
                        <th>Active</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM product ORDER BY id DESC";
                        $res = mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        $sn=1;
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id=$row['id'];
                                $title = $row['title'];
                                $price =  $row['price'];
                                $stock = $row['stock'];
                                $image_name1 = $row['image_name1'];
                                $image_name2 = $row['image_name2'];
                                $image_name3 = $row['image_name3'];
                                $image_name4 = $row['image_name4'];
                                $image_name5 = $row['image_name5'];
                                $image_name6 = $row['image_name6'];
                                $image_name7 = $row['image_name7'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++?></td>
                                        <td><?php echo $title;?></td>
                                        
                                        <td>Rs.<?php echo $price;?></td>
                                        <td>
                                            <?php 
                                                if($image_name1=="")
                                                {
                                                    echo"<div class='error'>Image not added.</div>";
                                                }
                                                else
                                                {
                                                   ?>
                                                   <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name1;?>" width="100px">
                                                   <?php 
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $stock;?></td>
                                        <td><?php echo $featured;?></td>
                                        <td><?php echo $active;?></td> 
                                        <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-product.php?id=<?php echo $id; ?>" class="btn-secondary">Update Product</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-product.php?id=<?php echo $id; ?>&image_name1=<?php echo $image_name1; ?>&image_name2=<?php echo $image_name2; ?>&image_name3=<?php echo $image_name3; ?>&image_name4=<?php echo $image_name4; ?>&image_name5=<?php echo $image_name5; ?>&image_name6=<?php echo $image_name6; ?>&image_name7=<?php echo $image_name7; ?>" class="btn-danger">Delete Product</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo"<tr><td colspan = '7' class='error'>Product Not Added yet <td></tr>";
                        }

                    ?>
                    
                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>