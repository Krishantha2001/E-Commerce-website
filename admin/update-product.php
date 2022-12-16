<?php include('partials/menu.php')?>

<?php 
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql2="SELECT * FROM product WHERE id=$id";
        $res2=mysqli_query($conn,$sql2);

        $row2 =mysqli_fetch_assoc($res2);
        $title =$row2['title'];
        $description=$row2['description'];
        $current_warranty =$row2['warranty'];
        $current_brand =$row2['brand'];
        $current_category=$row2['category'];
        $price=$row2['price'];
        $current_stock = $row2['stock'];
        $current_image1 =$row2['image_name1'];
        $current_image2 =$row2['image_name2'];
        $current_image3 =$row2['image_name3'];
        $current_image4 =$row2['image_name4'];
        $current_image5 =$row2['image_name5'];
        $current_image6 =$row2['image_name6'];
        $current_image7 =$row2['image_name7'];
        $featured=$row2['featured'];
        $active=$row2['active'];
        $desname1 =$row2['desname1'];
        $des1 = $row2['des1'];
        $desname2 =$row2['desname2'];
        $des2 = $row2['des2'];
        $desname3 =$row2['desname3'];
        $des3 = $row2['des3'];
        $desname4 =$row2['desname4'];
        $des4 = $row2['des4'];
        $desname5 =$row2['desname5'];
        $des5 = $row2['des5'];
        $desname6 =$row2['desname6'];
        $des6 = $row2['des6'];
        $desname7 =$row2['desname7'];
        $des7 = $row2['des7'];
        $desname8 =$row2['desname8'];
        $des8 = $row2['des8'];
        $desname9 =$row2['desname9'];
        $des9 = $row2['des9'];
        $desname10 =$row2['desname10'];
        $des10 = $row2['des10'];


    }
    else
    {
        header('location:'.SITEURL.'admin/manage-product');
    }
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Product</h1>
        
        <br><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="price" value="<?php echo $price;?>"></td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td><input type="number" name="stock" min="0" value="<?php echo $current_stock;?>"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" id="" cols="40" rows="10"><?php echo $description?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Warranty: </td>
                    <td>
                        <select name="warranty" id="">
                        <option value="No Warranty">No Warranty</option>
                            <option value="1-Year.jpg">1-Year Warranty</option>
                            <option value="2-Year.jpg">2-Year Warranty</option>
                            <option value="3-Year.jpg">3-Year Warranty</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Brand</td>
                    <td>
                        <select name="brand" id="">
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
                                       $brand_id = $row['id'];
                                       $brand_title = $row ['title'];
                                       
                                        //    echo" <option value='$category_id'>$category_title</option>";
                                        ?>
                                            <option <?php if($current_brand==$brand_id){echo 'selected';} ?> value="<?php echo $brand_title?>"><?php echo $brand_title?></option>
                                       <?php
                                        
                                    }
                                }
                                else
                                {
                                    //no category
                                    ?>
                                    <option value="0">No Band Found</option>
                                    <?php  
                                }

                                //Display on Dropdown

                            ?> 
                            
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category" id="">
                            <?php
                                //cre ate php to display category fromdata base
                                //create sql get all active category
                                $sql = "SELECT* FROM category WHERE active='Yes'";
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
                                       $category_id = $row['id'];
                                       $category_title = $row ['title'];
                                       
                                        //    echo" <option value='$category_id'>$category_title</option>";
                                        ?>
                                            <option <?php if($current_category==$category_id){echo 'selected';} ?> value="<?php echo $category_title?>"><?php echo $category_title?></option>
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
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image1 !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image1?>" width="150px">
                                <?php
                            }
                            else
                            {
                               // echo "<div class='error'> Image Not Added.</div>";
                                ?>
                                     <option value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image1" value="">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image2 !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image2?>" width="150px">
                                <?php
                            }
                            else
                            {
                               // echo "<div class='error'> Image Not Added.</div>";
                                ?>
                                     <option value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image2" value="">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image3 !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image3?>" width="150px">
                                <?php
                            }
                            else
                            {
                               // echo "<div class='error'> Image Not Added.</div>";
                                ?>
                                     <option value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image3" value="">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image4 !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image4?>" width="150px">
                                <?php
                            }
                            else
                            {
                               // echo "<div class='error'> Image Not Added.</div>";
                                ?>
                                     <option value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image4" value="">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image5 !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image5?>" width="150px">
                                <?php
                            }
                            else
                            {
                               // echo "<div class='error'> Image Not Added.</div>";
                                ?>
                                     <option value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image5" value="">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image6 !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image6?>" width="150px">
                                <?php
                            }
                            else
                            {
                               // echo "<div class='error'> Image Not Added.</div>";
                                ?>
                                     <option value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image6" value="">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image7 !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/product/<?php echo $current_image7?>" width="150px">
                                <?php
                            }
                            else
                            {
                               // echo "<div class='error'> Image Not Added.</div>";
                                ?>
                                     <option value="<?php echo $id?>"><?php echo $title?></option>
                                <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image7" value="">
                    </td>
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes">Yes
                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname1" value="<?php echo $desname1?>"></td>
                    <td><textarea name="des1" id="" cols="40" rows="5"><?php echo $des1?></textarea></td>
                </tr>  
                <tr>
                    <td>Description Name<input type="text" name="desname2" value="<?php echo $desname2?>"></td>
                    <td><textarea name="des2" id="" cols="40" rows="5"><?php echo $des2?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname3" value="<?php echo $desname3?>"></td>
                    <td><textarea name="des3" id="" cols="40" rows="5"><?php echo $des3?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname4" value="<?php echo $desname4?>"></td>
                    <td><textarea name="des4" id="" cols="40" rows="5"><?php echo $des4?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname5" value="<?php echo $desname5?>"></td>
                    <td><textarea name="des5" id="" cols="40" rows="5"><?php echo $des5?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname6" value="<?php echo $desname6?>"></td>
                    <td><textarea name="des6" id="" cols="40" rows="5"><?php echo $des6?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname7" value="<?php echo $desname7?>"></td>
                    <td><textarea name="des7" id="" cols="40" rows="5"><?php echo $des7?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname8" value="<?php echo $desname8?>"></td>
                    <td><textarea name="des8" id="" cols="40" rows="5"><?php echo $des8?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname9" value="<?php echo $desname9?>"></td>
                    <td><textarea name="des9" id="" cols="40" rows="5"><?php echo $des9?></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname10" value="<?php echo $desname10?>"></td>
                    <td><textarea name="des10" id="" cols="40" rows="5"><?php echo $des10?></textarea></td>
                </tr>  
                <tr>
                    <td>
                        <input type="hidden" name="current_image1" value="<?php echo $current_image1;?>">
                        <input type="hidden" name="current_image2" value="<?php echo $current_image2;?>">
                        <input type="hidden" name="current_image3" value="<?php echo $current_image3;?>">
                        <input type="hidden" name="current_image4" value="<?php echo $current_image4;?>">
                        <input type="hidden" name="current_image5" value="<?php echo $current_image5;?>">
                        <input type="hidden" name="current_image6" value="<?php echo $current_image6;?>">
                        <input type="hidden" name="current_image7" value="<?php echo $current_image7;?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Product" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 

//check clicked or not
if(isset($_POST['submit']))
{
    //add the product in database
    //echo"Cliked";

    //get the data from form
    $title = $_POST['title'];
    $description= $_POST['description'];
    $warranty =$_POST['warranty'];
    $brand = $_POST['brand'];
    $category=$_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $desname1 = $_POST['desname1'];
    $des1 =$_POST['des1'];
    $desname2 = $_POST['desname2'];
    $des2 =$_POST['des2'];
    $desname3 = $_POST['desname3'];
    $des3 =$_POST['des3'];
    $desname4 = $_POST['desname4'];
    $des4 =$_POST['des4'];
    $desname5 = $_POST['desname5'];
    $des5 =$_POST['des5'];
    $desname6 = $_POST['desname6'];
    $des6 =$_POST['des6'];
    $desname7 = $_POST['desname7'];
    $des7 =$_POST['des7'];
    $desname8 = $_POST['desname8'];
    $des8 =$_POST['des8'];
    $desname9 = $_POST['desname9'];
    $des9 =$_POST['des9'];
    $desname10 = $_POST['desname10'];
    $des10 =$_POST['des10'];

    //check radio button
    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    else
    {
        $featured = "No";
    }
    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No";
    }
    $id = $_GET['id'];
      //inset into data base
      $sql2 ="UPDATE product  SET
      title='$title',
      description ='$description',
      warranty ='$warranty',
      brand = '$brand',
      category = '$category',
      price = '$price',
      stock = '$stock',
      featured = '$featured',
      active='$active',
      desname1 = '$desname1',
      des1='$des1',
      desname2 = '$desname2',
      des2='$des2',
      desname3 = '$desname3',
      des3='$des3',
      desname4 = '$desname4',
      des4='$des4',
      desname5 = '$desname5',
      des5='$des5',
      desname6 = '$desname6',
      des6='$des6',
      desname7 = '$desname7',
      des7='$des7',
      desname8 = '$desname8',
      des8='$des8',
      desname9 = '$desname9',
      des9='$des9',
      desname10 = '$desname10',
      des10='$des10'
      WHERE id = '$id'
  ";
  $res2 = mysqli_query($conn,$sql2);
 
  
  
  
    

    $i=1;
    for($i;$i<8;$i++)
    {
    
        //upload the image
    //select image is clic oe not and uoplad image only if the image is selected
    if(isset($_FILES['image'.$i]['name']))
    {

        //Get the details of the selected
        $image_name=$_FILES['image'.$i]['name'];

        //check image selected
        if($image_name!="")
        {
            //image is selected
            //a rename the image
            //Getr extention of selected image(jpg,png,gif,etc)
            $tmp = explode('.',$image_name);
            $ext = end($tmp);
            //Rename 
            $image_name = "product_Name_".rand(0000,9999).'.'.$ext;

            
            
            //upload image
            //get the src path

            //src path is the current location of the image
            $src=$_FILES['image'.$i]['tmp_name'];

            $dst = "../images/product/".$image_name;

            $upload = move_uploaded_file($src,$dst);

            $sql3 ="UPDATE product SET 
            image_name$i='$image_name'
            WHERE title = '$title'
            ";
            $res3 = mysqli_query($conn,$sql3);
            

            if($upload==false)
            {
                $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
              header('location'.SITEURL.'admin/add-product.php');
                die();
            }
            if(isset($_POST['current_image'.$i]))
            {
                $current_image = $_POST['current_image'.$i];
                $remove_path = "../images/product/".$current_image;

                unlink($remove_path);
            }

        }
         

    }
    else
    {
        $image_name = "";//Selecting default value
        $sql3 ="UPDATE product SET 
        image_name$i='$image_name'
        WHERE title = '$title'
        ";
        $res3 = mysqli_query($conn,$sql3);
        
        header('location:'.SITEURL.'admin/manage-product.php');

    }
    }

    

  
}



?>

        
    </div>
</div>

        

<?php include('partials/footer.php')?>