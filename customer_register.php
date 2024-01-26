<?php

 $active='Account';
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
                                Register
                            </li>
                        </ul><!--breadcrumb finish -->

                    </div><!--col-md-12 finish -->

                    <div class="col-md-12"><!--col-md-12being  -->

                        <div class="box"><!--box being  -->

                            <div class="box-header"><!--box-header being  -->

                                <center><!--center being  -->

                                    <h2> Register a new account </h2>

                                    
                                </center><!--center finish  -->


                                <form action="customer_register.php" method="post" enctype="multipart/form-data"><!--form being  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label> Your Name </label>

                                        <input type="text" class="form-control" name="c_name" required>

                                    </div><!--form-group finish  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label> Your Email </label>

                                        <input type="text" class="form-control" name="c_email" required>

                                    </div><!--form-group finish  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label> Your Password </label>

                                        <input type="password" class="form-control" name="c_pass" required>

                                    </div><!--form-group finish  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label> Your Country </label>

                                        <input type="text" class="form-control" name="c_country" required>

                                    </div><!--form-group finish  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label> Your City </label>

                                        <input type="text" class="form-control" name="c_city" required>

                                    </div><!--form-group finish  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label class="form-label"> Your Contact </label>

                                        <input type="text" class="form-control" name="c_contact" required>

                                    </div><!--form-group finish  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label> Your Address </label>

                                        <input type="text" class="form-control" name="c_address" required>

                                    </div><!--form-group finish  -->

                                    <div class="form-group col-md-12"><!--form-group being  -->

                                        <label> Your Profile Picture </label>

                                        <input type="file" class="form-control form-height-custom" name="c_image" required>

                                    </div><!--form-group finish  -->


                                    <div class="text-center "><!--text-center being  -->

                                        <button type="submit" name="register" class="btn btn-primary">

                                            <i class="fa fa-user-md"></i> Register

                                        </button>

                                    </div><!--text-center finish  -->

                                </form><!--form finish  -->

                          
                            </div><!--box-header finish  -->
                        
                        </div><!--box finish -->

                    </div><!--col-md-12 finish -->

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

<?php 

if(isset($_POST['register'])){
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_pass = $_POST['c_pass'];
    
    $c_country = $_POST['c_country'];
    
    $c_city = $_POST['c_city'];
    
    $c_contact = $_POST['c_contact'];
    
    $c_address = $_POST['c_address'];
    
    $c_image = $_FILES['c_image']['name'];
    
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    
    $c_ip = getRealIpUser();
    
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    
    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    
    $run_customer = mysqli_query($con,$insert_customer);
    
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    
    $run_cart = mysqli_query($con,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        /// If register have items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }else{
        
        /// If register without items in cart ///
        
        $_SESSION['customer_email']=$c_email;
        
        echo "<script>alert('You have been Registered Sucessfully')</script>";
        
        echo "<script>window.open('index.php','_self')</script>";
        
    }
    
}


?>