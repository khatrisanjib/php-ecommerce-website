<?php

 $active='Cart';
 include("includes/header.php");

?>  

    <div id="content"><!--content being -->
        <div class="container"><!--cointainer being -->
            <div class="col-md-12"> <!--col-md-12 being -->

                <ul class="breadcrumb"> <!--breadcrumb being -->
                     <li>
                        <a href="index.php">Home</a> 
                    </li>
                     <li>
                       Cart
                    </li>
                </ul><!--breadcrumb finish -->

            </div><!--col-md-12 finish -->    
            
            <div id="cart" class="col-md-9"> <!--col-md-9 being -->

                <div class="box"><!--box being -->

                    <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form being-->

                        <h1>Shopping Cart</h1>

                        <?php

                            $ip_add = getRealIpUser();

                            $select_cart ="select * from cart where ip_add= '$ip_add'";

                            $run_cart = mysqli_query($con,$select_cart);

                            $count =mysqli_num_rows($run_cart);
                        
                        ?>

                        <p class="text-muted">You currently have <?php echo $count;?>item(s) in your cart</p>

                        <div class="table-responsive"><!-- table-responsive being-->

                            <table class="table"><!-- table being-->

                                <thead><!-- thead beinng-->

                                    <tr>

                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Size</th>
                                        <th colspan="1">Delete</th>
                                        <th colspan="2">Sub-Total</th>

                                    </tr>

                                </thead><!-- thead finish-->

                                <tbody><!-- tbody being-->

                                    <?php
                                    
                                        $total = 0;

                                        while($row_cart = mysqli_fetch_array( $run_cart)){

                                            $pro_id = $row_cart['p_id'];

                                            $pro_size = $row_cart['size'];

                                            $pro_qty = $row_cart['qty'];

                                            $get_products = "select * from products where product_id=' $pro_id '";

                                            $run_products = mysqli_query($con,$get_products);

                                            while($row_products=mysqli_fetch_array($run_products)){

                                                $product_title= $row_products['product_title'];

                                                $product_img1= $row_products['product_img1'];

                                                $only_price= $row_products['product_price'];

                                                $sub_total= $row_products['product_price'] *$pro_qty;

                                                $total +=  $sub_total;

                                          


                                      
                                    
                                    ?>


                                    <tr><!-- tr being-->

                                    <td>

                                        <img class="img-responsive-cart" src="admin_area/product_images/<?php echo $product_img1; ?>" alt="" >

                                    </td>

                                    <td>

                                        <a href="details.php?pro_id=<?php  echo $pro_id; ?>"><?php echo $product_title; ?></a>

                                    </td>

                                    <td>
                                        <?php echo $pro_qty; ?>
                                    </td>
                                    <td>
                                     <?php echo $only_price; ?>
                                    </td>

                                    <td>
                                        <?php  echo $pro_size; ?>
                                    </td>

                                    <td>
                                        <input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>">
                                    </td>

                                    <td>
                                        $<?php echo $sub_total; ?>
                                    </td>


                                    </tr><!-- tr finish-->

                                    <?php } } ?>

                                </tbody><!-- tbody finish--> 
                            
                                <tfoot><!--tfoot being-->

                                    <tr><!-- tr being-->

                                        <th colspan="5">Total</th>
                                        <th colspan="2"> $<?php echo  $total; ?></th>

                                    </tr><!-- tr finish-->

                                </tfoot><!--tfoot finish-->

                            </table><!-- table finish-->

                        </div><!-- table-responsive finish-->

                        <div class="box-footer"><!-- box-footer being-->

                            <div class="pull-left"><!-- pull-left being-->

                                <a href="index.php" class="btn btn-default"><!-- btn btn-deafult being-->

                                    <i class="fa fa-chevron-left"></i> Continue Shopping

                                </a><!-- btn btn-deafult finish-->

                            </div><!-- pull-left finish-->

                            <div class="pull-right"><!-- pull-right being-->

                                <button type="submit" name="update" value="Update Cart" class="btn btn-default"><!-- btn btn-deafult being-->

                                    <i class="fa fa-refresh"></i> Update Cart

                                </button><!-- btn btn-deafult finish-->

                                <a href="checkout.php" class="btn btn-primary">

                                    Proceed Checkout <i class="fa fa-chevron-right"></i>
                                </a>

                            </div><!-- pull-right finish-->


                        </div><!-- box-footer finish-->

                    </form><!-- form finish-->

                </div> <!--box finish -->

                <?php

                 function update_cart(){

                    global $con;

                    if(isset($_POST['update'])){

                        foreach($_POST['remove'] as $remove_id){

                            $delete_product = "delete from cart where p_id='$remove_id'";

                            $run_delete = mysqli_query($con,$delete_product);

                            if($run_delete){

                                echo "<script>window.open('cart.php','_self')</script>";
                            }

                        }
                    }
                 }

                 echo $up_cart = update_cart();
                ?>

                <div id="row same-height-row"><!--row same-height-row being -->
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 being -->
                        <div class="box same-height headline"><!--box same-height headline being -->
                            <h3 class="text-center">Products you may like</h3>
                        </div><!--box same-height headline finish -->
                    </div><!--col-md-3 col-sm-6 finsh -->

                    <?php

                        $get_products = "select * from products order by rand() LIMIT 0,3";

                        $run_products = mysqli_query($con,$get_products);

                        while($row_products=mysqli_fetch_array($run_products)){


                            $pro_id = $row_products['product_id'];

                            $pro_title = $row_products['product_title'];

                            $pro_price = $row_products['product_price'];

                            $pro_img1 = $row_products['product_img1'];

                            echo "
                            
                          

                                <div class='col-md-3 col-sm-6 center-responsive'><!--col-md-3 col-sm-6 center-responsive being -->
                                        <div class='product same-height'><!--product same-height being -->
                                            <a href='details.php?pro_id=$pro_id'>
                                                <img  class='img-responsive' src='admin_area/product_images/$pro_img1' alt=''>
                                            </a>
                                            <div class='text'><!--text being -->
                                                <h3><a href='details.php?pro_id=$pro_id'> $pro_title</a></h3>
                                                <p class='price'>$$pro_price</p>
                                            </div><!--text finish -->
                                        </div><!--product same-height finish -->
                                </div><!--col-md-3 col-sm-6 center-responsive finish -->

                                ";
                            }
                        
                        
                        ?>
    

                   
                </div><!--row same-height-row finish -->

            </div><!--col-md-9 finish -->  
            
            <div class="col-md-3"><!--col-md-3 being -->

                <div id="order-summary" class="box"><!--box being -->

                    <div class="box-header"><!--box-header being -->

                        <h3>Order Summary</h3>

                    </div><!--box-header-->

                    <p class="text-muted"><!--text-muted being -->

                        Shipping and additional costs are calculated based on value you have entered
                    
                    </p><!--text-muted finish -->

                    <div class="table-responsive"><!--table-responsive being -->

                        <table class="table"><!--table being -->

                            <tbody><!--tbody being -->

                                <tr><!--tr being-->

                                    <td> Order All Sub-Total </td>
                                    <th> $<?php echo  $total; ?> </th>

                                </tr><!--tr finish-->

                                <tr><!--tr being-->

                                    <td> Shipping and Handling </td>
                                    <td> $0 </td>

                                </tr><!--tr finish-->

                                <tr><!--tr being-->

                                    <td> Tax </td>
                                    <td> $0 </td>

                                </tr><!--tr finish-->

                                <tr class="total"><!--tr being-->

                                    <td> Tax </td>
                                    <td>  $<?php echo  $total; ?> </td>

                                </tr><!--tr finish-->

                                

                            </tbody><!--tbody finish -->


                        </table><!--table finish -->

                    </div><!--table-responsive finish -->


                </div><!--box being -->

            </div><!--col-md-3 finish -->

        </div><!--cointainer finish -->
    </div><!--content finish -->







<?php
    
    include("includes/footer.php");
?>    

</div>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>



</body>
</html>