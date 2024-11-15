<?php
@session_start();
require '../admin/include/connect.php';
include('../functions/comman_function.php');

if(!isset($_SESSION['username'])){
    //header('./user_area/login.php');
    echo "<script> window.open('../user_area/login.php','_self') </script>";

    }


?>


<!-- head -->

<?php

include('./include/header.php')

?>

<body>
    <!-- sidbar -->
    <?php

include('./include/sidbar.php')

?>
    <div class="dash-app">
        <!-- nav -->
        <?php

include('./include/nav.php')

?>
        <main class="dash-content">
            <!-- main -->
            <?php
               get_user_order_details()
         
            
            ?>

        </main>
    </div>
    </div>
    <!-- script -->
    <?php

include('./include/scrpit.php')

?>
</body>

</html>