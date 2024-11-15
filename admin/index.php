<?php
session_start();
require './include/connect.php';

if(!isset($_SESSION['username'])){
    header('location:login.php');

};
include('include/header.php')
?>
<!-- countre -->
<?php
$sql="SELECT order_id FROM user_orders ORDER BY order_id";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }
//   numbmer of users-----------------------------------------------------------------------
$sql="SELECT username FROM user_table ORDER BY username     ";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount_user=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }

$sql="SELECT id FROM product ORDER BY id     ";

if ($result=mysqli_query($con,$sql))
  {
  // Return the number of rows in result set
  $rowcount_product=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }
  ?>
<!-- countre -->



<!-- the container--------------------- -->
<div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Number Of Order :</div>
                                    <h4 class="ml-5 mx-5">
                                        Number : <?php
                                            echo $rowcount;
                                        ?>
                                    </h4>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./order/order.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-info text-white mb-4">
                                    <div class="card-body">Total Number Of Users</div>
                                    <h4 class="ml-5 mx-5">
                                        Number : <?php
                                            echo $rowcount_user;
                                        ?>
                                    </h4>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./user/users.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Products Card</div>
                                    <h4 class="ml-5 mx-5">
                                        Number : <?php
                                            echo $rowcount_product;
                                        ?>
                                    </h4>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="./product/view_product.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                        </div>
<!-- the container--------------------- -->



<?php
include('include/footer.php')
?>
<?php
include('include/script.php')
?>