<?php include('confing/constants.php')?>

<?php 
            if(isset($_POST['submit']))
            {
                //Upload image
                // echo "Cliked";
                //get all the value
                $fname = $_POST['fname'];
                $lname =$_POST['lname'];
                $current_image =$_POST['current_image'];
                       
                $company =$_POST['company'];
                $country = $_POST['country'];
                $housenumber = $_POST['housenumber'];
                $apartment = $_POST['apartment'];
                $twon = $_POST['twon'];
                $postcode = $_POST['postcode'];
                $phone = $_POST['phone'];

                
                
                

                //updating image
                //check image selected or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image details
                   $image_name = $_FILES['image']['name'];
                    if($image_name !="")
                    {
                            //Upload the image
                            //To upload image we need image name, src path
                            $image_name= $_FILES['image']['name'];

                            //Auto renane
                            //get the Extention of our image(jpg,png,etc) e.g" special.food1.jpg"
                            $tem = explode('.',$image_name);
                            $ext = end($tem);
                            //Rename 
                            $image_name = "User_".rand(000,999).'.'.$ext;//eg Food_Category_232.jpg

                            $source_path = $_FILES['image']['tmp_name'];
                            $destination_path="./images/users/".$image_name;

                            //Finally upload the image
                            $upload = move_uploaded_file($source_path,$destination_path);

                            //check uploaded or not
                            //if not upload redirect page and stop proccess
                            if($upload==false)
                            {
                                //Set message
                                echo "upload error";
                                
                                // header('location:'.SITEURL.'Profile.php');

                                // Stop the proccess
                                die();

                            }
                            // Remove the current  image
                            if(trim($current_image)!="")
                            {
                                $remove_path="./images/users/".trim($current_image);

                                $remove = unlink($remove_path);

                                //image removed or not
                                // if failed to remove stop process
                                if($remove==false)
                                {
                                    echo "remove error";
                                    // header('location:'.SITEURL.'Profile.php');

                                    die();
                                }
                            }
                            



                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name =$current_image;
                }
                echo $image_name;
                $userid = $_SESSION['id'];

                
                //update database
                $sql2="UPDATE user SET first_name='$fname',last_name='$lname',image_name=' $image_name',company_name=' $company',country='$country',house_number=' $housenumber',apartment='$apartment',twon='$twon',postcode=' $postcode',phone=' $phone ' WHERE id = $userid";

                //Execute
                $res2 = mysqli_query($conn,$sql2);

                if($res2==true)
                {
                    
                    header('location:'.SITEURL.'Profile.php');

                }
                else
                {
                    
                    header('location:'.SITEURL.'Profile.php');
                }

                //redirect

            }
        ?>




