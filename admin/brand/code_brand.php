<?php
session_start();
require '../include/connect.php';
// Update ---------------

if(isset($_POST['delete_brand']))
{
    $id_brand = mysqli_real_escape_string($con, $_POST['delete_brand']);

    $query = "DELETE FROM brand WHERE id_brand='$id_brand' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "brand Deleted Successfully";
        header("Location: brand.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "brand Not Deleted";
        header("Location: brand.php");
        exit(0);
    }
}

if(isset($_POST['update_brand']))
{
    $id_brand = mysqli_real_escape_string($con, $_POST['id_brand']);


    $name = mysqli_real_escape_string($con, $_POST['name']);
    $sub_brand = mysqli_real_escape_string($con, $_POST['subbrand']);


    $query = "UPDATE  brand SET name='$name' WHERE id_brand='$id_brand' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "brand Updated Successfully";
        header("Location:brand.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "brand Not Updated";
        header("Location:brand.php");
        exit(0);
    }

}

//--------------------------------------------------

if(isset($_POST['save_brand']))
{

$name=$_POST['name'];
$subbrand=$_POST['subbrand'];
// select data from database
$select_query="Select * from `brand` where name='$name'"; 
$result_select=mysqli_query($con, $select_query);
$number=mysqli_num_rows($result_select);
if($number>0){
        $_SESSION['message'] = "ERROR! Brand Is Created Before ";
        header("Location: brand.php ");
        exit(0);


}
else{
$insert_query="insert into `brand` (name) values ('$name')"; 
$result=mysqli_query($con, $insert_query);
if($result) {
        $_SESSION['message'] = "Brand Created Successfully";
        header("Location: brand.php");
        exit(0);     
}
    else
    {
        $_SESSION['message'] = "Brand Not Created";
        header("Location: brand.php ");
        exit(0);
    }
}

}

    // $name = mysqli_real_escape_string($con, $_POST['name']);
    // $sub_category = mysqli_real_escape_string($con, $_POST['subcategory']);
    // //for check

    // $select_query="Select * from `category` where subcategory='$subcategory'"; 
    // $result_select=mysqli_query($con, $select_query);
    // $number=mysqli_num_rows($result_select);
    // if($number>0){
    //     $_SESSION['message'] = "category";

    // }


    // $query = "INSERT INTO category (name,subcategory) VALUES ('$name','$sub_category')";
    // $query_run = mysqli_query($con, $query);
    // if($query_run)
    // {
    //     $_SESSION['message'] = "category Created Successfully";
    //     header("Location: category.php");
    //     exit(0);
    // }
    // else
    // {
    //     $_SESSION['message'] = "category Not Created";
    //     header("Location: category.php ");
    //     exit(0);
    // }}










