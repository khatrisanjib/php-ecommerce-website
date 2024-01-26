<?php

session_start();

if(!isset($_SESSION['customer_email'])){

    echo "<script>window.open('../checkout.php','_self')</script>";
}else{

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
}

include("includes/db.php");
include("functions/functions.php");

?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chiya Ghar Store</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               
               </a>
               <a href="checkout.php"> <?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>
               
           </div><!-- col-md-6 offer Finish -->
           
           <div class="col-md-6"><!-- col-md-6 Begin -->
               
               <ul class="menu"><!-- cmenu Begin -->
                   
                   <li>
                       <a href="../customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                       
                        <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

                               }
                           
                         ?>
                       
                       </a>
                   </li>
                   
               </ul><!-- menu Finish -->
               
           </div><!-- col-md-6 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->
   
   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="navbar-header"><!-- navbar-header Begin -->
               
               <a href="../index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->
                   
                   <img src="images/ecom-store-logo.png" alt="Chiya Ghar-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="Chiya Ghar-Store Logo Mobile" class="visible-xs">
                   
               </a><!-- navbar-brand home Finish -->
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div><!-- navbar-header Finish -->
           
           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->
               
               <div class="padding-nav"><!-- padding-nav Begin -->
                   
                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->
                       
                       <li>
                           <a href="../index.php">Home</a>
                       </li>
                       <li>
                           <a href="../shop.php">Shop</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">My Account</a>
                       </li>
                       <li>
                           <a href="../cart.php">Shopping Cart</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contact Us</a>
                       </li>
                       
                   </ul><!-- nav navbar-nav left Finish -->
                   
               </div><!-- padding-nav Finish -->
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> Items In Your Cart</span>
                   
               </a><!-- btn navbar-btn btn-primary Finish -->
               
               <div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Begin -->
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search"><!-- btn btn-primary navbar-btn Begin -->
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button><!-- btn btn-primary navbar-btn Finish -->
                   
               </div><!-- navbar-collapse collapse right Finish -->
               
               <div class="collapse clearfix" id="search"><!-- collapse clearfix Begin -->
                   
                   <form method="get" action="results.php" class="navbar-form"><!-- navbar-form Begin -->
                       
                       <div class="input-group"><!-- input-group Begin -->
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn"><!-- input-group-btn Begin -->
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary"><!-- btn btn-primary Begin -->
                               
                               <i class="fa fa-search"></i>
                               
                           </button><!-- btn btn-primary Finish -->
                           
                           </span><!-- input-group-btn Finish -->
                           
                       </div><!-- input-group Finish -->
                       
                   </form><!-- navbar-form Finish -->
                   
               </div><!-- collapse clearfix Finish -->
               
           </div><!-- navbar-collapse collapse Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- navbar navbar-default Finish -->

    <div id="content"><!--content being -->
        <div class="container"><!--cointainer being -->
            <div class="col-md-12"> <!--col-md-12 being -->

                <ul class="breadcrumb"> <!--breadcrumb being -->
                    <li>
                        <a href="index.php">Home</a> 
                    </li>
                    <li>
                        My Account
                    </li>
                </ul><!--breadcrumb finish -->

            </div><!--col-md-12 finish -->

            <div class="col-md-3"><!--col-mad-3 being  -->

                    <?php include("includes/sidebar.php");?>

            </div><!--col-md-3 finish -->

            <div class="col-md-9"><!--col-md-9 being  -->

                <div class="box"><!--box being  -->

                    <h1 align="center"> Please confirm your payment </h1>

                    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data"><!-- form being-->

                        <div class="form-group"><!-- form-group being-->

                         <label> Invoice No:</label>

                         <input type="text" class="form-control" name="invoice_no" required>

                        </div><!-- form-group finish-->
                        
                        <div class="form-group"><!-- form-group being-->

                         <label> Amount Sent:</label>

                         <input type="text" class="form-control" name="amount_sent" required>

                        </div><!-- form-group finish-->

                        <div class="form-group"><!-- form-group being-->

                         <label> Select Payment Method:</label>

                         <select name="payment_mode" class="form-control"><!-- form-group being-->

                            <option > Select Payment Mode </option>
                            <option > Credit and Debit Cards </option>
                            <option > Khalti </option>
                            <option > EPay </option>
                            <option > Esewa </option>
                            

                         </select><!-- form-group finish-->

                        </div><!-- form-group finish-->

                        <div class="form-group"><!-- form-group being-->

                         <label> Transcation / Reference ID :</label>

                         <input type="text" class="form-control" name="ref_no" required>

                        </div><!-- form-group finish-->

                        <div class="form-group"><!-- form-group being-->

                         <label> Khalti / EPay /Esewa :</label>

                         <input type="text" class="form-control" name="code" required>

                        </div><!-- form-group finish-->

                        <div class="form-group"><!-- form-group being-->

                         <label> Payment Date :</label>

                         <input type="text" class="form-control" name="date" required>

                        </div><!-- form-group finish-->

                        <div class="text-center"><!-- text-center being-->

                            <button class="btn btn-primary btn-lg" name="confirm_payment" type="submit"><!-- btn btn-primary btn-lg being-->

                                <i class="fa fa-user-md">Confirm Payment</i>

                            </button><!--btn btn-primary btn-lg finish-->

                        </div><!-- text-center finish-->

                    </form><!-- form finish-->

                    <?php

                        if(isset($_POST['confirm_payment'])){

                            $update_id = $_GET['update_id'];

                            $invoice_no = $_POST['invoice_no'];

                            $amount = $_POST['amount_sent'];

                            $payment_mode = $_POST['payment_mode'];

                            $ref_no = $_POST['ref_no'];

                            $code = $_POST['code'];

                            $payment_date = $_POST['date'];

                            $complete = "Complete";

                            $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no ','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                            $run_payment = mysqli_query($con,$insert_payment);

                            $update_customer_order = "update customer_orders set order_status=' $complete' where order_id='$update_id'";

                            $run_customer_order = mysqli_query($con,$update_customer_order);

                            $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                            $run_pending_order = mysqli_query($con,$update_pending_order);

                            if($run_pending_order){

                                echo "<script>alert('Thank You for purchasing, your orders will be completed soon.')</script>";

                                echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            }

                           
                        }

                    ?>

                </div><!--box finish -->

            </div><!--col-md-9 finish -->

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
<?php } ?>