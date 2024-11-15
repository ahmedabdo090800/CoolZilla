<?php
@session_start();
require './admin/include/connect.php';
if(!isset($_SESSION['username'])){
    //header('./user_area/login.php');
    echo "<script> window.open('./user_area/login.php','_self') </script>";

    }



?>

<!--  start header -->




<!--  end header -->

<body class="payment">
    <section>
        <!-- start nabar -->
        <div class="nav">
            <div class="container">
                <nav class="nav-bar">
                    <div class="logo">
                        <a href="index.php" style="text-decoration:none">
                            <h1>Cool<span>Zilla</span></h1>
                        </a>
                    </div>
                    <ul class="ul-nav">


                        <li>
                            <h4>Select payment</h4>
                        </li>
                        <div class="-pls">
                            <p>Need Help?</p>
                            <a href="contact.php">Contact us</a>
                        </div>
                        <!-- <li>
                            <a href="user_area/login.php"><i class="fa-solid fa-user"></i>login/reguster</a>
                        </li> -->
                        <li>
                            <img src="img/image logo.png" alt="" srcset="">
                        </li>



                        <?php
                        
                        


                        if(!isset($_SESSION['username'])){
                            echo" <li>
                            <a href='user_area/login.php'><i class='fa-solid fa-user'></i>login/reguster</a>
                        </li>";
                            

                        }else{

                            echo" <li>
                            <a href='#'><i class='fa-solid fa-user'></i>  ".$_SESSION['username']."</a>
                                  </li>
                                  <li>
                                  <a href='user_area/logout.php'><i class='fa-solid fa-right-from-bracket'></i>logout</a>
                              </li>
                                
                        
                        ";

                        }
                        ?>




                    </ul>


                </nav>


            </div>

        </div>

        <!-- start nabar -->
        <!-- calling cart  -->

        <!-- calling cart  -->



        






        <div class="checkout">
            <div class="box container">
                <div class="row ">
                    




                </div>


            </div>

        </div>


        <?php

$total_price=0;

$get_ip_add =getIPAddress();
$cart_query="Select * from cart_details where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$row=mysqli_fetch_array($result);
$product_id=$row['product_id'];
$qyt=$row['quantity'];

$select_products="Select * from product where id='$product_id'";
$result_products=mysqli_query($con,$select_products);
$row_product_price=mysqli_fetch_array($result_products);
$product_price=array($row_product_price['price']); 
$product_title=$row_product_price['name']; 
$price=$row_product_price['price']; 
$product_values= array_sum($product_price);
$total_price+=$product_values;


$username=$_SESSION['username'];


$get_user="Select * from `user_table` where username='$username'"; 
$result_user=mysqli_query($con,$get_user);
$row_user=mysqli_fetch_array($result_user);
$user_id=$row_user['user_id'];
$username=$row_user['username']; 
$user_email=$row_user['user_email']; 
$user_mobile=$row_user['user_mobile']; 
$user_address=$row_user['user_address']; 






?>

        <div style="margin-top:70px">
            <div class="card card-payment container">
                <div class="card-body">
                    <h5> <i class="fa-regular fa-circle-check" style="color:#6DBD28; margin-right:15px;"></i>1. CUSTOMER
                        ADDRESS</h3>
                        <hr>
                        <p><?php echo $username; ?></p>
                        <p><?php echo $user_email; ?></p>
                        <p><?php echo $user_mobile; ?></p>
                        <p><?php echo $user_address; ?></p>
                </div>
            </div>
            <div class="card card-payment container">
                <div class="card-body">
                    <h5> <i class="fa-regular fa-circle-check" style="color:#6DBD28; margin-right:15px;"></i>2. DELIVERY
                        DETAILS</h3>
                        <hr>
                        <p>Door Delivery</p>
                        <?php
    $date=date("j-F");
    $date_deline=date('j-F', strtotime($date. ' + 5 days'));
    ?>
                        <p>Delivery Between <?php echo $date; ?> and <?php echo  $date_deline; ?></p>
                </div>
            </div>




        </div>
        <div class="container">
            <div class="row" style="justify-content:space-between">
                <div class="col-4">
                    <div class="card card-payment container">
                        <div class="card-body">
                            <h5> <i class="fa-regular fa-circle-check" style=" margin-right:15px;"></i>3. PAYMENT METHOD
                                </h3>
                                <hr>
                                <h6 style="margin: 22px 0;">Select Payment Method:</h6>

                                <div class="radio-container">
                                    <div class="radio-item">
                                        <input type="radio" id="Cash on delivery" name="radio-group" checked>
                                        <label for="Cash on delivery">Cash on delivery</label>
                                    </div>
                                    <div class="radio-item mt-3">
                                        <input type="radio" id="Online Payment" name="radio-group">
                                        <label for="Online Payment">Online Payment</label>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>


                <!-- --------------------------------------------------------------------------- -->

                <div class="col-4 span" >
                    <div class="card card-payment container">
                        <div class="card-body">
                            <h5> <i class="fa fa-list-alt" style="color:#6DBD28; margin-right:15px;"></i>Order summary
                                </h3>
                                <hr>


                                <p><span>Item Name :</span>  <?php echo $product_title; ?></p>
                                <p><span>Item Quantity :</span>  <?php echo $qyt; ?></p>
                                <p> <span>Item Price :</span>  <?php echo $price; ?></p>
                                <hr>
                                <p> <span>Total Price :</span>  <?php echo $qyt *$price ; ?></p>


                                <!-- <div class="btn">Cash on delivery</div>
        <div class="btn">Online Payment</div> -->
                        </div>
                    </div>
                </div>


                <!-- --------------------------------------------------------------------------- -->
            </div>
        </div>

        <div class="btn-payment">
            <a href="./user_dashbord/order.php?user_id=<?php echo $user_id;?>"class="btn">Cash on delivery</a>
            <a href="./payment/cart.php" class="btn">Online Payment</a>
        </div>


        <?php


include('include/script.php')



?>