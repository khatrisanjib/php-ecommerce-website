<?php

session_start();

include("includes/db.php");
include("functions/functions.php");

?>  

<?php

    if(isset($_GET['pro_id'])){

        $product_id = $_GET['pro_id'];

        $get_product = "select * from products where product_id=  '$product_id'";

        $run_product = mysqli_query($con, $get_product );

        $row_products = mysqli_fetch_array($run_product);

        $p_cat_id = $row_products['p_cat_id'];

        $pro_title = $row_products['product_title'];

        $pro_price = $row_products['product_price'];

        $pro_sale_price = $row_products['product_sale'];

        $pro_desc = $row_products['product_desc'];

        $pro_img1 = $row_products['product_img1'];

        $pro_img2 = $row_products['product_img2'];

        $pro_img3 = $row_products['product_img3'];

        $pro_label = $row_products['product_label'];

        if($pro_label == ""){

        }else{

            $product_label = "

                <a href=# class='label' $pro_label >
                
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackgorund'> </div>
                
                </a>
            
            
            
            
            ";
        }

        $get_p_cat= "select * from product_categories where p_cat_id= '$p_cat_id'";

        $run_p_cat = mysqli_query($con, $get_p_cat);

        $row_p_cat = mysqli_fetch_array( $run_p_cat);

        $p_cat_title =  $row_p_cat['p_cat_title'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chiya Ghar </title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
   

</head>
<body>

    <div id="top"><!--Top begins -->
    
       <div class="container"><!--container begins -->
 
         <div class="col-md-6 offer"><!--col-md-6 offer begins -->

                <a href="#" class="btn btn-success btn">

                    <?php

                        if(!isset($_SESSION['customer_email'])){

                            echo " Welcome: Guest";
                            
                        }else{

                            echo"Welcome: " . $_SESSION['customer_email'] . "";

                        }
                    
                    ?>

                </a>
                <a href="checkout.php"><?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>

         </div><!--col-md-6 offer finish --> 

          <div class="col-md-6"><!--col-md-6  begins -->

                <ul class="menu"><!--menu begins -->

                    <li>
                        <a href="customer_register.php">Register</a>
                    </li>
                    <li>
                        <a href="checkout.php">My Account</a>
                    </li>
                    <li>
                        <a href="cart.php"> Go To Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">
                            
                            
                            <?php
                            
                                if(!isset($_SESSION['customer_email'])){

                                    echo "<a href='checkout.php'> Login </a> ";
                                    
                                }else{
        
                                    echo " <a href='logout.php'> Log Out </a> ";
                                }
                            
                           ?>
                        </a>
                    </li>

                </ul><!--menu finish --> 

          </div><!--col-md-6  finish --> 

       </div> <!--container finish -->    

    </div><!--Top finish -->

    <div id="navbar" class="navbar navbar-default"> <!--navbar navbar-default beign -->

        <div class="container"><!--container beign -->

           <div class="navbar-header"><!--navbar-headerr beign -->

               <a href="index.php" class="navbar-brand home"><!--navbar-brand home beign -->

                <img src="images/chiyaghar-logo.png" alt="chiya-ghar-logo" class="hidden-xs">
                <img src="images/chiyaghar-logo-mobile.png" alt="chiya-ghar-logo-mobile" class="visible-xs">

              </a><!--navbar-brand home finish -->

              <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                <span class="sr-only">Toggle Navigation</span>

                <i class="fa fa-align-justify"></i>

              </button>
              
              <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                <span class="sr-only">Toggle Search</span>
                
                <i class="fa fa-search"></i>

              </button>

           </div><!--navbar-header finish -->

            <div class="navbar-collapse collapse" id="navigation"><!--navbar-collapse collapse being -->

                <div class="padding-nav"><!--padding-nav being -->

                    <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                        
                        <li class="<?php if($active=='Home') echo"active"; ?>">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="<?php if($active=='Shop') echo"active"; ?>">
                            <a href="shop.php">Shop</a>
                        </li>
                        <li class="<?php if($active=='Account') echo"active"; ?>">
                            
                            <?php 
                            
                            if(!isset($_SESSION['customer_email'])){
                                
                                echo"<a href='checkout.php'>My Account</a>";
                                
                            }else{
                                
                                echo"<a href='customer/my_account.php?my_orders'>My Account</a>"; 
                                
                            }
                            
                            ?>
                            
                        </li>
                        <li class="<?php if($active=='Cart') echo"active"; ?>">
                            <a href="cart.php">Shopping Cart</a>
                        </li>
                        <li class="<?php if($active=='Contact') echo"active"; ?>">
                            <a href="contact.php">Contact Us</a>
                        </li>
                        
                    </ul><!-- nav navbar-nav left Finish -->

                </div><!--padding-nav finish -->

                <a href="cart.php" class="btn navbar-btn btn-primary right"><!--btn navbar-btn btn-primary right being -->

                    <i class="fa fa-shopping-cart"></i>

                    <span><?php  items();?> Items In Your Cart</span>

                </a><!--btn navbar-btn btn-primary right finish -->

                <div class="navbar-collapse collapse right"><!--navbar-collapse collapse right being -->

                    <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!--btn btn-primary navbar-btn being -->

                        <span class="sr-only">Toggle Search</span> 

                        <i class="fa fa-search"></i>

                    </button><!--btn btn-primary navbar-btn finish -->

                </div><!--navbar-collapse collapse right finish -->

                <div class="collapse clearfix" id="search"><!--collapse clearfix being -->

                   <form method="get" action="results.php" class="navbar-form"><!--navbar-form being -->

                        <div class="input-group"><!--input-group being -->

                            <input type="text" class="form-control" placeholder="Search" name="user-query"
                            required>

                            <span class="input-group-btn"><!--input-group-btn being -->

                            <button  type="submit" name="Search" value="Search" class="btn btn-primary"><!--btn btn-primary being-->

                                <i class="fa fa-search"></i>

                            </button><!--btn btn-primary finish -->

                            </span><!--input-group-btn finish -->

                        </div><!--input-group finish-->

                   </form> <!--navbar-form finish -->

                </div><!--collapse clearfix finish -->

            </div><!--navbar-collapse collapse finish -->

      </div><!--container finish -->

    </div><!--navbar navbar-default finish -->

     

    <div id="content"><!--content being -->
        <div class="container"><!--container being -->
            <div class="col-md-12"> <!--col-md-12 being -->

                <ul class="breadcrumb"> <!--breadcrumb being -->
                    <li>
                        <a href="index.php">Home</a> 
                    </li>
                     <li>
                         shop
                    </li>

                    <li>
                        <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo  $p_cat_title; ?> </a>
                    </li>

                    <li> <?php echo  $pro_title;?></li>
                </ul><!--breadcrumb finish -->

            </div><!--col-md-12 finish -->

            <div class="col-md-12"><!--col-md-12 being -->
                <div id="productmain" class="row"><!--row being -->
                    <div class="col-sm-6"><!--col-sm-6 being -->
                        <div id="mainImage"><!--mainImage being -->
                            <div class="carousel slide"id="myCarousel"   data-ride="carousel"><!--carousel slide being -->
                                <ol class="carousel-indicators"><!--carousel-indicators being -->
                                    <li  data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol><!--carousel slide finish -->

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1;   ?>" alt="Product 3-a"style="border: 2px solid #ddd; border-radius: 8px; padding: 5px;"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img2;   ?>" alt="Product 3-a"style="border: 2px solid #ddd; border-radius: 8px; padding: 5px;"></center>
                                    </div>
                                    <div class="item">
                                        <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img3;   ?>" alt="Product 3-a"style="border: 2px solid #ddd; border-radius: 8px; padding: 5px;"></center>
                                    </div>
                                </div>

                                <a href="#myCarousel" class="left carousel-control" data-slide="prev"><!--left carousel-control being -->
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                </a><!--left carousel-control finish -->

                                <a href="#myCarousel" class="right carousel-control" data-slide="next"><!--right carousel-control being -->
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                </a><!--right carousel-control finish -->

                            </div><!--carousel slide  finish -->
                        </div><!--mainImage finish -->

                            <?php echo  $product_label; ?>

                    </div><!--col-sm-6 finish -->

                    <div class="col-sm-6"><!--col-sm-6 being -->
                        <div class="box"><!--box being -->
                            <h1 class="text-center"><?php echo $pro_title;?></h1>

                            <?php add_cart(); ?>

                            <form action="details.php?add_cart=<?php echo $product_id;?>" class="form-horizontal" method="post"><!--form-horizontal being -->
                                <div class="form-group"><!--form-group being -->
                                    <label for="" class="col-md-5 control-label">Product Quantity</label>

                                    <div class="col-md-7"><!--col-md-7 being -->
                                        <select name="product_qty" id="form-control" class="form-control"><!--select being -->
                                            <option >1</option>
                                            <option >2</option>
                                            <option >3</option>
                                            <option >4</option>
                                            <option >5</option>
                                        </select><!--select finish -->
                                    </div><!--col-md-7 finish -->

                                </div><!--form-group finish -->

                                <div class="form-group"><!--form-group being -->
                                    <label class="col-md-5 control-label">Product size</label>
                                    <div class="col-md-7">
                                        <select name="product_size" class="form-control" required><!-- form-control Begin -->
                                                <!-- <option disabled selected>Select a size</option> -->
                                                <option selected>Small(500gram)</option>
                                                <option >Medium(1kg)</option>
                                                <option >Large(2kg)</option>
                                        </select>
                                    </div>
                                </div><!--form-group finish -->

                               <?php
                               
                                    if($pro_label == 'sale' ){

                                        echo"

                                            <p class='price' style='font-size: 18px; text-align: center; font-weight: 400;'>


                                              PRICE :$ <del> $pro_price </del><br>
                                
                                              SALE: $  $pro_sale_price 

                                            </p>

                                        ";
                            
                                    } else{
                            
                                        echo"

                                            <p class='price' style='font-size: 18px; text-align: center; font-weight: 400;'>


                                                PRICE : $ $pro_price 

                                            </p>
                                        ";
                                        
                                    }
                    
                               
                               ?>

                                <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>

                            </form><!--form-horizontal finish -->

                        </div><!--box finish -->

                        <div class="row" id="thumbs"><!--row being-->

                            <div class="col-xs-4"><!--col-xs-4 being-->
                                <a data-target="#myCarousel" data-slide-to="0" href="#" class="thumb"><!--thumb being-->
                                <img src="admin_area/product_images/<?php echo $pro_img1;   ?>" alt="" class="img-responsive"
                                style="border: 2px solid #ddd; border-radius: 8px; padding: 5px;">
                                </a><!--thumb finish-->
                            </div><!--col-xs-4 finish-->

                            <div class="col-xs-4"><!--col-xs-4 being-->
                                <a data-target="#myCarousel" data-slide-to="1" href="#" class="thumb"><!--thumb being-->
                                <img src="admin_area/product_images/<?php echo $pro_img2;   ?>" alt="" class="img-responsive"style="border: 2px solid #ddd; border-radius: 8px; padding: 5px;">
                                </a><!--thumb finish-->
                            </div><!--col-xs-4 finish-->

                            <div class="col-xs-4"><!--col-xs-4 being-->
                                <a data-target="#myCarousel" data-slide-to="2" href="#" class="thumb"><!--thumb being-->
                                <img src="admin_area/product_images/<?php echo $pro_img3;   ?>" alt="" class="img-responsive" style="border: 2px solid #ddd; border-radius: 8px; padding: 5px;">
                                </a><!--thumb finish-->
                            </div><!--col-xs-4 finish-->

                            
                            


                        </div><!--row finish-->
                    </div><!--col-sm-6 finish -->


                </div><!--row finish -->

                <div class="box" id="details"><!--box being -->

                       <h4>Product Details</h4>
                    <p>

                     <?php echo $pro_desc;?>

                    </p>
                         <h4>Weight</h4>

                         <ul>
                            <li>500gram</li>
                            <li>1kg</li>
                            <li>2kg</li>
                        
                        </ul>

                         <hr>



                </div><!--box finish -->

                <div id="row same-height-row"><!--row same-height-row being -->
                    <div class="col-md-3 col-sm-6"><!--col-md-3 col-sm-6 being -->
                        <div class="box same-height headline"><!--box same-height headline being -->
                            <h3 class="text-center">Products you may like</h3>
                        </div><!--box same-height headline finish -->
                    </div><!--col-md-3 col-sm-6 finsh -->

                    <?php

                        $get_products = "SELECT * FROM products ORDER BY RAND() LIMIT 3";

                        $run_products = mysqli_query($con,$get_products);

                        while($row_products=mysqli_fetch_array($run_products)){

                            $pro_id = $row_products['product_id'];

                            $pro_title = $row_products['product_title'];
                    
                            $pro_price = $row_products['product_price'];
                    
                            $pro_desc = $row_products['product_desc'];
                    
                            $pro_img1 = $row_products['product_img1'];

                            echo"

                                <div class='col-md-3 col-sm-6 center-responsive'>

                                <div class='product same-height'>

                                    <a href='details.php?pro_id=$pro_id'>
                                    
                                        <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
                                    
                                    </a>

                                    <div class='text'>
                                    
                                        <h3><a href='details.php?pro_id=$pro_id'> $pro_title </a></h3>

                                        <p class='price'>$ $pro_price </p>

                                    </div>
                                
                                </div>
                                
                                </div>
                            ";
                        }
                    
                    ?>
                    


                </div><!--row same-height-row finish -->

            </div><!--col-md-12 finish -->

                 
        </div><!--container finish -->
    </div><!--content finish -->

 
  
    
    <section>
      <?php require("includes/footer.php"); ?>
    </section>

   
   <script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>



 </body>
</html>