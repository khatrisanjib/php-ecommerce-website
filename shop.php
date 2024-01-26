<?php

 $active='Shop';
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
                            Shop
                        </li>
                    </ul><!--breadcrumb finish -->

                </div><!--col-md-12 finish -->

                <div class="col-md-3">
                
                 <?php include("includes/sidebar.php");?>
                
                </div>

                <div class="col-md-9"><!--col-md-9 being  -->

                    <?php

                        if(!isset($_GET['p_cat'])){

                        echo "

                        <div class='box'><!--box being  -->
                            <h1>Shop</h1>
                            <p>
                                sdxrcfvgbhnjmdrcftvgybhunjkmredftgybhunjmrftvgybhunjmk
                                edrftgyhujk,ldrftgybhunjmk
                            </p>
                        </div><!--box finish  -->
                        
                        ";
                    
                    }

                    ?>

                   

                    <div class="row"><!-- row Begin -->
                        <?php 
                            if (!isset($_GET['p_cat'])) {
                                $per_page = 6; 
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $start_from = ($page - 1) * $per_page;
                                $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                                $run_products = mysqli_query($con,$get_products);
                                while($row_products = mysqli_fetch_array($run_products)){

                                    $pro_id = $row_products['product_id'];
                            
                                    $pro_title = $row_products['product_title'];
                            
                                    $pro_price = $row_products['product_price'];
                            
                                    $pro_sale_price = $row_products['product_sale'];
                            
                                    $pro_img1 = $row_products['product_img1'];
                            
                                    $pro_label = $row_products['product_label'];
                            
                                    if($pro_label == 'sale' ){
                            
                                        $product_price  = "<del> $ $pro_price </del>";
                            
                                        $product_sale_price = " / $ $pro_sale_price";
                            
                                    } else{
                            
                                        $product_price  = "$ $pro_price ";
                            
                                        $product_sale_price = "";
                                        
                                    }
                            
                                    if($pro_label == ""){
                            
                                    }else{
                            
                                        $product_label = "
                            
                                            <a href=# class='label' $pro_label >
                                            
                                                <div class='theLabel'> $pro_label </div>
                                                <div class='labelBackgorund'> </div>
                                            
                                            </a>
                                        
                                        
                                        
                                        
                                        ";
                                    }
                            
                                    echo "
                                    
                                    <div class='col-md-4 col-sm-6 cebter-responsive'>
                            
                                        <div class='product'>
                                        
                                            <a href='details.php?pro_id=$pro_id'>
                            
                                                <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                            
                                            </a>  
                            
                                            <div class='text'>
                            
                                                <h3>
                            
                                                    <a href='details.php?pro_id=$pro_id'>
                            
                                                         $pro_title
                            
                                                    </a>  
                                                
                                                </h3>
                            
                                                <p class='price'>
                                                
                                                 $product_price &nbsp;$product_sale_price
                                                
                                                </p>
                            
                                                <p class='button'>
                               
                                                    <a  class='btn btn-default' href='details.php?pro_id=$pro_id'>
                            
                                                       View Details
                            
                                                    </a>  
                            
                                                    <a  class='btn btn-primary' href='details.php?pro_id=$pro_id'>
                            
                                                        <i class='fa fa-shopping-cart'></i> Add to Cart
                            
                            
                                                    </a>
                            
                                                </p>
                                            
                                            </div>
                            
                                            $product_label
                                        
                                        </div>
                                    
                                    </div>
                                    
                                    ";
                            
                                }
                           

                        ?>

                    </div><!-- row Finish -->
                            

            

                    <center>
                        <ul class="pagination"><!--pagination being  -->

                            <?php
                                $per_page = 6;
                                $query = "select * from products";

                                $result = mysqli_query($con,$query);

                                $total_records = mysqli_num_rows($result);

                                $total_pages = ceil($total_records / $per_page);

                                echo "
                                    <li>
                                        <a href='shop.php?page=1'> ".'First Page'." </a>
                                    </li>
                                ";

                                for ($i = 1; $i <= $total_pages; $i++) {
                                    echo "
                                        <li>
                                            <a href='shop.php?page=" . $i . "'>" . $i . "</a>
                                        </li>
                                    ";
                                }

                                echo "
                                    <li>
                                        <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>
                                    </li>
                                ";

                            }
                                
                                
                            ?>
                                
                        </ul><!--pagination finish  -->
                    </center>
        

                    <?php getpcatpro(); ?>
             </div> <!--col-md-9 finsh -->      

        </div><!--cointainer finish -->
    </div><!--content finish -->
        
 
   
    
    <div class="clearfix">


        <?php
            
            include("includes/footer.php");
        ?>    

    </div>
   
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>



 </body>
</html>