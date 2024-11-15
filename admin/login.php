
<?php
$login=0;
$invald=0;
if($_SERVER['REQUEST_METHOD']=='POST')
{ 
  include './include/connect.php';
  $username =$_POST['username'];
  $password=$_POST['password'];
  $sql="SELECT * FROM `db_admin`
  where
  username='$username' and password='$password' ";


    $result=mysqli_query($con, $sql);
    if($result){
      $num=mysqli_num_rows($result);
      if($num>0){
        $login=1;
        session_start();
        $_SESSION['username']=$username ; header("location:index.php"); 
      }else{
        $invald=1;


      }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Control Panel - Coolzilla</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <title>login Admin</title>
</head>
<body>

<div class="d-flex justify-content-center  align-items-center " style=" min-height: 100vh;" >
<form class="p-5 rounded shadow"
      style=" width:30rem;"
      action="login.php"
      method="POST"

>

    <h1 class=" text-center pb-5 pt-5 display-4">Login Admin</h1>

<?php
if($invald){

  echo'
  <div class="alert alert-danger" role="alert">
  Invaild Login
  <p>Please check your username  and password</p> 
  

</div>
  ';

}

?>











    

<div class="mb-3">
    <label for="exampleInputusername 1" class="form-label">username
    </label>
    <input type="text " name="username" class="form-control" id="exampleInputusername 1" aria-describedby="username Help">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="btn" style="display: flex; align-items: center; justify-content: space-around;">
  <button type="submit" class="btn btn-primary">LOGIN</button>
  </div>

</form>
</div>
   




</body>
</html>