<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
   


    <title> Insert Products </title>
</head>
<body>

    <div class="row"><!--row being-->

        <div class="col-lg-12"><!--col-lg-12 being-->

            <ol class="breadcrumb"><!--breadcrumb being-->

                <li class="active"><!--active being-->

                    <i class="fa fa-dashboard"></i> Dashboard / Insert Products

                </li><!--active finish-->
        
            </ol><!--breadcrumb finish-->


        </div><!--col-lg-12 finish-->


    </div><!--row finish-->

    <div class="row"><!--row being-->

        <div class="col-lg-12"><!--col-lg-12 being-->

            <div class="panel panel-default"><!--panel panel-defaul being-->

                <div class="panel-heading"><!--panel-heading being-->

                    <div class="panel-title"><!--panel-title being-->

                        <i class="fa fa-money"></i> Insert Product

                    </div><!--panel-title finish-->

                </div><!--panel-heading finish-->

                <div class="panel-body"><!--panel-title being-->

                    <form method="post" class="form-horizontal" enctype="multipart/form-data"><!--form-horizontal being-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product Title </label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <input name="product_title" type="text" class="form-control" required>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product Category </label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <select name="product_cat" type="text" class="form-control" required>

                                <option > Select a Category Product</option>

                                <?php
                                
                                $get_p_cats = "select * from product_categories";
                                $run_p_cats = mysqli_query($con,$get_p_cats);

                                while ($row_p_cats =mysqli_fetch_array( $run_p_cats)){

                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    $p_cat_title= $row_p_cats['p_cat_title'];

                                    echo "

                                    <option value='$p_cat_id'> $p_cat_title </option>

                                    ";
                                   
                                }
                                
                                ?>

                                </select>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product Image 1</label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <input name="product_img1" type="file" class="form-control" required>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product Image 2</label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <input name="product_img2" type="file" class="form-control" required>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product Image 3</label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <input name="product_img3" type="file" class="form-control" required>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product price</label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <input name="product_price" type="text" class="form-control" required>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product Keywords </label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <input name="product_keywords" type="text" class="form-control" required>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> Product Desc </label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <textarea name="product_desc"  cols="19" rows="16" class="form-control"></textarea>

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->

                        <div class="form-group"><!--form-group being-->

                            <label  class="col-md-3 control-label"> </label>

                            <div class="col-md-6"><!--col-md-6 being-->

                                <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">

                            </div><!--col-md-6 finish-->

                        </div><!--form-group finish-->


                    </form><!--form-horizontal finish-->

                </div><!--panel-heading finish-->
            
            </div><!--panel panel-defaul finish-->

        </div><!--col-lg-12 finish-->



    </div><!--row finish-->
    



    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:' textarea '});</script>
</body>
</html>


<?php

if(isset($_POST['submit'])){

    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];


    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$product_img1");
    move_uploaded_file($temp_name2,"product_images/$product_img2");
    move_uploaded_file($temp_name3,"product_images/$product_img3");

    $insert_product ="insert into products (p_cat_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_keywords,product_desc) values('$product_cat',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_keywords','$product_desc')";

    $run_product = mysqli_query($con,$insert_product);

    if ($run_product) {
        echo "<script>alert('Product has been inserted successfully')</script>";
        echo "<script>window.location.href = 'insert_product.php';</script>";
    }
    

}

?>
<?php }?>