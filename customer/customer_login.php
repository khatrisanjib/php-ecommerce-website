<div class="box"><!-- box being-->

    <div class="box_header"><!--box_header being-->

        <center>

            <h1> Login </h1>

            <p class="lead"> Already have our account..? </p>

            <p class="text-muted">Read and Listen To Sentences Using the Word "Some". This page is part of www.manythings.org/audio/sentences. Click [T] to go to that sentence on tatoeba.org ...</p>

        </center>

    </div><!-- box_header finish-->

    <form action="checkout.php" method="post">

        <div class="form-group">

            <label> Email </label>

            <input type="text" name="c_email" class="form-control" required >

        </div>

        <div class="form-group">

            <label> Password </label>

            <input type="password" name="c_pass" class="form-control" required >

        </div>

        <div class="text-center">

            <button name="login" value="login" class="btn btn-primary">

                <i class="fa fa-sign-in"></i> Login

            </button>

        </div>
        
    </form>

    <center>

        <a href="customer_register.php">

            <h3> Dont have account..? Register here </h3>

        </a>

    </center>

</div><!-- box finish-->

<?php

if(isset($_POST['login'])){

    $customer_email = $_POST['c_email'];

    $customer_pass = $_POST['c_pass'];

    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";

    $run_customer=mysqli_query($con,$select_customer);

    $get_ip = getRealIpUser();

    $check_customer = mysqli_num_rows($run_customer);

    $select_cart = "select * from cart where ip_add='$get_ip'";

    $run_cart= mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer==0){

        echo "<script>alert('Your email or password is wrong')</script>";

        exit();
    }
    if($check_customer==1 AND $check_cart==0){

        $_SESSION['customer_email']=$customer_email;

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }else{

        $_SESSION['customer_email']=$customer_email;

        echo "<script>alert('You are Logged in')</script>";

        echo "<script>window.open('checkout.php','_self')</script>";

    }
}

?>
