<?php

    //include contant.php   
    include('../confing/constants.php'); 
    // 1. get the id of admin to be deleted
    $id = $_GET['id'];
    // 2. Create SQL query to delete admin
    $sql = "DELETE FROM admin WHERE id=$id";
    
    //Execute the query
    $res = mysqli_query($conn,$sql);

    //check executed successfully or not
    if($res==true)
    {
        //echo "Admin deleted";
        //Create Session variable to display Message
        $_SESSION['delete']= "<div class='success'>Admin Deleted Successfully</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }

    // 3. Redirect to manage admin page with massage (success/error)
?> 