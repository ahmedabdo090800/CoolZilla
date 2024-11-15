<?php 
require '../admin/include/connect.php';
include('../functions/comman_function.php');
?>

<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content=" Today in this blog you will learn how to create a responsive Login & Registration Form in HTML CSS & JavaScript. The blog will cover everything from the basics of creating a Login & Registration in HTML, to styling it with CSS and adding with JavaScript." />
    <meta
      name="keywords"
      content=" 
 Animated Login & Registration Form,Form Design,HTML and CSS,HTML CSS JavaScript,login & registration form,login & signup form,Login Form Design,registration form,Signup Form,HTML,CSS,JavaScript,
"
    />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Signup | CoolZilla</title>
    <link rel="stylesheet" href="../css/login.css" />
    <script src="../custom-scripts.js" defer></script>
  </head>
  <body>
    <section class="wrapper">
      <div class="form signup">
        <header>Signup</header>
        <form action="" method="post">
          <input type="text" autocomplete="off" name="username"  placeholder="User Name" required />
          <input type="text" autocomplete="off" name="user_email" placeholder="Email address" required />
          <input type="password" autocomplete="off" name="user_password" placeholder="Password" required />
          <input type="text" autocomplete="off" name="user_mobile" placeholder="Mobile" required />
          <input type="text" autocomplete="off" name="user_address" placeholder="Address" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" required />
            <label for="signupCheck">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" name="user_register" />
          <label for="signin">Already have an account?</label>
        </form>
        <a href="login.php"><button class="btn-form" >Sign in</button></a> 
      </div>

    </section>

    <?php 



if(isset($_POST['user_register'])){
$user_username=$_POST['username'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];
$password_hash=password_hash($user_password,PASSWORD_DEFAULT);
$user_address=$_POST['user_address'];
$user_contact=$_POST['user_mobile'];

$user_ip=getIPAddress();
//check user name and email 


$select_query="Select * from user_table where username='$user_username' or user_email='$user_email'" ;
$result=mysqli_query($con, $select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
  echo "<script> alert('Username and Email already exist.Please chosse anther username and email ') </script>";
}
else{
  $insert_query="insert into user_table (username, user_email, user_password,user_ip, user_address, user_mobile) values

('$user_username', '$user_email', '$password_hash','$user_ip', '$user_address', '$user_contact')";
$sql_execute=mysqli_query($con, $insert_query);
if ($sql_execute) {
echo "<script> alert('Data inserted successfully') </script>";
}else
{die(mysqli_error($con));}

}
// insert_query



$select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con, $select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if ($rows_count>0){
$_SESSION['username']=$user_username;
echo "<script>window.open('cart.php', '_self'></script>"; }else{
echo "<script>window.open('index.php', '_self'></script>";
}

}

    
    
    ?>
  </body>
</html>
