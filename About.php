<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | K-Tech</title>
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <!--Header-->
    
        <div class="container">
        <?php include('partials-front/navbar.php')?>
        
               
    </div>
    <div class="about">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <p><span style="color: black;">“K-Tech.lk”</span> is one of the leading IT retail companies in Sri Lanka. Since its inception in 2022, Laptop.lk has become synonymous with all computer needs, both online & in-store. To keep up with the sharp increase in the customer demand, paving the way for our management to set up a multi-branded laptop outlet all under one roof, which led us to establish the company “IT Galaxy (Pvt) Ltd” in 2012. Multi branded retail store, “IT Galaxy” was the first of its kind and have always satisfied customers with all their computer needs and is growing strongly.<br><br>

                        Our Major priority is to build and maintain customer relationships by providing the best value, high-quality products, and outstanding service. Today, we offer a variety of IT products to serve all your computer needs with an outstanding range of Notebooks, Branded PCs, Printers, Computer Accessories & Peripherals in its portfolio. “Laptop.lk” is comprised of the world’s leading IT brands such as HP, Asus, Dell, Lenovo, and Acer to name a few. Our display layout is designed and branded to precise specification by each of the relevant manufacturers.<br><br>
                        
                        We are also well known for our good customer service. our well-trained staff effectively assist customers with all of their needs. Our Customer service doesn’t end with the close of a sale but creates loyalty for our business by providing good after-sales service.<br><br>
                        
                        We place great emphasis on the customers’ satisfaction by offering our customers with a unique & probably the best after-sales service support by the professionally certified staff for free, for the next 2nd and 3rd year for all our laptops.</p> 
                </div>
                <div class="col-2">
                    <img src="images/about.jpg" alt="" width="60%">
                </div>
            </div>
        </div>
    </div>    
    <!----------Footer--------->
    <?php include('partials-front/footer.php')?>

    
</div>

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
</body>
</html>