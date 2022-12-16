<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
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
                        <input type="text" name="title" placeholder="category Title">
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
                        <input type="submit" name="submit" value="Add category" class="btn-secondary">
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
                

                //Create SQL query ti inser Catagory
                $sql = "INSERT INTO category SET
                title='$title',
                featured='$featured',
                active='$active'
                ";
                //Execute the query
                $res = mysqli_query($conn,$sql);
                //Check query executed
                if($res==true)
                {
                    //Executed and add category
                    $_SESSION['add'] = "<div class='success'>category Added Successfully.</div>";
                    //REDIRECT TO category PAGE
                    header('location:manage-category.php');


                }
                else
                {
                    //failed to addcategoryd
                     $_SESSION['add'] = "<div class='success'>Failed to add category.</div>";
                     //REDIRECT TO category PAGE
                     header('location:manage-category.php');
                }

            }
        ?>
    </div>
</div>
<?php include('partials/footer.php') ?>
