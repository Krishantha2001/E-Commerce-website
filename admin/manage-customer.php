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
                <h1>Manage Customer</h1>
                <br>
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Dispaly
                        unset($_SESSION['add']);//Remove
                    }
                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; //Dispaly
                        unset($_SESSION['delete']);//Remove
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; //Dispaly
                        unset($_SESSION['update']);//Remove
                    }

                ?>
                <br><br>
                <!-- button to add addmin -->
                
                <!--  -->
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Username</th>
                        <th>Email</th> 
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        //Get All Customer
                        $sql="SELECT * FROM user";
                        //Execute the query    
                        $res = mysqli_query($conn, $sql);
                        //Check whether th e query is executed or not
                        if($res==TRUE){
                            //Count Row
                            $count=mysqli_num_rows($res);
                            //Check the num of row
                            $sn=1;
                            if($count>0)
                            {
                                //Have Data
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                        //get all data from database
                                        //get individual Data 
                                        $id=$rows['id'];
                                        $username=$rows['username'];
                                        $email = $rows['email'];
                                        $phone = $rows['phone'];
                                        ?>

                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone; ?></td>
                                            <td>
                                                <a href=""></a>
                                                <a href="<?php echo SITEURL; ?>admin/update-customer.php?id=<?php echo $id; ?>" class="btn-secondary">Update Customer</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-customer.php?id=<?php echo $id;  ?>" class="btn-danger">Delete Customer</a>
                                            </td>
                                        </tr>
                                        <?php


                                        
                                }
                            }
                            else
                            {
                                //No data
                            }
                        }
                    ?>
                    
                </table>
            </div>    
        </div>
        <!-- Main Content Section End -->

        <?php include('partials/footer.php') ?>
    </body>
</html>