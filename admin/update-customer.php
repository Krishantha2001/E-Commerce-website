<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Customer</h1>
        
        <br><br>

        <?php
            //Get id fromSelected user
            $id=$_GET['id'];
            //Create SQL query to get the details
            $sql="SELECT * From user WHERE id=$id";
            //Execute the query
            $res=mysqli_query($conn,$sql);
            //check query is executed or not
            if($res==true){
                //Data available or not
                $count= mysqli_num_rows($res);
                
                if($count==1)
                {
                    //Get the Details
                    //echo "user Availble";
                    $row=mysqli_fetch_assoc($res);
                    
                
                   $username=$row['username'];
                   $email = $row['email'];
                   $phone = $row['phone'];
                }
                else
                {
                    //ReDirect to manage user page
                    header('location'.SITEURL.'admin/manage-customer.php');
                }

            }
        ?>
        
        <form action="" method="POST">
            <table class="tbl-30">
              
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?> ">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?> ">
                    </td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" name="phone" value="<?php echo $phone; ?> ">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" name="submit" value="update Customer" class="btn-secondary">
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
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        //create sql query
        $sql = "UPDATE user SET
        
        username = '$username',
        email = '$email',
        phone = '$phone'
        WHERE id='$id'
        ";

        //Execute the query
        $res = mysqli_query($conn,$sql);

        //check query
        if($res==true)
        {
            $_SESSION['update'] = "<div class ='success'> user update Successfully.</div>";
            //redirect to manage user page
            header('location:'.SITEURL.'admin/manage-customer.php');
        }
        else
        {
            $_SESSION['update'] = "<div class ='error'> Failed to update user.</div>";
            //redirect to manage user page
            header('location:'.SITEURL.'admin/manage-customer.php');
        }
    }
?>

<?php include('partials/footer.php')?>