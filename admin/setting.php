<?php
session_start();
require './include/connect.php';

if(!isset($_SESSION['username'])){
    header('location:login.php');

};
include('include/header.php')
?>





<div class="container mb-5">
<h4>Setting
</h4>

    <?php include('./include/message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?php
                    $username = $_SESSION['username'];





                    $query = "SELECT * FROM db_admin WHERE username= '$username' ";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        $admin = mysqli_fetch_array($query_run);
                    ?>
                        <form action="./user/code_user.php" method="POST" >
                            <input type="hidden" name="admin_id" value="<?= $admin['id']; ?>">

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $admin['name']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>UserName</label>
                                <input type="text" name="username" value="<?= $admin['username']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="<?= $admin['email']; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="Password" name="password" value="<?= $admin['password']; ?>" class="form-control">
                            </div>


                            <div class="mb-3">
                                <button type="submit" name="update_admin" class="btn btn-primary">
                                    Update
                                </button>
                            </div>

                        </form>
                    <?php
                    } else {
                        echo "<h4>No Such Id Found</h4>";
                    }
                    ?>
                </div>



            </div>
            
        </div>
            </div>


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>















<?php
include('include/footer.php')
?>
<?php
include('include/script.php')
?>


<!-- <body>
   <h1>wellcome Dr
   <?php
    echo $_SESSION['username'];

    ?>
   </h1> 
   <div class="container">
    <a href="logout.php" class="btn btn-primary " >Logout</a>
   </div>


</body>
</html> -->