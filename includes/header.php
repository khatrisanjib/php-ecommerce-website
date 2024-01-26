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

        $row_product = mysqli_fetch_array($run_product);

        $p_cat_id = $row_product['p_cat_id'];

        $pro_title = $row_product['product_title'];

        $pro_price = $row_product['product_price'];

        $pro_desc = $row_product['product_desc'];

        $pro_img1 = $row_product['product_img1'];

        $pro_img2 = $row_product['product_img2'];

        $pro_img3 = $row_product['product_img3'];

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

    