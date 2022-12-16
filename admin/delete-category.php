<?php
    //include constant.php   
    include('../confing/constants.php');
    
    if(isset($_GET['id']))
    {
        //Get value and delete
        //echo "get value and delete";
        $id = $_GET['id'];

        //remove the physical image file is availble
        

       
            //Delete data from database
            //SQL query to delete
            $sql = "DELETE From category WHERE id=$id";
            //execute query
            $res = mysqli_query($conn,$sql);

            //chech deleted
            if($res==true)
            {
                //Set succese
                $_SESSION['delete']="<div class='success'>category Deleted Successfully</div>";
                //Redirect
                header('location:'.SITEURL.'admin/manage-category.php');

            }
            else
            {
                //Failed to deleted
                $_SESSION['delete']="<div class='success'>category Deleted Fail</div>";
                //Redirect
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        }


    
    else
    {
        //Redirect
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>
