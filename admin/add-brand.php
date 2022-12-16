<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add brand</h1>
        <br><br>
       <?php 
       if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; //Dispaly
                unset($_SESSION['add']);//Remove
            }
        if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload']; //Dispaly
                unset($_SESSION['upload']);//Remove
            }   
        ?>  
        
        <br><br>
        <!-- Add catagory Form start -->
        <form action="" method="POST" enctype="multipart/form-data" >
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="brand Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name ="image">   
                    </td>
                </tr>
                <tr>
                    <td>Feature: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes" >Yes
                        <input type="radio" name="featured" value="No" >No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add brand" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!-- Add catagory Form End -->
        <?php 
            //check button clicked
            if(isset($_POST['submit']))
            {
                // echo "Button cliked";
                //Get the value from catagory form
                $title = $_POST['title'];

                //For radio input check
                if(isset($_POST['featured']))
                {
                    //Get the value from form
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
                //Check image selected or not and set the value
                // print_r($_FILES['image']);
                //die();//breake the code here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the image
                    //To upload image we need image name, src path
                    $image_name= $_FILES['image']['name'];

                    //Auto renane
                    //get the Extention of our image(jpg,png,etc) e.g" special.brand1.jpg"
                    $tem = explode('.',$image_name);
                    $ext = end($tem);
                    //Rename 
                    $image_name = "brand_".rand(000,999).'.'.$ext;//eg brand_brand_232.jpg

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
                        header('location: manage-brand.php');
                        // Stop the proccess
                        die();

                    }

 
                }
                else
                {
                    //Dont upload image
                    $image_name="";
                }

                //Create SQL query ti inser Catagory
                $sql = "INSERT INTO brand SET
                title='$title',
                image_name='$image_name', 
                featured='$featured',
                active='$active'
                ";
                //Execute the query
                $res = mysqli_query($conn,$sql);
                //Check query executed
                if($res==true)
                {
                    //Executed and add brand
                    $_SESSION['add'] = "<div class='success'>brand Added Successfully.</div>";
                    //REDIRECT TO brand PAGE
                    header('location:manage-brand.php');


                }
                else
                {
                    //failed to add brand
                     $_SESSION['add'] = "<div class='success'>Failed to add brand.</div>";
                     //REDIRECT TO brand PAGE
                     header('location:manage-brand.php');
                }

            }
        ?>
    </div>
</div>
<?php include('partials/footer.php') ?>
