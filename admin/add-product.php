<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Product</h1>
        <br><br>

        <?php
            if(isset($_SESSION['upload']))
            {
                echo$_SESSION['upload'];
                unset($_SESSION['upload']);
            }
            
        ?>
        
       

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the product">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" id="" cols="40" rows="10" placeholder="Description of the product"></textarea>
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
                    <td>Brand: </td>
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
                                    <option value="0">No Category Found</option>
                                    <?php  
                                }

                                //Display on Dropdown

                            ?>
                            
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
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
                                    <option value="0">No Category Found</option>
                                    <?php  
                                }

                                //Display on Dropdown

                            ?>
                            
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" min="0">
                    </td>
                </tr>
                <tr>
                    <td>Stock: </td>
                    <td>
                        <input type="number" name="stock" min="0">
                    </td>
                </tr>
                <tr>
                    <td>Image-1: </td>
                    <td>
                        <input type="file" name="image1">
                    </td>
                </tr>
                <tr>
                    <td>Image-2: </td>
                    <td>
                        <input type="file" name="image2">
                    </td>
                </tr>
                <tr>
                    <td>Image-3: </td>
                    <td>
                        <input type="file" name="image3">
                    </td>
                </tr>
                <tr>
                    <td>Image-4: </td>
                    <td>
                        <input type="file" name="image4">
                    </td>
                </tr>

                <tr>
                    <td>Image-5: </td>
                    <td>
                        <input type="file" name="image5">
                    </td>
                </tr>
                <tr>
                    <td>Image-6: </td>
                    <td>
                        <input type="file" name="image6">
                    </td>
                </tr>
                <tr>
                    <td>Image-7: </td>
                    <td>
                        <input type="file" name="image7">
                    </td>
                </tr>
                <tr>
                    <td>Featured :</td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active :</td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname1"></td>
                    <td><textarea name="des1" id="" cols="40" rows="5"></textarea></td>
                </tr>  
                <tr>
                    <td>Description Name<input type="text" name="desname2"></td>
                    <td><textarea name="des2" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname3"></td>
                    <td><textarea name="des3" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname4"></td>
                    <td><textarea name="des4" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname5"></td>
                    <td><textarea name="des5" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname6"></td>
                    <td><textarea name="des6" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname7"></td>
                    <td><textarea name="des7" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname8"></td>
                    <td><textarea name="des8" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname9"></td>
                    <td><textarea name="des9" id="" cols="40" rows="5"></textarea></td>
                </tr>
                <tr>
                    <td>Description Name<input type="text" name="desname10"></td>
                    <td><textarea name="des10" id="" cols="40" rows="5"></textarea></td>
                </tr>  
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Product" class="btn-secondary">
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

                  //inset into data base
                  $sql2 ="INSERT INTO product SET
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
                        // header('location:'.SITEURL.'admin/manage-product.php');

                        if($upload==false)
                        {
                            $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                          header('location'.SITEURL.'admin/add-product.php');
                            die();
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
<?php include('partials/footer.php'); ?>