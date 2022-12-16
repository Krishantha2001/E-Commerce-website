<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
         <h1>Manage-Order</h1>
         
                <br><br><br>
                <?php
                    if(isset($_SESSION['update']))
                    {
                        echo$_SESSION['update'];
                        unset ($_SESSION['update']);
                    }
                ?>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Product</th>
                        <th>Price</th> 
                        <th>Qty</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $sn=1;
                    $sql = "SELECT * FROM order1 ORDER BY id DESC";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                        $userid = $row['userid'];
                        $proid = $row['productid'];
                        $qty = $row['qty'];
                        $date = $row['date'];
                        $subtotal = $row['subtotal'];
                        $status = $row['status'];
                        
                        $sql2 = "SELECT * FROM product WHERE id = '$proid'";
                        $res2 = mysqli_query($conn,$sql2);
                        while($row2 =mysqli_fetch_assoc($res2))
                        {
                            $title = $row2['title'];
                            $price = $row2['price'];

                            $sql3= "SELECT * FROM user WHERE id = '$userid'";
                            $res3 = mysqli_query($conn,$sql3);
                            while($row3=mysqli_fetch_assoc($res3))
                            {
                                $username = $row3['username'];
                                $phone = $row3['phone'];
                                $email = $row3['email'];
                                $a = $row3['country'];
                                $b=$row3['twon'];
                                $c=$row3['postcode'];
                                $d=$row3['house_number'];
                                $address = $a.','.$b.','.$c.','.$d;
                                ?>
                                        <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title;?></td>
                                        <td><?php echo $price;?></td>
                                        <td><?php echo $qty;?></td>
                                        <td><?php echo $date;?></td>
                                        <td><?php echo $status;?></td>
                                        <td><?php echo $username;?></td>
                                        <td><?php echo $phone;?></td>
                                        <td><?php echo $email;?></td>
                                        <td><?php echo $address;?></td>
                                        <td>
                                            <a href="<?php SITEURL;?>update-order.php?id=<?php echo $id?>&name=<?php echo $title;?>" class="btn-secondary">Update order</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } 

                        }
                        

                    }
                    else
                    {
                        echo "<div class='error'>No Order Availble</div>";
                    }
                    ?>
                                    
                                
                    
                </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>