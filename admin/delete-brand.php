<?php
    //include constant.php   
    include('../confing/constants.php');
    
    if(isset($_GET['id']))
    {
        //Get value and delete
        //echo "get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file is availble
        if($image_name !='')
        {
            //image is availble
            $path = "../images/brand/".$image_name;
            //Remove the image
            $remove = unlink($path);
            //If failed to remove image stop proccess
            if($remove==false)
            {
                // Set the Session message
                $_SESSION['remove'] = "<div class='error'>Failed to remove brand image</div>";
                // Redirect
                header('location:'.SITEURL.'admin/manage-brand.php');
                // Stop process
                die();
            }
            //Delete data from database
            //SQL query to delete
            $sql = "DELETE From brand WHERE id=$id";
            //execute query
            $res = mysqli_query($conn,$sql);

            //chech deleted
            if($res==true)
            {
                //Set succese
                $_SESSION['delete']="<div class='success'>Brand Deleted Successfully</div>";
                //Redirect
                header('location:'.SITEURL.'admin/manage-brand.php');

            }
            else
            {
                //Failed to deleted
                $_SESSION['delete']="<div class='success'>Brand Deleted Fail</div>";
                //Redirect
                header('location:'.SITEURL.'admin/manage-brand.php');
            }
            

        }

        else
        {
            //Delete data from database
            //SQL query to delete
            $sql = "DELETE From brand WHERE id=$id";
            //execute query
            $res = mysqli_query($conn,$sql);

            //chech deleted
            if($res==true)
            {
                //Set succese
                $_SESSION['delete']="<div class='success'>Brand Deleted Successfully</div>";
                //Redirect
                header('location:'.SITEURL.'admin/manage-brand.php');

            }
            else
            {
                //Failed to deleted
                $_SESSION['delete']="<div class='success'>Brand Deleted Fail</div>";
                //Redirect
                header('location:'.SITEURL.'admin/manage-brand.php');
            }
        }


    } 
    else
    {
        //Redirect
        header('location:'.SITEURL.'admin/manage-brand.php');
    }
?>
