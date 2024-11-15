<header class="dash-toolbar">
    <a href="#!" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>

    <div class="tools">


        <div class="dropdown tools-item">
<?php echo"  <a class='mx-3' href='#'><i></i>Hi, ".$_SESSION['username']."</a>"?>
            <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="#!">Profile</a>
                <a class="dropdown-item" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</header>