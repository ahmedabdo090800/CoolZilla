<div class="nav">
            <div class="container">
                <nav class="nav-bar">
                    <div class="logo">
                        <a href="index.php" style="text-decoration:none"><h1>Cool<span>Zilla</span></h1></a>
                    </div>
                    <ul class="ul-nav">
                        

                        <li><a href="index.php">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact </a></li>
                        <li >
                        <form style="margin-top: 23px;" class="d-flex" action="search_product.php" method="GET">
<input class="form-control me-2" type="search"
placeholder="Search" aria-label="Search" name="search_data"> 
<input type="submit" style="height:37px; " value="Search" class="btn btn-outline-dark" name="search_data_product">
</form>
                          </li>
                          <li>
                            <div class="icons">
                                <a href="cart.php"> <i class="ii fa fa-shopping-basket"></i></i><sup class="circle"><?php
                                cart_item()?></sup></a>
                            </div>
                        </li> 
                        <?php
                        
                        // echo 'Dr' . '.' . $_SESSION['username'];
                        


                        if(!isset($_SESSION['username'])){
                            echo" <li>
                            <a href='user_area/login.php'><i class='fa-solid fa-user'></i>login/reguster</a>
                        </li>";
                            

                        }else{

                            echo" <li>
                            <a href='./user_dashbord/profile_dashbord.php'><i class='fa-solid fa-user'></i>  ".$_SESSION['username']."</a>
                                  </li>
                                  <li>
                                  <a href='user_area/logout.php'><i class='fa-solid fa-right-from-bracket'></i>logout</a>
                              </li>
                                
                        
                        ";

                        }
                        ?>
                        <!-- <li>
                            <a href="user_area/login.php"><i class="fa-solid fa-user"></i>login/reguster</a>
                        </li> -->
                          <li>
                            <img src="img/image logo.png" alt="" srcset="">
                          </li>




                    </ul>


                </nav>