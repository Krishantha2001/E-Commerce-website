

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <!--Header-->
    
        <div class="container">
        <?php include('partials-front/navbar.php')?>
        <?php include('partials-front/serachbar.php')?>

        <?php 



if(isset($_SESSION['id']))
{
    header('location:index.php');
    
}

?>

       
   
    </div>


    <!-- Account details -->
    <div class="account-page">
        <div class="container">
        <?php 
            if(isset($_SESSION['reg']))
            {
                echo $_SESSION['reg'];
                unset($_SESSION['reg']);
            }
            if(isset($_SESSION['wrong']))
            {
                echo $_SESSION['wrong'];
                unset($_SESSION['wrong']);
            }
            
        ?> 
            <div class="row">
                <div class="col-2">
                    
                    <!-- Slideshow container -->
                <div class="slideshow-container">
                 
                     <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    
                       <img src="images/1.png" style="width:100%">
                </div>
                   
                <div class="mySlides fade">
                    
                       <img src="images/4.png" style="width:100%">
                    
                </div> 
                </div>
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="register()">Register</span>
                            <span onclick="login()">Login</span>
                            <hr id="Indicator">
                        </div>
                        <form action="" id="login" method="POST">
                            <input type="text" name="txtUsername" placeholder="User Name" required>
                            <input type="email" name="txtEmail" placeholder="Email" required>
                            <input type="password" name="txtPassword" placeholder="Passward" required>
                            <button type="submit" name="reg" class="btn">Register</button>
                        </form>
                        <?php
                        
                        
        if(isset($_POST['reg']))
        {
            $name = $_POST['txtUsername'];
            $email = $_POST['txtEmail'];
            $password = md5($_POST['txtPassword']);
            $sql2 = "SELECT email FROM user WHERE email = '$email'";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
            if($count2==0)
            {
                $sql = "INSERT INTO user (username,email,password) VALUE ('$name','$email','$password')";
                $res = mysqli_query($conn,$sql);
                if($res)
                {
                    $_SESSION['reg']="<div class='text-center sucsses'>Register Succusfull<br>Login Now!</div>";
                    header('location:Account.php');
                    
                }
            }
            else
            {
                $_SESSION['reg']="<div class='text-center error'>This Email Already Used<br>Use Another Email!</div>";

            }

           
        }
    ?>
                        <form action="" method="POST" id="register">
                            <input type="email" name="username" placeholder="Email" required>
                            <input type="password" name="password" placeholder="Password" required>
                            <button type="submit" name="log" class="btn">Login</button>
                            <a href="fogot.php">Fogot Passward</a>
                        </form>
                        <?php 
     if(isset($_POST['log']))
     {
         $username =$_POST['username'];
         $password = md5($_POST['password']);
         $sql = "SELECT * FROM user WHERE email LIKE '$username' AND password LIKE '$password'";
         $res = mysqli_query($conn,$sql);
         $count = mysqli_num_rows($res);
         if($count>0)
         {
             $row=mysqli_fetch_assoc($res);
             $_SESSION['id'] = $row['id'];
             $_SESSION['email'] = $row['email'];
             header('location:index.php');
         }
         else
         {
            header('location:Account.php');
            
            $_SESSION['wrong']="<div class='text-center'>Wrong Password or Username<br>Try Again!</div>";


         }
     }
 ?>
                        


                        
                        
                    </div>
                </div>
    </div> 
</div>
  
</div>
     <!----------Footer--------->
     <?php include('partials-front/footer.php')?>


<!--js for menu toggle-->
<script>
    var MenuItem = document.getElementById("MenuItem");
    MenuItem.style.maxHeight="0px";

    function menutoggle(){
        if(MenuItem.style.maxHeight=="0px"){
            MenuItem.style.maxHeight="200px";
        }
        else{
            MenuItem.style.maxHeight="0px";
        }
    }

</script>

<!--Js for slideshow-->
<script>
    let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>

<!-- Toggle form -->
<script>
    var Login=document.getElementById("login");
    var Register=document.getElementById("register");
    var Indicator =document.getElementById("Indicator")

    function login(){
        Register.style.transform="translateX(0px)";
        Login.style.transform="translateX(0px)";
        Indicator.style.transform="translateX(100px)";
    }
    function register(){
        Register.style.transform="translateX(300px)"
        Login.style.transform="translateX(300px)"
        Indicator.style.transform="translateX(0px)";

    }
</script>
</body>
</html>