<?php
require '../include/connect.php';



?>

<?php
if(isset($_POST["submit"])) {

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $brand = mysqli_real_escape_string($con, $_POST['brand']);
    $category = mysqli_real_escape_string($con, $_POST['category']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
    $status_product=true;

    $targetDir = "product_image/";
    $product_image1 = mysqli_real_escape_string($con,$_FILES['product_image1']['name']);
    $product_image2 = mysqli_real_escape_string($con,$_FILES['product_image2']['name']);
    $product_image3 = mysqli_real_escape_string($con,$_FILES['product_image3']['name']);
    //temp image 
    $temp_image1 = mysqli_real_escape_string($con,$_FILES['product_image1']['tmp_name']);
    $temp_image2 = mysqli_real_escape_string($con,$_FILES['product_image2']['tmp_name']);
    $temp_image3 = mysqli_real_escape_string($con,$_FILES['product_image3']['tmp_name']);



    if($product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the available fields'></script>"; 
        exit();


    }else{
        move_uploaded_file($temp_image1, "./product_images/$product_image1"); 
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");




        //insert data 


        $query = "INSERT INTO product (name,brand,price,category,description,stock,product_image1,product_image2,product_image3) 
        VALUES ('$name','$brand','$price','$category','$description','$stock',' $product_image1',' $product_image2',' $product_image3')";

$query_run = mysqli_query($con, $query);
    }
}

?>

<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="../css/styles.css" rel="stylesheet" />
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<head>
    <title>Image Upload Form</title>
</head>
<body>
    <h1>Upload an Image</h1>
    <form action="" method="post" enctype="multipart/form-data">


    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" autocomplete="off" placeholder="Enter product title" required="required" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="text" autocomplete="off" placeholder="Enter product Price" required="required"  name="price" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea class="form-control" autocomplete="off" placeholder="Enter product Description" required="required"  name="description" cols="20" rows="5"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label>Brand</label>
                        <select name="brand" class="form-select" id="">
                            <option value="">Select the Brand </option>
                        
                            <?php
                            $select_query="select * from brand"; 
                            $result_query=mysqli_query($con, $select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $id_brand=$row['id_brand'];
                                $brand_title=$row['name'];
                                echo"<option value='$id_brand'>$brand_title</option>";
                            }        
                            
                            ?>
                        </select>
                        
                    </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category" class="form-select" id="">
                        <option value="">Select the Category </option>

                        <?php
                            $select_query="select * from category"; 
                            $result_query=mysqli_query($con, $select_query);
                            while($row=mysqli_fetch_assoc($result_query)){
                                $id_category=$row['id_category'];
                                $category_title=$row['subcategory'];
                                echo"<option value='$id_category'>$category_title</option>";
                            }        
                            
                            ?>
                        </select>
                    </div>



                    
                    <div class="mb-3">
                        <label>Stock</label>
                        <input type="text" autocomplete="off" placeholder="Enter product Stock" required="required"  name="stock" class="form-control">
                    </div>
        Select image to upload:
        <div class="mb-3">
                        <label for="product_image1" class="form-label">Product Image 1</label>
                        <input type="file"  required="required"  name="product_image1" id="product_image1" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="product_image2" class="form-label">Product Image 2</label>
                        <input type="file"  required="required"  name="product_image2" id="product_image2" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="product_image3" class="form-label">Product Image 3</label>
                        <input type="file"  required="required"  name="product_image3" id="product_image3" class="form-control">
                    </div>



                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Save product</button>
                    </div>
    </form>
</body>
</html>
