<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        
        <br><br>

        <?php
            //Get id fromSelected ADMIN
            $id=$_GET['id'];
            //Create SQL query to get the details
            $sql="SELECT * From admin WHERE id=$id";
            //Execute the query
            $res=mysqli_query($conn,$sql);
            //check query is executed or not
            if($res==true){
                //Data available or not
                $count= mysqli_num_rows($res);
                
                if($count==1)
                {
                    //Get the Details
                    //echo "Admin Availble";
                    $row=mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    //ReDirect to manage admin page
                    header('location'.SITEURL.'admin/manage-admin.php');
                }

            }
        ?>
        
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?> ">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
    //check submit button cliked 
    if(isset($_POST['submit']))
    {
        //echo"Button Clicked ";
        //Get all the value from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        //create sql query
        $sql = "UPDATE admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id='$id'
        ";

        //Execute the query
        $res = mysqli_query($conn,$sql);

        //check query
        if($res==true)
        {
            $_SESSION['update'] = "<div class ='success'> Admin update Successfully.</div>";
            //redirect to manage Admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['update'] = "<div class ='error'> Failed to update Admin.</div>";
            //redirect to manage Admin page
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php')?>