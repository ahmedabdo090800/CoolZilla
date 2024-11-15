<?php
@session_start();
require '../admin/include/connect.php';
include('../functions/comman_function.php');

if(!isset($_SESSION['username'])){
    //header('./user_area/login.php');
    echo "<script> window.open('../user_area/login.php','_self') </script>";

    }


?>


<!-- head -->

<?php

include('./include/header.php')

?>

<body>
    <!-- sidbar -->
    <?php

include('./include/sidbar.php')

?>
    <div class="dash-app">
        <!-- nav -->
        <?php

include('./include/nav.php')

?>

<?php


    
$username=$_SESSION['username'];
$get_details="Select * from `user_table` where username='$username'"; 
$result_query=mysqli_query($con, $get_details);
$row_fetch=mysqli_fetch_assoc($result_query);
$user_id=$row_fetch['user_id'];
?>
        <main class="dash-content">

        <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Amount due</th>
      <th scope="col">Total products</th>
      <th scope="col">Invoice number</th>
      <th scope="col">Date</th>
      <th scope="col">Complered or not</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

<?php
$get_order_details="Select * from user_orders where user_id=$user_id"; 
$result_orders=mysqli_query($con, $get_order_details);
while($row_orders=mysqli_fetch_assoc($result_orders)){
$order_id=$row_orders['order_id']; 
$amount_due=$row_orders['amount_due'];
$amount_due=$row_orders['amount_due'];
$total_products = $row_orders['total_products'];
$invoice_number=$row_orders['invoice_number']; 
$order_date=$row_orders['order_date'];
$order_status=$row_orders['order_status'];
if($order_status == 'pending'){
$order_status='Incomplete';
}else{
$order_status='Complete';
}
$number=1;
echo"
<tr>
<th scope='row'>$number</th>
<td>$amount_due</td>
<td>$total_products</td>
<td>$invoice_number</td>
<td>$order_date</td>
<td>$order_status</td>
<td><a href='confirm_payment.php' class='text-light btn btn-success'>Confirm</a></td>
</tr>

";
$number++;
}
?>

  </tbody>
</table>
            <?php
         
            
            ?>

        </main>
    </div>
    </div>
    <!-- script -->
    <?php

include('./include/scrpit.php')

?>
</body>

</html>