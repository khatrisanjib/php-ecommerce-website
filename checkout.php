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
                    
                    <div class="col-md-12">
                        <?php

                        if(!isset($_SESSION['customer_email'])){

                            include("customer/customer_login.php");
                        }else{

                            include("payment_option.php");
                        }

                        ?>
                    </div>

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

