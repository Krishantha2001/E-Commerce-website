<?php

    //include contant.php   
    include('../confing/constants.php'); 
    // 1. get the id of userto be deleted
    $id = $_GET['id'];
    // 2. Create SQL query to delete user
    $sql = "DELETE FROM user WHERE id=$id";
    
    //Execute the query
    $res = mysqli_query($conn,$sql);

    //check executed successfully or not
    if($res==true)
    {
        //echo "userdeleted";
        //Create Session variable to display Message
        $_SESSION['delete']= "<div class='success'>user Deleted Successfully</div>";
        header("location:".SITEURL.'admin/manage-customer.php');
    }
    else
    {
        //echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete user. Try Again</div>";
        header("location:".SITEURL.'admin/manage-customer.php');
    }

    // 3. Redirect to manage user page with massage (success/error)
?> 