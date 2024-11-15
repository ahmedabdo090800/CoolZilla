<?php
session_start();
require '../include/connect.php';
// Update ---------------

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM user_table WHERE user_id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: users.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: users.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);


    $name = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "UPDATE  user_table SET username='$name',user_email ='$email', user_password='$password' , user_mobile='$mobile',user_address='$address' WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "product Updated Successfully";
        header("Location: users.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "product Not Updated";
        header("Location:users.php");
        exit(0);
    }

}
// ------------------------------------------------------------------------------------------------
if(isset($_POST['update_admin']))
{
    $admin_id = mysqli_real_escape_string($con, $_POST['admin_id']);


    $name = mysqli_real_escape_string($con, $_POST['name']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $query = "UPDATE  db_admin SET name='$name',username='$username',email ='$email', password='$password'  WHERE id='$admin_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Admin Updated Successfully";
        header("Location: users.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Admin Not Updated";
        header("Location:users.php");
        exit(0);
    }

}

//--------------------------------------------------
if(isset($_POST['ready_orders']))
{
    $order_id = mysqli_real_escape_string($con, $_POST['order_id']);


    $order_status = "Ready To Ship";


    $query = "UPDATE  user_orders SET order_status='$order_status' WHERE order_id ='$order_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "The Order is Ready To Ship";
        header("Location: http://localhost/Coolzilla/admin/order/order.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Status Not Updated";
        header("Location:http://localhost/Coolzilla/admin/order/order.php");
        exit(0);
    }

}

//--------------------------------------------------

if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $address = mysqli_real_escape_string($con, $_POST['address']);





        //insert data 


        $query = "INSERT INTO user_table (username,user_email,user_password,user_mobile,user_address) 
        VALUES ('$name','$email','$password','$mobile','$address')";

$query_run = mysqli_query($con, $query);
if($query_run)
{
  $_SESSION['message'] = "product Created Successfully";
  header("Location: users.php");
  exit(0);
}
else
{
  $_SESSION['message'] = "product Not Created";
  header("Location: users.php ");
  exit(0);
}


    }















