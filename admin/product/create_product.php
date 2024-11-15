<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');

};
require '../include/connect.php';
include('../include/message.php');


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Control Panel - Coolzilla</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

    <?php
include('../include/navbar-top.php')
?>


<div id="layoutSidenav">

<?php
include('../include/sidebar.php')
?>
<div id="layoutSidenav_content">
<main>

<div class="container mb-5 mt-5">


<div class="row">
    <div class="col-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>Create Product 
                    <a href="product.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
            <form action="code_product.php" method="post" enctype="multipart/form-data">


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
                    <input type="file"  required="required" accept="image/*" name="product_image1" id="product_image1" class="form-control">
                </div>


                <div class="mb-3">
                    <label for="product_image2" class="form-label">Product Image 2</label>
                    <input type="file"  required="required" accept="image/*" name="product_image2" id="product_image2" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="product_image3" class="form-label">Product Image 3</label>
                    <input type="file"  required="required" accept="image/*" name="product_image3" id="product_image3" class="form-control">
                </div>



                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Save product</button>
                </div>
</form>
            </div>
        </div>
    </div>
</div>
</div>









<?php
include('../include/footer.php')
?>
<?php
include('../include/script.php')
?>