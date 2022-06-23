<?php 

//start session
//session_start();
require_once('common/header.php') ; 
include 'PHP/component.php';
include 'common/connect.php';

//create instance of createDB class
$database=new createDB("project","products");

if(isset($_POST['add']))
{
    
    if(isset($_SESSION['cart']))
    {
        $item_array_id=array_column($_SESSION['cart'],"product_id");
        if(in_array($_POST['product_id'],$item_array_id))
        {
            echo '<script>alert("Product is already added in the cart...!")</script>';    
            echo '<script>window.location="product1.php";</script>';     
        }
        else
        {
            echo '<script>alert("Added...!")</script>';   
                $count=count($_SESSION['cart']);
           $item_array=array('product_id'=>$_POST['product_id']);  
           $_SESSION['cart'][$count]=$item_array;
        }
    }
   else
   {
     $item_array=array('product_id'=>$_POST['product_id']);
     $_SESSION['cart'][0]=$item_array;
        
  }
}
?>
<div class="shop_sidebar_area">
            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>
                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <li class="active"><a href="product1.php">Food</a></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

            
                 <div class="row">
                 <?php
                 $result=$database->getData();
                 while($row=mysqli_fetch_assoc($result))
                 {
                    component($row['P_title'],$row['P_price'],'admin/imgs/'.$row['P_image'],$row['P_id'],$row['P_quantity']);
                 }
                
                 ?>
 
</div></div>
                <div class="row">
                    <div class="col-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

   

   <!--- Footer ---->
    <?php include 'common/footer.php'; ?>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>
</html>