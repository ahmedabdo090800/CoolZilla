<?php
@session_start();
require './admin/include/connect.php';
include('./functions/comman_function.php');



?>

<!--  start header -->

<?php

include('./include/header.php')

?>

<!--  end header -->


<body>
    <section>
        <!-- start nabar -->
        <?php

include('./include/navbar.php')

?>


        </div>
        </div>

        <!-- start nabar -->
        <!-- calling cart  -->
        <?php

cart();

?>
        <!-- calling cart  -->









        <div class="products">
            <h2>Shopping Cart</h2>

            <div class="box container">
                <form action="" method="post">
                    <table class="table table-hover mt-5">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Item Price</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th colspan="2" style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

$get_ip_add =getIPAddress();
$total_price=0;

$cart_query="Select * from cart_details where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);

while($row=mysqli_fetch_array($result)){
$product_id=$row['product_id'];
$qyt=$row['quantity'];
$select_products="Select * from product where id='$product_id'";
$result_products=mysqli_query($con,$select_products);
while($row_product_price=mysqli_fetch_array($result_products)){
$product_price=array($row_product_price['price']); 
$product_title=$row_product_price['name']; 
$product_image=$row_product_price['product_image1']; 
$price=$row_product_price['price']; 
$product_values= array_sum($product_price); // [500]
$total_price+=$product_values; //500

    
    
    
    ?>
                            <tr>
                                <th scope="row"><?php echo $product_title;?></th>
                                <td><img src='admin/product/product_images/<?php echo $product_image;?>'
                                        class="img_cart" alt=""></td>
                                <?php

      $get_ip_add = getIPAddress(); 
      if(isset($_POST['update_cart'])){
      $quantities=$_POST['qty'];
      $update_cart="update cart_details set quantity=$quantities where ip_address='$get_ip_add'";
      $result_products_quantity=mysqli_query($con, $update_cart);
      $total_price=$total_price*$quantities;

 
      } 
      
      ?>
                                <td><input type="text" class="form-input form-control w-50" value="<?php echo $qyt ?>" name="qty"></td>

                                <td><?php echo $price;?></td>
                                <td><?php echo $price * $qyt;?></td>
                                <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" id="">
                                </td>
                                <td style="text-align: center;">
                                    <input type="submit" class="btn btn-primary mx-3" value="Update Quantity"
                                        name="update_cart">
                                    <!-- <button type="submit" name="delete_product" value="//<?=$product['id'];?>" class="btn btn-danger btn-sm">Delete</button> -->
                                    
                                </tr>
                                <?php
    }
}

?>

</tbody>
</table>
<i class=""></i>
<input type="submit" class="btn btn-danger mx-3 mt-3 my-5" value="Remove " name="remove_cart"> 
                    <div class="button_cart" style="display: flex;justify-content: space-around;align-items: center;">

                        <a href="./index.php" class=" btn btn-primary">back to Home</a>
                        <a href="./checkout.php" class=" btn btn-info">Checkout</a>
                    </div>
<!-- 
                    <div class="cart-total">
                        Total: <span id="cart-total"><?php total_card_price ();?></span> USD
                    </div> -->


            </div>
        </div>

        </form>

        <!-- remove items in cart -->


        <?php


function remove_cart_item(){

global $con;
if(isset($_POST['remove_cart'])){

foreach ($_POST['removeitem'] as $remove_id){

echo $remove_id;
$delete_query="Delete from `cart_details` where product_id=$remove_id"; 
$run_delete=mysqli_query($con, $delete_query);
if ($run_delete){
  echo "<script> window.open('cart.php','_self') </script>";
}
}
}
}


echo $remove_item=remove_cart_item();
     
      
      
      ?>

        <?php






include('include/script.php')



?>