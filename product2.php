<?php 

//start session
//session_start();
require_once('common/header.php') ; 
include 'PHP/component.php';
include 'common/connect.php';

//create instance of createDB class
$database=new createDB("project","products");

?>
<div class="shop_sidebar_area">
            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>
                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <li class="active"><a href="product2.php">Food</a></li>
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
                    component($row['P_title'],$row['P_price'],$row['P_image'],$row['P_id']);
                 }
                
                 ?>
 <!--
                 component("Sweet shankarpali","80","img/core-img2/2P.jpg");
                 component("Spinach Shev","60","img/core-img2/3P.jpg");
                 component("Kharipuri","55","img/core-img2/1P.jpg");
                 component("Nagali Papad","150","img/core-img2/4P.jpg");
                 component("Methkut","50","img/core-img2/5P.jpg");
                 component("chat Masala","30","img/core-img2/6P.jpg");

                 insert into products values("Sweet shankarpali","80","img/core-img2/2P.jpg");
                 insert into products values("Spinach Shev","60","img/core-img2/3P.jpg");
                 insert into products values("Kharipuri","55","img/core-img2/1P.jpg");
                 insert into products values("Nagali Papad","150","img/core-img2/4P.jpg");
                 insert into products values("Methkut","50","img/core-img2/5P.jpg");
                 insert into products values("chat Masala","30","img/core-img2/6P.jpg");
 --->
</div></div>
                <div class="row">
                    <div class="col-12">
                        <!-- Pagination 
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item active"><a class="page-link" href="shop.php">01.</a></li>
                                <li class="page-item"><a class="page-link" href="shop2.php">02.</a></li>
                                </ul>
                        </nav>
                        -->
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