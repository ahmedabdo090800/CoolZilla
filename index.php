<?php
@session_start();
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
<?php

cart();

?>
<!-- calling cart  -->



        <!-- main -->
        <div class="container">
            <div class="main">
                <div class="main-text">
                    <h1><span>Air Condition</span><br>
                        Collection</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi omnis ipsa quas a
                        voluptates consequatur reprehenderit repudiandae nulla excepturi. Eius fugit omnis
                        eligendi natus quaerat nihil accusantium voluptate sit officiis!</p>
                </div>
                <div class="social_icon">
                    <a href=""><i class="fa-brands fa-facebook-f"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-linkedin-in"></i></a>

                </div>
                <div class="bg-image">
                    <img src="image/shoes.png" alt="" srcset="">
                </div>
            </div>
        </div>
        <div class="btn-shop" style="width: 10%;margin-left: 102px;">
            <a class="btn" href="">Shop Now</a>
            <i class="fa-solid fa-chevron-right ii"></i>
        </div>
        <!-- main -->

        



        <div class="products">
            <h1>products</h1>
            <div class="box container">
                <div class="row ">
                    <?php
                    getproducts();
                    getIPAddress()
 
                    
                ?>
 
                    </div>
                   

                    </div>

                </div>
            </div>

            <?php
            include('./about.php');

            
            ?>
            <?php
            include('./contact.php');

            
            ?>
            <?php
            include('./include/footer.php');

            
            ?>







        <?php


include('include/script.php')



?>



  
    
