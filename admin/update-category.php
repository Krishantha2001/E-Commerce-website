<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        
        <br><br>


        <?php
            //id set or not
            if(isset($_GET['id']))
            {
                //Get all id and data
                //echo "get data";
                $id = $_GET['id'];

                //Query
                $sql = "SELECT* FROM category WHERE id=$id";

                //execute
                $res = mysqli_query($conn,$sql);

                //count row

                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //get all data
                    $row = mysqli_fetch_assoc($res);
                    $title = $row['title'];
                    $featured =$row['featured'];
                    $active = $row['active'];
                    
                }
                else
                {
                    //redirect
                    $_SESSION['no-category-found']="<div class='error'>category not found</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
            }
            else
            {
                header('location:'.SITEURL.'admin/manage-category.php');
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
                        
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="update category" class="btn-secondary">
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
                $featured =$_POST['featured'];
                $active = $_POST['active'];


                //update database
                $sql2 = "UPDATE category SET
                title = '$title',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
                ";

                //Execute
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>category updateed successfully";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class='success'>category updateed Failed";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

                //redirect

            }
        ?>

        

<?php include('partials/footer.php')?>