<?php
session_start();
require './admin/include/connect.php';
include('./functions/comman_function.php');


?>

<!--  start header -->

<?php

include('./include/header.php')

?>

<!--  end header -->

<body>
    <section>
        <!-- start nabar -->
    <?php

include('./include/navbar.php');


?>


            </div>
 
        </div>

<!-- start nabar -->
<!-- calling cart  -->

<!-- calling cart  -->




        



        <div class="checkout">
            <h1>checkout</h1>
            <div class="box container">
                <div class="row ">
                    <?php
                    

                    if(!isset($_SESSION['username'])){
                    //header('./user_area/login.php');
                    echo "<script> window.open('./user_area/login.php','_self') </script>";

                    }else{
                    include('payment.php');
                    }

 
                    
                ?>
 
                    </div>
                   

                    </div>

                </div>
            </div>
        </div>


        <?php


include('include/script.php')



?>



  
    
