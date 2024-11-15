<?php
session_start();
require '../include/connect.php';
// Update ---------------

if(isset($_POST['delete_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['delete_product']);

    $query = "DELETE FROM product WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "product Deleted Successfully";
        header("Location: view_product.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "product Not Deleted";
        header("Location: view_product.php");
        exit(0);
    }
}

if(isset($_POST['update_product']))
{
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);


    $name = mysqli_real_escape_string($con, $_POST['name']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $query = "UPDATE  product SET name='$name',brand ='$brand', category='$category' , price='$price',address='$address', stock='$stock',description='$description' WHERE id='$product_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "product Updated Successfully";
        header("Location: view_product.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "product Not Updated";
        header("Location:view_product.php");
        exit(0);
    }

}

//--------------------------------------------------

if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
    $status_product=true;
    //image name
    $targetDirectory = "product_images/"; // Create a directory to store uploaded images



    $product_image1 = mysqli_real_escape_string($con,$_FILES['product_image1']['name']);
    $product_image2 = mysqli_real_escape_string($con,$_FILES['product_image2']['name']);
    $product_image3 = mysqli_real_escape_string($con,$_FILES['product_image3']['name']);
    //temp image 
    $temp_image1 = mysqli_real_escape_string($con,$_FILES['product_image1']['tmp_name']);
    $temp_image2 = mysqli_real_escape_string($con,$_FILES['product_image2']['tmp_name']);
    $temp_image3 = mysqli_real_escape_string($con,$_FILES['product_image3']['tmp_name']);

    if($name=='' or $description=='' or $category=='' or $brand=='' or $stock==''or $price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the available fields'></script>"; 
        exit();


    }else{
        for ($i = 1; $i <= 3; $i++) {
            $fieldName = "product_image".$i;
    
            // Check if a file was selected
            if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]["error"] == 0) {
                $targetFile = $targetDirectory . basename($_FILES[$fieldName]["name"]);
    
                // Check if the file already exists
                if (file_exists($targetFile)) {
                    echo "File already exists.";
                } else {
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($_FILES[$fieldName]["tmp_name"],$targetFile)) {
                        echo "File $i uploaded successfully.<br>";
                    } else {
                        echo "There was an error uploading file $i.<br>";
                    }
                }
            } else {
                echo "No file selected or an error occurred for file $i.<br>";
            }
        }




        //insert data 


        $query = "INSERT INTO product (name,brand,price,category,description,stock,product_image1,product_image2,product_image3,date,status) 
        VALUES ('$name','$brand','$price','$category','$description','$stock',' $product_image1',' $product_image2',' $product_image3',NOW(), '$status_product')";

$query_run = mysqli_query($con, $query);
if($query_run)
{
  $_SESSION['message'] = "product Created Successfully";
  header("Location: view_product.php");
  exit(0);
}
else
{
  $_SESSION['message'] = "product Not Created";
  header("Location: view_product.php ");
  exit(0);
}


    }


}












