<?php

 $active='Contact';
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
                           Contact Us
                        </li>
                    </ul><!--breadcrumb finish -->

                </div><!--col-md-12 finish -->
                <div class="col-md-12"><!--col-md-12 being  -->

                    <div class="box"><!--box being  -->

                        <div class="box-header"><!--box-header being  -->

                            <center><!--center being  -->

                                <h2> Feel free to Contact Us </h2>

                                <p class="text-muted"><!--text-muted being  -->

                                    If you have any question, feel free to contact us. Our Customer Service work <strong>24/7</strong> 


                                </p><!--text-muted finish  -->

                            </center><!--center finish  -->

                            <form action="contact.php" method="post"><!--form being  -->

                                <div class="form-group col-md-12"><!--form-group being  -->

                                    <label> Name </label>

                                    <input type="text" class="form-control" name="name" required>

                                </div><!--form-group finish  -->

                                <div class="form-group col-md-12"><!--form-group being  -->

                                    <label> Email </label>

                                    <input type="text" class="form-control" name="email" required>

                                </div><!--form-group finish  -->

                                <div class="form-group col-md-12"><!--form-group being  -->

                                    <label> Subject </label>

                                    <input type="text" class="form-control" name="subject" required>

                                </div><!--form-group finish  -->

                                <div class="form-group col-md-12"><!--form-group being  -->

                                    <label> Message </label>

                                    <textarea name="message"  class="form-control"></textarea>

                                </div><!--form-group finish  -->

                                <div class="text-center"><!--text-center being  -->

                                    <button type="submit" name="submit" class="btn btn-primary">

                                        <i class="fa fa-user-md"></i>Send Message

                                    </button>

                                </div><!--text-center finish  -->

                            </form><!--form finish  -->

                            <?php
                               
                               if(isset($_POST['submit'])){

                                /// Admin recives message with thiss///

                                $sender_name = $_POST['name'];

                                $sender_email = $_POST['email'];

                                $sender_subject = $_POST['subject'];

                                $sender_message = $_POST['message'];

                                $receiver_email = "www.chiyapasal@gmail.com";
                                
                                mail( $receiver_email, $sender_name,  $sender_subject, $sender_message,$sender_email);

                                /// Auto reply to sender with this//

                                $email=$_POST['email'];

                                $subject= "welcome to my website";

                                $msg= "Thank for sending us message. ASPA we will replyyour message";

                                $from = "www.chiyapasal@gmail.com";

                                mail($email,$subject, $msg, $from);

                                echo "<h2 align'center'> Your message has been sent sucessfully </h2>";

                               }
                            
                            ?>

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