<!--- Header ---->

<?php
$con = mysqli_connect("localhost", "root", "", "project");
                    
include 'common/connect.php';
include 'PHP/component.php';
include 'common/header.php' ;  
$db=new createDb("project","products");

if(isset($_POST['remove']))
{
    if($_GET['action']=='remove')
    {
        foreach($_SESSION['cart'] as $key =>$value)
        {
            if($value["product_id"]==$_GET['id'])
            {
                unset($_SESSION['cart'][$key]);
                echo'<script>alert("Product is Removed from the cart....")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}

?>
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopped Items</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <b><th>Name</th></b>
                                        <b><th>Price</th></b>
                                         <b><th>Quantity</th></b>
                                         <b><th>Remove</th></b>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                              
                                 $total=0;
                                if(isset($_SESSION['cart']))
                                {
                                    $product_id=array_column($_SESSION['cart'],"product_id");
                                    $result=$db->getData();
                                   
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        foreach($product_id as $id)
                                        {
                                           if($row['P_id']==$id)
                                            {   
                                                                                                 
                                                    cartElement('admin/imgs/'.$row['P_image'],$row['P_title'],$row['P_price'],$row['P_id'],$row['P_quantity']);
                                                    
                                                    if($row['P_quantity']==0)
                                                    {
                                                        break;
                                                    }
                                                    elseif(isset($_POST['qty']))
                                                    {   $val=$_POST['qty'];
                                                        $sql_1="update products set P_quantity = P_quantity -$val where P_id=$id";
                                                        $rs=mysqli_query($con,$sql_1);
                                                        
                                                        $total=$total+$row['P_price']*$val;
                                        
                                                    }
                                                   

                                            }
                                                 
                                        }                                         
                                    }
                                }
                                else
                                            {
                                                   echo '<script>Cart is Empty</script>';  
                                            }
                             ?>
                                 </tbody>
                            </table>
                         </div>
                        </div>
                        <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <?php

                                    if(isset($_SESSION['cart']))
                                    {
                                        $count=count($_SESSION['cart']);
                                        echo "<li><span>Items in the cart:</span> <span>($count Items)</span></li>";
                                    }
                                    else
                                    {
                                        echo "<li><span>Items in the cart:</span> <span>(0 items)</span></li>";
                                    }
                                ?>
                                
                                <?php

                                        echo "<li><span>Subtotal:</span> <span>$total Rs.</span></li>";
                                         echo "<li><span>Delivery:</span> <span>Free</span></li>";
                                        echo "<li><span>Total:</span> <span>$total Rs.</span></li>";
                                ?>
                           
  

                               
                            </ul>

                            <div class="cart-btn mt-100">
                           <?php 
                           if($total==0)
                            {?>
                                  <button onclick="checkout.php" class="btn amado-btn w-100" disabled ? >Ready to checkout</a>
                       
                                <?php
                        }   
                            else
                            {
                                 ?> <form action="checkout.php" method="POST">
                                        <input type="submit" name="total" class="btn amado-btn w-100" placeholder=" Ready to checkout" name="total" value="<?php echo $total ?>">
                                    </form>
                                    <!--<a href="checkout.php" class="btn amado-btn w-100" name="total"  >Ready to Checkout</a> -->
                            <?php
                        }
                            ?>
                    
                           </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</button></div></div></div></form>
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