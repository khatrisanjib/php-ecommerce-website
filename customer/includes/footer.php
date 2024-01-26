<div id="footer"><!--#footer being-->
    <div class="container"><!--container being-->
        <div class="row"><!--row being-->
            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 being-->

               <h4>Pages</h4>

                <ul><!-- ul being-->
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul><!-- ul finish-->

                <hr>

                <h4>User Section</h4>

                <ul><!-- ul being-->
                      <?php
                           if(!isset($_SESSION['customer_email'])){

                               echo"<a heref='../checkout.php'> Login </a>";
                           }else{

                               echo"<a href='my_account.php?my_orders'> My Account <a/>";
                           }

                        ?>
                
                    <li>
                        
                        <?php
                           if(!isset($_SESSION['customer_email'])){

                               echo"<a heref='../checkout.php'> Login </a>";
                           }else{

                               echo"<a href='my_account.php?edit_account'> Edit Account <a/>";
                           }

                        ?>
                    </li>
                </ul><!-- ul finish-->
                
                <hr class="hidden-md hidden-lg hidden-sm">

            </div><!--col-sm-6 col-md-3 finish-->

            <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 being-->

                <h4>Top Selling Products</h4>

                <ul>

                    <?php

                        $get_p_cats = "select * from product_categories";

                        $run_p_cats = mysqli_query($con, $get_p_cats);

                        while($row_p_cats=mysqli_fetch_array( $run_p_cats)){

                            $p_cat_id = $row_p_cats['p_cat_id'];

                            $p_cat_title = $row_p_cats['p_cat_title'];

                            echo "

                                <li>
                                
                                    <a href='../shop.php?p_cat=$p_cat_id'>
                                    
                                     $p_cat_title
                                    
                                    </a>
                                
                                </li>
                            


                            ";
                        }

                    ?>



                </ul>

                <hr class="hidden-md hidden-lg  ">

            </div><!--col-sm-6 col-md-3 finish-->

            <div class="com-sm-6 col-md-3"><!--col-sm-6 col-md-3 being-->
            
                <h4>Find Us</h4>

                <p><!--p being -->

                    <strong>Chiya Pasal inc.</strong>
                    <br/>Cibubur
                    <br/>Ciraces
                    <br/>000-146-567-879
                    <br/>www.chiyapasal@gmail.com
                    <br/><strong>Chiya</strong>

                </p><!--p finish -->

                <a href="../contact.php">Check Out My page</a>

                <hr class="hidden-md hidden-lg">

            </div><!--col-sm-6 col-md-3 finish-->


            <div class="col-sm-6 col-md-3">
            
                <h4>Get The News</h4>

                <p class="text-muted">
                  Dont miss our latest news.
                </p>

                <form action="" method="post"><!-- form being-->
                    <div class="input-group"><!-- input-group being-->

                        <input type="text" class="form-control" name="email">

                        <span class="input-group-btn"><!-- input-group-btn being-->

                            <input type="submit" value="subscribe" class="btn btn-default">


                        </span><!-- input-group-btn finish-->

                    </div><!-- input-group finish-->
                </form><!-- form finish-->

                <hr>
                
                <h4>Keep In Touch</h4>

                <p class="social">
                    <a href="../#" class="fa fa-facebook"></a>
                    <a href="../#" class="fa fa-twitter"></a>
                    <a href="../#" class="fa fa-instagram"></a>
                    <a href="../#" class="fa fa-google-plus"></a>
                    <a href="../#" class="fa fa-envelope"></a>
                </p>

            </div><!--col-sm-6 col-md-3 finish-->             
        </div><!--row finish-->
    </div><!--container finish-->
</div><!--#footer finish-->

<div id="copyright"><!--#copyright being-->
    <div class="container"><!--container being-->
        <div class="col-md-6"><!--col-md-6 being-->

         <p class="pull-left">&copy; 2020 Chiya Pasal All Rights Reserved</p>

        </div><!--col-md-6 finish-->
        <div class="col-md-6"><!--col-md-6 being-->

         <p class="pull-right"> Theme by: <a href="#">Mr sanjib</a></p>

        </div><!--col-md-6 finish-->
    </div><!--container finish-->
</div><!--#copyright finish-->