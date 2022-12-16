<?php include('partials/menu.php') ?>

  <div class="main-content">
        <div class="wrapper">
            <h1>Update order</h1>
            <br><br>

            <?php
                
                if($_GET['id'])
                {
                    $id= $_GET['id'];
                    $sql ="SELECT * FROM order1 WHERE id=$id";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    $row = mysqli_fetch_assoc($res);

                    if($count==1)
                    {
                        //data have
                        
                        $title = $_GET['name'];
                        
                       echo $status = $row['status'];
                        

                        
                    }
                    else
                    {
                        //data no 
                        header('location:'.SITEURL.'admin/manage-order.php');
                    }

                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-order.php');
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Product Name</td>
                        <td><?php echo $title?></td>
                    </tr>
                    
                    <tr>
                        <td>Status</td>
                        <td>
                            <select name="status" id="">
                                <option <?php if($status=="Ordered"){echo "selected";}?>value="Ordered">Ordered</option>
                                <option <?php if($status=="On Delivery"){echo "selected";}?>value="On Delivery">On Delivery</option>
                                <option <?php if($status=="Delivered"){echo "selected";}?>value="Delivered">Delivered</option>
                                <option <?php if($status=="Cancelled"){echo "selected";}?>value="Cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                        </td>
                        <td></td>
                    </tr>
                </table>
            </form>
          
            <?php
                if(isset($_POST['submit']))
                {
                    //echo "Cliked";
                    
                    
                    
                   
                    
                    $status = $_POST['status'];

                   

                    $sql2 = "UPDATE order1 SET
                    status = '$status'
                    WHERE id=$id
                    ";
                    $res2 = mysqli_query($conn,$sql2);
                    if($res2==true)
                        {
                            
                            $_SESSION['add'] = "<div class='success'>update Successfully.</div>";
                            
                            header('location:'.SITEURL.'admin/manage-order.php');
        
        
                        }
                    else
                        {
                            
                             $_SESSION['add'] = "<div class='success'>Failed update.</div>";
                             
                             header('location:'.SITEURL.'admin/manage-order.php');
                        }

                }
            ?>
        </div>
  </div>  

  <?php include('partials/footer.php') ?>
