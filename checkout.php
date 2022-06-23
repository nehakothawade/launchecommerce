<!--- Header ---->
<?php 
include 'common/header.php'; 
include 'common/connect.php';
include 'PHP/component.php';


$db=new createDb("project","products");
//$apikey= "rzp_test_rIvdSLh2vPc156"; 
   
?>
    


           <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>CHECKOUT</h2>
                            </div>

                            <form action="cash.php" method="post" name="RegForm" 
                                 onsubmit="return validation()" id="RegForm" autocomplete="off">
                                <div class="row">
                                    <h6>&nbsp; KINDLY PROVIDE ADDRESS INFORMATION</h6>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="" required="" >
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="delivery_address" placeholder="Delivery address" value="" required="" >
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="city" placeholder="City" value="" required="">
                                    </div>
                                
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="pincode" placeholder="Pincode" value="" required="">
                                    </div>
                                    &nbsp; <label>Make Payment on Delivery</label>

                                    <!--<div class="col-12 mb-3">
                                        <input type="file" class="form-control mb-3" name="receipt" placeholder="" value="" required="">
                                    </div>-->
                                    
  <div class="col-12 mb-3">
                                    <input type="submit" class="btn amado-btn w-100" name="Pay_Now" value="Buy Now">
                                      </div>
                               
                                </div>
                            </form>

                          <!--   <form>-->

                                   <!--<script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_JTrMnt5CvB7Ff1" async> </script> </form>
                              

                              <a href="https://rzp.io/l/Zys5XOuK">Pay Here</a>  -->
                               <!-- <?php $total = $_POST['total'] ; ?>
                              <button id="rzp-button1" class="btn amado-btn w-100" style.display='block' style="width:auto;">Buy Now</button>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_rIvdSLh2vPc156", // Enter the Key ID generated from the Dashboard
    "amount": <?php echo $total ."00"?>, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise

    "currency": "INR",
    "name": "Sairaj Gruh Udyog",
    "description": "Test Transaction",
    "image": "C:/xampp2/htdocs/AGPS/img/core-img/gpslogo2.jpg",
    "id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){
        alert("Payment Successful");
        alert(response.razorpay_order_id);
        alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "Sairaj Gruh Udyog",
        "email": "shivanipaithane2222@gmail.com",
        "contact": "9632587410"
    },
    "notes": {
        "address": "Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        alert(response.error.code);
        alert(response.error.description);
        alert(response.error.source);
        alert(response.error.step);
        alert(response.error.reason);
        alert(response.error.metadata.order_id);
        alert(response.error.metadata.payment_id);
});
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
                        </div>
                    </div>-->
                    <script>
                        
                    function validation() {
    
                      var email = document.forms["RegForm"]["email"];
                      var address= document.forms["RegForm"]["delivery_address"];
                      var city = document.forms["RegForm"]["city"];

                     if (email.value == "") {
                        window.alert(
                          "Please enter a valid e-mail address.");
                        email.focus();
                        return false;
                    }
                    if (address.value == "") {
                        window.alert("Please enter your address.");
                        address.focus();
                        return false;
                    }            
                    return true;
                }
                </script>
                




              
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





