<?php
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
                <h4>Create user 
                    <a href="users.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
            <form action="code_user.php" method="post" enctype="multipart/form-data">


<div class="mb-3">
                    <label>Username</label>
                    <input type="text" autocomplete="off" placeholder="Enter Username" required="required" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" autocomplete="off" placeholder="Enter Email" required="required"  name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Password	</label>
                    <input type="password" autocomplete="off" placeholder="Enter Password" required="required"  name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" autocomplete="off" placeholder="Enter Address" required="required"  name="address" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" autocomplete="off" placeholder="Enter Phone" required="required"  name="phone" class="form-control">
                </div>

 
                



                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Save user</button>
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