<?php 
require '../admin/include/connect.php';
include('../functions/comman_function.php');

?>


<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="description"
        content=" Today in this blog you will learn how to create a responsive Login & Registration Form in HTML CSS & JavaScript. The blog will cover everything from the basics of creating a Login & Registration in HTML, to styling it with CSS and adding with JavaScript." />
    <meta name="keywords" content=" 
 Animated Login & Registration Form,Form Design,HTML and CSS,HTML CSS JavaScript,login & registration form,login & signup form,Login Form Design,registration form,Signup Form,HTML,CSS,JavaScript,
" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login & Signup | CoolZilla</title>
    <link rel="stylesheet" href="../css/login.css" />
    <script src="../custom-scripts.js" defer></script>
</head>

<body>
    <section class="wrapper">
        <div class="form signup">
            <header>Sign in</header>
            <form action="" method="post">
                <input type="text" autocomplete="off" name="username" placeholder="User Name" required />
                <input type="password" autocomplete="off" name="user_password" placeholder="Password" required />
                <input type="submit" value="Sign in" name="user_login" />
            </form>
            <div style="margin-top: 40px;">
                <hr>
                <h3 style="text-align: center;">or</h6>
            </div>
            <a href="registration.php"><button class="btn-form">Create account</button></a>
        </div>



        </div>


    </section>

    <?php



if(isset($_POST['user_login'])){
$user_username=$_POST['username']; 
$user_password=$_POST['user_password'];
$select_query="Select * from `user_table` where username='$user_username'"; 
$result=mysqli_query($con, $select_query); 
$row_count=mysqli_num_rows($result); 
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();
//carrt-------------------------------------------------------------------------------------
$select_query_cart="Select * from cart_details  where ip_address='$user_ip'";
$select_cart=mysqli_query($con, $select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
if($row_count>0){
  session_start();

  $_SESSION['username']=$user_username;

if (password_verify($user_password, $row_data['user_password']))
{ 
    if ($row_count==1 and $row_count_cart==0){

        $_SESSION['username']=$user_username;
      
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
      }else{
      
        $_SESSION['username']=$user_username;
      
      
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('../cart.php', '_self')</script>";
      }
      
      }else
      {
        echo "<script> alert('Invalid Credentials')</script>"; 
      }
      
      }else{
        echo "<script> alert('Invalid Credentials')</script>"; 
      }
}
    ?>






</body>

</html>