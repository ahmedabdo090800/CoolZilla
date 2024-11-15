<?php
session_start();
require '../include/connect.php';
// Update ---------------

if(isset($_POST['delete_category']))
{
    $id_category = mysqli_real_escape_string($con, $_POST['delete_category']);

    $query = "DELETE FROM category WHERE id_category='$id_category' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "category Deleted Successfully";
        header("Location: category.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "category Not Deleted";
        header("Location: category.php");
        exit(0);
    }
}

if(isset($_POST['update_category']))
{
    $id_category = mysqli_real_escape_string($con, $_POST['id_category']);


    $name = mysqli_real_escape_string($con, $_POST['name']);
    $sub_category = mysqli_real_escape_string($con, $_POST['subcategory']);


    $query = "UPDATE  category SET name='$name', subcategory='$sub_category' WHERE id_category='$id_category' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "category Updated Successfully";
        header("Location:category.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "category Not Updated";
        header("Location:category.php");
        exit(0);
    }

}

//--------------------------------------------------

if(isset($_POST['save_category']))
{

$name=$_POST['name'];
$subcategory=$_POST['subcategory'];
// select data from database
$select_query="Select * from `category` where subcategory='$subcategory'"; 
$result_select=mysqli_query($con, $select_query);
$number=mysqli_num_rows($result_select);
if($number>0){
        $_SESSION['message'] = "ERROR! SubCategory Is Created Before ";
        header("Location: category.php ");
        exit(0);


}
else{
$insert_query="insert into `category` (name,subcategory) values ('$name','$subcategory')"; 
$result=mysqli_query($con, $insert_query);
if($result) {
        $_SESSION['message'] = "category Created Successfully";
        header("Location: category.php");
        exit(0);     
}
    else
    {
        $_SESSION['message'] = "category Not Created";
        header("Location: category.php ");
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










