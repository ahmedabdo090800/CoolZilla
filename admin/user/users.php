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
require '../include/connect.php';



?>

<div id="layoutSidenav">

<?php
include('../include/sidebar.php')
?>
<div id="layoutSidenav_content">
<main>

<div class="container mt-4">


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Customer Details
                    <a href="create_user.php" class="btn btn-primary float-end">Add User</a>
                </h4>
            </div>
            <div class="card-body">

                <table id="datatableid" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Address</th>


	

                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM user_table";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                foreach($query_run as $user)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $user['user_id']; ?></td>
                                        <td><?= $user['username']; ?></td> 
                                        <td><?= $user['user_email']; ?></td> 
                                        <td><?= $user['user_mobile']; ?></td>
                                        <td><?= $user['user_address']; ?></td>
                                        <td>

                                        <form action="code_user.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_user" value="<?=$user['user_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                <!-- <button type="submit" name="edit_user" value="<?=$user['user_id'];?>" class="btn btn-info btn-sm"><a href="edit_user.php">edit</a></button> -->
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