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
<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');

};
require '../include/connect.php';



?>

<div id="layoutSidenav">

<?php
include('../include/sidebar.php')
?>
<div id="layoutSidenav_content">
<main>

<div class="container mt-4">

<?php include('../include/message.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Brand Details
                    <a href="create_Brand.php" class="btn btn-primary float-end">Add Brand</a>
                </h4>
            </div>
            <div class="card-body">

                <table id="datatableid" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM brand";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $brand)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $brand['id_brand']; ?></td>
                                        <td><?= $brand['name']; ?></td> 
                                        <td>
                                            <a href="edit_brand.php?id_brand=<?= $brand['id_brand']; ?>" class="btn btn-success btn-sm">Edit</a>
                                            <form action="code_brand.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_brand" value="<?=$brand['id_brand'];?>" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<h5> No Record Found </h5>";
                            }
                        ?>
                        
                    </tbody>
                </table>

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