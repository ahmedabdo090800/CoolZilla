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
<div class="container mb-5">
<?php
require '../include/connect.php';



?>
<?php include('../include/message.php'); ?>



<div class="row">
    <div class="col-md-12">
        <div class="">
                <?php
                if (isset($_GET['user_id'])) {
                    $user_id = mysqli_real_escape_string($con, $_GET['id']);
                    $query = "SELECT * FROM user_table WHERE id='$user_id' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $user = mysqli_fetch_array($query_run);
                ?>
                        <form action="code_user.php" method="POST">
                            <input type="hidden" name="user_id" value="<?= $user['id']; ?>">

                            <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label>Brand</label>
                        <input type="text" name="address"  value="<?= $user['user_address']; ?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Category</label>
                        <input type="text" name="user_mobile" value="<?= $user['user_mobile']; ?>" class="form-control">
                    </div>


                    
                </form>
                            <div class="mb-3">
                                <button type="submit" name="update_user" class="btn btn-primary">
                                    Update
                                </button>
                            </div>

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