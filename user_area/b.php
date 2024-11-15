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

    <title>Login & Signup | CoolZilla</title>
    <link rel="stylesheet" href="../css/login.css" />
    <script src="../custom-scripts.js" defer></script>
  </head>
  <body>
    <section class="wrapper">
      <div class="form signup">
        <header>Signup</header>
        <form action="#">
          <input type="text" placeholder="Full name" required />
          <input type="text" placeholder="Email address" required />
          <input type="password" placeholder="Password" required />
          <div class="checkbox">
            <input type="checkbox" id="signupCheck" />
            <label for="signupCheck">I accept all terms & conditions</label>
          </div>
          <input type="submit" value="Signup" />
        </form>
      </div>

      <div class="form login">
        <header>Login</header>
        <form action="#">
          <input type="text" placeholder="Email address" required />
          <input type="password" placeholder="Password" required />
          <a href="#">Forgot password?</a>
          <input type="submit" value="Login" />
        </form>
      </div>

      <script>
        const wrapper = document.querySelector(".wrapper"),
          signupHeader = document.querySelector(".signup header"),
          loginHeader = document.querySelector(".login header");

        loginHeader.addEventListener("click", () => {
          wrapper.classList.add("active");
        });
        signupHeader.addEventListener("click", () => {
          wrapper.classList.remove("active");
        });
      </script>
    </section>
  </body>
</html>























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

    <title>Login & Signup | CoolZilla</title>
    <link rel="stylesheet" href="../css/login.css" />
    <script src="../custom-scripts.js" defer></script>
  </head>
  <body>
    <section class="wrapper">
      <div class="form signup">
      <header>Sign in</header>
      <form action="" method="post">
          <input type="text" autocomplete="off" name="username"  placeholder="User Name" required />
          <input type="password" autocomplete="off" name="user_password" placeholder="Password" required />
          <input type="submit" value="Sign in" name="user_login" />
        </form>
        <div  style="margin-top: 40px;"><hr> <h3 style="text-align: center;">or</h6></div>
        <a href="registration.php"><button class="btn-form" >Create account</button></a> 
      </div>



      </div>


    </section>

    <?php



if(isset($_POST['user_login'])){
$user_username=$_POST['username']; 
$user_password=$_POST['user_password'];
$select_query="Select * from `user_table` where username='$user_username'"; 
$result=mysqli_query($con, $select_query); $row_count=mysqli_num_rows($result); 
$row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();
// cart item
$select_query_cart="Select * from cart_details  where ip_address='$user_ip'";
$select_cart=mysqli_query($con, $select_query_cart);
$row_count_cart=mysqli_num_rows($select_cart);
if($row_count>0){
if (password_verify($user_password, $row_data['user_password']))
{ 

  $_SESSION['username']=$user_username;

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
    



echo"<ul class='navbar-nav ms-auto ms-md-0 me-3 me-lg-4'>
<li class='nav-item dropdown'>
<a class='nav-link dropdown-toggle' id='navbarDropdown' href='./user_area/login.php' role='button' data-bs-toggle='dropdown' aria-expanded='false'><i class='fas fa-user fa-fw'></i></a>
<ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
    <li><a class='dropdown-item' href='#!'>Settings</a></li>
    <li><hr class='dropdown-divider' /></li>
    <li><a class='dropdown-item' href='logout.php'>Logout</a></li>
</ul>
</li></ul>"
    
    ?>
  </body>
</html>
