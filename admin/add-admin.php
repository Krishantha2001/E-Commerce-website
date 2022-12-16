<html>
    <head>
        <title>K-tech | Admin-page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
    <?php include('partials/menu.php') ?>
    
      <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Add Admin</h1>
                <br><br>

                <?php
                    if(isset($_SESSION['add'])) //Checking
                    {
                        echo $_SESSION['add']; //Dispaly
                        unset($_SESSION['add']);//Remove
                    }
                ?>
                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name</td>
                            <td><input type="text" name="full_name" placeholder="Enter your Username"></td>
                        </tr>
                        <tr>
                            <td>Userame</td>
                            <td><input type="text" name="username" placeholder="Your Name"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password" placeholder="Your Password"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                            </td>
                        </tr>
                    </table>
                </form>
            </div> 
        </div>        

        <?php include('partials/footer.php') ?>
        <?php 
            //Process the Value from Form and Save it in Database
            //Check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //Button Clicked
                //echo"Button Clicked";

                // 1. Get the data from form
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];
                $password = md5(md5 ($_POST['password']));//Password Encryption with MD5

                //2. SQL query to saave the data into database
                $sql = "INSERT INTO admin SET
                    full_name='$full_name',
                    username='$username',
                    password='$password'";

                //3. Executing Query and Save data in database
                
                $res = mysqli_query($conn,$sql) or die (mysqli_connect_error());
                
                //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
                if($res==true)
                {
                    //Data inserted
                    echo "Data Inserted";
                    //Create a Session variable to Display Message
                    $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
                    //Redirect page to manage admin
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
                else
                {
                    //failed to Insert Data
                    echo "Failed to Inser Data";
                     //Create a Session variable to Display Message
                     $_SESSION['add'] = " Failed Added Successfully";
                     //Redirect page to add admin
                     header("location:".SITEURL.'admin/add-admin.php');
                }
            }
            
        ?>
    </body>
</html>