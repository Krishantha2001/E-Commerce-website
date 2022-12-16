<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Brand</h1>
        
        <br><br>


        <?php
            //id set or not
            if(isset($_GET['id']))
            {
                //Get all id and data
                //echo "get data";
                $id = $_GET['id'];

                //Query
                $sql = "SELECT* FROM brand WHERE id=$id";

                //execute
                $res = mysqli_query($conn,$sql);

                //count row

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //get all data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured =$row['featured'];
                    $active = $row['active'];
                    
                }
                else
                {
                    //redirect
                    $_SESSION['no-brand-found']="<div class='error'>brand not found</div>";
                    header('location:'.SITEURL.'admin/manage-brand.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-brand.php');
            }

        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title;?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                            if($current_image !='')
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/brand/<?php echo $current_image?>" width="150px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'> Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image" value="">
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
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="update brand" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                //Upload image
                // echo "Cliked";
                //get all the value
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image =$_POST['current_image'];
                $featured =$_POST['featured'];
                $active = $_POST['active'];

                //updating image
                //check image selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image details
                   $image_name = $_FILES['image']['name'];
                    if($image_name !="")
                    {
                            //Upload the image
                            //To upload image we need image name, src path
                            $image_name= $_FILES['image']['name'];

                            //Auto renane
                            //get the Extention of our image(jpg,png,etc) e.g" special.food1.jpg"
                            $tem = explode('.',$image_name);
                            $ext = end($tem);
                            //Rename 
                            $image_name = "brand_".rand(000,999).'.'.$ext;//eg Food_brand_232.jpg

                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path="../images/brand/".$image_name;

                            //Finally upload the image
                            $upload = move_uploaded_file($source_path,$destination_path);

                            //check uploaded or not
                            //if not upload redirect page and stop proccess
                            if($upload==false)
                            {
                                //Set message
                                $_SESSION['upload'] = "<div class='error>Failed to upload image.</div>";
                                header('location:'.SITEURL.'admin/manage-brand.php');
                                // Stop the proccess
                                die();

                            }
                            // Remove the current  image
                            if($current_image!="")
                            {
                                $remove_path="../images/brand/".$current_image;

                                $remove = unlink($remove_path);

                                //image removed or not
                                // if failed to remove stop process
                                if($remove==false)
                                {
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                                    header('location:'.SITEURL.'admin/manage-brand.php');
                                    die();
                                }
                            }
                            



                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name =$current_image;
                }
                echo $image_name;
                
                //update database
                $sql2 = "UPDATE brand SET
                title = '$title',
                image_name='$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
                ";

                //Execute
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Brand updateed successfully";
                    header('location:'.SITEURL.'admin/manage-brand.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='success'>Brand updateed Failed";
                    header('location:'.SITEURL.'admin/manage-brand.php');
                }

                //redirect

            }
        ?>

        

<?php include('partials/footer.php')?>