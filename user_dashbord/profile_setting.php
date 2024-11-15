<?php
@session_start();
require '../admin/include/connect.php';
include('../functions/comman_function.php');

if(!isset($_SESSION['username'])){
    //header('./user_area/login.php');
    echo "<script> window.open('../user_area/login.php','_self') </script>";

    }else{
    
    
    $username=$_SESSION['username'];
    $get_details="Select * from `user_table` where username='$username'"; 
    $result_query=mysqli_query($con, $get_details);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch [ 'username'];
    $user_email=$row_fetch [ 'user_email']; 
    $user_address=$row_fetch [ 'user_address'];




 // update the user
 

 if(isset($_POST['user_update'])){
 $update_id=$user_id;
 $username=$_POST [ 'username'];
 $user_email=$_POST [ 'user_email']; 
 $user_address=$_POST [ 'user_address'];
 $user_mobile=$_POST [ 'user_mobile'];

 // update query
 $update_data="update user_table set username='$username', user_email='$user_email', user_address='$user_address' , user_mobile='$user_mobile' where
 user_id=$update_id";
 $result_query_update=mysqli_query($con, $update_data);
 if ($result_query_update) {
     echo "<script>alert('Data updated successfuly. Plese login again')</script>";
     echo "<script> window.open('../user_area/login.php','_self') </script>";

 }
 }
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
        <main class="dash-content">
            <!-- main -->
            <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                        <form action="" method="POST">
                            <input type="hidden" name="product_id" value="<?= $row_fetch['user_id']; ?>">

                            <div class="mb-3">
                        <label>Username</label>
                        <input type="text" placeholder="Username" name="username" value="<?= $row_fetch['username']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>E-mail</label>
                        <input type="email" placeholder="email" name="user_email" value="<?= $row_fetch['user_email']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                <label>Address</label>
                <input type="text" placeholder="Address" name="user_address" value="<?= $row_fetch['user_address']; ?>" class="form-control">
            </div>
                    <div class="mb-3">
                <label>Mobile</label>
                <input type="text" placeholder="mobile" name="user_mobile" value="<?= $row_fetch['user_mobile']; ?>" class="form-control">
            </div>




                            <div class="mb-3">
                                <button type="submit" name="user_update" class="btn btn-primary">
                                    Update product
                                </button>
                            </div>

                               </form>
                    

        </main>
    </div>
    </div>
    <!-- script -->
    <?php

include('./include/scrpit.php')
?>
</body>

</html>