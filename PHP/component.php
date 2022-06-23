
<?php
function component($productname,$productprice,$productimage,$productid,$productquantity)
{?>	 
	<div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                                 
                           
                                <div class="product-img">
                                <a href="product1.php">
                                <img style="width:500px;height:400px;" src=<?php echo $productimage ?> >
								
                             
                                <img class="hover-img" style="width:500px;height:400px;" src=<?php echo $productimage ?>>
                            </div>

                            <div class="product-description d-flex align-items-center justify-content-between">
                           
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">Price:<?php echo $productprice ?></p>
                                   
                                        <h6 ><?php echo $productname ?> </h6>
                                            
                                               <?php 
                                                    if ($productquantity<=0){
                                                         ?><h6 style="color:red"><?php echo nl2br("Currently Unavailable \n");?></h6>
                                                    <?php  }
                                               
                                                     elseif( $productquantity<=5 AND $productquantity>0)
                                                    {

                                                        ?><h6 style="color:red" >Hurry! only few left..</h6>

                                                  <?php
                                                    } 
                                                    else
                                                    {
                                                        echo "In Stock: $productquantity" ;
                                                    }
                                                    ?>
                                    </a>
                             </div>
                                    <div class="cart">
                                    <!--<div class="amado-btn-group mt-30 mb-100">-->
                                    <div class="col-12 mb-3">
                                  <form method="post">
                            <?php 
                            if($productquantity<=0){?>
                                    <button type="submit" class="btn amado-btn w-100" name="add" disabled >Add To Cart <img src="img/core-img/cart.png" alt=""></button>
                          <?php  }
                          else
                          {
                            ?><button type="submit" class="btn amado-btn w-100" name="add"  >Add To Cart <img src="img/core-img/cart.png" alt=""></button>
                          <?php }?>
                                	

                                     
                                    <input type="hidden" name="product_id" value=<?php echo $productid?>>
                                </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </a>

<?php
}
?>
<?php


function cartElement($productimage,$productname,$productprice,$productid,$productquantity)
{?>  
    
    <form action="cart.php?action=remove&id=<?php echo $productid ?>"  method="post">
    <tr>
                                        <td class="cart_product_img">
                                            <a href="#"><img src=<?php echo $productimage ?> ></a>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $productname ?></h5>
                                        </td>
                                        <td class="price">
                                            <span><?php echo $productprice ?></span>
                                        </td>
                                    <td class="qty">
                                            <div class="qty-btn d-flex">
                                                <p>Qty</p>
                                                <div class="quantity">
                                                    
                                                    <input type="number" class="qty-text" id="qty"  min="1" name="qty" value="1" max=<?php echo ($productquantity) ?> >
                                                    <input type="submit"  value="Update" class="option-btn">
                                            
                                            </div> 
                                        </td>

                                        <td class="remove">
                                            <span>
                                                <div class="amado-btn-group mt-30 mb-100">
                                                <button type="submit" class="btn amado-btn mb-15" name="remove">Remove </a>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                            </form>           
    <?php
    }
?>