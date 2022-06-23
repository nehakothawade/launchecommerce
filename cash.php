<?php
include 'common/header.php'; 
include 'common/connect.php';
include 'PHP/component.php';
$database=new createDB("project","products");

?>
<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                          
                            <div class="cart-title">
                                <h2>&nbsp; ORDER STATUS</h2>
                            </div>
                            <?php
                                            $con = mysqli_connect('localhost','root','','project');

                                            if(!$con) {
                                                echo 'Not connected to server!';
                                            }

                                         else{   
                                            $address = $_POST['delivery_address'];
                                            $email= $_POST['email'];
                                            $city= $_POST['city'];
                                            $pincode= $_POST['pincode'];
                                                  //$file= $_POST['receipt'];
                                            //$file= $_POST['file'];

                                            $sql = "INSERT INTO customers (email,address,city,pincode) VALUES ('$email','$address','$city','$pincode')";
                                            if(!mysqli_query($con,$sql)) {
                                                echo 'Order details not found';
                                            } 
                                           }
                                     ?>
                                     <form autocomplete="off">
                                <div class="row">
                                    &nbsp;&nbsp;&nbsp;   <label>Email</label>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control"  disabled placeholder=<?php echo $email?> >
                                    </div>
                                    &nbsp;&nbsp; &nbsp;  <h6>Delivery Address</h6>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control"  disabled placeholder=<?php echo $address ?>>
                                    </div>
                                    &nbsp; &nbsp; &nbsp; <h6>City</h6>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control"  disabled placeholder=<?php echo $city ?>>
                                    </div>
                                    &nbsp;&nbsp; &nbsp;  <h6>Pincode</h6>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control"  disabled placeholder=<?php echo $pincode?>>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                    <input type="submit" class="btn amado-btn w-100" name="" value="Congratulations..Your order is placed successfully..." disabled="">
                                      </div>
                                </div>   