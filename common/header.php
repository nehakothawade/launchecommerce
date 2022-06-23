<!DOCTYPE html>
<html lang="en">
   
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sairaj Gruh Udyog</title>   
    <link rel="icon" href="img/core-img/sairajlogo2.png">
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

   <?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:login.php');
}
?>

  


    <div class="main-content-wrapper d-flex clearfix">
         <div class="mobile-nav">
            <div class="amado-navbar-brand">
                <a href="index.php"><img src="img/core-img/sairajlogo2.png" alt="" style="width:900px;height:400px;"></a>
            </div>
      
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>
        <header class="header-area clearfix">
            
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            
            <div class="logo">
                <a href="index.php"><img src="img/core-img/sairajlogo2.png" alt="" style="width:1000px;height:175px;"></a>
            </div>
        
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="#.php">Home</a></li>
                    <li><a href="product1.php">Products</a></li>
                    <!--<li><a href="product-details.php">Product</a></li>-->
                    <li><a href="cart.php">Cart</a></li>
                     <li><a href="contactus.php">Contact Us</a></li>
                    <!--<li><a href="checkout.php">Checkout</a></li>-->
                </ul>
            </nav>
 <div class="amado-btn-group mt-30 mb-100">
               
                <!--<a href="login.php" class="btn amado-btn mb-15" target="_blank">Login</a>-->
                 <a href="logout.php" class="btn amado-btn mb-15" >Logout</a>
            </div>

            <div class="cart-fav-search mb-100">
                <a href="cart.php" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart
                </a>


            
                </a>
                </div>
   
            <div class="social-info d-flex justify-content-between">
                <a href="#" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="#" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
        </header>
 