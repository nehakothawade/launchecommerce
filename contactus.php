<!--- Header ---->
<?php 
include 'common/header.php'; 
include 'common/connect.php';
include 'PHP/component.php';


$db=new createDb("project","products");
//$apikey= "rzp_test_rIvdSLh2vPc156"; 
   
?>
<!DOCTYPE html>
<html>
<head>

<style type="text/css">
    .frame_class
    {
        height:250px;
        width:800px;
    }
</style>    
</head>



<body>

           <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>CONTACT US</h2>
                            </div>


                            <form action="cash.php" method="post" name="RegForm" 
                                 onsubmit="return validation()" id="RegForm" autocomplete="off">
                                <div class="row">
                                    <h6>&nbsp; KINDLY PROVIDE ADDRESS INFORMATION</h6>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="" required="" >
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="" required="" >
                                    </div>
                                        
                                          <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="mobilenumber" placeholder="Mobile Number" value="" required="" >
                                    </div>
                                 <div class="col-12 mb-3">
                                        <textarea rows="4" cols="50" name="comment" class="form-control" placeholder="Enter message here" required=""></textarea>  
                                    </div>
                            
                                        

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3748.224245312105!2d73.7809527148668!3d20.041047886541506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bddeb7f2ed3acd3%3A0xfe6281a34555ca88!2sSairaj%20Mess%20By%20Monali%20Paithane!5e0!3m2!1sen!2sin!4v1653743390286!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="frame_class" width="200" height="200" style="border:2px; "allowfullscreen="" loading="lazy" ></iframe>

</div></form>          
                   </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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





