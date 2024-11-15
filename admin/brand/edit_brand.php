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
    session_start();
    
    if(!isset($_SESSION['username'])){
        header('location:login.php');
    
    };
include('../include/navbar-top.php')
?>

<div id="layoutSidenav">

<?php
include('../include/sidebar.php')
?>
<div id="layoutSidenav_content">
<main>
<div class="container mb-5">
<?php
require '../include/connect.php';



?>
<?php include('../include/message.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php
                if (isset($_GET['id_brand'])) {
                    $id_brand = mysqli_real_escape_string($con, $_GET['id_brand']);
                    $query = "SELECT * FROM brand WHERE id_brand='$id_brand' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $brand = mysqli_fetch_array($query_run);
                ?>
                        <form action="code_brand.php" method="POST">
                            <input type="hidden" name="id_brand" value="<?= $brand['id_brand']; ?>">

                            <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= $brand['name']; ?>" class="form-control">
                    </div>



                            <div class="mb-3">
                                <button type="submit" name="update_brand" class="btn btn-primary">
                                    Update brand
                                </button>
                            </div>

                        </form>
                <?php
                    } else {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>
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