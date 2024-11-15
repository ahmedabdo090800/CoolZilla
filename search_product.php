<?php
require './admin/include/connect.php';
include('./functions/comman_function.php');


?>

<?php

include('./include/header.php')

?>
<body>
    <section>
    <?php

include('./include/navbar.php')

?>

            </div>
        </div>


        <!-- main -->
        <div class="container">
            <div class="main">
                <div class="main-text">
                    <h1><span>NIKE</span><br>
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
        <div class="btn-shop">
            <a class="btn" href="">Shop Now</a>
            <i class="fa-solid fa-chevron-right ii"></i>
        </div>
        <!-- main -->




        <div class="products">
            <h1>products</h1>
            <div class="box container">
                <div class="row ">
                    <?php
                    searchproduct()
 
                    
                ?>
 
                    </div>
                   

                    </div>

                </div>
            </div>
        </div>




<?php
include('include/script.php')

?>